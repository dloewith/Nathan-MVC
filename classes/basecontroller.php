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
    
    public function __construct($action, $urlvalues) {
        $this->action = $action;
        $this->urlValues = $urlValues;
    }
        
    //executes the requested method
    public function executeAction() {
        return $this->{$this->action}();
    }
        
    //this binds the model data to the controller's view. 2nd argument is the main template to be used - set as boolean false when calling this method to avoid using any template.
    protected function returnView($viewModel, $template = "maintemplate") {
        
        //generate the location of this method's view
        $viewLoc = "views/" .  get_class($this) . "/" . $this->action . ".php";
        $templateLoc = "views/".$template.".php";
        
        if (file_exists($viewLoc)) {
            if ($template) {
                //include the full template
                if (file_exists($templateLoc)) {
                    require("views/".$template.".php");
                } else {
                    require("views/error/badtemplate.php");
                }
            } else {
                //we're not using a template view so just output the method's view directly
                require($viewLoc);
            }
        } else {
            require("views/error/badview.php");
        }
    }
}

?>
