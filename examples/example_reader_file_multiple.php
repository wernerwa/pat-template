<?PHP
/**
 * Example that uses the IT reader instead
 * of the default file reader.
 *
 * The IT reader allows you to read templates that have been
 * created to be used with HTML_Template_IT
 *
 * $Id: example_reader_file_multiple.php 384 2005-04-03 16:36:28Z schst $
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
	require_once 'pat/patErrorManager.php';
	
   /**
	* main class
	*/
	require_once '../patTemplate.php';
	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( array('templates', 'templates-2'));

	$tmpl->readTemplatesFromInput('example_reader_file_multiple.tmpl');
	$tmpl->displayParsedTemplate();
?>