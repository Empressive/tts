<?php
#Добавление оповещений
session_start();

include_once('../../config.php');

if(isset($_POST['comment']) && $_POST['comment'] != null) {

    include_once('../../library/MVdb.php');

    MVdb::connect();

    $user_id = $_SESSION['user_id'];
    $comment = htmlspecialchars(trim($_POST['comment']));
    $now_date = date('Y-m-d H:i:s');
    $comment_type_id = '3';

    $query = mysql_query("SELECT status_id FROM announcement WHERE status_id != 1");
    if(mysql_numrows($query) < 3) {
        mysql_query("INSERT INTO announcement VALUES ('', '$user_id', '$now_date', '$comment', '$comment_type_id', '')");
        header("Location: $local");
    } else header("Location: $local/pages/503.html");
}
header("Location: $local");

