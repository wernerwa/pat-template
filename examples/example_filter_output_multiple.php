<?PHP
/**
 * Example that shows the use of output filters
 *
 * $Id: example_filter_output_multiple.php 453 2007-05-30 12:58:43Z gerd $
 *
 * @author		Stephan Schmidt <schst@php-tools.net>
 * @package		patTemplate
 * @subpackage	Examples
 * @link		http://www.php-tools.net
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

	/**
	 * you may apply as many filters as you like in
	 * the filter chain
	 */
	$tmpl->applyOutputFilter( 'StripWhitespace' );
	$tmpl->applyOutputFilter( 'Gzip' );
	
	$tmpl->readTemplatesFromInput( 'example_filter_output_multiple.tmpl' );

	$tmpl->displayParsedTemplate();
?>
