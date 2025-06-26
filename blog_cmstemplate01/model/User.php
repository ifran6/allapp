<?php
require_once 'db.php';
require_once 'utility_fun.php';

class User {
    private $db;

    public function __construct() {
        $this->db = DB::connect();
    }

    function register($name, $email, $pass) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(20));
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password, verify_token) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $pass, $token);
        $stmt->execute();
        mail($email, "Verify Email", "Click to verify: http://localhost/oop-auth-system/verify.php?token=$token");
    }

    function verify($token) {
        $stmt = $this->db->prepare("UPDATE users SET is_verified=1 WHERE verify_token=?");
        $stmt->bind_param("s", $token);
        $stmt->execute();
    }

    function login($email, $pass) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();

        if ($res && password_verify($pass, $res['password'])) {
            if ($res['is_verified'] == 0) return "Verify email first.";
            session_start();
            $_SESSION['user'] = $res;
            return redirectView('welcome.php');
            // "Welcome " . $res['username'];
        }
        return "Login failed";
    }

    function sendReset($email) {
        $token = bin2hex(random_bytes(20));
        $stmt = $this->db->prepare("UPDATE users SET reset_token=? WHERE email=?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();
        mail($email, "Reset Password", "Click: http://localhost/oop-auth-system/reset.php?token=$token");
    }

    function resetPassword($token, $newpass) {
        $newpass = password_hash($newpass, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE users SET password=?, reset_token=NULL WHERE reset_token=?");
        $stmt->bind_param("ss", $newpass, $token);
        $stmt->execute();
    }


      function delete($id) {
        $stmt = $this->db->prepare("UPDATE users SET del=? WHERE id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
}
?>