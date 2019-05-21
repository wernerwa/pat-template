<?php
/**
 * Configuration for the examples - edit this file
 * to set the paths to the needed classes as they
 * should be on your server.
 *
 * @package     patForms
 * @subpackage  Examples
 * @author      Sebastian Mordziol <argh@php-tools.net>
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 */

    // just as a helper - the base path in which the patTools
    // can be found.
    $basePath = '../../include/pat';

    // this sets the locations for all the needed classes for
    // the examples collection. Update this to make sure all
    // the examples work as they should on your system.
    $neededFiles = array(
        'patErrorManager'   =>  'pat/patErrorManager.php',
        'patTemplate'       =>  '../patTemplate.php'
    );
