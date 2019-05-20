<?PHP
/**
 * Example that shows the use of the unusedvars attribute
 *
 * $Id: example_attributes_loop.php 439 2006-08-08 20:56:01Z gerd $
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

	$tmpl->readTemplatesFromInput( 'example_attributes_loop.tmpl' );

	$heroes = array( 'Superman', 'Batman', 'Green Lantern', 'Robin', 'Wonder Woman', 'Powergirl' );
	$tmpl->addVar( 'row', 'hero', $heroes );
	
	$tmpl->displayParsedTemplate();
?>