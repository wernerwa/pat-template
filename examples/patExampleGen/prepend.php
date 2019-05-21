<?php
/**
 * Main prepend file for the examples framework, sets
 * error reporting and initializes the patExampleGen
 * class that manages the whole framework.
 *
 * $Id: prepend.php 453 2007-05-30 12:58:43Z gerd $
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
