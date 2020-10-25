<?php

function getDb($path = "database")
{
  return new PDO("sqlite:$path/news.db");
}
