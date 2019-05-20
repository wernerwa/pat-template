<?PHP
/**
 * Example that shows the use of a template tag
 * with an external source
 *
 * The src attribute allows you to split your HTML
 * code into different files, so it's more reusable.
 * 
 * Common practice is to move a header and footer
 * into separate files and include them in your
 * main templates.
 *
 * $Id: example_attributes_src.php 155 2004-04-20 20:16:43Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_attributes_src.tmpl' );

	$tmpl->displayParsedTemplate();
?>