<?php
/**
 * Plugin Name: Gravity Forms - Shortcode Column
 * Description: Adds a column to the table of forms that displays the forms' shortcodes for easy access.
 * Version: 1.0
 * Author: James Pfleiderer
 * Author URI: https://jpfleiderer.com
 */

class GravityFormsShortcodeColumn {

	public function __construct() {
		add_filter( 'gform_form_list_columns', array($this,'add_column_shortcode') );
		add_action( 'gform_form_list_column_shortcode', array($this,'display_column_shortcode') );

	}

	public function add_column_shortcode($columns){
		$columns['shortcode'] = esc_html__( 'Shortcode', 'gravityforms' );
		return $columns;
	}

	public function display_column_shortcode( $item ){
		echo "<input readonly value='[gravityform id=\"" . $item->id . "\" title=\"false\" description=\"false\"]' onclick='this.select();' style='font-family:monospace'>";

	}

}
$GravityFormsShortcodeColumn = new GravityFormsShortcodeColumn();
