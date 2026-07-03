<?php

class User {
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
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


    protected function properties() {
        $properties = array();

        foreach (self::$db_table_fields as $key => $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }


    protected function clean_properties() {
        global $database;

        $cleanProperties = array();

        foreach ($this->properties() as $key => $value) {
            $cleanProperties[] = $database->escape_string($value);
        }

        return $cleanProperties;
    }


    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }


    // Create Method Query
    public function create() {
        global $database;

        $properties = $this->properties();

        $sql = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";

        if($database->query($sql)) {
            $this ->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
    }


    public function update() {
        global $database;

        $properties = $this->properties();

        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . self::$db_table . " SET ";
        $sql .= implode(", " , $properties_pairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function deleteUser() {
        global $database;

        $sql = "DELETE FROM " . self::$db_table . " WHERE id=" . $database->escape_string($this->id) . " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
}