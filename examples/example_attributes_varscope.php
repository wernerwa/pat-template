<?PHP
/**
 * patTemplate example that shows how to
 * use the 'varscope' attribute
 *
 * $Id: example_attributes_varscope.php 303 2004-10-27 10:02:12Z schst $
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
	
	$tmpl->readTemplatesFromInput( 'example_attributes_varscope.tmpl' );
	
	$tmpl->addVar( 'var_storage', 'title', 'The varscope attribute.' );
	
	$tmpl->displayParsedTemplate('page');
?>