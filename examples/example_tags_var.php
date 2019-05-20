<?PHP
/**
 * patTemplate example that shows how variables
 * can be added.
 *
 * The var tag allows you to include a variable in a template. There are several 
 * advantages over using the {BRACES} syntax, like the ability
 * to set a default value or a modifier.
 *
 * $Id: example_tags_var.php 155 2004-04-20 20:16:43Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_tags_var.tmpl' );
	$tmpl->displayParsedTemplate( 'foo' );

	$tmpl->clearTemplate( 'foo' );
	$tmpl->addVar( 'foo', 'myvar', 'value was set from PHP' );
	$tmpl->displayParsedTemplate();
?>