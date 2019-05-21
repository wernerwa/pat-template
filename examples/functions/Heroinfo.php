<?php
/**
 * patTemplate-function for script-tags
 *
 * @package     patTemplate
 * @subpackage  Functions
 * @author      Timo Holzherr <tholzherr@nero.com>
 */

/**
 * this templating-function provides the possibility to
 * correctly insert script-tags to templates
 *
 * please always use this instead of <script type=".."></script>
 *
 * The benefit of using this is that page impressions' JS can be
 * executed at the right time  => onload, code
 *
 *
 * @version     1.0.0
 * @package     patTemplate
 * @subpackage  Functions
 */
class patTemplate_Function_Heroinfo extends patTemplate_Function
{
    /**
     * name of the function
     * @access   private
     * @var      string
     */
    public $_name  =   'Script';


    public $_type = PATTEMPLATE_FUNCTION_RUNTIME;

    /**
     * call the function
     *
     * @access   public
     * @param    array   parameters of the function (= attributes of the tag)
     * @param    string  content of the tag
     * @return   string  content to insert into the template
     */
    public function call($params, $content)
    {
        $info = array(
            'spiderman'     =>    array(
                'image'  => 'http://stockimg.free.fr/wallpaperlinks/divx/cinema/spiderman.jpg',
                'series' => 'Marvel Comics'
            ),
            'batman'        =>    array(
                'image'     =>    'http://www.andysmithart.com/images/Batman-color.jpg',
                'series'    =>    'Detective Comics'
            ),
            '__default'     =>    array(
                'image'     =>    'http://www.olsn.ca/downloads/tdsrc/clipart/superhero.jpg',
                'series'    =>    '- no series -'
            )

        );
        if (! isset($params['name'])) {
            return '';
        }

        $name = $params['name'];
        if (! isset($info[$name])) {
            $oldName = $name;
            $name = '__default';
            $info[$name]['series'] = 'No series found for <em>' . $oldName . '</em>.';
        }

        return '<h1>Comic Series: ' . $info[$name]['series'] . '</h1><br /><img src="' . $info[$name]['image'] . '" alt="' . $name . '" />';
    }
}
