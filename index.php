<?php
/* 
 * Project: Nathan MVC
 * File: index.php
 * Purpose: landing page which handles all requests
 * Author: Nathan Davison
 */

//load the bare minimal required classes
require("classes/basecontroller.php");  
require("classes/basemodel.php");
require("classes/loader.php");

$loader = new Loader($_GET); //create the loader object and pass in all URL values
$controller = $loader->createController(); //creates the requested controller object based on the 'controller' URL value
$controller->executeAction(); //execute the requested controller's requested method based on the 'method' URL value. Controller methods output a View.

?>