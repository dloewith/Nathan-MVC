<?php
/* 
 * Project: Nathan MVC
 * File: /controllers/error.php
 * Purpose: controller for the URL access errors of the app.
 * Author: Nathan Davison
 */

class Error extends BaseController
{    
    //bad URL request error
    protected function badURL()
    {
        $ErrorModel = new ErrorModel(); 
        $this->ReturnView($ErrorModel->badURL(), true);
    }
}

?>
