<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * BugNet for WordPress - Configuration
 *
 * Use this file to configure how BugNet will behave within the plugin
 * it is added to. 
 *
 * @author   Ryan Bayne
 * @category Core
 * @package  BugNet/Core
 * @since    1.0
 */
class BugNet_Configuration {
    
    // Constants for package (developer) control over main abilitie. 
    const BUGNET_EVENT_HANDLING = true;
    const BUGNET_LOG_HANDLING   = true;
    const BUGNET_TRACE_HANDLING = true;
    
    // Level constants. 
    const EMERGENCY = 'emergency'; // 'emergency': System is unusable.
    const ALERT     = 'alert';     // 'alert': Action must be taken immediately.
    const CRITICAL  = 'critical';  // 'critical': Critical conditions.
    const ERROR     = 'error';     // 'error': Error conditions.
    const WARNING   = 'warning';   // 'warning': Warning conditions.
    const NOTICE    = 'notice';    // 'notice': Normal but significant condition.

    // Next level of switches can be controlled by administrators. 
    public $is_events_enabled = false;
    public $is_logging_enabled = false;
    public $is_tracing_enabled = false;
    
    public function __construct() {
 
        // Set switches.
        $this->is_events_enabled = get_option( 'bugnet_events_switch', false );
        $this->is_logging_enabled = get_option( 'bugnet_logging_switch', false );
        $this->is_tracing_enabled = get_option( 'bugnet_tracing_switch', false );

    } 
    
    /**
     * Level strings mapped to integer severity.
     *
     * @var array
     */
    protected static $level_to_severity = array(
        self::EMERGENCY => 600,
        self::ALERT     => 500,
        self::CRITICAL  => 400,
        self::ERROR     => 300,
        self::WARNING   => 200,
        self::NOTICE    => 100,
    );

    /**
     * Severity integers mapped to level strings.
     *
     * This is the inverse of $level_severity.
     *
     * @var array
     */
    protected static $severity_to_level = array(
        600 => self::EMERGENCY,
        500 => self::ALERT,
        400 => self::CRITICAL,
        300 => self::ERROR,
        200 => self::WARNING,
        100 => self::NOTICE,
    );


    /**
     * Validate a level string.
     *
     * @param string $level
     * @return bool True if $level is a valid level.
     */
    public static function is_valid_level( $level ) {
        return array_key_exists( strtolower( $level ), self::$level_to_severity );
    }
    
    /**
    * Determines if a level is an active part of the BugNet installation. 
    * 
    * @param mixed $level
    */
    public static function is_active_level( $level ) {
        $level_switch = get_option( 'wpseed_bugnet_levelswitch_' . $level );
        if( $level_switch == 'yes' ) {
            return true;
        }
        return false;
    } 

    /**
     * Translate level string to integer.
     *
     * @param string $level emergency|alert|critical|error|warning|notice|info|debug
     * @return int 100 (debug) - 800 (emergency) or 0 if not recognized
     */
    public static function get_level_severity( $level ) {
        if ( self::is_valid_level( $level ) ) {
            $severity = self::$level_to_severity[ strtolower( $level ) ];
        } else {
            $severity = 0;
        }
        return $severity;
    }

    /**
     * Translate severity integer to level string.
     *
     * @param int $severity
     * @return bool|string False if not recognized. Otherwise string representation of level.
     */
    public static function get_severity_level( $severity ) {
        if ( array_key_exists( $severity, self::$severity_to_level ) ) {
            return self::$severity_to_level[ $severity ];
        } else {
            return false;
        }
    }  
}