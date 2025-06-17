<?php
require_once 'db.php';

class User {
    public function register($username, $email, $password) {
        global $mysqli;
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(16));
        $stmt = $mysqli->prepare("INSERT INTO users (username, email, password, token, verified) VALUES (?, ?, ?, ?, 0)");
        $stmt->bind_param("ssss", $username, $email, $password, $token);
        if ($stmt->execute()) {
            $this->sendVerificationEmail($email, $token);
            echo "Registration successful. Check your email to verify.";
        } else {
            echo "Registration failed.";
        }
    }

    public function sendVerificationEmail($email, $token) {
        $subject = "Verify your email";
        $link = "http://localhost/auth-system/verify.php?email=$email&token=$token";
        $message = "Click the link to verify: $link";
        mail($email, $subject, $message);
    }

    public function verifyUser($email, $token) {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND token = ?");
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();
        if ($stmt->get_result()->num_rows === 1) {
            $update = $mysqli->prepare("UPDATE users SET verified = 1, token = '' WHERE email = ?");
            $update->bind_param("s", $email);
            $update->execute();
            echo "Email verified successfully.";
        } else {
            echo "Invalid verification link.";
        }
    }

    public function login($email, $password) {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT id, password, verified FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if ($user['verified'] == 1 && password_verify($password, $user['password'])) {
                return $user['id'];
            }
        }
        return false;
    }

    public function sendResetLink($email) {
        global $mysqli;
        $token = bin2hex(random_bytes(16));
        $stmt = $mysqli->prepare("UPDATE users SET token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        $link = "http://localhost/auth-system/reset.php?email=$email&token=$token";
        mail($email, "Reset Password", "Click to reset: $link");
    }

    public function resetPassword($email, $token, $password) {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ? AND token = ?");
        $stmt->bind_param("ss", $email, $token);
        $stmt->execute();
        if ($stmt->get_result()->num_rows === 1) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $update = $mysqli->prepare("UPDATE users SET password = ?, token = '' WHERE email = ?");
            $update->bind_param("ss", $hashed, $email);
            $update->execute();
            echo "Password reset successful!";
        } else {
            echo "Invalid reset link.";
        }
    }

    public function updateUser($id, $username, $email) {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $username, $email, $id);
        if ($stmt->execute()) {
            echo "Update successful.";
        } else {
            echo "Update failed.";
        }
    }

    public function deleteUser($id) {
        global $mysqli;
        $stmt = $mysqli->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "User deleted.";
        } else {
            echo "Delete failed.";
        }
    }
}
?>