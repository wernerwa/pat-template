<?PHP
/**
 * patTemplate example that shows how to hide a template
 * using setAttribute()
 *
 * $Id: example_api_setattribute.php 453 2007-05-30 12:58:43Z gerd $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see         patTemplate::setAttribute()
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

	$tmpl->readTemplatesFromInput( 'example_api_setattribute.tmpl' );

	$tmpl->setAttribute( 'child', 'visibility', 'hidden' );
	
	$tmpl->displayParsedTemplate();
?>
