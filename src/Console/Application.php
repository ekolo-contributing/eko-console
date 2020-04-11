<?php

    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */

    namespace Ekolo\Component\Console;

    use Ekolo\Component\Http\Request;
    use Ekolo\Component\Console\Argv;
    use Ekolo\Component\Console\Input;

    class Application {

        /**
         * L'instance de Ekolo\Component\Console\Input
         * @var Input
         */
        protected $input;

        public function __construct()
        {
            
        }

        /**
         * Renvoi l'instance de Ekolo\Component\Console\Input
         * @return input
         */
        public function input()
        {
            return $this->input;
        }

        /**
         * Lancement de l'application console
         * @return void
         */
        public function run()
        {
            $this->input = new Input;
        }
    }