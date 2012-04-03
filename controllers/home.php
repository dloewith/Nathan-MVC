<?php
/* 
 * Project: Nathan MVC
 * File: /controllers/home.php
 * Purpose: controller for the home of the app.
 * Author: Nathan Davison
 */

class HomeController extends BaseController
{
    //default method
    protected function index()
    {
        require("models/home.php");
        $HomeModel = new HomeModel(); 
        $this->returnView($HomeModel->index());
    }
}

?>
