<?PHP
/**
 * Example that shows the use of the comment tag
 *
 * The comment tag allows you to include documentation 
 * of your templates or HTML files that will not be displayed
 * to the end user in the browser.
 *
 * $Id: example_api_loadtemplate.php 244 2004-07-06 18:04:12Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
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

	$tmpl->readTemplatesFromInput( 'example_api_loadtemplate.tmpl' );
	
	$tmpl->setAttribute( 'main', 'src', 'example_api_loadtemplate_main.tmpl' );

	$tmpl->loadTemplate( 'main' );
	
	$tmpl->dump();
?>