<?php

$username = 'root';
$password = 'root';

try {
    $dbh = new PDO(
        'mysql:host=localhost/phpmyadmin;dbname=myowndatabase',
        $username,
        $password
    );

//    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // We could log this!
    die('Unable to establish a database connection');
}

?>