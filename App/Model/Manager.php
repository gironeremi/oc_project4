<?php
namespace App\Model;
require('config.php');
class Manager
{
    protected function getDbConnect()
    {
        $db= new \PDO(DB_HOST, DB_USER, DB_PASS, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}