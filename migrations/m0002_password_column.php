<?php

use app\core\Application;

class m0002_password_column
{
    private $db;

    public function __construct()
    {
        $this->db = Application::$app->db;
    }

    public function up()
    {
        $SQLStatement = "ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL";

        $this->db->pdo->exec($SQLStatement);
    }

    public function down()
    {
        $SQLStatement = "ALTER TABLE users DROP COLUMN password";

        $this->db->pdo->exec($SQLStatement);
    }
}
