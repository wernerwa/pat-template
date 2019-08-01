<?php
/**
 * Overview for the examples
 *
 * @package     patTemplate
 * @subpackage  Examples
 * @author      Sebastian Mordziol <argh@php-tools.net>
 */

/**
 * require section config
 */
    require_once 'index_sections.php';
?>
<html>
<head>
    <title><?php echo $appName ?>: Examples - Main</title>
    <style>
        @import url( _styles.css );
    </style>
</head>
<body marginheight="10" marginwidth="10" leftmargin="10" rightmargin="10" topmargin="10" bottommargin="10">

<h2><?php echo $appName; ?> examples overview</h2>
<h3><?php echo $mainDesc; ?></h3>

<ul>
<?php
foreach ($sections as $section => $sectionData) {
    echo '&raquo; <a href="#'.$section.'">'.$appName.'::'.$section.'</a><br>';
}
?>
</ul><br>

<?php

foreach ($sections as $section => $sectionData) {
    echo '<h4><a name="'.$section.'"></a>'.$appName.'::'.$section.' ('.count($sectionData['pages']).')</h4>';
    echo '<p>'.$sectionData['descr'].'</p>';
    echo '<ul>';
    foreach ($sectionData['pages'] as $pageId => $pageData) {
        if (isset($pageData['alias'])) {
            $example = $pageData['alias'];
        } else {
            $example = $sectionData['basename'].$pageId;
        }

        echo '<li>';
        echo '	<a href="_viewExample.php?example='.$example.'">'.$pageData['title'].'</a><br />';
        echo '	'.$pageData['descr'].'<br />';
        echo '</li>';
    }
    echo '</ul><br />';
}
?>

</body>
</html>
