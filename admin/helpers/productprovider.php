<?php

require_once JPATH_VM_ADMINISTRATOR . DS . 'models' . DS . 'product.php';

class VirtuemartexportxmlProductProvider {
    
    private $limitStart;
    private $limit;
    private $model;
    
    
    public function getNextSet(){   
        $db = JFactory::getDbo();        
        $query = " 
            SELECT 
                p.`virtuemart_product_id` 
            FROM        `#__virtuemart_products` p
            LEFT JOIN   `#__virtuemart_product_shoppergroups` psg ON p.`virtuemart_product_id` = psg.`virtuemart_product_id`
            WHERE 
                p.published = '1' 
            AND
              (psg.`virtuemart_shoppergroup_id` IS NULL OR psg.`virtuemart_shoppergroup_id` = '1') /* Do wszystkich grup cenowych lub do grupy niezalogowanej)*/
        ";        
        $db->setQuery($query, $this->limitStart, $this->limit); 
        $ids = $db->loadResultArray();

        
        if(!is_array($ids) || empty($ids)){
            return false;
        }  
        $products = $this->model->getProducts($ids);        
        $this->model->addImages($products, 1);
        
        $this->limitStart = $this->limitStart + $this->limit;        
        return $products;        
    }
    

    public function __construct($limitStart=0, $limit=20) {
        $this->limitStart           = $limitStart;
        $this->limit                = $limit;            
        $this->model                = new VirtueMartModelProduct(); 
          
        
    }
}