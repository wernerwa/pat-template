<?php
/**
 * patTemplate example that shows how to use template functions
 *
 * Template functions allow you to create custom tags, that will be
 * by PHP while the file is being read. See extending-pattemplate.txt
 * for more information on patTemplate functions.
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 * @link        http://www.php-tools.net
 * @see         patTemplate_Function
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

   /**
    * You have to set the folder in which the translation files will be stored.
    */
    $tmpl->setOption('translationFolder', 'data');

   /**
    * You have to set the language in which to translate the template contents.
    */
    $tmpl->setOption('lang', 'de');

   /**
    * you may pass several langauges
    */
//  $tmpl->setOption( 'lang', array( 'de', 'foo' ) );

   /**
    * If you set lang to auto, the Translate function will check
    * HTTP_ACCEPT_LANGUAGE
    */
//  $tmpl->setOption( 'lang', 'auto' );


   /**
    * With this option, you can categorize all language files in subfolders
    * of the translation folder, named after the language. All files for that
    * language will then be stored in the corresponding folder.
    *
    * Note: this option has no effect if you set the translationFile option.
    */
    $tmpl->setOption('translationUseFolders', false);

   /**
    * This option is for the lazy :) If will create all needed translation files
    * automatically as they are needed, no need to copy/paste the files you want
    * to translate.
    *
    * Note: the files cannot be created on the first load of a template, they can
    * only be created once the main sentence file is present.
    */
    $tmpl->setOption('translationAutoCreate', true);

   /**
    * When you update the original template and the new strings are added to the
    * translation files, it can be handy to have a 'locator' string that is
    * appended to the new lines that need to be translated. Per default, this is
    * on but you can turn it off if you wish.
    */
//  $tmpl->setOption( 'translationUseLocator', false );

   /**
    * The default new translation locator string that is used is 'Translate', with
    * this option you can set a custom string if you wish.
    */
//  $tmpl->setOption( 'translationLocatorString', '###' );

   /**
    * If you set a filename (without extension!), the translation for all templates
    * will be saved to one file per language, with the name you set here. This can
    * be very handy to avoid duplicate strings that can occurr otherwise.
    */
//  $tmpl->setOption( 'translationFile', 'lang' );


    $tmpl->readTemplatesFromInput('example_function_translate.tmpl');
    $tmpl->displayParsedTemplate('root');


    $tmpl->readTemplatesFromInput('example_function_translate2.tmpl');
    $tmpl->displayParsedTemplate('motu');
