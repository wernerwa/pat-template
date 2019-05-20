<?PHP
/**
 * patTemplate example that shows how to disable backwards
 * compatibility
 *
 * This means that by setting the option 'maintainBc' to false
 * patTemplate will not recognize the conditions 'default',
 * 'empty', 'odd' and 'even' as special conditions, but as 
 * normal strings.
 *
 * You should always use '__default', '__empty', '__odd' and
 * '__even' instead.
 *
 * In future versions, backwards compatibility will be disabled
 * by default.
 *
 * $Id: example_misc_maintainbc.php 155 2004-04-20 20:16:43Z schst $
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

	/**
	 * if you remove this line, patTemplate will maintain
	 * bc, that means condition="default" is identical to
	 * condition="__default""
	 */
	$tmpl->setOption( 'maintainBc', false );

	$tmpl->readTemplatesFromInput( 'example_misc_maintainbc.tmpl' );
	
	$tmpl->addVar( 'cond', 'bc', array( 'one', 'two', 'default', 'three' ) );

	$tmpl->displayParsedTemplate();
?>