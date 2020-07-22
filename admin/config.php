<?php
return [
    'database' => [
        'name' => 'MioArchivio',
        'username' => 'root',
        'password' => 'lampolampo',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                     ]
    ],
    'nome_archivio' => 'new_arch',
    'file_path' => '../"MioArchivio"/'
];