<?php 

class _404Controller extends BaseController
{
	public function index() 
	{
		$this->registry->template->title = 'Stranica nije pronađena.';

        $this->registry->template->show( '404_index' );
	}
}; 

?>
