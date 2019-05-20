<?PHP
/**
 * Example that shows the use of output filters
 *
 * $Id: example_filter_output_tidy.php 236 2004-06-25 17:16:50Z schst $
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
	 * apply the tidy filter
	 */
	$options = array(
						'output-xhtml' => true,
						'clean'		   => true
					);
	$tmpl->applyOutputFilter( 'Tidy', $options );
	
	$tmpl->readTemplatesFromInput( 'example_filter_output_tidy.tmpl' );

	$tmpl->displayParsedTemplate();
?>