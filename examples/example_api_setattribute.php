<?PHP
/**
 * patTemplate example that shows how to hide a template
 * using setAttribute()
 *
 * $Id: example_api_setattribute.php 155 2004-04-20 20:16:43Z schst $
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

	$tmpl->readTemplatesFromInput( 'example_api_setattribute.tmpl' );

	$tmpl->setAttribute( 'child', 'visibility', 'hidden' );
	
	$tmpl->displayParsedTemplate();
?>