<?php
    include "libs/rb.php";
    include "config.php";

    R::setup('mysql:host=localhost;dbname=blog_db',
        'root', 'root' );
    if(!R::testConnection()) die('No DB connection!');

    session_start();

?>