<?php
/* 
 * Project: Nathan MVC
 * File: /classes/basecontroller.php
 * Purpose: abstract class from which controllers extend
 * Author: Nathan Davison
 */

abstract class BaseController
{
    protected $urlValues;
    protected $action;
    
    public function __construct($action, $urlvalues)
    {
        $this->action = $action;
        $this->urlValues = $urlValues;
    }
        
    //executes the requested method
    public function executeAction()
    {
        return $this->{$this->action}();
    }
        
    //binds the provided data to the controller's view. 2nd argument determines whether to use the main template or not. E.g. a method designed for AJAX requests would not use it.
    protected function returnView($viewModel, $fullView)
    {
        //generate the location of this method's view
        $viewLoc = 'views/' .  get_class($this) . '/' . $this->action . '.php';
        
        if ($fullView)
        {
            //include the full template
            require('views/maintemplate.php');
            
        } else {
            //we're not using the full template view so just output the method's view
            require($viewLoc);
        }
    }
}

?>
