<?php
/**
 * WordPress QueueIT Library - Bot
 * 
 * @author   Ryan Bayne
 * @category Automation
 * @package  WordPress QueueIT
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( !class_exists( 'QueueIT_Bot' ) ) : 

/**
 * QueueIT_Bot Class.
 */
class QueueIT_Bot {
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