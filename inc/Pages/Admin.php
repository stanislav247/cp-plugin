<?php 
/**
 * @package  StanislavPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

/**
* 
*/
class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Settings' )->addSubPages( $this->subpages )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Stanislav Plugin', 
				'menu_title' => 'SP', 
				'capability' => 'manage_options', 
				'menu_slug' => 'stanislav_plugin', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-admin-site-alt2', 
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'stanislav_plugin', 
				'page_title' => 'Add Products', 
				'menu_title' => 'Add Products', 
				'capability' => 'manage_options', 
				'menu_slug' => 'add_product', 
				'callback' => array( $this->callbacks, 'addProduct' )
			),
			array(
				'parent_slug' => 'stanislav_plugin', 
				'page_title' => 'Store Page', 
				'menu_title' => 'Store Page', 
				'capability' => 'manage_options', 
				'menu_slug' => 'stanislav_store', 
				'callback' => array( $this->callbacks, 'storePage' )
			),
			array(
				'parent_slug' => 'stanislav_plugin', 
				'page_title' => 'Mass Promo', 
				'menu_title' => 'Mass Promo', 
				'capability' => 'manage_options', 
				'menu_slug' => 'stanislav_promo', 
				'callback' => array( $this->callbacks, 'massPromo' )
			),
		);
	}

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'stanislav_options_group',
				'option_name' => 'text_example',
				'callback' => array( $this->callbacks, 'optionsGroup' )
			),
			array(
				'option_group' => 'stanislav_options_group',
				'option_name' => 'first_name'
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'stanislav_admin_index',
				'title' => 'Add a product',
				'callback' => array( $this->callbacks, 'adminSection' ),
				'page' => 'stanislav_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Title',
				'callback' => array( $this->callbacks, 'textExample' ),
				'page' => 'stanislav_plugin',
				'section' => 'stanislav_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'Price',
				'callback' => array( $this->callbacks, 'firstName' ),
				'page' => 'stanislav_plugin',
				'section' => 'stanislav_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields( $args );
	}
}