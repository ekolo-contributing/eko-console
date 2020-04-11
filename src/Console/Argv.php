<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */

    namespace Ekolo\Component\Console;

    use Ekolo\Component\EkoMagic\ParameterBag;

    /**
     * Gère les arguments passés lancer dans la requête dans la console
     */
    class Argv extends ParameterBag {

        public function __construct(array $argv = [])
        {
            parent::__construct($argv);
        }
    }