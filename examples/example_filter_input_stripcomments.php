<?PHP
/**
 * Example that shows the use of input filters
 *
 * Input filters are applied to the input stream, before
 * they are accessed by the reader. You may use them to strip
 * HMTL comments, so the reader has less data to process.
 *
 * $Id: example_filter_input_stripcomments.php 155 2004-04-20 20:16:43Z schst $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see			patTemplate::applyInputFilter()
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
	$tmpl->applyInputFilter( 'StripComments' );
	
	$tmpl->readTemplatesFromInput( 'example_filter_input_stripcomments.tmpl' );

	$tmpl->dump();
?>