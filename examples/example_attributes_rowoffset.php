<?PHP
/**
 * Example that shows the use of the rowoffset attribute
 *
 * $Id: example_attributes_rowoffset.php 328 2004-11-23 19:44:41Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_attributes_rowoffset.tmpl' );

	$heroes = array( 'Superman', 'Batman', 'Green Lantern', 'Robin', 'Wonder Woman', 'Powergirl' );

	$tmpl->addVar( 'row', 'hero', $heroes );

	$tmpl->addVar( 'row2', 'hero', $heroes );
	
	$tmpl->displayParsedTemplate();
?>