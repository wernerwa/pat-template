<?PHP
/**
 * Example that shows the use of output filters
 *
 * $Id: example_filter_output_multiple.php 155 2004-04-20 20:16:43Z schst $
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

	/**
	 * you may apply as many filters as you like in
	 * the filter chain
	 */
	$tmpl->applyOutputFilter( 'StripWhitespace' );
	$tmpl->applyOutputFilter( 'Gzip' );
	
	$tmpl->readTemplatesFromInput( 'example_filter_output_multiple.tmpl' );

	$tmpl->displayParsedTemplate();
?>