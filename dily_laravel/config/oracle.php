<?php

return [
    'oracle' => [
        'driver' => 'oracle',
        
        'SERVICE_NAME' => 'XE',
        'host' => 'localhost',
        'port' => '1521',
        'database' => 'XE',
        'username' => 'dba1',
        'password' => 'sql',
        'tns' => '(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = AndrewX-PC)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = XE)
    )
  )',
        'charset' => 'AL32UTF8',
        'prefix' => '',
    ],
];
