<?php
function getCommentsByNewId($id)
{
  global $db;
  $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
  $stmt->execute(array($id));
  return $stmt->fetchAll();
}

function addComment($article_id, $username, $published, $text)
{
  global $db;
  $stmt = $db->prepare('INSERT INTO comments VALUES(NULL, ?, ?, ?, ?)');
  $stmt->execute(array($article_id, $username, $published, $text));
}

function getCommentsAfter($article_id, $last_comment_id)
{
  global $db;
  $stmt = $db->prepare('SELECT id, username, published, text FROM comments WHERE news_id = ? AND id > ?');
  $stmt->execute(array($article_id, $last_comment_id));
  return $stmt->fetchAll();
}
