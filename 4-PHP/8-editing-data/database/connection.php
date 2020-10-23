<?php

function getDb()
{
  return new PDO('sqlite:database/news.db');
}

?>