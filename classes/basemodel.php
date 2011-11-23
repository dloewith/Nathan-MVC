<?php
/* 
 * Project: Nathan MVC
 * File: /classes/basemodel.php
 * Purpose: abstract class from which models extend.
 * Author: Nathan Davison
 */

abstract class BaseModel {
    
    protected $viewModel;
    
    //create the base and utility objects available to all models on model creation
    public function __construct()
    {
        $this->viewModel = new ViewModel();
    }
}

?>
