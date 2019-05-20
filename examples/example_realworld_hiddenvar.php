<?PHP
/**
 * patTemplate example that shows how to copy
 * a var, apply a modifier without showing it
 * and still use it in a condition.
 *
 * $Id: example_realworld_hiddenvar.php 175 2004-04-21 18:38:50Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_realworld_hiddenvar.tmpl' );
	
	$tmpl->addVar( 'page', 'string', 'schst' );
	
	$tmpl->displayParsedTemplate();
?>