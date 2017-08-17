<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * BugNet for WordPress - Log files Handler
 * 
 * Use for generating custom log files other than WordPress core debug.txt
 * and server PHP log file.
 *
 * Traces are output to their own individual folders.
 * Daily log files are generated for standard PHP errors.          
 *
 * @author   Ryan Bayne
 * @category Handler
 * @package  BugNet/Handler
 * @since    1.0
 */
class BugNet_Handler_LogFiles {

    public function __construct() {
        # TODO: Add action to cleanup daily log files once wp_footer loaded.     
    }
    
    public function create_trace_log( $tag ) {
        # TODO: call create_logfile() and name it using the trace tag.         
    } 
    
    public function cleanup() {
        # TODO: Delete some daily log files.    
    }   
    
    public function is_daily_logfile_on() {
        # TODO: Has separate daily log been activated.         
    }
    
    public function is_daily_logfile_present() {
        # TODO: Check if the daily logfile is present or not.         
    }
    
    public function create_logfile() {
        # TODO: Create a .txt file     
    }   
}