<?php
/**
 * WordPress QueueIT Library - Queue
 * 
 * The queue class is not a schedule. It is simple a stack of
 * delayed requests that need to be worked through when the time is right. 
 * 
 * @author   Ryan Bayne
 * @category Automation
 * @package  WordPress QueueIT
 * @since    1.0.0
 */
 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( !class_exists( 'QueueIT_Queue' ) ) : 

/**
 * QueueIT_Queue Class.
 */
class QueueIT_Queue {
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