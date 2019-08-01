<?php
/**
 * Example that shows the use of output filters
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 */

    error_reporting(E_ALL);

   /**
    * requires patErrorManager
    * make sure that it is in your include path
    */
    require_once('pat/patErrorManager.php');

   /**
    * main class
    */
    require_once '../patTemplate.php';

    $tmpl = new patTemplate();
    $tmpl->setRoot('templates');

    $tmpl->readTemplatesFromInput('example_filter_output_per_template.tmpl');

    /**
     * apply the bbcode filter to one template
     */
    $options = array(
                        'reader' => 'AutoFile',
                        'skinDir' => './BBCode'
                    );
    $tmpl->applyOutputFilter('BBCode', $options, 'bbcode');

    $tmpl->displayParsedTemplate();
