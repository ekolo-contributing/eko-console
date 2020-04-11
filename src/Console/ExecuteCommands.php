<?php
	/**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */

	namespace Ekolo\Component\Console;
	
	use Ekolo\Component\EkoMagic\ParameterBag;

	/**
	 * Permet d'exécuter les commandes
	 */
	class ExecuteCommands extends ParameterBag
	{
        /**
         * Les argvs qu'a saisi l'utilisateur
         * @var array
         */
        protected $argv = [];

        /**
         * Le constructeur de la classe
         * @param array $command La commande à exécuter
         * @return void
         */
		public function __construct(array $command, array $argv)
		{
            $this->argv = $argv;
            parent::__construct($command);
            $this->bootstrap();
        }
        
        /**
         * Permet de lancer l'option d'une commande
         * @param string $option
         * @param array $parameters Les paramètres de cette option
         * @return void
         */
        public function run(string $option, array $parameters = [])
        {
            if (is_callable([$this, $option])) {
                $this->$option($parameters);
            }else {
                \console_log("La commande $option ne plus fonctionnel pour l'instant");
            }
        }

        /**
         * Permet de bootstraper la commande
         * @return void
         */
        public function bootstrap()
        {
            $argv = $this->argv;

            if (!empty($argv)) {
                array_shift($argv);
                $cmd = array_shift($argv);

                if (count($argv) > 0) {
                    if ($cmd === 'new') {
                        $option = 'newProject';
                    }else {
                        $option = array_shift($argv);
                    }

                    $this->run($option, $argv);
                }else {
                    $init = $this->get('init');
                    $this->$init();
                }
            }else {
                \console_log("Commande invalide");
            }
        }

        /**
		 * Affiche le help de la commande
		 */
		public function help()
		{
			if ($this->has('description')) {
				\console_log($this->get('description'), true);
			}

			\console_log("Pas de help pour cette commande");
        }
        
        /**
         * Renvoi le dir courant
         */
        public function currentDir()
        {
            return \shell_exec('cd');
        }
	}
