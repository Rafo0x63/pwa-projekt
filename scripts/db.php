<?php

$link = mysqli_connect("localhost", "root", "rootpass", "newsweek");

if (!$link) {
    echo "Connection unsuccesfull";
    die();
}