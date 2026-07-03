<?php

class Db_object {
    protected static $db_table = "users";




    public static function findAll() {
        return static::findThisQuery("SELECT * FROM " . static::$db_table . " ");
    }





    public static function findById($id) {
        global $database;

        $resultArray = static::findThisQuery("SELECT * FROM " . static::$db_table . " WHERE id={$id} LIMIT 1");

        return !empty($resultArray) ? array_shift($resultArray) : false;
    }




    public static function findThisQuery($sql) {
        global $database;

        $resultSet = $database->query($sql);

        $theObjectArray = array();

        while($row = mysqli_fetch_array($resultSet)) {
            $theObjectArray[] = static::instantiation($row);
        }

        return $theObjectArray;
    }




    public static function instantiation($record) {
        $calling_class = get_called_class();
        
        $object = new $calling_class;

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
} // End of Db_object class