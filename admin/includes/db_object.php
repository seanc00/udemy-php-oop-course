<?php

class Db_object {
    public $uploadErrors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML f...",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload.",
    );



    
    protected static $db_table = "users";




    public static function findAll() {
        return static::findByQuery("SELECT * FROM " . static::$db_table . " ");
    }





    public static function findById($id) {
        global $database;

        $resultArray = static::findByQuery("SELECT * FROM " . static::$db_table . " WHERE id={$id} LIMIT 1");

        return !empty($resultArray) ? array_shift($resultArray) : false;
    }




    public static function findByQuery($sql) {
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




    protected function properties() {
        $properties = array();

        foreach (static::$db_table_fields as $key => $db_field) {
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

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
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

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", " , $properties_pairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }




    public function delete() {
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " WHERE id=" . $database->escape_string($this->id) . " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
} // End of Db_object class