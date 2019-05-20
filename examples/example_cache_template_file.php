<?PHP
/**
 * Example that shows the use of a template cache to
 * speed up your application.
 *
 * Take a look at the tmplCache folder. This example will
 * save a cache file there.
 *
 * $Id: example_cache_template_file.php 453 2007-05-30 12:58:43Z gerd $
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
	 * Use a template cache based on file system
	 */
	$tmpl->useTemplateCache( 'File', array(
											'cacheFolder' => './tmplCache',
											'lifetime'    => 10,
											'filemode'    => 0644
										)
						);
   /**
	* cache is valid until original 
	* is modified.
	*/
/*	
	$tmpl->useTemplateCache( 'File', array(
											'cacheFolder' => './tmplCache',
											'lifetime' => 'auto' )
										);
*/
										
	$tmpl->readTemplatesFromInput( 'example_cache_template_file.tmpl' );

	$list	=	array(
						array( 'superhero' => 'Superman', 'realname' => 'Clark Kent' ),
						array( 'superhero' => 'Batman', 'realname' => 'Bruce Wayne' ),
						array( 'superhero' => 'Aquaman', 'realname' => 'Arthur Curry' ),
					);
	$tmpl->addRows( 'list_entry', $list );
	
	$tmpl->displayParsedTemplate();
?>
