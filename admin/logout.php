<?php
//45.23 Добавляем сессию при авторизации

session_start();
session_destroy();


echo 'Bye! :(';

header("refresh: 3; url=/");
