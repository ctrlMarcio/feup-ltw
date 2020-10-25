<?php

function userExists($db, $username, $password)
{
    $password = sha1($password);

    $stmt = $db->prepare(
        'SELECT *
        FROM users
        WHERE username = ? AND password = ?
        LIMIT 1'
    );

    $stmt->execute(array($username, $password));

    if (($stmt->fetch()))
        return True;
    else
        return False;
}

function usernameUsed($db, $username)
{
    $stmt = $db->prepare(
        'SELECT *
        FROM users
        WHERE username = ?'
    );

    $stmt->execute(array($username));

    if (($stmt->fetch()))
        return True;
    else
        return False;
}

function insertUser($db, $username, $password, $name)
{
    $password = sha1($password);

    $stmt = $db->prepare(
        'INSERT INTO users(username, password, name)
        VALUES(?, ?, ?)'
    );

    if (!$stmt)
        return False;

    $stmt->execute(array($username, $password, $name));
    return True;
}
