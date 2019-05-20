<?PHP
/**
 * Example that shows how to use relative paths in
 * external templates
 *
 * $Id: example_attributes_relative.php 336 2004-12-03 17:21:48Z schst $
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

	$tmpl->readTemplatesFromInput( 'relative/example_attributes_relative.tmpl' );

	$tmpl->displayParsedTemplate();
?>