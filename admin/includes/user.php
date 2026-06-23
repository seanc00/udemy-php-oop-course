<?php

class User {
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function findAllUsers() {
        return self::findThisQuery("SELECT * FROM users");
    }


    public static function findUserById($id) {
        global $database;

        $resultArray = self::findThisQuery("SELECT * FROM users WHERE id={$id} LIMIT 1");

        return !empty($resultArray) ? array_shift($resultArray) : false;
    }


    public static function findThisQuery($sql) {
        global $database;

        $resultSet = $database->query($sql);

        $theObjectArray = array();

        while($row = mysqli_fetch_array($resultSet)) {
            $theObjectArray[] = self::instantiation($row);
        }

        return $theObjectArray;
    }


    public static function verifyUser($username, $password) {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";

        $resultArray = self::findThisQuery($sql);

        return !empty($resultArray) ? array_shift($resultArray) : false;
    }


    public static function instantiation($record) {
        $object = new self;

        // $object->id = $found['id'];
        // $object->username = $found['username'];
        // $object->password = $found['password'];
        // $object->first_name = $found['first_name'];
        // $object->last_name = $found['last_name'];

        foreach ($record as $attribute => $value) {
            if($object->has_the_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }

        return $object;
    }


    private function has_the_attribute($attribute) {
        $objectProperties = get_object_vars($this);

        return array_key_exists($attribute, $objectProperties);
    }

    // Create Method Query
    public function create() {
        global $database;

        $sql = "INSERT INTO users (username, password, first_name, last_name)";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->username) . "', '";
        $sql .= $database->escape_string($this->password) . "', '";
        $sql .= $database->escape_string($this->first_name) . "', '";
        $sql .= $database->escape_string($this->last_name) . "')";

        if($database->query($sql)) {
            $this ->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
    }
}