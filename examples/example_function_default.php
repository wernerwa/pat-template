<?PHP
/**
 * patTemplate example that shows how to use template functions
 * 
 * This example shows you how map tags to templates by setting
 * the call function as default.
 *
 * $Id: example_function_default.php 320 2004-10-28 15:07:07Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see			patTemplate_Function
 */

 	error_reporting( E_ALL );
 
   /**
	* requires patErrorManager
	* make sure that it is in your include path
	*/
	require_once( 'pat/patErrorManager.php' );

   /**
	* main class
	*/
	require_once '../patTemplate.php';
	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( 'templates' );
	$tmpl->setOption('defaultFunction', 'Call');

	$tmpl->readTemplatesFromInput( 'components/hint.tmpl' );
	$tmpl->readTemplatesFromInput( 'components/news.tmpl' );

	$tmpl->readTemplatesFromInput( 'example_function_default.tmpl' );

	$tmpl->displayParsedTemplate('page');
?>