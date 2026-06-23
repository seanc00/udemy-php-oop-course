<?php

class User {
    public static function findAllUsers() {
        return self::findThisQuery("SELECT * FROM users");
    }


    public static function findUserById($id) {
        global $database;

        $result = self::findThisQuery("SELECT * FROM users WHERE id={$id} LIMIT 1");

        $foundUser = mysqli_fetch_array($result);

        return $foundUser;
    }


    public static function findThisQuery($sql) {
        global $database;

        $resultSet = $database->query($sql);

        return $resultSet;
    }
}