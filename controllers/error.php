<?php
/* 
 * Project: Nathan MVC
 * File: /controllers/error.php
 * Purpose: controller for the URL access errors of the app.
 * Author: Nathan Davison
 */

class ErrorController extends BaseController
{    
    //bad URL request error
    protected function badURL()
    {
        require("models/error.php");
        $ErrorModel = new ErrorModel(); 
        $this->ReturnView($ErrorModel->badURL());
    }
}

?>
