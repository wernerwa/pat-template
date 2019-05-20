<?php
/**
 * script to automate the generation of the
 * package.xml file.
 *
 * $Id: package.php 382 2005-03-29 18:16:13Z schst $
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Tools
 */

/**
 * uses PackageFileManager
 */
require_once 'PEAR/PackageFileManager.php';

/**
 * current version
 */
$version = '3.0.2';

/**
 * current state
 */
$state = 'stable';

/**
 * release notes
 */
$notes = <<<EOT
Changes since 3.0.1:
- fixed a notice (Bug #106)
- cast input parameter in readTemplatesFromInput() to string to check whether it's empty (Bug #115)
EOT;

/**
 * package description
 */
$description = <<<EOT
patTemplate is a powerful, non-compiling templating engine, that uses XML tags to divide a document into different parts.
It provides different template types to emulate if/else and switch/case constructs, variable modifiers,
input- and output filters and several more useful features.
EOT;

$package = new PEAR_PackageFileManager();

$result = $package->setOptions(array(
    'package'           => 'patTemplate',
    'summary'           => 'Powerful templating engine.',
    'description'       => $description,
    'version'           => $version,
    'state'             => $state,
    'license'           => 'LGPL',
    'filelistgenerator' => 'cvs',
    'ignore'            => array( 'package.php', 'autopackage.php', 'package.xml', '.cvsignore' ),
    'notes'             => $notes,
    'simpleoutput'      => true,
    'baseinstalldir'    => 'pat',
    'packagedirectory'  => './',
    'dir_roles'         => array(
                                 'docs' => 'doc',
                                 'examples' => 'doc',
                                 'tests' => 'test',
                                 )
    ));

if (PEAR::isError($result)) {
    echo $result->getMessage();
    die();
}

$package->addMaintainer('schst', 'lead', 'Stephan Schmidt', 'schst@php-tools.net');
$package->addMaintainer('argh', 'contributor', 'Sebastian Mordziol', 'argh@php-tools.net');

$package->addDependency('patError', '', 'has', 'pkg', false);
$package->addDependency('php', '4.2.0', 'ge', 'php', false);
$package->addDependency('patBBCode', '', 'has', 'pkg', true);

if (isset($_GET['make']) || (isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == 'make')) {
    $result = $package->writePackageFile();
} else {
    $result = $package->debugPackageFile();
}

if (PEAR::isError($result)) {
    echo $result->getMessage();
    die();
}
