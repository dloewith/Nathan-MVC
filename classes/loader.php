<?php
/* 
 * Project: Nathan MVC
 * File: /classes/loader.php
 * Purpose: class which maps URL requests to controller object creation
 * Author: Nathan Davison
 */

class Loader
{
    private $controller;
    private $action;
    private $urlValues;
    
    //store the URL request values on object creation
    public function __construct($urlValues)
    {
        $this->urlValues = $urlValues;
        
        if ($this->urlValues['controller'] == "")
        {
            $this->controller = "home";
        } else {
            $this->controller = $this->urlValues['controller'];
        }
        
        if ($this->urlValues['action'] == "")
        {
            $this->action = "index";
        } else {
            $this->action = $this->urlValues['action'];
        }
    }
                  
    //factory method which establishes the requested controller as an object
    public function createController()
    {
        //check our requested controller's class file exists and require it if so
        if (file_exists("controllers/" . $this->controller . ".php")) {
            require("controllers/" . $this->controller . ".php");
        } else {
            require("controllers/error.php");
            return new error("badurl",$this->urlValues);
        }
                
        //does the class exist?
        if (class_exists($this->controller))
        {
            $parents = class_parents($this->controller);
            
            //does the class inherit from the BaseController class?
            if (in_array("BaseController",$parents))
            {   
                //does the requested class contain the requested action as a method?
                if (method_exists($this->controller,$this->action))
                {
                    return new $this->controller($this->action,$this->urlValues);
                } else {
                    //bad action/method error
                    require("controllers/error.php");
                    return new error("badurl",$this->urlValues);
                }
            } else {
                //bad controller error
                require("controllers/error.php");
                return new error("badurl",$this->urlValues);
            }
        } else {
            //bad controller error
            require("controllers/error.php");
            return new error("badurl",$this->urlValues);
        }
    }
}

?>
