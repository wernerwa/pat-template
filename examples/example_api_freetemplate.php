<?PHP
/**
 * patTemplate example that shows how free the resources used by a template
 *
 * $Id: example_api_freetemplate.php 366 2005-03-07 18:09:42Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see         patTemplate::freeTemplate()
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
	
	patErrorManager::setErrorHandling(E_ALL, 'verbose');
	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( 'templates' );

	$tmpl->readTemplatesFromInput( 'example_api_freetemplate.tmpl' );

	echo	"By freeing the template, we may load it again without any conflicts<br />";
	$tmpl->freeTemplate( 'root', true );
	
	$tmpl->readTemplatesFromInput( 'example_api_freetemplate.tmpl' );
?>