<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
        
/**
 * BugNet for WordPress - Tracing Handler
 *
 * Use to store and track longterm traces. 
 *
 * @author   Ryan Bayne
 * @category Handlers
 * @package  BugNet/Handlers
 * @since    1.0
 */
class BugNet_Handler_Tracing {
    
    /**
    * Adds another entry to the trace. Stored in WP_Error() until 
    * end_trace() is called and then the trace is stored permanently.
    * 
    * @param mixed $tag
    * @param mixed $args
    * @param mixed $data
    * 
    * @version 1.0
    */
    public function do_trace( $tag, $args, $data ) {
        $WP_Error = new WP_Error();
        $WP_Error->add( $tag, $args['note'], $data );
        unset( $WP_Error );     
    }      
    
    /**
    * Calls do_trace() and then end() to force output now
    * rather than waiting until wp_footer is loaded. 
    * 
    * @param mixed $tag
    * @param mixed $args
    * @param mixed $data
    */
    public function end_trace( $tag, $args, $data ) {
        $this->do_trace( $tag, $args, $data );

        // Insert data to permament records, start with main trace file. 
        if( true === $args['maintracefile'])
        {
            // TODO: write trace to the main trace file
        }
        
        // Individual Trace File
        if( true === $args['newtracefile'] )
        {
            // TODO: write trace to a new file stored in traces folder.    
        }
        
        // Database Insert (BugNet custom table)
        if( true === $args['wpdb']) 
        {
            // TODO: insert to BugNet custom table.    
        }
        
        // Transient Cache
        if( true === 'cache' )
        {
            // TODO: create a transient 
        }             
    }   
        
    public function write_to_main_file() {
        
        // TODO: open the main file and write new line.     
    }
    
    public function write_to_daily_file() {
        
        // TODO: write to todays trace file. 
    }
    
    public function does_main_trace_file_exist() {
        
        // TODO: Check if todays file exists in Create wp-content/bugnet/tracing/main_trace.txt    
    }
    
    public function create_main_trace_file() {
        
        // Create wp-content/bugnet/tracing/main_trace.txt
            
    }
    
    public function create_daily_trace_files_directory() {
        
        // TODO: Create wp-content/bugnet/tracing/daily/
        
    }
    
    public function create_trace_files_directory() {
        
        // TODO: Create wp-content/bugnet/tracing/ 
    
    }
    
    public function delete_trace_files_directory() {
        
        // TODO: Delete wp-content/bugnet/tracing/
    }
    
    public function does_daily_trace_file_exist() {
        
        // TODO: Check if todays file exists in Create wp-content/bugnet/tracing/daily/
    }
    
    /**
    * Store the WP_Error object in a transient.
    * 
    * @param mixed $tag
    * @param mixed $data
    * @param mixed $life_seconds
    * 
    * @version 1.0
    */
    public function transient( $tag, $data, $life_seconds = 86400, $replace = true ) {
        
        // Get the data gathered in WP_Error object. 
        $WP_Error = new WP_Error();
        $tag_object = $WP_Error->get_error_data( $tag ); 
        
        // Establish a transient name.
        $name = 'bugnet_' . $tag; 
        if( false === $replace ) 
        {
            // Request asks to keep old transients. 
            $name = 'bugnet_' . $tag . '_' . time();        
        }
        else
        {
            // Request asks to overwrite existing trace.
            delete_transient( 'bugnet_' . $tag );    
        }
        
        set_transient( 'bugnet_' . $tag, $data, $life_seconds );   
    }
}