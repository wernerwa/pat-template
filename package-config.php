<?php
/**
 * package-config for patTemplate
 *
 * Config to to build PEAR packages
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 * @package     patSessoin
 * @subpackage  Tools
 */

/**
 * package name
 */
$name = 'patTemplate';

/**
 * package summary
 */
$summary = 'Powerful template engine.';

/**
 * current version
 */
$version = '3.2.0';

/**
 * build version appendix
 */
$versionBuild = 'a3';

/**
 * Current API version
 */
$apiVersion = '3.2.0';

/**
 * current state
 */
$state = 'alpha';

/**
 * current API stability
 */
$apiStability = 'stable';

/**
 * release notes
 */
$notes = <<<EOT
Changes since 3.1.x:
 - allow variable - default values to have placeholders, added template attribute: "attributeplaceholder"
 - added __onchange condition (schst)
 - template functions support both, runtime and on-read-time processing
 - use placeholders in template function's attributes
 - split package helper from config
 - Added Reduce modifier by David Blanco
EOT;

/**
 * package description
 */
$description = <<<EOT
patTemplate is a powerful, non-compiling templating engine, that uses XML tags to divide a document into different parts.
It provides different template types to emulate if/else and switch/case constructs, variable modifiers,
input- and output filters and several more useful features.
EOT;

$options    =   array(
    'license'           => 'LGPL',
    'filelistgenerator' => 'svn',
    'ignore'            => array( 'package.php', 'autopackage2.php', 'package-config.php', 'package.xml', '.cvsignore', '.svn', 'examples/cache', 'rfcs' ),
    'simpleoutput'      => true,
    'baseinstalldir'    => 'pat',
    'packagedirectory'  => './',
    'dir_roles'         => array(
                                 'docs' => 'doc',
                                 'examples' => 'doc',
                                 'tests' => 'test',
                                 )
    );

$license    =   array(
        'name'  => 'LGPL',
        'url'   =>  'http://www.gnu.org/copyleft/lesser.txt'
    );

$maintainer     =   array();
$maintainer[]   =   array(
        'role'      => 'lead',
        'handle'    => 'schst',
        'name'      => 'Stephan Schmidt',
        'email'     => 'schst@php-tools.net',
        'active'    => 'yes'
);
$maintainer[]   =   array(
        'role'      => 'developer',
        'handle'    => 'eddieajau',
        'name'      => 'Andrew Eddie',
        'email'     => 'argh@php-tools.net',
        'active'    => 'yes'
);
$maintainer[]   =   array(
        'role'      => 'developer',
        'handle'    => 'gerd',
        'name'      => 'gERD Schaufelberger',
        'email'     => 'gerd@php-tools.net',
        'active'    => 'yes'
);
$maintainer[]   =   array(
        'role'      => 'contributor',
        'handle'    => 'argh',
        'name'      => 'Sebastian Mordziol',
        'email'     => 'argh@php-tools.net',
        'active'    => 'yes'
);

$dependency     =   array();
$dependency[]   =   array(
    'type'      =>  'required',
    'package'   =>  'patError',
    'channel'   =>  'pear.php-tools.net',
    'version'   =>  '1.1.0'
);
$dependency[]   =   array(
    'type'      =>  'optional',
    'package'   =>  'patBBCode',
    'channel'   =>  'pear.php-tools.net',
    'version'   =>  null
);
$dependency[]   =   array(
    'type'      =>  'optional',
    'package'   =>  'XML_XUL',
    'channel'   =>  'pear.php.net',
    'version'   =>  '0.0.1'
);
$dependency[]   =   array(
    'type'      =>  'optional',
    'package'   =>  'Text_Highlighter',
    'channel'   =>  'pear.php.net',
    'version'   =>  null
);

$channel    =   'pear.php-tools.net';
$require    =   array(
    'php'               =>  '4.2.0',
    'pear_installer'    => '1.4.0'
);
