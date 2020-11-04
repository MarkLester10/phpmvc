<?php

use marklester\phpmvc\Application;

class m0001_users
{
    private $db;

    public function __construct()
    {
        $this->db = Application::$app->db;
    }

    public function up()
    {
        $SQLStatement = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            isAdmin TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";

        $this->db->pdo->exec($SQLStatement);
    }

    public function down()
    {
        $SQLStatement = "DROP TABLE users";

        $this->db->pdo->exec($SQLStatement);
    }
}