<?PHP
/**
 * Basic patTemplate example that shows how to
 * use condition templates.
 *
 * $Id: example_type_condition.php 268 2004-08-19 08:22:51Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_type_condition.tmpl' );
	
	$tmpl->addVar( 'cond', 'foo', array( 'bar', 0, 'any', 'bar', 'foo', 'argh', 'test' ) );

	$tmpl->displayParsedTemplate();
?>