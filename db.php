<?php
define('SYSPATH', 'W:/domains/blog.cv.ua/');
    require "libs/rb.php";

    R::setup('mysql:host=localhost;dbname=blog_db',
        'root', 'root' );
    if(!R::testConnection()) die('No DB connection!');

    session_start();


?>