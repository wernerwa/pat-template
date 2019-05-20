<?PHP
/**
 * patTemplate example that shows how to
 * use the 'varscope' attribute with a list of templates.
 *
 * $Id: example_attributes_varscope_multiple.php 338 2004-12-08 16:46:35Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.de
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
	
	$tmpl->readTemplatesFromInput( 'example_attributes_varscope_multiple.tmpl' );
	
	$tmpl->addVar( 'storage1', 'foo', 'Varscope now accepts a list of templates.' );
	$tmpl->addVar( 'storage2', 'bar', 'The first one has the highest priority' );
	
	$tmpl->displayParsedTemplate('page');
?>