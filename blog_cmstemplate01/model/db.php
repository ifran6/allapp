<?php
class DB {
    public static function connect() {
        return new mysqli("localhost", "root", "", "oop_auth_db");
    }
}
?>