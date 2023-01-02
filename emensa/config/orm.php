<?php
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "mysql",
    "host" => "localhost",
    "database" => "emensawerbeseite",
    "username" => "root",
    "password" => "9jan2002"
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
