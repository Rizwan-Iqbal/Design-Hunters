<?php
/**
 * Heading integration
 */


defined( 'ABSPATH' ) || die();

class WPML_RS_Heading extends \WPML_Elementor_Module_With_Items  {

	/**
	 * @return string
	 */
	public function get_items_field() {
		return 'rs-heading';
	}

	/**
	 * @return array
	 */
	public function get_fields() {
		return ['label'];
	}

	/**
	 * @param string $field
	 *
	 * @return string
	 */
	protected function get_title( $field ) {
		switch ( $field ) {
			case 'label':
				return __( 'Bar Chart: Label Text', 'happy-elementor-addons' );
			default:
				return '';
		}
	}

	/**
	 * @param string $field
	 *
	 * @return string
	 */
	protected function get_editor_type( $field ) {
		switch ( $field ) {
			case 'label':
				return 'LINE';
			default:
				return '';
		}
	}
}
