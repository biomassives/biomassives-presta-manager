<?php
/*
www.prestarocket.com
Twitter : @prestarocket
*/
if ( !defined( '_PS_VERSION_' ) )
	exit;
class MyModule extends Module
{
	public function __construct()
	{
		$this->name = 'mymodule';
		$this->tab = 'Test';
		$this->version = 1.0;
		$this->author = 'Firstname Lastname';
		$this->need_instance = 0;
		parent::__construct();
		$this->displayName = $this->l( 'My module' );
		$this->description = $this->l( 'Description of my module.' );
		$this->confirmUninstall = $this->l('Are you sure you want to delete mymodule ?');
	}
	public function install()
	{
		if (!parent::install() OR !$this->registerHook('leftColumn'))
			return false;
		return true;
	}
	public function uninstall()
	{
		if (!parent::uninstall())
			return false;
		return true;
	}
	public function hookLeftColumn( $params )
	{
		global $smarty;
		return $this->display( __FILE__, 'mymodule.tpl' );
	}
	public function getContent()
	{
		$output = '<h2>'.$this->displayName.'</h2>';
		return $output.$this->displayForm();
	}
	private function displayForm()
	{
		return '
			<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post">
			<fieldset>
			<center><input type="submit" name="submitMymoule" value="'.$this->l('Save').'" class="button" /></center>
			</fieldset>
			</form>';
	}
}
?>
