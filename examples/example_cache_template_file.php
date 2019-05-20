<?PHP
/**
 * Example that shows the use of a template cache to
 * speed up your application.
 *
 * Take a look at the tmplCache folder. This example will
 * save a cache file there.
 *
 * $Id: example_cache_template_file.php 396 2005-05-15 11:44:52Z schst $
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