<?PHP
/**
 * patTemplate modulo example
 *
 * A modulo template allows you to define any number of sub-templates
 * for alternating lists. It is similar to odd-even templates.
 *
 * $Id: example_type_modulo_empty.php 291 2004-09-21 20:28:54Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_type_modulo_empty.tmpl' );
	
	//$tmpl->addVar('row', 'foo', array('one', 'two'));
	
	$tmpl->displayParsedTemplate( 'row' );
?>