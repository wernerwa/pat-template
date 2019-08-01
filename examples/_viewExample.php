<?php
/**
 * helper script that displays the examples including
 * the template and PHP source.
 *
 * You may pass the following GET parameters to the
 * script:
 *
 * - example => id if the example
 *
 * @author      Stephan Schmidt <schst@php-tools.net>
 * @package     patTemplate
 * @subpackage  Examples
 */


/**
 * needs the section configuration
 */
require_once 'index_sections.php';

if (!isset($_GET['example'])) {
    die('No example selected.');
}

$exampleId = $_GET['example'];

$section = getExampleSection($exampleId);
$example = getExample($exampleId);
$exampleFile = $exampleId.'.php';

$nav = array(
    'output'    =>  'Output',
    'source'    =>  'PHP Source',
    'templates' =>  'Template source',
    'dump'      =>  'Template Dump',
);

/**
 * add tabs
 */
if (isset($example['tabs'])) {
    foreach ($example['tabs'] as $tabId => $tabData) {
        $nav[$tabId] = $tabData['title'];
    }
}

?>
<html>
<head>
    <title><?php echo $appName; ?> example</title>
    <style>
        @import url( _styles.css );
    </style>
    <script type="text/javascript" language="JavaScript1.2">

    var tabs = new Array( <?php echo "'".implode("', '", array_keys($nav))."'"; ?> );
    var actTab = false;

    function hiTab( tabID )
    {
        document.getElementById( tabID + 'Tab' ).className = 'tabA';
    }

    function loTab( tabID )
    {
        if( tabID == actTab )
            return true;

        document.getElementById( tabID + 'Tab' ).className = 'tabN';
    }

    function displayTab( tabID )
    {
        for( var i = 0; i < tabs.length; i++ )
        {
            if( tabID == tabs[i] )
                document.getElementById( tabs[i] ).style.display = 'block';
            else
                document.getElementById( tabs[i] ).style.display = 'none';
        }

        var oldAct = actTab;

        actTab = tabID;
        hiTab( actTab );

        if( oldAct !== false )
            loTab( oldAct );
    }

    </script>
    <style>
        BODY{margin:0px;}
    </style>
</head>
<body onload="displayTab( 'output' );">

<div style="padding:20px;padding-bottom:5px;">
    <div class="head"><b><?php echo $appName.' '.$section.' :: '.$example['title']; ?></b></div>
    <div class="abstract"><?php echo htmlentities($example['descr']); ?></div>
</div>

<?php buildNavigation(); ?>

<!-- Output -->
<iframe class="exampleContent" style="display:block;" id="output" src="<?php echo $exampleFile; ?>"></iframe>

<!-- PHP source -->
<div class="exampleContent" id="source">
    <?php
    highlight_file($exampleFile);
    ?>
</div>

<!-- Template source -->
<div class="exampleContent" id="templates">
<?php
foreach ($example['templates'] as $template) {
        displayTemplate($template);
}
?>
</div>

<!-- Dump -->
<iframe class="exampleContent" id="dump" src="_dumpTemplate.php?template=<?php echo $example['templates'][0]; ?>"></iframe>

<?php
/**
 * add additional content
 */
if (isset($example['tabs'])) {
    foreach ($example['tabs'] as $tabId => $tabData) {
        switch ($tabData['type']) {
            case 'phpsource':
                echo '<div class="exampleContent" id="'.$tabId.'" style="display:none;">';
                highlight_file($tabData['file']);
                echo '</div>';
                break;

            default:
                echo '<div class="exampleContent" id="'.$tabId.'">unknown content type <strong>'.$tabData['type'].'</strong>.</div>';
                break;
        }
    }
}


?>


</body>
</html>

<?php
/**
 * various helper functions follow
 */

   /**
    * builds the tab navigation and displays it
    *
    * @access   public
    */
function buildNavigation()
{
    global $nav;

    $html   =   '<table border="0" cellpadding="0" cellspacing="0" class="tabs" width="100%">'
            .   '	<tr>'
            .   '		<td style="padding-left:15px;">&nbsp;</td>';

    foreach ($nav as $navId => $navTitle) {
        $html   .=  '<td class="tabN" id="'.$navId.'Tab" onclick="displayTab( \''.$navId.'\' );" onmouseover="hiTab( \''.$navId.'\' );" onmouseout="loTab( \''.$navId.'\' );">'.$navTitle.'</td>'
                .   '<td>&nbsp;</td>';
    }

    $html   .=  '		<td width="100%">&nbsp;</td>'
            .   '	</tr>'
            .   '</table>';

    echo $html;
}

   /**
    * get the example section
    *
    * @access   public
    * @param    string      example id
    * @return   string      section title
    */
function getExampleSection($id)
{
    global $sections;
    foreach ($sections as $title => $spec) {
        if (strncmp($spec['basename'], $id, strlen($spec['basename'])) === 0) {
            return $title;
        }
    }
    return false;
}

   /**
    * get the example section
    *
    * @access   public
    * @param    string      example id
    * @return   string      section title
    */
function getExample($id)
{
    global $sections;
    foreach ($sections as $title => $spec) {
        if (strncmp($spec['basename'], $id, strlen($spec['basename'])) !== 0) {
            continue;
        }

        foreach ($spec['pages'] as $name => $data) {
            if ($id != $spec['basename'].$name) {
                continue;
            }

            if (!isset($data['templates'])) {
                $data['templates'] = array(
                                            $id.'.tmpl'
                                        );
            }

            return $data;
        }
    }
    return false;
}

   /**
    * Display a template
    *
    * @access   public
    */
function displayTemplate($file, $namespace = 'patTemplate', $customTags = array())
{
    $tags   =   array(
                        'tmpl'      =>  'tmplTag',
                        'sub'       =>  'subTag',
                        'link'      =>  'linkTag',
                        'var'       =>  'varTag',
                        'comment'   =>  'commentTag',
                    );
    $tags   =   array_merge($customTags, $tags);

    $tmpl   =   implode('', file('templates/'.$file));

    $tmpl   =   str_replace("\t", '    ', $tmpl);

    $tmpl   =   htmlspecialchars($tmpl);
    $tmpl   =   str_replace(' ', '&nbsp;', $tmpl);
    $tmpl   =   nl2br($tmpl);

    foreach ($tags as $tag => $class) {
        $tmpl   =   preg_replace('/(&lt;\/?'.$namespace.':'.$tag.'.*&gt;)/Ui', '<span class="'.$class.'">\1</span>', $tmpl);
        $tmpl   =   str_replace($namespace.':'.$tag, '##namespace##:'.$tag, $tmpl);
    }

    $tmpl   =   preg_replace('/(&lt;\/?'.$namespace.':.*&gt;)/Ui', '<span class="unknownTag">\1</span>', $tmpl);
    $tmpl   =   str_replace('##namespace##', $namespace, $tmpl);


    $tmpl = preg_replace('/(&lt;!--.*--&gt;)/msU', '<span class="comment">\1</span>', $tmpl);

    echo '<fieldset class="tmpl">';
    echo '<legend>Source of templates/'.$file.'</legend>';
    echo $tmpl;
    echo '</fieldset>';
}

?>
