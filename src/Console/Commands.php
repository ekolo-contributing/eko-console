<?php
	/**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */

	namespace Ekolo\Component\Console;
	
	use Ekolo\Component\EkoMagic\ParameterBag;

	/**
	 * Permet de gérer les commandes
	 */
	class Commands extends ParameterBag
	{
		public function __construct()
		{
			parent::__construct([
				'make:controller' => [

				],
				'make:middleware' => [

				],
				'make:model' => [

				],
				'--help' => [

				],
				'server' => [

				],
				'new' => [
					'description' => 'Permet de créer un nouveau projet Ekolo Framework',
					'init' => 'init'
				]
			]);
		}

	}
