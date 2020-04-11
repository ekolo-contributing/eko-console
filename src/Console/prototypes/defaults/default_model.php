<?php
	return 
	'namespace '.get_namespace('model').';

	use Ekolo\Framework\Bootstrap\Model;

	/**
	 * PagesModel
	 */
	class PagesModel extends Model
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->setTable(\'pages\');
		}
	}';