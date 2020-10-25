<?php

function getAllNews($db)
{
  $stmt = $db->prepare(
    'SELECT news.*, users.*, COUNT(comments.id) AS comments
    FROM news JOIN
         users USING (username) LEFT JOIN
         comments ON comments.news_id = news.id
    GROUP BY news.id, users.username
    ORDER BY published DESC
  '
  );
  $stmt->execute();

  return $stmt->fetchAll();
}

function updateArticle($db, $id, $title, $introduction, $fulltext) {
  $stmt = $db->prepare(
    'UPDATE news
    SET title = ?, introduction = ?, fulltext = ?
    WHERE id = ?'
  );

  $stmt->execute(array($title, $introduction, $fulltext, $id));
}
