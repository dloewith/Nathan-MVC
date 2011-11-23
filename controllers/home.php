<?php
/* 
 * Project: Nathan MVC
 * File: /controllers/home.php
 * Purpose: controller for the home of the app.
 * Author: Nathan Davison
 */

class Home extends BaseController
{
    //default method
    protected function index()
    {
        $HomeModel = new HomeModel(); 
        $this->ReturnView($HomeModel->index(), true);
    }
}

?>
