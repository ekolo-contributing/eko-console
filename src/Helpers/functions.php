<?php

    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */

    if (!function_exists('console_log')) {
        /**
         * Permet d'afficher les données à la console à l'aide de print_r
         * @param $data Les données à afficher
         * @param bool $die S'il faut arrêter le script ou pas
         */
        function console_log($data, $die = false) {
            print_r($data);

            $die ? die() : '';
        }
    }

    if (!function_exists('get_namespace')) {
        /**
         * Permet de renvoyer le namespace d'un élément
         * @param string $element
         * @param string $default le namespace par défaut au cas où ca n'existe pas
         * @return string
         */
        function get_namespace(string $element, string $default = null) {
            $constante_namespace = strtoupper($element.'s').'_NAMESPACE';
            $namespace = defined($constante_namespace) ? constant($constante_namespace) : $default;

            return $namespace;
        }
    }