<?php

class VirtuemartexportceneoxmlTableConfig extends JTable {    
    /**
     * Czy eksport jest aktywny
     * @var integer $active 
     */
    public $active;
    
    
            
    
    function __construct(&$db) {
        parent::__construct('#__virtuemart_exportceneoxml', 'id', $db);
    }
    
}