<?php
error_reporting(0);
while ($row = mysqli_fetch_assoc($sql)) {
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($connection, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    $result = "";
    $you = "";
    if (mysqli_num_rows($query2) > 0) {
        $result = $row2['message'];
    } else {
        $result = "No messages available";
    }

    (strlen($result) > 28) ? $msg = substr($result, 0, 28) : $msg = $result;
    ($outgoing_id === $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    ($row['status'] === "Offline now") ? $offline = "offline" :  $offline = "";
    ($result === "No messages available") ? $text = "No messages available" : $text = $you;
    $output .= '
        <a href="chat?user_id=' . $row['unique_id'] . '">
            <div class="content">
                <img src="../php/images/' . $row['img'] . '" alt="">
                <div class="details">
                    <span>' . $row['fname'] . " " . $row['lname'] . '</span>
                    <p>' . $you . $msg . '....' . '</p>
                </div>
            </div>
            <div class="status ' . $offline . '"><i class="fas fa-circle"></i></div>
        </a>
        ';
}
