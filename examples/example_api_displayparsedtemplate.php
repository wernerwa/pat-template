<?PHP
/**
 * Example that uses displayParsedTemplate()
 * without specifying a name for the template.
 *
 * In this case the first template that has been loaded
 * will be used.
 *
 * $Id: example_api_displayparsedtemplate.php 171 2004-04-21 18:16:06Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_api_displayparsedtemplate.tmpl' );
	$tmpl->readTemplatesFromInput( 'example_api_displayparsedtemplate2.tmpl' );

	$tmpl->displayParsedTemplate();
	echo	'<hr />';
	$tmpl->displayParsedTemplate( 'template1' );
	echo	'<hr />';
	$tmpl->displayParsedTemplate( 'template2' );

?>