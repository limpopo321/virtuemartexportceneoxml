<?php
error_reporting(E_ALL &~ E_STRICT);
ini_set('display_errors', 1);

require_once JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart_exportceneoxml' . DS . 'tables' . DS . 'config.php';




class VirtuemartexportceneoxmlController extends JControllerLegacy {
    
    
    public function display($cachable = false, $urlparams = false) {   
        $view = $this->getView('', 'html');
        $view->display();
    }  
    
}