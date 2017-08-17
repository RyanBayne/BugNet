<?php
/**
 * WPSeed Sections Settings
 *
 * @author   Ryan Bayne
 * @category Admin
 * @package  WPSeed/Admin
 * @version  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

if ( ! class_exists( 'WPSeed_Settings_Sections' ) ) :

/**
 * WPSeed_Settings_Sections.
 */
class WPSeed_Settings_Sections extends WPSeed_Settings_Page {

    /**
     * Constructor.
     */
    public function __construct() {

        $this->id    = 'sections';
        $this->label = __( 'Sections Example', 'wpseed' );

        add_filter( 'wpseed_settings_tabs_array', array( $this, 'add_settings_page' ), 20 );
        add_action( 'wpseed_settings_' . $this->id, array( $this, 'output' ) );
        add_action( 'wpseed_settings_save_' . $this->id, array( $this, 'save' ) );
        add_action( 'wpseed_sections_' . $this->id, array( $this, 'output_sections' ) );
    }

    /**
     * Get sections.
     *
     * @return array
     */
    public function get_sections() {

        $sections = array(
            ''              => __( 'Section A', 'wpseed' ),
            'sectionb'       => __( 'Section B', 'wpseed' ),
            'bugnet'       => __( 'BugNet', 'wpseed' ),
        );

        return apply_filters( 'wpseed_get_sections_' . $this->id, $sections );
    }

    /**
     * Output the settings.
     */
    public function output() {
        global $current_section;

        $settings = $this->get_settings( $current_section );

        WPSeed_Admin_Settings::output_fields( $settings );
    }

    /**
     * Save settings.
     */
    public function save() {
        global $current_section;

        $settings = $this->get_settings( $current_section );
        WPSeed_Admin_Settings::save_fields( $settings );
    }

    /**
     * Get settings array.
     *
     * @return array
     */
    public function get_settings( $current_section = '' ) {
        if ( 'sectionb' == $current_section ) {

            $settings = apply_filters( 'wpseed_sectionb_settings', array(
            
                array(
                    'title' => __( 'Title and Introduction Example', 'wpseed' ),
                    'type'     => 'title',
                    'desc'     => __( 'This is the example of an introduction which is part of the titles data.', 'wpseed' ),
                    'id'     => 'image_options'
                ),

                array(
                    'title'         => __( 'Example Checkbox', 'wpseed' ),
                    'desc'          => __( 'Example input descripton.', 'wpseed' ),
                    'id'            => 'wpseed_enable_examplecheckbox2',
                    'default'       => 'yes',
                    'desc_tip'      => __( 'This is an example of a tip.', 'wpseed' ),
                    'type'          => 'checkbox'
                ),

                array(
                    'type'     => 'sectionend',
                    'id'     => 'image_options'
                )

            ));
        } elseif( 'bugnet' == $current_section ) {
            $settings = apply_filters( 'wpseed_bugnet_settings', array(
 
                array(
                    'title' => __( 'BugNet Controls', 'wpseed' ),
                    'type'     => 'title',
                    'desc'     => '',
                    'id'     => 'wpseed_bugnet_main_service_switches',
                ),

                // MAIN SERVICE SWITCHES
                array(
                    'title'           => __( 'Main Service Switches', 'wpseed' ),
                    'desc'            => __( 'Activate BugNet', 'wpseed' ),
                    'id'              => 'wpseed_activate_bugnet',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'start',
                    'show_if_checked' => 'option',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Activate Events Service', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_activate_events',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Activate Logging Service', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_activate_log',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Activate Tracing Service ', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_activate_tracing',
                    'default'         => 'no',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'end',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'type' => 'sectionend',
                    'id'   => 'wpseed_bugnet_main_service_switches'
                ),

                // LEVEL SWITCHES
                array(
                    'title' => __( 'Level Switches', 'wpseed' ),
                    'type'     => 'title',
                    'desc'     => __( 'You can disable entire levels of debugging to reduce BugNet activity.', 'wpseed' ),
                    'id'     => 'wpseed_bugnet_level_switches',
                ),

                array(
                    'title'           => __( 'Activate/Disable Levels', 'wpseed' ),
                    'desc'            => __( 'Emergency Level Events', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_levelswitch_emergency',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'start',
                    'show_if_checked' => 'option',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Serious Alerts', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_levelswitch_alerts',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Critical Faults', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_levelswitch_critical',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Errors', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_levelswitch_errors',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Important Warnings', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_levelswitch_warnings',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Helpful Notices', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_levelswitch_notices',
                    'default'         => 'no',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'end',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'type' => 'sectionend',
                    'id'   => 'wpseed_bugnet_level_switches'
                ),
                
                // HANDLER SWITCHES
                array(
                    'title' => __( 'Handler Switches', 'wpseed' ),
                    'type'     => 'title',
                    'desc'     => __( 'Handles are services used to collect and store debugging data. It also includes emails and does not include reports.', 'wpseed' ),
                    'id'     => 'wpseed_bugnet_handler_switches',
                ),

                array(
                    'title'           => __( 'Activate/Disable Handlers', 'wpseed' ),
                    'desc'            => __( 'Emails', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_handlerswitch_email',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'start',
                    'show_if_checked' => 'option',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Log Files', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_handlerswitch_logfiles',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'REST API', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_handlerswitch_restapi',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Tracing', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_handlerswitch_tracing',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Database', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_handlerswitch_wpdb',
                    'default'         => 'no',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'end',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'type' => 'sectionend',
                    'id'   => 'wpseed_bugnet_handler_switches'
                ),
                
                // REPORT SWITCHES
                array(
                    'title' => __( 'Report Switches', 'wpseed' ),
                    'type'     => 'title',
                    'desc'     => __( 'Reports generate information and statistics for none developers. Reports can also create documents.', 'wpseed' ),
                    'id'     => 'wpseed_bugnet_report_switches',
                ),

                array(
                    'title'           => __( 'Activate/Disable Reports', 'wpseed' ),
                    'desc'            => __( 'Daily Summary', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_reportsswitch_dailysummary',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'start',
                    'show_if_checked' => 'option',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Event Snapshot', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_reportsswitch_eventsnapshot',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'desc'            => __( 'Trace Complete', 'wpseed' ),
                    'id'              => 'wpseed_bugnet_reportsswitch_tracecomplete',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'end',
                    'show_if_checked' => 'yes',
                    'autoload'        => true,
                ),

                array(
                    'type' => 'sectionend',
                    'id'   => 'wpseed_bugnet_report_switches'
                ),
                                
            ));
                
        } else {
            $settings = apply_filters( 'wpseed_checkboxesexamples_general_settings', array(
 
                array(
                    'title' => __( 'Checkboxes Examples', 'wpseed' ),
                    'type'     => 'title',
                    'desc'     => '',
                    'id'     => 'checkboxes_example_options',
                ),

                array(
                    'title'           => __( 'Checkbox Group', 'wpseed' ),
                    'desc'            => __( 'Checkbox group with start and end parameters in use.', 'wpseed' ),
                    'id'              => 'wpseed_checkbox_example_start',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'start',
                    'show_if_checked' => 'option',
                ),

                array(
                    'desc'            => __( 'Middle Checkbox', 'wpseed' ),
                    'id'              => 'wpseed_checkbox_example_middle',
                    'default'         => 'yes',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => '',
                    'show_if_checked' => 'yes',
                    'autoload'        => false,
                ),

                array(
                    'desc'            => __( 'End Checkbox"', 'wpseed' ),
                    'id'              => 'wpseed_checkbox_example_end',
                    'default'         => 'no',
                    'type'            => 'checkbox',
                    'checkboxgroup'   => 'end',
                    'show_if_checked' => 'yes',
                    'autoload'        => false,
                ),

                array(
                    'type'     => 'sectionend',
                    'id'     => 'checkboxes_example_options'
                ),

            ));
        }

        return apply_filters( 'wpseed_get_settings_' . $this->id, $settings, $current_section );
    }
}

endif;

return new WPSeed_Settings_Sections();
