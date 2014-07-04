<?php

class VirtuemartexportceneoxmlTools {
    
    public static function xmlEncodeAttribute($string){
        $search = array(
            '&',
            '<',
            '"', 
            '\'',
            '>' 
        );
        
        $replace = array(
            '&amp;',
            '&lt;',
            '&quot;',
            '&apos;',
            '&gt;'            
        );        
        
        $sanitized = str_replace($search, $replace, $string);
        return $sanitized;
    }
}