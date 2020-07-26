<?php
namespace App\;
class Manager
{
//ici mettre un require pour chercher mes identifiants.
    protected function dbConnect()
    {
        $db= new \PDO('mysql:host=localhost;port=3308;dbname=p4', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}