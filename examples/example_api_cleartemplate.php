<?PHP
/**
 * patTemplate example that shows how clear variables in a template
 *
 * $Id: example_api_cleartemplate.php 240 2004-06-25 18:12:04Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see         patTemplate::setAttribute()
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

	$tmpl->readTemplatesFromInput( 'example_api_cleartemplate.tmpl' );

	$tmpl->addVar( 'root', 'FOO', 'BAR' );
	$tmpl->addVar( 'nested', 'FOO', 'BAR' );
	$tmpl->addVar( 'cond', 'FOO', array( 'BAR', 'BAR' ) );

	echo	"clear only the root template:<br>";
	
	$tmpl->clearTemplate( 'root' );
	$tmpl->displayParsedTemplate();

	echo	"<hr />";

	echo	"clear the root template and its children:<br>";
	
	$tmpl->clearTemplate( 'root', true );
	$tmpl->displayParsedTemplate();
?>