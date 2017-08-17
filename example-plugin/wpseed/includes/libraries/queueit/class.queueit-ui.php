<?php
/**
 * WordPress QueueIT Library - User Interface
 * 
 * Methods to aid the creation of a UI in any plugin.
 * 
 * @author   Ryan Bayne
 * @category User Interface
 * @package  WordPress QueueIT
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( !class_exists( 'QueueIT_UI' ) ) : 

/**
 * QueueIT_UI Class.
 */
class QueueIT_UI {
    /**
     * Hook in methods.
     */
    public static function init() {
        self::constants();
        self::actions();
        self::filters();
    }
    
    private static function constants() {
    
    }    
    
    private static function actions() {
    
    }    
    
    private static function filters() {
    
    }

}

endif;