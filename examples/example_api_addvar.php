<?PHP
/**
 * patTemplate example that displays the
 * usage of parseIntoVar()
 *
 * $Id: example_api_addvar.php 453 2007-05-30 12:58:43Z gerd $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.de
 */

    /**
     * Main examples prepend file, needed *only* for the examples framework!
     */
    include_once 'patExampleGen/prepend.php';
    
    // EXAMPLE START ------------------------------------------------------

    /**
     * patErrorManager class
     */
    require_once $neededFiles['patErrorManager'];
    
    /**
     * patTemplate
     */
    require_once $neededFiles['patTemplate'];
	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( 'templates' );
	$tmpl->readTemplatesFromInput( 'example_api_addvar.tmpl' );
	
	$tmpl->addVar( 'template1', 'argh', array( 'one', 'two', 'repeat it.' ) );
	
	$tmpl->addVars( 'template1', array(
										'foo' => 'This is a string',
										'bar' => 453
									)
				 );
	
	$tmpl->displayParsedTemplate();
?>
