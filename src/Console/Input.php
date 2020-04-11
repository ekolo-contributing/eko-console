<?php

    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */

    namespace Ekolo\Component\Console;
    
    use Ekolo\Component\Http\Request;
    use Ekolo\Component\Console\Argv;
    use Ekolo\Component\Console\Commands;

    class Input {

        /**
         * L'instance de Ekolo\Component\Http\Request
         * @var Request
         */
        protected $request;

        /**
         * L'instance de Ekolo\Component\Console\Argv
         * @var Argv
         */
        protected $argv;

        /**
         * L'instance de Ekolo\Component\Console\Commands
         * @var Commands
         */
        protected $commands;

        public function __construct()
        {
            $this->request = new Request;
            $this->commands = new Commands;
            $this->argv = new Argv($this->request->server()->argv());
            $this->parseArgv();
        }

        /**
         * Renvoi l'instance de Ekolo\Component\Http\Request
         * @return Request
         */
        public function request()
        {
            return $this->request;
        }

        /**
         * Renvoi l'instance de Ekolo\Component\Console\Argv
         * @return Argv
         */
        public function argv()
        {
            return $this->argv;
        }
        
        /**
         * Permet de parser les argv
         * @return void
         */
        public function parseArgv()
        {
            $argvs = $this->argv->all();
            $argv = $argvs;
            array_shift($argvs);
            $token = array_shift($argvs);

            if (!$this->commands->has($token)) {
                \console_log("La commande $token n'existe pas", true);
            }else {
                $command = $token == 'new' ? 'newProject' : $token;
                $classCommand = 'Ekolo\\Component\\Console\\Commands\\'.\ucfirst($command);
                
                if (!class_exists($classCommand)) {
                    \console_log("Cette commande n'est plus disponible. 
                    \n\n Tapez ekolo -help pour voir la liste des commandes disponibles.", true);
                }

                $runCommand = new $classCommand($this->commands->$token(), $argv);
            }
        }
    }