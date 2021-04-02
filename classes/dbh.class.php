<?php
class Dbh
{
    // Development connectie
    // private $host = 'localhost';
    // private $user = 'root';
    // private $pwd = '';
    // private $dbName = 'supermarkt';

    private $host = 'remotemysql.com';
    private $user = 'wHGCclw4wb';
    private $pwd = 'JQcRi9SsiX';
    private $dbName = 'wHGCclw4wb';

    public function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}