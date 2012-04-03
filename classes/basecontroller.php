<?php
/* 
 * Project: Nathan MVC
 * File: /classes/basecontroller.php
 * Purpose: abstract class from which controllers extend
 * Author: Nathan Davison
 */

abstract class BaseController {
    
    protected $urlValues;
    protected $action;
    
    public function __construct($action, $urlValues) {
        $this->action = $action;
        $this->urlValues = $urlValues;
    }
        
    //executes the requested method
    public function executeAction() {
        return $this->{$this->action}();
    }
    
    //returns the view location
    protected function getViewLoc() {
        $controllerName = str_replace("Controller", "", get_class($this));
        return "views/" . $controllerName . "/" . $this->action . ".php";
    }
        
    //this binds the model data to the controller's view. 2nd argument is the main template to be used - set as boolean false when calling this method to avoid using any template.
    protected function returnView($viewModel, $template = "maintemplate") {
        
        //generate the location of this method's view
        $viewLoc = $this->getViewLoc();
        $templateLoc = "views/".$template.".php";
        
        if (file_exists($viewLoc)) {
            if (array_key_exists("ajax", $this->urlValues)) {
                //AJAX mode in URL so skip the template regardless of whether $template is true
                require($viewLoc);
            } else {
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
            }
        } else {
            require("views/error/badview.php");
        }
    }
}

?>
