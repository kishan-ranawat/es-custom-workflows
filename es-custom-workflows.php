<?php
/**
 * Plugin Name: Custom workfows for Email Subscribers plugin
 * Description: This plugin adds custom workflow triggers for Email Subscribers Plugin
 * Text Domain: es-custom-workflows
 * Version: 1.0.0
*/
	 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Register ES triggers.
add_filter( 'ig_es_workflow_triggers', 'escw_register_custom_workflow_triggers' );

if ( ! function_exists( 'escw_register_custom_workflow_triggers' ) ) {
	
	function escw_register_custom_workflow_triggers( $triggers ) {

		include_once 'my-custom-es-workflow-trigger.php';

		// Add the trigger to the existing $triggers array
		// Set a unique trigger name for the trigger and then the class name
		$triggers['my_custom_es_workflow_trigger'] = 'My_Custom_ES_Workflow_Trigger';

		return $triggers;
	}
}

//add_action( 'admin_head', 'escw_trigger_custom_event' );

if ( ! function_exists( 'escw_trigger_custom_event' ) ) {
	/**
	 * Sample function to trigger custom trigger event
	 *
	 * @return void
	 */
	function escw_trigger_custom_event() {

		$user_data = array(
			'email'      => 'kishan.ranawat+123@icegram.com',
			'first_name' => 'Kishan',
			'last_name'  => 'Ranawat',
		);

		do_action( 'my_custom_workfow_trigger_event', $user_data );
	}
}
