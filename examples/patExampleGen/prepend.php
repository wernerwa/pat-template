<?php
/**
 * Main prepend file for the examples framework, sets
 * error reporting and initializes the patExampleGen
 * class that manages the whole framework.
 *
 * @package     patForms
 * @subpackage  Examples
 * @author      Sebastian Mordziol <argh@php-tools.net>
 */

    error_reporting(E_ALL);

   /**
    * The examples needed files list
    */
    include_once dirname(__FILE__).'/config.php';
