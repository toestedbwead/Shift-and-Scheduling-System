<?php
namespace App\Models;

use App\Core\Database;

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function findByEmail($email) {
        sql = "SELECT Email, password, Account_type FROM login_table where Email = ?";
        $result = $this->db->query($sql, [$email]);

        return $result->fetch_assoc();
    }

    public function validateCredentials($inputPassword, $storedPassword) {
        return $inputPassword === $storedPassword;
    }

    public function getRedirectPath($accountType) {
        return ($accountType == "1") ? 'admin/dashboard' : 'user/dashboard';
    }
}
?>