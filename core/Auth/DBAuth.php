<?php

namespace Core\Auth;

use Core\Database\MysqlDatabase;

class DBAuth
{
    private MysqlDatabase $db;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;
    }

    public function login($username, $password): bool
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        dump($user);
    }

    public function logged(): bool
    {
        return isset($_SESSION['auth']);
    }
}