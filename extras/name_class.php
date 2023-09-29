<?php
    include_once("../database/connection.php");
class Name
{
    public $name;
    public function showName()
    {
        
        /**
        Put your database code here to extract from database.
        **/
        return($this->name);
    }
    public function enterName($TName)
    {
        $this->name = $TName;
        /**
        Put your database code here.
        **/
    }
}
?>