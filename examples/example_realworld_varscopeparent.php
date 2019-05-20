<?PHP
/**
 * patTemplate example that uses the reserved word '__parent'
 * as a varscope
 *
 * $Id: example_realworld_varscopeparent.php 213 2004-05-17 19:01:27Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_realworld_varscopeparent.tmpl' );
	
	$tmpl->addVar( 'table', 'VAR', 'It worked!' );
	$tmpl->displayParsedTemplate();
?>