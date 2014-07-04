<?php

jimport('joomla.application.component.view');
require_once JPATH_COMPONENT . DS . 'tables' . DS . 'config.php';

class VirtuemartexportceneoxmlViewVirtuemartexportceneoxml extends JView {

    public function display($tpl = null) {
        $tblConfig = VirtuemartexportceneoxmlTableConfig::getInstance('Config', 'VirtuemartexportceneoxmlTable');
        $tblConfig->load(1);
        $app = JFactory::getApplication();
        
        $task       = JRequest::getString('task');
        $formData   = JRequest::getVar('jform', null, 'POST');
        
        if($task == 'save' && is_array($formData) && !empty($formData)){
            $tblConfig->active = isset($formData['active']) ? 1 : 0;
            $tblConfig->store();
            $app = $app->redirect(JUri::base(false) . '/?option=com_virtuemart_exportceneoxml', 'Zaktualizowano dane');            
        }elseif($task == 'cancel'){
            $app->redirect(JUri::base(false));  
        }     
        
        
        
        $this->assign('config', $tblConfig);
        $this->addToolbar();
        parent::display($tpl);
    }

    /**
     * Add the page title and toolbar.
     *
     * @since	1.6
     */
    protected function addToolbar() {
        JToolBarHelper::apply('save');     
        JToolBarHelper::cancel('cancel', 'JTOOLBAR_CLOSE');
        JToolBarHelper::divider();
          
    }  

}