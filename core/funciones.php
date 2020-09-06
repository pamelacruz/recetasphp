<?php

function query($sql)
{
    global $conn;
    return $conn->exec($sql);
}

function oneRow($sql)
{
    global $conn;
    $result = null;
    $result = $conn->prepare($sql);
    $result->execute();
    return $result->fetch();
}