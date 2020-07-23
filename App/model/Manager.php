<?php
namespace OpenClassrooms\Blog\Model;
class Manager
{
    protected function dbConnect()
    {
        $db= new \PDO('mysql:host=localhost;port=3308;dbname=p4', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}