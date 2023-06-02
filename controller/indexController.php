<?php

class IndexController extends BaseController
{
	public function index()
	{
		// Samo preusmjeri na users podstranicu.
		header( 'Location: index.php?rt=mycrew' );
	}
};
?>