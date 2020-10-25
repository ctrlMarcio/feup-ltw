<?php

function getAllNews($db)
{
  $stmt = $db->prepare(
    'SELECT news.*, users.*, COUNT(comments.id) AS comments
    FROM news JOIN
         users USING (username) LEFT JOIN
         comments ON comments.news_id = news.id
    GROUP BY news.id, users.username
    ORDER BY published DESC'
  );

  $stmt->execute();

  return $stmt->fetchAll();
}

function getAllTags($db)
{
  $stmt = $db->prepare(
    'SELECT tags FROM news'
  );

  $stmt->execute();

  $allTagStrings = $stmt->fetchAll();

  $allTags = [];
  foreach ($allTagStrings as $singleTag)
    $allTags = array_merge($allTags, explode(',', $singleTag[0]));

  return array_unique($allTags);
}

function updateArticle($db, $id, $title, $introduction, $fulltext)
{
  $stmt = $db->prepare(
    'UPDATE news
    SET title = ?, introduction = ?, fulltext = ?
    WHERE id = ?'
  );

  $stmt->execute(array($title, $introduction, $fulltext, $id));
}

function addArticle($db, $title, $published, $tags, $username, $introduction, $fulltext)
{
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->prepare('INSERT INTO news VALUES(NULL, ?, ?, ?, ?, ?, ?)');
  $stmt->execute(array($title, $published, $tags, $username, $introduction, $fulltext));

  return $db->lastInsertID();
}
