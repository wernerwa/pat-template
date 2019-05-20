<?php
/**
 * package.xml generation file for patTemplate
 *
 * This file is executed by createSnaps.php to
 * automatically create a package that can be
 * installed via the PEAR installer.
 *
 * $Id: autopackage2.php 452 2007-05-11 09:18:06Z argh $
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Tools
 */


/**
 * uses PackageFileManager
 */
require_once 'PEAR/PackageFileManager2.php';
require_once 'PEAR/PackageFileManager/Svn.php';

/**
 * Base version
 */
$baseVersion = '3.1.0';

/**
 * current version
 */
$version    = $baseVersion . 'dev' . $argv[1];
$dir        = dirname(__FILE__);

/**
 * Current API version
 */
$apiVersion = '3.1.0';

/**
 * current state
 */
$state = 'devel';

/**
 * current API stability
 */
$apiStability = 'stable';

/**
 * release notes
 */
$notes = <<<EOT
Changes since 3.0.x:
- allowed more than one namespace
- added defaultFunction option, to define a function that is called for unknown functions
- added new built-in condition __single
- allow quoting variables using \{FOO\}
- implemented autoload in Call function
- added new system variable: {PAT_ROW_TYPE} = odd|even
- added "rowOffset" attribute that determines the starting point of PAT_ROW_VAR
- allow usage of \$self in the return values of the expression modifier (by Andrew Eddie of Mambo)
- added "relative" attribute to load templates relative to the current template (request #89)
- the varscope attribute now supports a list of templates
- in the requiredvars attribute of a simple condition template it is now possible to specify the exact value of a variable via requiredvars="var=value" (request #93)
- added clearVar(), clearVars(), clearGlobalVar() and clearGlobalVars() (request #91)
- added fourth parameter to addObject() to hide private properties
- addObject() now checks, whether an object implements a getVars() method
- added experimental XUL dump using PEAR::XML_XUL (needs a lot of love)
- added TemplateCaches for MMCache and eAccelerator (contributed by Mike Valstar)
- added placeholderExists() method (request #100)
- added Truncate Modifier (contributed by Rafa Couto)
- StripComments Input Filter now also strips Javascript multiline comments (Tim-Patrick M�rk)
- Allow output filters for single templates (using the OutputFilter="..." attribute and applyOutputFilter()) (Request #114)
- Add default variable modifiers for a template (Request #92)
- Added OutputFilter to highlight PHP code
- File Reader: Allow array containing several root directories as template root

Changes since 3.1.0a1:
- Allow the use of a variable in conditions (<pat:sub condition="{FOO}"/>)
- Added new custom function Highlight that is able to apply syntax highlighting to your code (requires PEAR::Text_Highlighter)
- Added new custom function Img to create HTML images (contributed by Jens Strobel)
- Fixed notice in File reader (argh)
- Added parameter for TemplateCache_File to set the filemode (request #127)
- Added InputFilter that allows you to use the short variable modifier syntax of Smarty (schst, Axel Stettner) (request #136)
- Fixed bug with condition __empty that was used instead of condition 0 (bug #132)
- Fixed bug in Dateformat modifier
- Fixed bug with condition templates that have __single and __empty defined (bug #138)
- Bugfixes and new features in Translate function (bugs #68 and #73) (argh)
- Can now set a preconfigured patBBCode object for the BBCode output filter, and added some documentation (argh)
- Fixed the module file search that would not go through all defined folders (argh)
- Added patch to translate function to allow combining of the translationFile and translationUseFolders options (argh)
- Fixed bug #144: StripWhitespace output filter breaks UTF-8 encoded data (schst)
- Added DB reader to read templates from any database supported by PEAR::DB (schst)
- Fixed bug #74: Attributes "maxloop" and "conditions" causes PHP crash (schst)
- Fixed an issue when using clearTemplate() on a template that does not exist (argh)
- Fixed bug #150: Notice when enabling the template cache (schst)
- Fixed bug #151: Invalid filemode in template cache (patch by Frank Kleine)
- Fixed bug #153: pdflatex stops on errors (patch by p_ansell <at> yahoo [dot] com)
- Fixed bug with variables that contain only one character (slerman)

Changes since 3.1.0a2:
- Fixed bug #152: __single breaks first (schst)
- Allow multiple modifiers per variable (schst)
- Implemented request #154: functions as defaults for variables (schst)
- Add support for varscope __parent in variable tag (gERD)
- Fixed bug #155: Automatically handle nested objects (schst)

Changes sinde 3.1.0b1:
- Fixed problem with condition templates and global variables (gERD)
- Added placeholders for variable modifiers (gERD)

Changes since 3.1.0b2:
- Fixed bug #164: ShortModifiers filter does not work if copyFrom and additional attributes are used (eddieajau)
- Fixed bug #165: ShortModifiers filter is not character set safe  (eddieajau)
- Added multibyte support to Truncate modifier (gERD)
- Added possibility to return UNIX timestamp to DateFormat modifier (gERD)
- Fixed a bug when using an __autoload() function in combination with external modules (argh)
EOT;

/**
 * package description
 */
$description = <<<EOT
patTemplate is a powerful, non-compiling templating engine, that uses XML tags to divide a document into different parts.
It provides different template types to emulate if/else and switch/case constructs, variable modifiers,
input- and output filters and several more useful features.
EOT;

$package = new PEAR_PackageFileManager2();

$result = $package->setOptions(array(
    'license'           => 'LGPL',
    'filelistgenerator' => 'file',
    'ignore'            => array( 'package.php', 'autopackage2.php', 'package.xml', '.cvsignore', '.svn', 'examples/cache', 'rfcs' ),
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

$package->setPackage('patTemplate');
$package->setSummary('Powerful templating engine.');
$package->setDescription($description);

$package->setChannel('pear.php-tools.net');
$package->setAPIVersion($apiVersion);
$package->setReleaseVersion($version);
$package->setReleaseStability($state);
$package->setAPIStability($apiStability);
$package->setNotes($notes);
$package->setPackageType('php');
$package->setLicense('LGPL', 'http://www.gnu.org/copyleft/lesser.txt');

$package->addMaintainer('lead', 'schst', 'Stephan Schmidt', 'schst@php-tools.net', 'yes');
$package->addMaintainer('developer', 'eddieajau', 'Andrew Eddie', 'mamboblue@gmail.com', 'yes');
$package->addMaintainer('contributor', 'argh', 'Sebastian Mordziol', 'argh@php-tools.net', 'yes');
$package->addMaintainer('contributor', 'gerd', 'gERD Schaufelberger', 'gerd@php-tools.net', 'yes');

$package->setPhpDep('4.2.0');
$package->setPearinstallerDep('1.4.0');

$package->addPackageDepWithChannel('required', 'patError', 'pear.php-tools.net', '1.1.0');
$package->addPackageDepWithChannel('optional', 'patBBCode', 'pear.php-tools.net');
$package->addPackageDepWithChannel('optional', 'XML_XUL', 'pear.php.net', '0.8.1');
$package->addPackageDepWithChannel('optional', 'Text_Highlighter', 'pear.php.net');

$package->generateContents();

$result = $package->writePackageFile();

if (PEAR::isError($result)) {
    echo $result->getMessage();
    die();
}
