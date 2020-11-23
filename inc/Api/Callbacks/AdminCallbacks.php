<?php 
/**
 * @package  StanislavPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function storePage()
	{
		return require_once( "$this->plugin_path/templates/storePage.php" );
	}

	public function addProduct()
	{
		return require_once( "$this->plugin_path/templates/addProduct.php" );
	}

	public function massPromo()
	{
		return require_once( "$this->plugin_path/templates/massPromo.php" );
	}


	public function optionsGroup( $input )
	{
		return $input;
	}

	public function adminSection()
	{
		//
	}

	public function textExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );
		echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Title">';
	}

	public function firstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Price">';
	}
}