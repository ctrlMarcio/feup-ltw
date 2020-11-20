<?php

include_once('../database/connection.php');
include_once('../database/comments.php');

$news_id = $_POST['newsID'];
$last_comment_id = $_POST['lastCommentID'];
$username = $_POST['username'];
$comment_text = $_POST['commentText'];

addComment($news_id, $username, time(), $comment_text);

echo json_encode(getCommentsAfter($news_id, $last_comment_id));
