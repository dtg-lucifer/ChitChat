<?php 
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($connection, $_POST['first__name']);
    $lname = mysqli_real_escape_string($connection, $_POST['last__name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($connection, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0) {
                echo "$email - This email already exists";
            } else {
                if(isset($_FILES['profile__image'])) {
                    $img_name = $_FILES["profile__image"]["name"];
                    $img_type = $_FILES["profile__image"]["type"];
                    $tmp_name = $_FILES["profile__image"]["tmp_name"];

                    $img_explode = explode(".", $img_name);
                    $img_ext = end($img_explode);
                    $valid_extensions = ["png", "jpeg", "jpg"];

                    if(in_array($img_ext, $valid_extensions) === true) {
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if( move_uploaded_file($tmp_name, "images/".$new_img_name)) {
                            $status = "Active now";
                            $random_id = rand(time(), 10000000);

                            $sql2 = mysqli_query($connection, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                            if($sql2) {
                                $sql3 = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                } else {
                                    echo "Something went wrong";
                                }
                            }
                        }
                    } else {
                        echo "Please provide a valid image with extension of .jpg .png .jpeg";
                    }
                } else {
                    echo "Please provide a picture for your profile";
                }
            }
        } else {
            echo "$email - This is not a valid email.";
        }
    } else {
        echo "Every field should be filled.";
    }
?>