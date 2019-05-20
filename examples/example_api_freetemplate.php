<?PHP
/**
 * patTemplate example that shows how free the resources used by a template
 *
 * $Id: example_api_freetemplate.php 453 2007-05-30 12:58:43Z gerd $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
 * @see         patTemplate::freeTemplate()
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

	
	patErrorManager::setErrorHandling(E_ALL, 'verbose');
	
	$tmpl	=	&new patTemplate();
	$tmpl->setRoot( 'templates' );

	$tmpl->readTemplatesFromInput( 'example_api_freetemplate.tmpl' );

	echo	"By freeing the template, we may load it again without any conflicts<br />";
	$tmpl->freeTemplate( 'root', true );
	
	$tmpl->readTemplatesFromInput( 'example_api_freetemplate.tmpl' );
?>
