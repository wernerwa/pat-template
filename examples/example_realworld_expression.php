<?PHP
/**
 * patTemplate example that uses the reserved word '__parent'
 * as a varscope
 *
 * $Id: example_realworld_expression.php 242 2004-06-29 21:12:57Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_realworld_expression.tmpl' );
	
	$tmpl->addVar( 'page', 'VAR', 45 );
	$tmpl->displayParsedTemplate();
?>