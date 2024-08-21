<?php 
//Assoc. Array containing all valid links on the page, and the credentials for the database.
return [
    'routes' => [
        "/" => "controllers/index.php",
        "/create" => "controllers/create.php"
    ],
    'database' => [
        'host' => '127.0.0.1',
        'port' => 3306,
        'dbname' => 'mhoekstra_db',
        'charset' => 'utf8mb4'
    ]
];
?>