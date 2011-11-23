<?php
/* 
 * Project: Nathan MVC
 * File: /classes/viewmodel.php
 * Purpose: class for the optional data object returned by model methods which the controller sends to the view.
 * Author: Nathan Davison
 */

class ViewModel
{    
    //dynamically adds a property
    public function add($name,$val)
    {
        $this->$name = $val;
    }
}

?>