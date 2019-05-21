<?php
/**
 * Example that shows the use of variable modifiers
 *
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 */

    /**
     * Main examples prepend file, needed *only* for the examples framework!
     */
    include_once 'patExampleGen/prepend.php';

    // EXAMPLE START ------------------------------------------------------

    /**
     * patErrorManager class
     */
    require_once $neededFiles['patErrorManager'];

    /**
     * patTemplate
     */
    require_once $neededFiles['patTemplate'];

    $tmpl = new patTemplate();
    $tmpl->setRoot('templates');

    $tmpl->readTemplatesFromInput('example_modifier_sizeformat.tmpl');
    $vars   =   array(
                        'kcore'     =>  '6979325952',
                        'config_gz' =>  '17281',
                        'initrd'    =>  '5373796',
                        'vmlinuz'   =>  '1514359'
                    );
    $tmpl->addGlobalVars($vars);

    $tmpl->displayParsedTemplate();
