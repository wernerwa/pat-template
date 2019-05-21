<?php
/**
 * Example that shows the use of variable modifiers
 *
 * This is an example of a variable modifier that is used to create HTML
 * image tags and automatically includes the width and height of the
 * specified image.
 *
 * $Id: example_realworld_img.php 453 2007-05-30 12:58:43Z gerd $
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
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




    $tmpl   =   &new patTemplate();
    $tmpl->setRoot('templates');

    $tmpl->readTemplatesFromInput('example_realworld_img.tmpl');

    $tmpl->addVar('page', 'image_src', 'img/pb_pattemplate.gif');

    $tmpl->displayParsedTemplate();
