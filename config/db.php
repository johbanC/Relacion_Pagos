<?php
 
class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'u845733158_desarrollo', '', 'u845733158_desarrollo');
        $db->query("SET NAMES 'uft8'");
        return $db;
    }
}

?>
