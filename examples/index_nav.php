<?php
/**
 * Navigation for the examples
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title><?php $appName ?>: Examples - Navigation</title>
    <style>
        @import url( _styles.css );
    </style>
<script language="JavaScript1.2" type="text/javascript">
var sections = new Array();

function addSection( section )
{
    sections.push( section );
}

function toggleSection( section )
{
    var el      =   document.getElementById( section );
    var sign    =   document.getElementById( section + '-sign' );

    if( el.style.display == 'block' )
    {
        el.style.display    =   'none';
        sign.innerHTML      =   '[+]';
    }
    else
    {
        el.style.display    =   'block';
        sign.innerHTML      =   '[-]';
    }
}
</script>
</head>
<body bgcolor="#f9f9f9" marginheight="10" marginwidth="10" leftmargin="10" rightmargin="10" topmargin="10" bottommargin="10">

<h2>Examples navigation</h2>

<a href="index_main.php" target="display" title="Overview of all available examples">&raquo; Overview</a><br><br>

<?php

foreach ($sections as $sectionName => $section) {
    echo '<h3 onclick="toggleSection( \''.$sectionName.'\' );"><span id="'.$sectionName.'-sign" class="sign">[+]</span> '.$appName.'::'.$sectionName.' ('.count($section['pages']).')</h3>';
    echo '<div id="'.$sectionName.'" class="section"><script language="JavaScript1.2" type="text/javascript">addSection( \''.$sectionName.'\' );</script>';
    foreach ($section['pages'] as $pageId => $pageData) {
        if (isset($pageData['alias'])) {
            $example = $pageData['alias'];
        } else {
            $example = $section['basename'].$pageId;
        }
        echo '<a href="_viewExample.php?example='.$example.'" target="display" title="'.$pageData['descr'].'" class="nav">&raquo; '.$pageData['title'].'</a><br>';
    }
    echo '</div>';
}
?>
<div style="margin-top:15px; font-size: 11px; font-style: italic;">
    If you need help with patTemplate, please visit our
    <a href="http://forum.php-tools.net/viewforum.php?f=1" target="display">forum</a> or
    take a look at the <a href="http://dogs.php-tools.net/docs/patTemplate/" target="display">API documentation</a>.
</div>

</body>
</html>
