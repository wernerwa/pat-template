<?php
/**
 * Definitions of all included examples
 *
 * @package     patTemplate
 * @subpackage  Examples
 * @author      Sebastian Mordziol <argh@php-tools.net>
 */

    $appName    =   'patTemplate';
    $mainDesc   =   'These examples show the functionality of '.$appName.' in detail. '
                .   'This overview lists all examples with a small description, and to '
                .   'navigate the examples, use the navigation on the left.';
    $sections   =   array(

        /**
         * examples of all tags
         */
        'Tags'  =>  array(
            'descr'     =>  'These examples demonstrate the tags that are supported by patTemplate.',
            'basename'  =>  'example_tags_',
            'pages'     =>  array(
                'tmpl' => array(
                    'title' =>  '&lt;patTemplate:tmpl/&gt;',
                    'descr' =>  'The template tag is the most important tag. It allows you to split your file into smaller parts.'
                ),
                'sub' => array(
                    'title' =>  '&lt;patTemplate:sub/&gt;',
                    'descr' =>  'The \'sub\' tag is used, when it comes to condition templates. It splits a template into smaller parts, that are addressed with the same name.'
                ),
                'link' => array(
                    'title' =>  '&lt;patTemplate:link/&gt;',
                    'descr' =>  'A link tag is used do duplicate a template, including all of its variables. It is similar to a symbolic link in the file system.',
                ),
                'var' => array(
                    'title' =>  '&lt;patTemplate:var/&gt;',
                    'descr' =>  'The var tag allows you to include a variable in a template. There are several advantages over using the {BRACES} syntax, like the ability to set a default value or a modifier.',
                ),
                'comment' => array(
                    'title' =>  '&lt;patTemplate:comment/&gt;',
                    'descr' =>  'The comment tag allows you to include documentation of your templates or HTML files that will not be displayed to the end user in the browser.',
                ),
            )
        ),

        /**
         * examples of important attributes
         */
        'Attributes'    =>  array(
            'descr'     =>  'These examples demonstrate important attributes of patTemplate.',
            'basename'  =>  'example_attributes_',
            'pages'     =>  array(
                'src' => array(
                    'title' =>  'src (tmpl)',
                    'descr' =>  'The src attribute allows you to split your HTML code into different files, so it is more reusable. Common practice is to move a header and footer into separate files and include them in your main templates.',
                    'templates' => array( 'example_attributes_src.tmpl', 'example_attributes_src_header.tmpl', 'example_attributes_src_main.tmpl',  'example_attributes_src_footer.tmpl' )
                ),
                'relative' => array(
                    'title' =>  'src and relative (tmpl)',
                    'descr' =>  'The relative attribute tells the reader you treat the path defined in the src attribute as a relative path from the current file',
                    'templates' => array( 'relative/example_attributes_relative.tmpl', 'relative/example_attributes_relative_header.tmpl', 'relative/example_attributes_relative_main.tmpl',  'relative/example_attributes_relative_footer.tmpl' )
                ),
                'unusedvars' => array(
                    'title' =>  'unusedvars (tmpl)',
                    'descr' =>  'The unused attribute is used to tell patTemplate, what it should do with variables that have no value assigned. You can leave them, remove them or replace them with whatever you like.'
                ),
                'whitespace' => array(
                    'title' =>  'whitespace (tmpl)',
                    'descr' =>  'The whitespace attribute is used to tell the reader, what it should do with whitespace characters.'
                ),
                'addsystemvars' => array(
                    'title' =>  'addsystemvars (tmpl)',
                    'descr' =>  'This attribute allows you to add special system variables, like the number of repetitions of a template.'
                ),
                'useglobals' => array(
                    'title' =>  'useglobals (tmpl)',
                    'descr' =>  'This attribute allows you to add use the value of a global variable for condition templates.'
                ),
                'varscope' => array(
                    'title' =>  'varscope (tmpl)',
                    'descr' =>  'This attribute allows you to fetch variables from any other template into the current template.'
                ),
                'varscope_multiple' => array(
                    'title' =>  'varscope (tmpl), with multiple templates',
                    'descr' =>  'You may also pass a comma-separated list of templates, which are used to populaute the current template.'
                ),
                'loop' => array(
                    'title' =>  'loop (tmpl)',
                    'descr' =>  'This attribute forces a template to be repeated, even if there are not enough rows to fill the data.'
                ),
                'limit' => array(
                    'title' =>  'limit (tmpl)',
                    'descr' =>  'This attribute prohibts the unlimited repetition of a template.'
                ),
                'rowoffset' => array(
                    'title' =>  'rowoffset (tmpl)',
                    'descr' =>  'This attribute determines at which number the PAT_ROW_VAR value will start.'
                ),
            )
        ),

        /**
         * The basic API
         */
        'API'   =>  array(
            'descr'     =>  'This section explains the basic API and shows how patTemplate is being used from PHP.',
            'basename'  =>  'example_api_',
            'pages'     =>  array(
                'readtemplatesfrominput' => array(
                    'title' =>  'readTemplatesFromInput()',
                    'descr' =>  'Reading templates from any input.',
                ),
                'addvar' => array(
                    'title' =>  'addVar() and addVars()',
                    'descr' =>  'This example shows how to add one or more variables to a template.',
                ),
                'addglobalvar' => array(
                    'title' =>  'addGlobalVar()',
                    'descr' =>  'This example shows how to add one or more variables to the global scope. Global variables will be replaced in all templates.',
                ),
                'addobject' => array(
                    'title' =>  'addObject()',
                    'descr' =>  'This examples shows how to add a PHP object to a template. All properties will be available as template variables.',
                ),
                'setattribute' => array(
                    'title' =>  'setAttribute()',
                    'descr' =>  'This example shows how to set an attribute. In this example, the visibility of a template is changed.',
                ),
                'parseintovar' => array(
                    'title' =>  'parseIntoVar()',
                    'descr' =>  'This example shows how to use the new parseIntoVar() method that allows you to parse a template and assign the result to another variable.',
                ),
                'cleartemplate' => array(
                    'title' =>  'clearTemplate()',
                    'descr' =>  'This example shows how to use clearTemplate() to clear one or more templates.'
                ),
                'displayparsedtemplate' => array(
                    'title' =>  'displayParsedTemplate()',
                    'descr' =>  'This example shows how to use displayParsedTemplate() with and without arguments.',
                    'templates' => array( 'example_api_displayparsedtemplate.tmpl', 'example_api_displayparsedtemplate2.tmpl' )
                ),
                'loadtemplate' => array(
                    'title' =>  'loadTemplate()',
                    'descr' =>  'This example shows how to use loadTemplate() to load a template after changing its source.',
                    'templates' => array( 'example_api_loadtemplate.tmpl', 'example_api_loadtemplate_main.tmpl' )
                ),
                'freetemplate' => array(
                    'title' =>  'freeTemplate()',
                    'descr' =>  'This example shows how to free a template to reuse the name and free up the memory used by it.',
                ),
                'placeholderexists' => array(
                    'title' =>  'placeholderExists()',
                    'descr' =>  'This example shows how to check, whether a designer included a placeholder in a template.',
                ),
            )
        ),

        /**
         * examples for the usage of different readers
         */
        'Readers'   =>  array(
            'descr'     =>  '',
            'basename'  =>  'example_reader_',
            'pages'     =>  array(
                'file_multiple' => array(
                    'title' =>  'File Reader',
                    'descr' =>  'The File reader reads patTemplate files. You may pass more then one template directory and patTemplate will look in all folders, when loading a new file.',
                ),
                'string' => array(
                    'title' =>  'String Reader',
                    'descr' =>  'The String Reader allows you to read templates from any variable by passing it a string. You can always use this to read from a custom source.',
                ),
                'it' => array(
                    'title' =>  'IT Reader',
                    'descr' =>  'The HTML_Template_IT reader allows you to read templates that have been created for HTML_Template_IT and use them like they would be patTemplate templates.',
                ),
                'db' => array(
                    'title' =>  'DB Reader',
                    'descr' =>  'The DB-Reader allows you to read your templates from any database that is supported by PEAR::DB',
                ),
                'combined' => array(
                    'title' =>  'Combining readers',
                    'descr' =>  'This example shows how to use more than one reader in the same script.',
                ),
            )
        ),

        /**
         * different template types
         */
        'Template Types'=>  array(
            'descr'     =>  'These examples give you an insight into the different types of templates',
            'basename'  =>  'example_type_',
            'pages'     =>  array(
                'standard' => array(
                    'title' =>  'Standard',
                    'descr' =>  'A standard template provides no extra functionality.',
                ),
                'oddeven' => array(
                    'title' =>  'OddEven',
                    'descr' =>  'An odd-even template allows you to define two sub-templates for alternating lists.',
                ),
                'modulo' => array(
                    'title' =>  'Modulo',
                    'descr' =>  'A modulo template allows you to define any number of sub-templates for alternating lists. It is similar to odd-even templates.',
                ),
                'modulo_empty' => array(
                    'title' =>  'Modulo (empty)',
                    'descr' =>  'A modulo template with no variables in it.',
                ),
                'modulo_single' => array(
                    'title' =>  'Modulo (one line)',
                    'descr' =>  'A modulo template with only one line and the special __single condition.',
                ),
                'condition' => array(
                    'title' =>  'Condition',
                    'descr' =>  'A condition template can be compared to if/then/else or switch/case statements in PHP. The output of the template depends on the value of a variable that has been passed.',
                ),
                'condition_variable' => array(
                    'title' =>  'Condition using a variable',
                    'descr' =>  'A condition template can also be used in conjunction with variables in the condition attribute. This allows you to build comparisons between two variables like $foo == bar.'
                ),
                'condition_onchange' => array(
                    'title' =>  'Using the onchange feature',
                    'descr' =>  'This example displays the special __onchange condition.'
                ),
                'simplecondition' => array(
                    'title' =>  'SimpleCondition',
                    'descr' =>  'A simpleCondition template will only be displayed to the user, if certain variables are set.'
                ),
            )
        ),

        /**
         * the new var tag
         */
        'Variables' =>  array(
            'descr'     =>  '',
            'basename'  =>  'example_var_',
            'pages'     =>  array(
                'modifier' => array(
                    'title' =>  'Applying modifiers',
                    'descr' =>  'Variable modifiers give the HTML designers more flexibility when the application adds variables to the template. You may either use any PHP function or custom objects as modifiers.',
                ),
                'modifier_default' => array(
                    'title' =>  'Default modifiers',
                    'descr' =>  'It is possible to set a default modifier on a per-template basis, which will be used for all variables inside the template that have no own modifier set.',
                ),
                'modifier_multiple' => array(
                    'title' =>  'Multiple modifiers',
                    'descr' =>  'It is possible to apply more than one modifier to a variable.',
                ),
                'modifier_short' => array(
                    'title' =>  'Short modifier syntax',
                    'descr' =>  'patTemplate provides an input filter that lets you use the short modifier syntax that you may know from using smarty: {VAR|htmlentities}. All you need to do is apply an InputFilter prior to loading the templates.',
                ),
                'modifier_placeholder' => array(
                    'title' =>  'Use placeholders as modifier parameter',
                    'descr' =>  'Make parameter of variable modifier dynamic!',
                ),
                'copyfrom' => array(
                    'title' =>  'The copyFrom attribute',
                    'descr' =>  'The copyFrom attribute allows the designer to add variables to a template and copy the value from any other variable.',
                ),
                'global' => array(
                    'title' =>  'Using global variables',
                    'descr' =>  'Global variables can be used, as well',
                ),
                'modifier_varscope' => array(
                    'title' =>  'Change the scope',
                    'descr' =>  'Apply variable modifier on variables in a different scope.',
                ),
                'default_function' => array(
                    'title' =>  'Using a function as default',
                    'descr' =>  'You may use any PHP function as a default value.',
                ),
            )
        ),

        /**
         * Input and output filters
         */
        'Filters'   =>  array(
            'descr'     =>  'Filters modify the templates either before they are read (InputFilter), or before they are sent to the browser (OutputFilter)',
            'basename'  =>  'example_filter_',
            'pages'     =>  array(
                'input_stripcomments' => array(
                    'title' =>  'InputFilter: Strip Comments',
                    'descr' =>  'Automatically strip all HTML comments from a template, before it is being analyzed by the reader.',
                ),
                'output_multiple' => array(
                    'title' =>  'Multiple output filters',
                    'descr' =>  'Setting multiple output filters; in this case, the '
                            .   'StripWhitespace and Gzip filters to minimize the content '
                            .   'sent to the browser.',
                ),
                'output_tidy' => array(
                    'title' =>  'Using the tidy output filter',
                    'descr' =>  'The Tidy outputfilter will clean up the resulting HTML code. Beware that ext/tidy needs to be installed.',
                ),
                'output_bbcode' => array(
                    'title' =>  'Using the BBCode output filter',
                    'descr' =>  'The BBCode output applies patBBCode to the result.',
                ),
                'output_per_template' => array(
                    'title' =>  'Filters per template',
                    'descr' =>  'This example shows how to use an output filter for only one template.',
                ),
            )
        ),

        /**
         * Template Caches
         */
        'Caches'    =>  array(
            'descr'     =>  'Caches are used to reduce the amount of time, patTemplate needs to prepare your output.',
            'basename'  =>  'example_cache_',
            'pages'     =>  array(
                'template_file' => array(
                    'title' =>  'TemplateCache',
                    'descr' =>  'The template cache caches the result of the reader, so your files will not have to be analyzed on every request. It speeds up your application.',
                ),
            )
        ),

        /**
         * Functions
         */
        'Functions' =>  array(
            'descr'     =>  'patTemplate Functions allow you to extend the functionality of the Reader. You are able to define your own patTemplate tags and provide PHP code to handle them.',
            'basename'  =>  'example_function_',
            'pages'     =>  array(
                'time' => array(
                    'title' =>  '&lt;patTemplate:Time/&gt;',
                    'descr' =>  'The Time function allows you to include the current date and time in your templates without the need for PHP code. Notice: This function is configured to be called while parsing the template because otherwise the result would be cached.',
                ),
                'strip' => array(
                    'title' =>  '&lt;patTemplate:Strip/&gt;',
                    'descr' =>  'The strip function removes unnecessary whitespace inside blocks of template code.',
                ),
                'translate' => array(
                    'title' =>  '&lt;patTemplate:Translate/&gt;',
                    'descr' =>  'A simple function that helps you maintain templates for multi-lingual websites.',
                ),
                'phphighlight' => array(
                    'title' =>  '&lt;patTemplate:phpHighlight/&gt;',
                    'descr' =>  'This example shows the usage of the php highlighter.',
                ),
                'highlight' => array(
                    'title' =>  '&lt;patTemplate:Highlight/&gt;',
                    'descr' =>  'This example shows the generic highlighter that uses PEAR::Text_Highlight.',
                ),
                'call' => array(
                    'title' =>  '&lt;patTemplate:Call/&gt;',
                    'descr' =>  'This shows you how to re-use templates to build a site independent of your design, templates in a templating engine, so to speak.',
                ),
                'call_autoload' => array(
                    'title' =>  '&lt;patTemplate:Call/&gt; autoload',
                    'descr' =>  'This shows how components can be loaded at runtime, by following some naming conventions.',
                ),
                'attribute' => array(
                    'title' =>  '&lt;patTemplate:Attribute/&gt;',
                    'descr' =>  'The attribute function allows you to change the attribute value of the parent tag at runtime. This allows you to include return values of any custom function to the attribute collection of any tag.',
                ),
                'aliases' => array(
                    'title' =>  'Using function aliases',
                    'descr' =>  'It is possible to define aliases for functions.',
                ),
                'default' => array(
                    'title' =>  'Setting a default function',
                    'descr' =>  'It is possible to set a default, that is used for unknown functions.',
                ),
                'conditional' => array(
                    'title' =>  'Conditional use of template functions',
                    'descr' =>  'This demonstrates the conditional use of templating functions. These are only called, if the conditions apply.'
                ),
                'param' => array(
                    'title' =>  'Passing params to template functions',
                    'descr' =>  'This demonstrates how you can pass parameters to template functions, that are interpreted in runtime.'
                )

            )
        ),

        /**
         * Dumps
         */
        'Dump'  =>  array(
            'descr'     =>  'The patTemplate Dump aids you in debugging your templates and application.',
            'basename'  =>  'example_dump_',
            'pages'     =>  array(
                'dhtml' => array(
                    'title' =>  'DHTML',
                    'descr' =>  'The DHTML dump is the default Dump of patTemplate. It outputs nice DHTML that gives you insight into the loaded templates and variables.',
                ),
            )
        ),

        /**
         * Misc features
         */
        'Misc'  =>  array(
            'descr'     =>  'This section explains miscellaneous features of patTemplate, that did not fit into any of the other categories.',
            'basename'  =>  'example_misc_',
            'pages'     =>  array(
                'maintainbc' => array(
                    'title' =>  'Backwards compatibility',
                    'descr' =>  'The backwards compatibility of patTemplate 3.0 can be switched off. This examples shows you how it can be done.',
                ),
                'namespace' => array(
                    'title' =>  'Changing the namespace',
                    'descr' =>  'As typing <patTemplate:tmpl/> all the time can get quite annoying, patTemplate allows you to change its namespace to whatever you like.',
                ),
                'dotsyntax' => array(
                    'title' =>  'The Dot-Syntax',
                    'descr' =>  'If you are referencing a variable (as conditionvar or in a copyFrom attrribute) you may always reference to a variable of any other templates by using the Dot-Syntax.',
                ),
                'autonaming' => array(
                    'title' =>  'Auto-naming',
                    'descr' =>  'Since patTemplate 3.0 you do not need to assign a unique name to all templates. If you ommitt the name attribute, patTemplate will set the name automatically.',
                ),
                'quote' => array(
                    'title' =>  'Quoting variables',
                    'descr' =>  'This is needed to include content in your resulting pages that look like template variables.',
                ),
            )
        ),

        /**
         * Real-life examples
         */
        'The Real World'    =>  array(
            'descr'     =>  'This section shows some real-life examples of patTemplate.',
            'basename'  =>  'example_realworld_',
            'pages'     =>  array(
                'list' => array(
                    'title' =>  'Creating a list',
                    'descr' =>  'This is an example that displays how easy it is to create a list from an array containing associative arrays like it is returned from PEAR::DB.',
                ),
                'table' => array(
                    'title' =>  'Creating a table',
                    'descr' =>  'This is an example that displays how easy it is to create a table from a two-dimensional array. And as we are creating HTML, patTemplate also takes care of HTML entities. There\'s only one line of PHP code needed.',
                ),
                'changesource' => array(
                    'title' =>  'Dynamic includes',
                    'descr' =>  'This shows how to dynamically include a template by changing the source. It is important to to set the "autoload" to off.',
                ),
                'img' => array(
                    'title' =>  'Creating an HTML image',
                    'descr' =>  'This is an example of a variable modifier that is used to create HTML image tags and automatically includes the width and height of the specified image.',
                ),
                'hiddenvar' => array(
                    'title' =>  'Fun with vars',
                    'descr' =>  'This example combines the copyFrom and modifier attributes of a var tag and adds the hidden attribute.',
                ),
                'i18n' => array(
                    'title' =>  'Multi-language sites',
                    'descr' =>  'This example uses the experimental <patTemplate:Translate/> tag to create multi-language files.',
                    'alias' =>  'example_function_translate'
                ),
                'expression' => array(
                    'title' =>  'Using the Expression modifier',
                    'descr' =>  'If you check for more complicated expressions than \'equals\', you may use the expression modifier. It allows you to specify any expression plus two return values, one for true and one for false',
                ),
                'paginate' => array(
                    'title' =>  'Paginated list',
                    'descr' =>  'This shows, you you may rape patTemplate to build a paginated list from any datasource by only using patTemplate. If you fully grasp how this works, you\'ve mastered patTemplate :)',
                ),
                'nestedvars' => array(
                    'title' =>  'Nested variables',
                    'descr' =>  'This shows, how to assign a variable to a variable.',
                ),
            )
        ),

        /**
         * examples for the compiler
         */
        'Compiler'  =>  array(
            'descr'     =>  '',
            'basename'  =>  'example_compiler_',
            'pages'     =>  array(
                'display' => array(
                    'title' =>  'Test example',
                    'descr' =>  'The compiler is *experimental* so you must not use it in your projects. This is only for testing purposes.',
                    'tabs'  =>  array(
                                    'compSource' => array(
                                                            'title' => 'Compiled Template',
                                                            'type'  => 'phpsource',
                                                            'file'  => 'compiledTemplates/example1.php'
                                                        )
                                    )
                ),
            )
        ),

        /**
         * examples of variable modifier
         */
        'Variable Modifier'  =>  array(
            'descr'     =>  '',
            'basename'  =>  'example_modifier_',
            'pages'     =>  array(
                'calc' => array(
                    'title' =>  'Calc',
                    'descr' =>  'Pocket Calculator and mini-Excel :-)',
                ),
                'sizeformat' => array(
                    'title' =>  'Sizeformat',
                    'descr' =>  'Make file size more human readable',
                ),
                )
        ),
    );
