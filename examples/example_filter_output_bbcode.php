<?PHP
/**
 * Example that shows the use of output filters
 *
 * $Id: example_filter_output_bbcode.php 255 2004-07-23 21:01:43Z schst $
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
	 * apply the bbcode filter
	 */
	$options = array(
						'reader' => 'AutoFile',
						'skinDir' => './BBCode'
					);
	$tmpl->applyOutputFilter( 'BBCode', $options );
	
	$tmpl->readTemplatesFromInput( 'example_filter_output_bbcode.tmpl' );

	$tmpl->displayParsedTemplate();
?>