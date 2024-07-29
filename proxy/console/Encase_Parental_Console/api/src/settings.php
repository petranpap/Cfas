<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            
        ],
         // Database connection settings           
          "db" => [
            "host" => "localhost",
            "dbname" => "encase",
	    "user" => "the_encase_user",
            "pass" => "SEou!gR[p$=YLqrI4Q9$"
        ],
    ],
];