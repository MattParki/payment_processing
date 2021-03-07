<?php

//This will make all the libraries available to us
require_once '../vendor/autoload.php';

//Setup of the whoops handler. So we get the contextual information out when things go wrong
$whoops = new \Whoops\Run();
$whoops->pushHandler(
    new \Whoops\Handler\PrettyPageHandler()
);
$whoops->register();


//loaded the variables from the dotenv file, so we can take any credentials away from the code
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//set up logger, so we can log things to a file and start to put meaningful information in a
//seperate file so it doesnt have to be var dumped all the time and we can see whats happening
//this is a more sophisticated way of handling errors for example
$logger = new \Monolog\Logger('application');
$logger->pushHandler(
  new \Monolog\Handler\StreamHandler(
      'application.log',
      \Monolog\Logger::WARNING
  )
);

//When using this in other projects, use the setup.php file, you will also need the
//composer.json file. Aswell as the composer install.

require_once 'Entity/Product.php';
require_once 'Entity/CheckIn.php';

// try {
//     $dbh = new PDO(
//         "mysql:host=localhost;dbname=myowndatabase",
//         $_ENV['DBUSERNAME'],
//         $_ENV['DBPASSWD']
//     );
// } catch (PDOException $e) {
//     // We could log this!
//     die('Unable to establish a database connection');
// }


$dsn = "mysql:host=localhost;dbname=myowndatabase";
$username = "root";
$password = "";

try{
    $dbh = new PDO($dsn, $username, $password);
}catch(PDOException $e){
    // $error_message = e->getMessage();
    echo $error_message;
    exit();
}