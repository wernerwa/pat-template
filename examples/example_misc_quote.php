<?PHP
/**
 * patTemplate example that shows how quote variables, so they will not be replaced.
 *
 * To quote a varible, you'll have to use this syntax: \{FOO\}. patTemplate
 * will then insert {FOO} into the result.
 *
 * $Id: example_misc_quote.php 313 2004-10-28 08:54:44Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see			patTemplate::setOption()
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

	$tmpl->readTemplatesFromInput( 'example_misc_quote.tmpl' );

	$tmpl->displayParsedTemplate();
?>