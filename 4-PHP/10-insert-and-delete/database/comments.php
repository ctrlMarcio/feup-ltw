<?php

function getArticle($db)
{
  $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = :id');
  $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetch();
}

function getComments($db)
{
  $stmt = $db->prepare('SELECT * FROM comments JOIN users USING (username) WHERE news_id = ?');
  $stmt->execute(array($_GET['id']));
  return $stmt->fetchAll();
}

function addComment($db, $article_id, $username, $published, $text) {
  $stmt = $db->prepare('INSERT INTO comments VALUES(NULL, ?, ?, ?, ?)');
  $stmt->execute(array($article_id, $username, $published, $text));
}
