<?PHP
/**
 * patTemplate modulo example
 *
 * A modulo template allows you to define any number of sub-templates
 * for alternating lists. It is similar to odd-even templates.
 *
 * This example uses the special '__single' condition, which can be
 * used in modulo and condition templates.
 *
 * $Id: example_type_modulo_single.php 305 2004-10-27 10:28:39Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_type_modulo_single.tmpl' );
	
	$tmpl->addVar('row', 'foo', 'bar');
	
	$tmpl->displayParsedTemplate( 'row' );
?>