<?PHP
/**
 * patTemplate example that shows how to
 * use the 'useglobals' attribute for
 * condition templates.
 *
 * $Id: example_attributes_useglobals.php 170 2004-04-21 18:09:52Z schst $
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
	
	$tmpl->readTemplatesFromInput( 'example_attributes_useglobals.tmpl' );
	
	$tmpl->addGlobalVar( 'title', 'The useglobals attribute.' );
	
	$tmpl->displayParsedTemplate();
?>