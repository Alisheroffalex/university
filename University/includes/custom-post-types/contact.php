<?php
class Contacts
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Contacts', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h1>Contacts</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Contacts', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  

        add_settings_field(
            'short_title', // ID
            'Short Title', // Title 
            array( $this, 'short_title_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'address', 
            'Address', 
            array( $this, 'address_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );    
        
        add_settings_field(
            'phone', 
            'Phone', 
            array( $this, 'phone_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );    

        add_settings_field(
            'email', 
            'Email', 
            array( $this, 'email_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );    

        add_settings_field(
            'receive_email', 
            'Receiver Email', 
            array( $this, 'receive_email_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['short_title'] ) )
            $new_input['short_title'] = sanitize_text_field( $input['short_title'] );

        if( isset( $input['address'] ) )
            $new_input['address'] = sanitize_text_field( $input['address'] );

        if( isset( $input['phone'] ) )
            $new_input['phone'] = sanitize_text_field( $input['phone'] );

        if( isset( $input['email'] ) )
            $new_input['email'] = sanitize_text_field( $input['email'] );

        if( isset( $input['receive_email'] ) )
            $new_input['receive_email'] = sanitize_text_field( $input['receive_email'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function short_title_callback()
    {
        printf(
            '<input type="text" id="short_title"  class="regular-text code" name="my_option_name[short_title]" value="%s" />',
            isset( $this->options['short_title'] ) ? esc_attr( $this->options['short_title']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function address_callback()
    {
        printf(
            '<input type="text" id="address" class="regular-text code" name="my_option_name[address]" value="%s" />',
            isset( $this->options['address'] ) ? esc_attr( $this->options['address']) : ''
        );
    }

    public function phone_callback()
    {
        printf(
            '<input type="text" id="phone" class="regular-text code" name="my_option_name[phone]" value="%s" />',
            isset( $this->options['phone'] ) ? esc_attr( $this->options['phone']) : ''
        );
    }

    public function email_callback()
    {
        printf(
            '<input type="text" id="email" class="regular-text code" name="my_option_name[email]" value="%s" />',
            isset( $this->options['email'] ) ? esc_attr( $this->options['email']) : ''
        );
    }

    public function receive_email_callback()
    {
        printf(
            '<input type="text" id="receive_email" class="regular-text code" name="my_option_name[receive_email]" value="%s" />',
            isset( $this->options['receive_email'] ) ? esc_attr( $this->options['receive_email']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new Contacts();