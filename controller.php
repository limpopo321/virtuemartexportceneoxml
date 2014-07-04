<?php
error_reporting(E_ALL &~ E_STRICT);
ini_set('display_errors', 1);

require_once JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart_exportceneoxml' . DS . 'tables' . DS . 'config.php';
require_once JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart_exportceneoxml' . DS . 'helpers' . DS . 'productprovider.php';
require_once JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart_exportceneoxml' . DS . 'helpers' . DS . 'tools.php';
require_once JPATH_VM_ADMINISTRATOR . DS . 'models' . DS . 'product.php';


class VirtuemartexportceneoxmlController extends JControllerLegacy {
    
    
    public function display($cachable = false, $urlparams = false) {
        
        $tblConfig  = VirtuemartexportceneoxmlTableConfig::getInstance('Config', 'VirtuemartexportceneoxmlTable');        
        $result     = $tblConfig->load(array(            
            'active'    => 1
        ));
        
        
        if(!$result){
            exit('Usluga nieaktywna');
        }
     
        $limitStart = 0;
        $limit      = 1;        
        $provider   = new VirtuemartexportxmlProductProvider($limitStart, $limit);       

        
        header('Content-type: application/xml; charset="utf-8"');
        echo '<?xml version="1.0" encoding="utf-8"?>';        
        echo '<offers xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1">';
        echo '<group name="other">';
        
        while($products = $provider->getNextSet()){
            foreach($products as $product){                
                $id     = $product->virtuemart_product_id;    
                $url    = JURI::base(false) . str_replace('&', '&amp;', $product->link);
                $price  = $product->prices['salesPrice'];
                $avail  = 1;
                $set    = 0;
                $weight = $product->product_weight ? $product->product_weight : 0; 
                $cat    = $product->category_name;
                $name   = $product->product_name;
                $desc   = $product->product_s_desc;
                
                if(is_array($product->images) && !empty($product->images)){
                    $imgs   = '<imgs>';
                    $imgs   .= '<main url="' . VirtuemartexportceneoxmlTools::xmlEncodeAttribute(JUri::base(false) . $product->images[0]->file_url) . '" />';    
                    $imgs   .= '</imgs>';
                }else{
                    $imgs = '';
                }                

                echo '<o id="' . $id . '" url="' . $url . '" price="' . $price . '">';   
                echo '<cat><![CDATA[' . $cat . ']]></cat>';
                echo '<name><![CDATA[' . $name . ']]></name>';
                echo '<desc><![CDATA[' . $desc . ']]></desc>';
                echo $imgs;
                echo '</o>';
            }     
        }
        
        echo '</group>';
        echo '</offers>';        
        exit;
    }  
    
}