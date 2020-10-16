<?php

function get_db()
{
  return new PDO('sqlite:news.db');
}

function get_time_passed($epoch_time)
{
  $seconds_passed = time() - $epoch_time;

  if ($seconds_passed < 60)
    $time_passed = $seconds_passed . "s";
  else if ($seconds_passed < 3600) // 60*60
    $time_passed = floor($seconds_passed / 60) . "m";
  else if ($seconds_passed < 86400) // 60*60*24
    $time_passed = floor($seconds_passed / 86400) . "d";
  else if ($seconds_passed < 604800) // 60*60*24*7
    $time_passed = floor($seconds_passed / 604800) . "w";
  else if ($seconds_passed < 2592000) // 60*60*24*30
    $time_passed = floor($seconds_passed / 2592000) . "M";
  else
    $time_passed = floor($seconds_passed / 31536000) . "Y"; // 60*60*24*365

  return $time_passed;
}

function get_tags($article)
{
  $tags = $article['tags'];
  return explode(',', $tags);
}
