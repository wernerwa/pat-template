<?PHP
/**
 * patTemplate example to showcase the Dot-Syntax.
 *
 * $Id: example_misc_dotsyntax.php 176 2004-04-21 18:43:10Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_misc_dotsyntax.tmpl' );
	
	$tmpl->addVar( 'source', 'foo', array( 'bar', 'any', 'bar', 'foo', 'argh', 'test' ) );

	$tmpl->displayParsedTemplate( 'source' );
?>