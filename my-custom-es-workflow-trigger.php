<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class My_Custom_ES_Workflow_Trigger
 */
class My_Custom_ES_Workflow_Trigger extends ES_Workflow_Trigger {

	/**
	 * Declares data items available in trigger.
	 *
	 * @var array
	 */
	public $supplied_data_items = array( 'subscriber' );

	/**
	 * Load trigger admin details.
	 */
	public function load_admin_details() {
		$this->title       = __( 'My custom workflow trigger', 'es-custom-workflows' );
		$this->description = __( 'This is my custom workfow trigger.', 'es-custom-workflows' );
		$this->group       = __( 'Custom', 'es-custom-workflows' );
	}

	/**
	 * Register trigger's hooks.
	 */
	public function register_hooks() {
		// Add action for custom trigger event
		add_action( 'my_custom_workfow_trigger_event', array( $this, 'handle_trigger_event' ) );
	}

	/**
	 * Handle custom trigger event.
	 *
	 * @param array $user_data
	 */
	public function handle_trigger_event( $user_data = array() ) {

		$email      = ! empty( $user_data['email'] ) && is_email( $user_data['email'] ) ? $user_data['email'] : '';
		$first_name = ! empty( $user_data['first_name'] ) ? $user_data['first_name']                          : '';
		$last_name  = ! empty( $user_data['last_name'] ) ? $user_data['last_name']                            : '';

		if ( ! empty( $email ) ) {
			$subscriber = array(
				'email'      => $email,
				'first_name' => $first_name,
				'last_name'  => $last_name,
			);
	
			// Prepare data.
			$data = array(
				'subscriber' => $subscriber,
			);
	
			$this->maybe_run( $data );
		}
	}

}
