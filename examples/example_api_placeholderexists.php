<?PHP
/**
 * patTemplate example that displays the
 * usage of parseIntoVar()
 *
 * $Id: example_api_placeholderexists.php 367 2005-03-07 19:36:48Z schst $
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
	$tmpl->readTemplatesFromInput( 'example_api_placeholderexists.tmpl' );

	$result = $tmpl->placeholderExists('foo', 'condition');
	if ($result === true) {
		echo "FOO exists in 'condition'<br />\n";
	}

	$result = $tmpl->placeholderExists('foo', 'standard');
	if ($result === true) {
		echo "FOO exists in 'standard'<br />\n";
	}

	$result = $tmpl->placeholderExists('bar', 'standard');
	if ($result === true) {
		echo "BAR exists in 'standard'<br />\n";
	}
?>