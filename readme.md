# patTemplate Introduction

patTemplate helps you separating the business logic from the layout and the content of your websites.

Using patTemplate, you will no more embed PHP code directly in your HTML code. Instead you will insert placeholders in your HTML documents, which will be replaced by the actual computed values by your PHP application.

The wiki is archived at <https://web.archive.org/web/20150505033634/http://trac.php-tools.net/patTemplate/wiki/Docs>

patTemplate works with PHP 5.1-7.4

## patTemplate for the designer

patTemplate offers you XML-based markup tags to access different parts of your layout files so you can hide, exchange or even repeat parts. This means, that your HTML-designers will need to learn some new tags and their usage. However they do **not** need to learn a new programming language. In contrast to other template engines, patTemplate takes a declarative approach for the template tags, you will not find any `if/else` statements or `for`-loops in the templates.

## patTemplate for the developer

If your designer is familiar with the patTemplate syntax, you will have to learn the PHP-API of patTemplate in order to assign the actual values of the placeholders to the template. If you are an experienced PHP developer you will easily grasp the API, as you will not need to learn a lot of new methods.

# Getting Started

patTemplate allows you to split a page into several blocks, called *templates*. It requires you to at least specify one block that contains the complete page, the *root* template. Inside this template, you may nest as many templates, as you like. Each of these templates should have its unique name, so it can be addressed from your PHP application. To mark a template in your page, you need to enclose the HTML code in a `<patTemplate:tmpl/>` tag:

```xhtml
<patTemplate:tmpl name="page">
  This is the main page.
  <patTemplate:tmpl name="foo">
    It contains another template.
  </patTemplate:tmpl>
  <patTemplate:tmpl name="bar">
    And one more.
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

Loading this template from a file is easy. You only need to create a new instance of `patTemplate` and pass the filename to the `readTemplatesFromInput` method:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('my-templates.tmpl');
```

patTemplate will now open the file *my-templates.tmpl* and scan it for `<patTeamplate:tmpl/>` tags. It will create a structure like this:

```
+ page
  + foo
  + bar 
```

If you want to send the HTML content to the browser, you need to call the `displayParsedTemplate()` method and pass the name of the template to display:

```php
$tmpl->displayParsedTemplate('page');
```

When parsing and displaying a template, all nested templates will be displayed as well. So calling this method will display:

```
  This is the main page.
    It contains another template.
    And one more.
```

If you do not want to echo the HTML code, but store it in a PHP variable, you may call `getParsedTemplate()` instead. If you do not pass the name of a template to `displayParsedTemplate()` or `getParsedTemplate()`, patTemplate will display the root template (i.e. the first template it read after creating the patTemplate object).

## Chosing a directory for your templates

You will certainly not put your template files into the root directory of your webspace, but rather in a folder called *templates* or something similar. If you do not want to specify the full path to the files for every call to `readTemplatesFromInput()` you may use the `setRoot()` method:

```php
$tmpl = new patTemplate();
$tmpl->setRoot('/path/to/templates');
$tmpl->readTemplatesFromInput('my-template.tmpl');
```

This example will load the templates from the file */path/to/templates/my-template.tmpl*.

The following pages will show you, how to add variables, or use different template types in your pages.

# Adding variables to the template

Variables are placeholders in your templates that you may assign any
value from your PHP application.

There are two types of variables in patTemplate:

1. Local variables, that are only available in the template that they have been added to
2. Global variables, that are available in all templates`

To place a variable in a template, you need to enclose the variable in
curly braces. Variables may only consist of uppercase letters, number,
dashes and the uderscore:

```xhtml
<patTemplate:tmpl name="page">
  Hello {NAME}.<br/>
</patTemplate:tmpl>
```

This template contains a variable called } that you may assign a value
from your application.

## Adding a local variable with addVar()

When adding a local variable, you have to use the `addVar()` method and pass the
name of the template, where you want to add variable, the name of the
variable as well as the value you want to assign:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('my-template.tmpl');
$tmpl->addVar('page', 'NAME', 'Stephan');
$tmpl->displayParsedTemplate();
```
This script will display:

```
Hello Stephan.
```

Instead of a string, you may also pass an array containing several
values. In this case, patTemplate will repeat the template to which the
variable has been assigned for each entry on your array. Change only one
line of code to add more than one name:

```php
$tmpl->addVar('page', 'NAME', array('Stephan', 'Sebastian'));
```
Now the script will display:

```
Hello Stephan.
Hello Sebastian.
```

No need to create a for loop, neither in your PHP application, nor in
your template file.

### Adding several variables at once with addVars()

A template need not only contain one variable, it can contain as many of
them, as you like:

```xhtml
<patTemplate:tmpl name="page">
  {GREETING} {NAME}.<br/>
</patTemplate:tmpl>
```

Instead of two calls to `addVar()` you may also pass an associative array to the `addVars()`
method:

```php
$vars = array(
    'GREETING' => 'Guten Tag',
    'NAME'     => 'Stephan'
);
$tmpl->addVars('page', $vars);
```

This will add two variables (GREETING and NAME) to the template *page* and display:

```
Guten Tag Stephan.
```

It is also possible to assign more than one value to a variable using `addVars()`:


```php
$vars = array(
    'GREETING' => array('Guten Tag', 'Bonjour'),
    'NAME'     => array('Stephan', 'Sebastian')
);
$tmpl->addVars('page', $vars);
```
This will display:

```
Guten Tag Stephan.
Bonjour Sebastian.
```

If you assign an array to one variable and a string to the other,
patTemplate will use the same string for each iteration:

```php
$vars = array(
    'GREETING' => 'Hello',
    'NAME'     => array('Stephan', 'Sebastian')
);
$tmpl->addVars('page', $vars);
```

This example will display:

```
Hello Stephan.
Hello Sebastian.
```

### Adding rows of variables with addRows()

Often, you are confronted with record sets in the following structure:

```php
$data = array(
    array('name' => 'Stephan Schmidt', 'id' => 'schst'),
    array('name' => 'Sebastian Mordziol', 'id' => 'argh'),
    array('name' => 'Gerd Schaufelberger', 'id' => 'gerd')
);
```

If you want to create an HTML-table containing this information, you
can use the `addRows()` method and the following template:

```xhtml
<patTemplate:tmpl name="page">
<table>
  <tr>
    <th>User-Id</th>
    <th>Name</th>
  </tr>
  <patTemplate:tmpl name="entry">
  <tr>
    <td>{USER_ID}</td>
    <td>{USER_NAME}</td>
  </tr>
  </patTemplate:tmpl>
</table>
</patTemplate:tmpl>
```

This page consists of two templates, the root template (*page*) and
template, that should be repeated for each record set in your array
(*entry*). To build a list containing all record sets, you only need to
call one method:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('my-template.tmpl');
$tmpl->addRows('entry', $data, 'USER_');
$tmpl->displayParsedTemplate();
```

The  method accepts three arguments:

* The name of the template
* An array containing all record sets
* An optional prefix for the variable names

The  method is perfectly suited to create lists from database result
sets, like they are returned by [PEAR DB's getAll()](http://pear.php.net/manual/en/package.database.db.db-common.getall.php)
method.

### Adding objects with addObject()

Instead of using an associative array, you may also work with an object
instead.

Imagine, you are using the following class in your application:

```php
class User {
    public $id;
    public $name;
    
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
}
```

And you created a template to display user information:
```xhtml
<patTemplate:tmpl name="user-info">
<table>
  <tr>
    <th>Id:</th>
    <td>{USER_ID}</td>
  </tr>
  <tr>
    <th>Name:</th>
    <td>{USER_NAME}</td>
  </tr>
</table>
</patTemplate:tmpl>
```

You may now pass instance of the `User` class directly to the template:

```php
$schst = new User('schst', 'Stephan Schmidt');

$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('user-info.tmpl');
$tmpl->addObject('user-info', $schst, 'USER_');
```

This will display:

```
Id:   schst
Name: Stephan Schmidt
```
patTemplate will extract all properties that are marked as `public` and add them to the specified template while
prefixing them as you have seen in the `addRows()` example. If you do not want to declare your properties as `public`,
you may as well implement a `getVars()` method in your class that returns an associative array containing the variables
that should be added to the template:

```php
class User {

    private $id;
    private $name;
    
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    
    /**
    * This method will be invoked by patTemplate if the
    * object is passed to addObject()
    */
    public function getVars() {
        return array(
            'id'   => $this->id,
            'name' => $this->name
        );
    }
}
```

The result will be exactly the same.

## Adding global variables with addGlobalVar() and addGlobalVars()

If you want to use a variable in every template block of a page, it can get cumbersome to use any of the above methods
to add this variable to every template. Instead, you may use the methods `addGlobalVar()` or `addGlobalVars()` to add
the variable to *every* template in your page:

The variable `{NOW}` may now be used in all of your templates:

There are two differences between the methods for local and global
variables:

1. The global methods **do not** need the template name as the first parameter.
2. The global methods **do not** accept an array as values of variables.

If a variable-name is used globally and locally, the local variable has
precedence.

## Further Reading

For more information on variables you might want to read:

* [Setting default values](https://web.archive.org/web/20141220075623/http://trac.php-tools.net/patTemplate/wiki/Docs/Variables/DefaultValue)
* [Accessing variables from other templates](https://web.archive.org/web/20141220075623/http://trac.php-tools.net/patTemplate/wiki/Docs/Variables/DotSyntax)  
* [Variable Modifiers](https://web.archive.org/web/20141220075623/http://trac.php-tools.net/patTemplate/wiki/Docs/Advanced/Modifiers)

# Setting Default Values for Variables

When using the `<patTemplate:var/>` tag to include a variable in a template, it is possible to specify a default value, that will be used when no value is assigned to this variable from PHP. This can be achieved using the `default` attribute:

```xhtml
<patTemplate:tmpl name="page">
  Hello <patTemplate:var name="user" default="Guest"/>.
</patTemplate:tmpl>
```

As long, as no value is assigned to the variable `user`, this page will display:

```
Hello Guest.
```

## Using the return value of a function

Since revision [438] (or patTemplate 3.1.0a3), it is possible to specify a PHP function or a static method that will be used to generate the default value for the variable. Again, the `default` attribute can be used:

```
<patTemplate:tmpl name="page">
  The current time is <patTemplate:var name="timestamp" default="time()"/>.
</patTemplate:tmpl>
```

This way you can include the current UNIX timestamp without having to write PHP code. As this poses a security risk (your template designers my call any PHP function), you have to enable this feature, so it can be used in the templates:

```php
$tmpl = new patTemplate();
$tmpl->setOption('allowFunctionsAsDefault', true);
```

To call a static method instead of a function, you need to specify the class name and the method name, separated by two colons:

```xhtml
<patTemplate:tmpl name="page">
  The current time is <patTemplate:var name="timestamp" default="MyClass::getTime()"/>.
</patTemplate:tmpl>
```

The functions and methods will be evaluated, when the template is read from the file. You are not able to access the value of the variable from this function. This is what [variable modifiers](https://web.archive.org/web/20141220114048/http://trac.php-tools.net/patTemplate/wiki/Docs/Advanced/Modifiers) should be used for.

# Accessing variables from other templates #

There are two situations, in which you may want to access the variables from any other template:

 1. Display the value of the variable
 2. Use the value as a condition for a condition template

In both situations, you can use the *dot-syntax* to solve the problem.

## Importing variables from other templates ##

To import one variable from a different template into the current template, you must use the `<patTemplate:var/>` tag with the `copyFrom` attribute:

PHP-Code:
```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('myPage.tmpl');
$tmpl->addVar('header', 'TITLE', 'Page title');
$tmpl->displayParsedTemplate();
```

Template:
```xhtml
<patTemplate:tmpl name="page">
  <patTemplate:tmpl name="header">
  <head>
    <title>{TITLE}</title>
  </head>
  </patTemplate:tmpl>

  <patTemplate:tmpl name="footer">  
    <div>
      <small><patTemplate:var name="copiedVar" copyFrom="header.TITLE"/></small>
    </div>
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

In the above example, we are importing the variable `TITLE` from the template `header` into the template `footer` and name the imported value `copiedVar`. We could also apply a [variable modifier](https://web.archive.org/web/20141220114113/http://trac.php-tools.net/patTemplate/wiki/Docs/Advanced/Modifiers) to the copied variable. Since revision [437] it is also possible to use `__parent.VARNAME` to fetch any variable from the parent template without specifying the name of the template.


## Using the dot-syntax in conditions ##

When creating a [condition template](https://web.archive.org/web/20141220114113/http://trac.php-tools.net/patTemplate/wiki/Docs/Templates/Condition) you may use the *dot-syntax* in the `conditionVar` attribute:

```xhtml
<patTemplate:tmpl name="page">
  <patTemplate:tmpl name="header">
  <head>
    <title>{TITLE}</title>
  </head>
  </patTemplate:tmpl>

  <patTemplate:tmpl name="footer" type="condition" conditionVar="header.TITLE">
    <patTemplate:sub condition="Homepage">
      Display on the homepage.
    </patTemplate:sub>
    <patTemplate:sub condition="__default">
      Display on all other pages.
    </patTemplate:sub>
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

The output of the `footer` template will now depend on the value you assign to the variable `TITLE` of the `header` template.

# Creating templates #

patTemplate allows you to split a page into several blocks, called *templates*. It requires you to at least specify one block that contains the complete page, the *root* template. Inside this template, you may nest as many templates, as you like. Each of these templates should have its unique name, so it can be addressed from your PHP application. To mark a template in your page, you need to enclose the HTML code in a `<patTemplate:tmpl/>` tag:

```xhtml
<patTemplate:tmpl name="page">
  This is the main page.
  <patTemplate:tmpl name="foo">
    It contains another template.
  </patTemplate:tmpl>
  <patTemplate:tmpl name="bar">
    And one more.
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

Loading this template from a file is easy:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('my-templates.tmpl');
```

patTemplate will now open the file *my-templates.tmpl* and scan it for `<patTeamplate:tmpl/>` tags. It will create a structure like this:

```
+ page
  + foo
  + bar 
```

If you want to send the HTML content to the browser, you need to call the `displayParsedTemplate()` method and pass the name of the template to display:

```php
$tmpl->displayParsedTemplate('page');
```

When parsing and displaying a template, all nested templates will be displayed as well. So calling this method will display:

```
  This is the main page.
    It contains another template.
    And one more.
```

If you do not want to echo the HTML code, but store it in a PHP variable, you may call `getParsedTemplate()` instead. If you do not pass the name of a template to `displayParsedTemplate()` or `getParsedTemplate()`, patTemplate will display the root template (i.e. the first template it read after creating the patTemplate object).


## Chosing a directory for your templates ##

You will certainly not put your template files into the root directory of your webspace, but rather in a folder called *templates* or something similar. If you do not want to specify the full path to the files for every call to `readTemplatesFromInput()` you may use the `setRoot()` method:

```php
$tmpl = new patTemplate();
$tmpl->setRoot('/path/to/templates');
$tmpl->readTemplatesFromInput('my-template.tmpl');
```

This example will load the templates from the file */path/to/templates/my-template.tmpl*.

patTemplate also allows you to read the templates not only from the file system, but virtually [wiki:Docs/Advanced/Reader any data source].


## Further reading ##

Of course, this is not all the functionality that patTemplate provides. patTemplate provides different *types* of templates, that come with different functionality:

 * The [wiki:Docs/Templates/SimpleCondition simpleCondition] template allows you to emulate an `if` statement.
 * The [wiki:Docs/Templates/Condition condition] template allows you to emulate `if/else` and `switch/case` statements.
 * The [wiki:Docs/Templates/Modulo modulo] template allows you to create templates to represent alternating lists.

Besides the `tmpl` tag there are [wiki:Docs/TagReference several other tags] and it is even possible to [wiki:Docs/Developer/CustomFunctions create your own tags].

# The !SimpleCondition template #

In nearly every application, there will be parts of the HTML frontend, that should only be displayed, if a certain information is available. One example could be a box, that displays information about the currently logged in user. It makes no sense, to display this box, if no user is logged in.

patTemplate helps you achieving this, by providing the *simpleCondition template*.

Take a look at the following template:

```xhtml
<patTemplate:tmpl name="page">
  Here is your main content.

  <patTemplate:tmpl name="user-info">
    <div id="userInfo">
      Logged in as {USER_NAME} ({USER_ID}).
    </div>
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

To add user information to this page, you need to use the `addVars()` method, like the following code snippet shows:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('my-template.tmpl');
if (userIsLoggedIn()) {
  $user = array(
             'ID'   => getUserId(),
             'NAME' => getUserName()
          );
  $tmpl->addVars('user-info', $user, 'USER_');
}
```

The problem is, that if there is no user logged in, that the HTML code for the user info box will still be displayed. This can easily be changed, by adding two attributes to the `<patTemplate:tmpl/>` tag:

```xhtml
<patTemplate:tmpl name="page">
  Here is your main content.

  <patTemplate:tmpl name="user-info" type="simpleCondition" requiredVars="USER_ID">
    <div id="userInfo">
      Logged in as {USER_NAME} ({USER_ID}).
    </div>
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

By setting the `type` attribute to `simpleCondition` you are emulating an `if`-condition. The attribute `requiredVars` allows you to specify a variable that must be assigned a non-empty value in order for the template to be displayed. By setting this attribute to `USER_ID` you can force this template to be hidden, if no user-id has been passed.


## Specifying more than one variable ##

It is also possible to specify more than one variable. In this case you have to set the attribute value to a comma-separated list of variable names. If any of the variables has a non-empty value, the template will be displayed:

```xhtml
<patTemplate:tmpl name="page">
  Here is your main content.

  <patTemplate:tmpl name="user-info" type="simpleCondition" requiredVars="USER_ID,USER_NAME">
    <div id="userInfo">
      Logged in as {USER_NAME} ({USER_ID}).
    </div>
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

In this example, the user-info box will be displayed, if either the username or the userid has been set.


## Using global variables ##

If you want to display the userid and username in different places in your template, you might want to add it globally:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('my-template.tmpl');
if (userIsLoggedIn()) {
  $user = array(
             'ID'   => getUserId(),
             'NAME' => getUserName()
          );
  $tmpl->addGlobalVars($user, 'USER_');
}
```

By ddefault, the *simpleCondition template* will check, whether the variable has been asigned **locally**. This can be changed, by setting the the `useGlobals` attribute to `true`:

```xhtml
<patTemplate:tmpl name="page">
  Here is your main content.

  <patTemplate:tmpl name="user-info" type="simpleCondition" requiredVars="USER_ID" useGlobals="true">
    <div id="userInfo">
      Logged in as {USER_NAME} ({USER_ID}).
    </div>
  </patTemplate:tmpl>
</patTemplate:tmpl>
```


## Specifying a required value ##

It is not only possible to check, whether a variable has a non-empty value, but also to check, whether you assigned a specific value to a variable. Take a look at the following template:

```xhtml
<patTemplate:tmpl name="page">
  Here is your main content.

  <patTemplate:tmpl name="admin-options">
    <div id="userInfo">
      Admin-Options:<br/>
       - Delete page<br/>
       - Edit page<br/>
    </div>
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

The template *admin-options* should only be displayed, if the currently logged in user is an admin. So we change the PHP code, to pass this information to the template globally:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('my-template.tmpl');
if (userIsLoggedIn()) {
  $user = array(
             'ID'   => getUserId(),
             'NAME' => getUserName(),
             'TYPE' => getUserType()
          );
  $tmpl->addGlobalVars($user, 'USER_');
}
```

The `getUserType()` function should return either `admin` or `user` depending on the status of the currently logged in user. So it is not sufficient to only check, whether the `USER_TYPE` variable is set at all, but you need to check, whether it is set to `admin`. This can be easily accomplished:

```xhtml
<patTemplate:tmpl name="page">
  Here is your main content.

  <patTemplate:tmpl name="admin-options" type="simpleCondition" requiredVars="USER_TYPE=admin">
    <div id="userInfo">
      Admin-Options:<br/>
       - Delete page<br/>
       - Edit page<br/>
    </div>
  </patTemplate:tmpl>
</patTemplate:tmpl>
```

This feature can be combined with the previously discussed feature that allowed you to specify more than one required variable.

# The Condition Template #

The *simpleCondition template* allows you to emulate a simple `if`-clause without the `else`-block. If that is not sufficient for your task, you may find the *condition template* helpful. It allows you to include full-fledged `switch/case`-blocks in your templates.


## Predefined conditions ##


## Using variables as a condition ##

Adding comments to templates

If your templates get more complex, you might want to document what you are doing, so it is easier for other developers or designers to comprehend the template structure. Of course you could just add simple HTML-comments to the templates, but these would be sent to the browser when displaying the page, which would result in additional traffic, although the information is not needed by the client.

To avoid this, patTemplate provides the `<patTemplate:comment/>` tag. All data inside this tag will be ignored when the page is displayed:

```xhtml
<patTemplate:tmpl name="page">
  <patTemplate:comment>
    You may place any content here, that documents the page template.
  </patTemplate:comment>
  Content of the template goes here...
</patTemplate:tmpl>
```

When reading and displaying this template, the result will be:

```
Content of the template goes here...
```

Using the comment tag has another advantage. Although the data inside the comment tags will not be displayed, patTemplate will read and interpret it. When debugging your templates? with the dump() method, the comments will be displayed next to the templates, that contained them. 

# Using options #

patTemplate allows you to influence its behaviour by setting several of its options. To set an option, the `setOption` method can be used. It accepts two arguments:
 1. The name of the option
 2. The value of the option

Example:

```php
$tmpl = new patTemplate();
$tmpl->setOption('allowFunctionsAsDefault', true);
```


## Available options ##

The following table shows all available options:

|| **Option** || **Description** || **Possible values** ||
|| maintainBc || Whether patTemplate should maintain backwards compatibility to version 2.x. If set to `true` you may use *empty* and *default* in `<patTemplate:sub/>` tags instead of *!__empty* and *!__default* || `true` or `false` ||
|| defaultFunction || Name of the template function (i.e. user defined tag) that should be called if an unknown tag is encountered || any string ||
|| allowFunctionsAsDefault || Whether it is allowed to specify a PHP function as a defaul value for variables. ||  `true` or `false` ||

# Advanced features #

patTemplate offers a lot more than just replacing placeholders in an HTML template.

Here you will find tutorials on the more sophisticated features:
 * [wiki:Docs/Advanced/Modifiers Variable Modifiers]
 * [wiki:Docs/Advanced/TemplateCache Improving performance with template caches]
 * [wiki:Docs/Advanced/OutputFilters Output Filters]
 * [wiki:Docs/Advanced/InputFilters Input Filters]
 * [wiki:Docs/Advanced/External Including external templates]

# Reading templates from various data sources #

patTemplate is not limited to reading templates from the file system, but uses a driver based approach to read templates from virtually anywhere.

This driver-based approach has two benefits:
 1. Templates can be read from any data source
 1. Different drivers may parse a different template format

A driver to read templates is called a *template reader*. Currently, the following [source:trunk/patTemplate/Reader/ readers] are available:
 * *String*, reads templates from a string, can be used when your templates are created at runtime.
 * *File*, reads templates from one or more files. This is the default reader.
 * *DB*, reads templates from any database that is supported by [http://pear.php.net/package/DB PEAR::DB]
 * *IT*, reads templates in the [http://pear.php.net/package/HTML_Template_IT HTML_Template_IT] format from the filesystem

The reader to use can be specified when `parseTemplatesFromInput()` is called:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('MyTemplates.tmpl', 'File');
```

If you want to use the file reader, the reader name is optional.


## Reading templates from file ##

Reading templates from a file is the most common task. You may use the `setRoot()` method to specify one or more folders, where the templates are located.

```php
$tmpl = new patTemplate();
$tmpl->setRoot('/path/to/templates', 'File');
$tmpl->readTemplatesFromInput('myTemplate.tmpl');
```


## Reading templates from a string ##

Reading a template from a string might be helpful, when you need to read a template from a source, that is not supported by patTemplate and implementing a new reader would be overkill.

All you need to do is pass the template source to the `readTemplatesFromInput()` method:

```php
$string = '<patTemplate:tmpl name="string">This template has been parsed from a string `<patTemplate:tmpl name="too">`, as well as this.</patTemplate:tmpl></patTemplate:tmpl>';

$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput( $string, 'String' );
```


## Reading templates from a database ##

When reading your templates from a database, the [http://pear.php.net/package/DB PEAR::DB] abstraction layer will be used. You need to pass the [http://pear.php.net/manual/en/package.database.db.intro-dsn.php DSN] string to the `setRoot()` method:

```php
tmpl = new patTemplate();
$tmpl->setRoot('mysql://root:@localhost/test', 'DB');
```

Imagine, your templates are stored in a table called *templates* that has to fields:
 * `id`, unique id for a template
 * `content`, a text field containing the actual template

If you want to read a template called *foo* from the database, you may use to different ways. One would be passing the SQL statement to the `readTemplatesFromInput()` method:

```php
$tmpl->readTemplatesFromInput("SELECT content FROM templates WHERE id='foo'", 'DB');
```

However, if your table is that simple, you can let the reader build the query for you and use an XPath-like syntax:

```php
$tmpl->readTemplatesFromInput('templates[@id=foo]/@content', 'DB');
```

This string consists of the following parts:

```php
$table[@$keyName=$keyValue]/@$templateField
```


## Reading HTML_Template_IT templates ##

The *IT* reader allows you to read templates in the [http://pear.php.net/manual/en/package.html.html-template-it.intro.php HTML_Template_IT or PHPLib] syntax. The reader itself works exactly like the *File* reader.

# Using variable modifiers #

Variable modifiers allow the template designer to modify the values that have been passed from PHP before they will be displayed to the browser.

Imagine the following PHP script:

```php
<?php
$tmpl = new patTemplate();
$tmpl->setRoot('templates');
$tmpl->readTemplatesFromInput('modifier.tmpl');
$tmpl->addVar( 'page', 'multiline', 'This contains
some
line
breaks...' );
$tmpl->addVar( 'page', 'birthday', '1974-05-12' );

$tmpl->displayParsedTemplate();
```

The business-logic adds two values to the template, but both of them are quite problematic:
 * The `multiline` variable contains linebreaks, which are not visible in HTML
 * The `birthday` variable probably does not have the preferred format.

Both problems can be solved in the template alone:

```xhtml
<patTemplate:tmpl name="page">
  Apply a modifier to multiline:
  <patTemplate:var name="multiline" modifier="nl2br" modifierType="php"/>

  Dateformat modfifier:<br />
  <patTemplate:var name="birthday" modifier="dateformat" format="%d.%m.%Y"/>
</patTemplate:tmpl>
```

There are two ways variable modifiers can be used:
 * You can specify **any** PHP function that accepts a string as its sole parameter and also returns a value. The returned value will be used as the value in the template.
 * You may use any of the provided modifiers that ship with the patTemplate distribution. Take a look at the [source:trunk/patTemplate/Modifier/ patTemplate/Modifier] directory to see, which modifiers we provide.

If none of the modifiers included in the dsitribution solves your problem, you can easily [wiki:Docs/Developer/Modifiers write a new modifier].


## Using more than one modifier ##

Since version 3.1.0a2 it is also possible to use more than one modifier per variable, by specifying a list of comma-separated functions.


## Using the short-modifiers syntax ##

If you are familiar with the Smarty templating engine, you might prefer their syntax to specify a variable modfifier. patTemplate provides an input filter, that allows you to use the same syntax. It can easily be enabled:

```php
$tmpl = new patTemplate();
$tmpl->applyInputFilter('ShortModifiers');
```

You can be specify the variable modifiers in the following fashion:

```xhtml
<patTemplate:tmpl name="page">
  Apply a modifier to multiline:
  {MULTILINE|nl2br}

  Dateformat modfifier:<br />
  {BIRTHDAY|Dateformat|format:%d.%m.%Y}
</patTemplate:tmpl>
```

# Using a template cache #

When using a template cache, patTemplate does not have to apply regular expressions to your template source for every request, but cache the result of the reader.

Using a template cache is extremely easy:

```php
$tmpl = new patTemplate();
$tmpl->setRoot('templates');

$tmpl->useTemplateCache('File', array(
                                  'cacheFolder' => './tmplCache',
                                  'lifetime'    => 10,
                                  'filemode'    => 0644
                                )
                        );
$tmpl->readTemplatesFromInput('myTemplate.tmpl');
$tmpl->displayParsedTemplate();
```

The following caches are available:
 * File
 * MMCache
 * eAccelerator

Each of these caches has different options, please refer to the API documentation of the cache to learn about the supported parameters.


## How caches work ##

When enabling a cache, patTemplate will store a serialized array containing all templates, that have been read from a file in the cache. The next time you call `readTemplatesFromInput()`, patTemplate will first check, whether there is a cached version instead of reading the template from the file and evaluating all enclosed tags.

The template cache will **not** cache the output of your pages.

# Working with output filters #

Output filters can be used to transparently modify the resulting HTML that is generated by patTemplate.
Output filters can either be applied to a single template or the complete HTML that is displayed when calling `displayParsedTemplate()`.


## Using an output filter for the generated page ##

To apply any output filter to all generated content, you may use the `applyOutputFilter()` method, which accepts the following arguments:

 * Name of the filter
 * Optional associative array containing options

The following example would apply the *Tidy* output filter (requires `ext/tidy`) which can be used to create cleaner HTML:

```php
$tmpl = new patTemplate();
$options = array(
             'output-xhtml' => true,
             'clean'        => true
           );
$tmpl->applyOutputFilter('Tidy', $options);
    
$tmpl->readTemplatesFromInput('myPage.tmpl');
$tmpl->displayParsedTemplate();
```

You can apply more than one output filter, they will be executed in the order they have been applied.

### What about getParsedTemplate() ###

When using `getParsedTemplate()`, the output filters will not be applied, unless you supply `true` as second parameter:

```php
$tmpl = new patTemplate();
$tmpl->setRoot('templates');

$tmpl->applyOutputFilter('StripWhitespace');

$tmpl->readTemplatesFromInput('myPage.tmpl');

// Will not strip whitespace
$html = $tmpl->getParsedTemplate('page');

// Will strip whitespace
$compressed = $tmpl->getParsedTemplate('page', true);
```


## Applying an output filter to only one template ##

If you want to apply an output filter only to one template, you can use the `outputFilter` attribute of the `<patTemplate:tmpl/>` tag:

```xhtml
<patTemplate:tmpl name="page"  outputFilter="StripWhitespace">
  The
  whitespace
  will alyways
  be stripped
  from this template.
</patTemplate:tmpl>
```

The filter will be applied to this template, regardless of using `displayParsedTemplate()` or `getParsedTemplate()`.


## Available filters ##

The following filters are included in the distribution:

 * `BBCode`, uses [http://trac.php-tools.net/patBBCode patBBCode] to transform BBCode in the templates to HTML
 * `GZip`, used to gzip pages before they are sent to the browser (cannot be used for only one template for obvious reasons)
 * `HighlightPhp`, used to syntax-highlight PHP code in the templates (using [http://www.php.net/manual/en/function.highlight-string.php highllight_string()])
 * `PdfLatex`, used to transform LaTeX documents to PDF (can be used to generate PDF with patTemplate)
 * `StripWhitespace`, used to remove unneeded whitespace from documents
 * `Tidy`, used to repair your HTML using the [http://www.php.net/manual/en/ref.tidy.php tidy extension].

All output filters are located in the [source:trunk/patTemplate/OutputFilter/ patTemplate/OutputFilter/] folder. You can also easily [wiki:Docs/Developer/OutputFilters  implement new filters].

# Working with input filters #

Input filters are applied to the content of the template file **before** the reader analyses the tags. This enables you to modify the original HTML code and dynamically insert patTemplate tags or variables that will be interpreted by the template engine.

Using an input filter is extremely easy, you only need to pass the name of the filter to the `applyInputFilter()` method:

```php
$tmpl->applyInputFilter('StripComments');
```

The `StripComments` input filter will remove all HTML and Javascript comments from the file, before it is anylyzed by patTemplate. This has two advantages:
 1. The reader is faster, as there is less HTML code to parse
 1. You can insert HTML comments between the opening `<patTemplate:tmpl>` and the opening `<patTemplate:sub>` tag. patTemplate does not allow any character data between these tags, but as the data is removed before patTemplate parses the file, it will not complain about this.

Currently patTemplate provides to input filters:
 * [browser:/trunk/patTemplate/InputFilter/StripComments.php StripComments] to remove HTML and Javascript comments
 * [browser:/trunk/patTemplate/InputFilter/ShortModifiers.php ShortModifiers] to be able to use the short variable modifier syntax known from Smarty

All input filters are located in the [browser:/trunk/patTemplate/InputFilter InputFilter] folder and you can easily [wiki:Docs/Developer/InputFilters implement new input filters].

# Including external templates #

patTemplate allows you to split your templates in smaller files to re-use templates in several pages. Imagine, you have a template for your page header, which is stored in *header.tmpl*:

```xhtml
<patTemplate:tmpl name="header">
  Here goes the header of your page...
</patTemplate:tmpl>
```

Now, you want to re-use this template inside the template, that displays a page. This can be achieved using the `<patTemplate:tmpl/>` tag with the `src` attribute:

```xhtml
<patTemplate:tmpl name="page">
  <patTemplate:tmpl name="header_include" src="header.tmpl" parse="on"/>

  The rest of the page goes here.
</patTemplate:tmpl>
```

Now you can load the page-template as a normal template:

```php
$tmpl = new patTemplate();
$tmpl->readTemplatesFromInput('page.tmpl');
```

The loaded template structure now is:

```
+ page
  + header_include
    + header
```

As you can see, the `header` template is processed, as if the tag containing this template is nested in the `header_include` template. This means, that you can also assign variables to the `header` template, as if it were a normal template contained in *page.tmpl*.


## Including standard HTML ##


## Including with relative paths ##


## Changing the source at runtime ##

# Changing the namespace #

patTemplate does not force you to place all of its tags inside the `pat` namespace. The prefix can easily be changed, by calling the `setNamespace()` method:

```php
$tmpl->setNamespace('MyNamespace');
```

You can as well specify more than one prefix:

```php
$tmpl->setNamespace(array('MyNamespace', 'pat'));
```

If you take a look at *Joomla!*, you will see, that they changed the default namespace to `mos`, but the tags are exactly the same.

# patTemplate tag reference #

All patTemplate tags have to be placed in the patTemplate namespace and thus prefixed with `patTemplate`, as long as you did not [wiki:Docs/Advanced/Namespace change the namespace]. So every tag must look like in the following example:

```xhtml
<patTemplate:tmpl name="foo">
  some content
</patTemplate:tmpl>
```

All tags and attribute names are **case-insensitive**.


## The "tmpl" tag ##

The `<patTemplate:tmpl/>` tag is the main patTemplate tag. It is used to mark a block in a template which can be accessed from your PHP script.

### Attributes ###

Required attributes are:

 * `name` : the unique name of the template

Optional attributes are:

 * `addsystemvars` : Flag to indicate, whether system variables should be added to the template. Possible values are `boolean`, `integer` or `off`
 * `autoclear` : Flag to indicate, whether the template should be cleared when parsed more than once.
 * `autoload` : Flag to indicate, whether the external template should automatically be loaded or only when it is requested. May only be used, if the `src` attribute has been set.
 * `conditionVar` : name of the variable that will be tested in the sub-templates (only for `type="condition"`)
 * `defaultModifier` : name of the default [wiki:Docs/Advanced/Modifiers variable modifier] that will be applied to all variables inside the template.
 * `loop` : Number of minimum repetitions, regardless whether there is enough data assigned to the variables
 * `limit` : Restricts the number of repetitions. The syntax is identical to MySQL's `LIMIT` statement.
 * `maxloop` : Restricts the numer of maximum repetitions for the template. If there is more data available, the parent template will be repeated instead.
 * `modulo` : Modulo to use. Only available when `type="modulo"`.
 * `outputfilter` : Name of an [wiki:Docs/Advanced/OutputFilters Output filter] that will be applied to this template.
 * `parse` : Flag to indicate, whether the external file referenced in `src` contains patTemplate tags (`yes`) or not (`no`) (may only used in  conjuction with `src`)
 * `reader` : Name of the reader to use for parsing the external template. May only be used with `src`.
 * `relative` : Flag to indicate, whether the filename in `src` is relative to the current file (`yes`) or not (`no`) (may only used in conjuction with `src`)
 * `requiredvars` : Comma separated list of variables that must be set in order for the template to be displayed. May only be used in conjunction with `type="simpleCondition"`.
 * `rowoffset` : starting number for the {PAT_ROW_VAR} variable.
 * `src` : File that contains the content for this template (if it is external)
 * `type` : The type of the template (`standard`, `condition`, `simpleCondition`), `OddEven` or `modulo`
 * `unusedvars` : Behaviour that will be applied to all variables that have no value assigned. Possible values are `strip`, `ignore`, `comment` or `nbsp`
 * `useglobals` : Flag to indicate whether global variables should be checked in conditions. May only used when `type` is set to `condition` or `simpleCondition`
 * `varscope` : Comma-separated list of other templates from which the variables will be imported
 * `visibility` : Visibility of the template. Possible values are `visible` or `hidden`.
 * `whitespace` : Whitespace treatment that will be applied to the template. Possible values are `keep` or `trim`

### Example ###

```xhtml
<patTemplate:tmpl name="foo">
  some content
</patTemplate:tmpl>
```


## The "sub" tag ##

The `<patTemplate:sub/> `tag is used inside a `<patTemplate:tmpl/>` tag, if its `type` attribute is set to `condition`, `OddEven`, or `modulo`. It is used to define content that depends on different conditions.

### Attributes ###

Required attributes are:

 * `condition` : the condition for this sub-template. You may use any value or one of these special conditions:
    * `__odd` : current row is an odd row (only for `type="OddEven"`)
    * `__even` : current row is an odd row (only for `type="OddEven"`)
    * `__empty` : the tested variable is empty
    * `__first` : the current repetition is the first repetition
    * `__last` : the current repetition is the last repetition
    * `__single` : the template is not repeated
    * `__default` : none of the other conditions matched

Optional attributes are:

*The `<patTemplate:sub/>` tag does not suppport optional attributes.*

### Example ###

```xhtml
<patTemplate:tmpl name="foo" type="OddEven">
  <patTemplate:sub condition="__odd">
    This is an odd row.<br/>
  </patTemplate:sub>
  <patTemplate:sub condition="__even">
    This is an odd row.<br/>
  </patTemplate:sub>
</patTemplate:tmpl>
```


## The "link" tag ##

The `link` tag works like a symlink on a UNIX system, it only references the content of a different template without creating an actual copy of it.

### Attributes ###

Required attributes are:

 * `src` : name of the referenced template

Optional attributes are:

*The `<patTemplate:link/>` tag does not suppport optional attributes.*

*The `<patTemplate:link/>` tag is always empty.*

### Example ###

```xhtml
<patTemplate:tmpl name="page">
  <patTemplate:tmpl name="foo">
    My name is {REALNAME}.
  </patTemplate:tmpl>
  <patTemplate:link src="foo"/>
</patTemplate:tmpl>
```


## The "var" tag ##

The `<patTemplate:var/>` tag can be used to insert a variable in a template. It adds some extra functionality to the plain variables that are inserted via curly braces.

### Attributes ###

Required attributes are:

 * `name` : the name of the variable

Optional attributes are:

 * `copyFrom` : Name of the variable from which the value should be copied.
 * `default` : The default value, if the variable is not assigned a value from PHP. Starting with patTemplate 3.1.0a3, this may also be a PHP function.
 * `hidden` : Flag to indicate, whether the variable should be hidden (`yes`) or shown (`no`) at this place in the template.
 * `modifier` : The [wiki:Docs/Advanced/Modifiers variable modifier] which should be applied. May either be a PHP function or a modifier class. Starting with patTemplate 3.1.0a3, you may pass a comma-separated list of variable modifiers.
 * `modifiertype` : Type of the modifier. Possible values are `auto`, `php` and `custom`

### Example ###

```xhtml
<patTemplate:tmpl name="foo">
  This is a simple variable: <patTemplate:var name="simple"/>, it is identical to using {SIMPLE}.
  This is a variable with a default value: <patTemplate:var name="foo" default="bar"/>.
  This is a variable which is copied from another variable: <patTemplate:var name="bar" copyFrom="foo" modifier="ucfirst/>.
  This is a variable with a default value created by a PHP function: <patTemplate:var name="timestamp" default="time()"/>.
</patTemplate:tmpl>
```

You should also take a look at the sections describing [wiki:Docs/Variables/DefaultValue default values for variables] and  [wiki:Docs/Advanced/Modifiers variable modifiers].



## The "comment" tag ##

The `<patTemplate:comment/>` tag can be used remove any text from the output. It is similar to an HTML comment, but will not even be outputted.

### Attributes ###

*The `<patTemplate:comment/>` tag does not support any attributes.*

### Example ###

```xhtml
<patTemplate:tmpl name="foo">
  This is sent to the browser.
  <patTemplate:comment>
    This is not sent to the browser.
  </patTemplate:comment>
</patTemplate:tmpl>
```


## Creating new tags ##

patTemplate allows you to create new tags and implement PHP code to handle them. See the [wiki:Docs/Developer/CustomFunctions developer documentation] for more information.

# patTemplate FAQ #


## How can I create lists with the result of a database query? ##

Creating lists with patTemplate is quite easy, and it's even easier when you are using patTemplate in conjunction with patDbc!
Let's take look at the template for a list:

```xhtml
<patTemplate:tmpl name="list">
<table border="1" cellpadding="10" cellspacing="0">
  <tr>
     <th>Superhero Name</th>
     <th>Realname</th>
     <th>Action</th>
  </tr>
  <!-- template for list row -->
  <patTemplate:tmpl name="list_entry">
  <tr>
     <td>{SUPERHERO}</td>
     <td>{REAL_NAME}</td>
     <td><a href="edit.php?id={ID}">edit</a></td>
  </tr>
  </patTemplate:tmpl>
</table>
</patTemplate:tmpl>
```

Now imagine you've got a mysql table with three columns: id, superhero  and real_name and you'd like to display a list with all entries from the table in the template above. 

```php
<?php
$tmpl = new patTemplate();
$tmpl->setBasedir( "templates" );
$tmpl->readTemplatesFromFile( "superherolist.tmpl" );

$db = DB::connect('mysql://user:pass@localhost/myDb');

$query = "SELECT id, superhero, real_name FROM secretIdentities ORDER BY superhero";
$result = $db->getAll($query, DB_FETCHMODE_ASSOC);
$tmpl->addRows( "list_entry", $result);

$tmpl->displayParsedTemplate();
```

Of course you can use any other database abstraction layer or native PHP functions for database access - we used [http://pear.php.net/package/DB PEAR::DB] in this example. `$db->getAll(...)` just executes mysql_fetch_array() and collects all rows in one array that it returns.
This array is just handed over to the template `block list_entry` using `addRows()`, and patTemplate automatically repeats this block, for the amount of rows contained in the array. This makes handling database results fun.


## How can I create tables with several rows and columns? ##

This is a problem that often occurs, when you are creating lists with more than one columns? We refer to this problem as 'nested repetitions', as it's not only needed when creating to dimensional tables, but also nested lists.
At first glance, it may seem quite hard, but once you've understood it, it's quite easy... At first, let's take a look at the template structure: 

```xhtml
<table border="1" cellpadding="10" cellspacing="0">

  <!-- template for table row -->
  <patTemplate:tmpl name="row">
  <tr>

    <!-- template for table cell -->
    <patTemplate:tmpl name="cell">
    <td>{REAL_NAME} is {SUPERHERO}</td>
    </patTemplate:tmpl>

  </tr>
  </patTemplate:tmpl>

</table>
```

There are two templates, on called "row", which has to be repeated and one called "cell", which is repeated for all cells in each row. In these cells the content has to be displayed.
To repeat the cells and the rows, use the following PHP code: 

```php
<?php
// data to display
$data = array(
    array( "real_name" => "Clark Kent",    "superhero" => "Superman" ),
    array( "real_name" => "Bruce Wayne",   "superhero" => "Batman" ),
    array( "real_name" => "Kyle Rayner",   "superhero" => "Green Lantern" ),
    array( "real_name" => "Wally West",    "superhero" => "The Flash" ),
    array( "real_name" => "Linda Danvers", "superhero" => "Supergirl" ),
);
// number of columns per row
$cols  = 3;

// calculate number of rows
$rows = ceil(count($data)/$cols);
$counter = 0;

// loop for each row
for ($i = 0; $i < $rows; $i++) {
  // clear cells from last row
  $tmpl->clearTemplate( "cell" );

  // put data for one row in a new array 
  $rowData = array();
  for ($j = 0; $j < $cols; $j++) {
    if (isset($data[$counter]))
      array_push($rowData, $data[$counter++]);
  }
  // add the data of one row to the cells
  $tmpl->addRows( "cell", $rowData );
  // parse this row and append the data to previously parsed rows 
  $tmpl->parseTemplate( "row", "a" );
}
$tmpl->displayParsedTemplate();
```

The most important function is `parseTemplate( "row", "a" )`, which parses a template and appends it to previously parsed contents of the template. This allows you to parse several rows.
	
### Make use of array_chunk() ###
If you've already installed PHP 4.2.0 you may use array_chunk() to split the full data into arrays for each row.


## How can I hide parts of a page? ##

Hiding parts of a page or displaying them only when a condition occurred is quite easy. Just take a look at the following example: 

```xhtml
<patTemplate:tmpl name="page">
<html>
  <head>
    <title>patTemplate Example</title>
  </head>
  <body>
  <!-- This template is hidden by default -->
  <patTemplate:tmpl name="secret" visibility="hidden">
    I know a secret: <b>Clark Kent is superman!</b>
  </patTemplate:tmpl>
  </body>
</html>
</patTemplate:tmpl>
```

This example consists of two templates: page and secret, which will not be displayed if you call displayParsedTemplate() after loading this templates. It will not be displayed because of the `visibility="hidden"` attribute.
If you went to display the page template, including the secret template, you may do this by using a PHP method of the patTemplate class called setAttribute. This method takes three arguments, the first is the name of the template for which the attribute should be set. The second is the name of the attribute and the last is the value of the attribute.
To change the visibility of a template, use the following PHP code: 

```php
<?php
$tmpl->readTemplatesFromFile( "myTemplate.tmpl" );

if( $knowSecret ** "yes" )
  $tmpl->setAttribute( "secret", "visibility", "visible" );

$tmpl->displayParsedTemplate( "page" );
```


## How do I build a drop-down menu with a database result? ##

Dropdown menus that let you choose between different options that result from a database query are often needed when building web-pages. To create them using patTemplate is quit easy. Take a look at the following template:

```xhtml
<patTemplate:tmpl name="page">
<html>
  <head>
    <title>patTemplate Example</title>
  </head>
  <body>
    <table border="0">
      <tr>
        <td>Choose your superhero:</td>
        <td>
          <select size="1" name="superhero">
            <option value="none">Please choose...</option>
            <patTemplate:tmpl name="dropdown_entry" type="condition" conditionvar="selected">
              <patTemplate:sub condition="no">
                <option value="{ID}">{SUPERHERO}</option>
              </patTemplate:sub>
              <patTemplate:sub condition="yes">
                <option value="{ID}" selected="selected">{SUPERHERO}</option>
              </patTemplate:sub>
            </patTemplate:tmpl>
          </select>
        </td>
	  </tr>
    </table>
  </body>
</html>
</patTemplate:tmpl>
```

If you ignore the HTML code, the template is quite simple. Of course there is one template for the complete page, like it should be in every file. This template also contains the actual `<select>` tag, which creates a HTML drop down menu.
Furthermore there is a second template called dropdown_entry. This template will be used to dynamically build the drop down list. The template type is set to condition as there may be two modes for each entry. Either it is selected by default or it isn't.
To fill the drop down menu with entries resulting from database query you'll need the following code:

```php
<?php
$tmpl->readTemplatesFromFile( "myTemplate.tmpl" );

$defaultId =  19;

$query     =  "SELECT id, superhero FROM heroes ORDER BY superhero";
$result    =  mysqli_query($link, $query);

$entries   =  array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  // determine, whether entry should be selected by default
  if( $row["id"] ** $defaultId )
    $row["selected"]  =  "yes";
  else
    $row["selected"]  =  "no";

  // add the entry to all other entries
  array_push( $entries, $row );
}
// add all entries to the drop down menu
$tmpl->addRows( "dropdown_entry", $entries );
// display the page
$tmpl->displayParsedTemplate( "page" );
```

This will display a drop-down menu with all entries in the table heroes, the superhero with the id 19 will be selected by default.		
	
### Switching to radio groups ###
If you are using the technique of condition templates to print out to different versions for selected and unselected entries, you may switch the drop-down menu to a radio group without modifying the PHP code. 	


## Can I re-use templates in different pages? ##
	
Of course you can. Let's say you'v got a footer and a header, which should be the same in all of your pages, so you have to change it only once and it will be updated in all pages.
To accomplish this, at first create the two files, and save them to your template directory as header.tmpl and footer.tmpl.
The templates could look like this: 

```xhtml
<patTemplate:tmpl name="header">
  <h1>My Superhero database</h1>
</patTemplate:tmpl>
```

and this

```xhtml
<patTemplate:tmpl name="footer">
<hr/>
<span class="footer">Superhero database was last updated on 2001-12-24 (Oh, christmas).</span>
</patTemplate:tmpl>
```

Now you may include these two files in all other pages by using the src attribute of the `<patTemplate:tmpl>` tag:

```xhtml
<patTemplate:tmpl name="page">
<html>
  <head>
    <title>Any page of the superhero database</title>
  </head>
  <body>
    <patTemplate:tmpl name="includedHeader" src="header.tmpl" parse="on"/>
    Here is the rest of the page...
	Can be anything from static HTML to other templates.
    <patTemplate:tmpl name="includedFooter" src="footer.tmpl" parse="on"/>
  </body>
</html>
</patTemplate:tmpl>
```

You may adress the header and footer templates as if the were written directly into the page but you have to change them only once, so this is some kind of include() for templates.		
	
### Organizing templates in folders ###

Of course you may also organzize templates in subfolders. If you'd like to put the shared templates in a subfolder of your template folder, just use `<patTemplate:tmpl src="shared/header.tmpl" parse="off">`. patTemplate will then load the template from `./templates/shared/header.tmpl` if your basedir is set to `templates`.

# Extending patTemplate #

Starting with version 3.0, patTemplate has a more abstracted architecture, which allows you to add new or exchange components without modifying the core. To extend patTemplate you'll have to understand its internal structure and class trees.


## Directory structure ##

The patTemplate directory structure was modeled after the PEAR concept. The main class patTemplate is located in the file `patTemplate.php` in the root folder (or in `/pat` if you installed it using the PEAR installer). This is the only file you need to include directly.
You will also find a directory `patTemplate` which contains all modules of patTemplate. In this directory there's a `Module.php` file, which contains the class `patTemplate_Module` that acts as a base class for all different kinds of modules like Functions, Modifiers, Readers, etc. Furthermore you'll find a file for each of the modules that can be used in patTemplate like `Reader.php`, `Function.php`, `TemplateCache.php`, etc. These files contain the base classes for the modules you may create.
In the `patTemplate` folder there are several folders, which help you organize the actual modules. The readers are in `patTemplate/Reader`, the functions in `patTemplate/Functions`, etc.
That means, if you create a new modifier that should be used in the templates as `FooMod`, you will have to place it in a file called `patTemplate/Modifier/FooMod.php` otherwise patTemplate will not be able to locate it.


## Class trees ##

patTemplate is fully object oriented code. That means all patTemplate modules have to be classes. Most of the classes are quite simple and you only have to implement one or two methods. But nevertheless they have to be classes, as they must not pollute the global namespace.
The files and directories map directly to the class names. That means, `patTemplate.php` contains a class called `patTemplate` and the file `patTemplate/Reader.php` contains the class `patTemplate_Reader`. If you create a reader that should be able to read templates from a database, you should place it into `patTemplate/Reader/DB.php` and call the class `patTemplate_Reader_DB`.
If you do not follow these simple rules, patTemplate will currently not be able to load and instantiate the module and your application will break.


## Components ##

patTemplate consists of the following component types.

### Variable Modifiers ###

Variable modifiers allow you to apply PHP functions and methods to variables without writing any PHP code. Once you provide a modifier, the template designer may easily use it in the templates. Variable modifiers may be used to apply `htmlspecialchars()` to your vars, as well as creating images and reversing text.

 * [wiki:Docs/Developer/Modifiers read more...]

### Template Readers ###

By default, patTemplate is reading templates from the local filesystem. But maybe you prefer storing the templates in a database or even shared memory. This is possible by creating a new Template Reader. Readers also allow you to 'assimilate' foreign template systems. patTemplate comes with a reader that is able to interpret [http://pear.php.net/package/HTML_Template_IT HTML_Template_IT] (and PHPLib) templates and treat them like normal patTemplate files.

 * [wiki:Docs/Developer/Readers read more...]

### Output Filters ###

Output Filters allow you to modify the resulting HTML code, before it is sent to the browser. Possible use cases are the removal of unneeded whitespace or even compressing the output, if the client supports gzipped content.

 * [wiki:Docs/Developer/OutputFilters read more...]

### Input Filters ###

Input Filters are applied before the reader analyses the templates. This allows you to uncompress data, that is stored in gzipped format or remove comments that you do not need in the templates and thus improve the performance of the reader.

 * [wiki:Docs/Developer/InputFilters read more...]

### Custom Tags/Functions ###

Custom Functions allow you to create new tags for the patTemplate namespace. You have to write a class that will handle the tag whenever it occurs in the template. This enables you to dynamically include any kind of dynamically generated content in your templates.

 * [wiki:Docs/Developer/CustomFunctions read more...]

### Template Caches ###

The template cache will speed up you patTemplate powered sites. It will store the structures returned by the reader in a serialized format that can be read faster than the original templates. patTemplate comes with a cache that stores the cache files in file system, but you can store them virtually anywhere.

 * [wiki:Docs/Developer/TemplateCaches read more...]

### Template Dumpers ###

The Dump helps you debugging you templates as it presents a human readable interpretation of the internal structures that includes all templates, conditions, modifiers but also the variables that have been set. The initial version features a DHTML Dump, but you may create a dump that displays plain text, XUL or whatever you like. 

 * [wiki:Docs/Developer/TemplateDumpers read more...]

# Variable Modifiers #

Variable modifiers give power to the template designer. Assume you pass a very long text to a variable but in the layout the designer only has space for a short teaser text. Using modifers, the designer may apply a Truncate modifier that shortens the text you pass in your PHP script. And this is only one application for variable modifiers.

## Introduction ##

Applying modifers is really a piece of cake. All you have to do is to use the `<patTemplate:var/> `tag instead of only enclosing the variable in { and }. Then you may use the 'modifier' attribute to set the modifier.

```xhtml
<patTemplate:tmpl name="page">
<div>
    <patTemplate:var name="myVar" modifier="nl2br"/>
</div>
</patTemplate:tmpl>
```

Variable modifiers will be applied to the value of a variable when parsing the template. There two types of modifiers:

 * You may use any PHP function as a variable modifier. The modifier must accept only a string as a parameter and also return a string. Perfect examples for variable modifiers are nl2br() or htmlentities().
 * You may create custom modifiers, which provide extended functionality and which may be influenced by the attributes of the var tag.

## Custom Modifiers ##
Custom Modifiers are subclasses of patTemplate_Modifier and have to be placed inside patTemplate/Modifier. The filename has to match the last part of the classname. That means if you would like to create a filter that truncates sentences you will have to create a new class 'patTemplate_Modifier_Truncate' and place it into 'patTemplate/Modifier/Truncate.php'.
The class has to implement one method modify( string value, array params ) that has to return the modified value. You may do whatever you like inside this method to modify the value.
patTemplate will pass two parameters to your method:

 * string $value, the value of the variable
 * array $params, an associative array containing all attributes of the var tag except the ones, that are used internally (name, default, copyFrom, modifier)

The truncate modifier could look like this:

```php
<?php
/**
 * patTemplate modfifier Truncate
 *
 * @package        patTemplate
 * @subpackage     Modifiers
 * @author        Stephan Schmidt <schst@php.net>
 */
class patTemplate_Modifier_Truncate extends patTemplate_Modifier
{
   /**
    * truncate the string
    *
    * @param     string       value
    * @param     array        value
    * @return    string       modified value
    */
    public function modify( $value, $params = array() )
    {
        /**
         * no length specified
         */
        if( !isset( $params['length'] ) )
			return $value;

        /**
         * is shorter than the length
         */
        if( $params['length'] > strlen( $value ) )
			return $value;

        return substr( $value, 0, $params['length'] ) . '...';
    }
}
```

If you copy this file to the Modifier folder, you may instantly use it in your template files, by specifying it in the modifier attribute of any `<patTemplate:var/>` tag.

```xhtml
<patTemplate:tmpl name="page">
<div>
   <patTemplate:var name="myVar" modifier="Truncate" length="50"/>
</div>
</patTemplate:tmpl>
```

If you now pass a value that is longer than 50 chars, the modifier will automatically truncate it, before inserting it into the template. 

# Template Readers #

Template readers are used to create the internal template structures from any string that contains `<patTemplate:.../>` tags. patTemplate ships with two readers, one that is able to read from files and one that reads directly from strings.

## Reading from any datasource ##

If you would like to store your templates anywhere else, you can simply create a new reader. Just create a new subclass of patTemplate_Reader and place it into the reader directory.
You need to implement at least one method: readTemplates(). patTemplate will call this method, whenever the user calls patTemplate::readtemplatesFromInput() and will pass the unique identifier for the template to read. This can be a filename, a URL or the value of a primary key in a database.
After reading the template, you will have to return an array, that contains the template structure. In most cases you will be able to use patTemplate_Reader::parseString(), which will apply regular expressions to split the template source into several blocks and interprets all tags. 

```php
<?php
/**
 * patTemplate Reader that reads from a file
 *
 * @package       patTemplate
 * @subpackage    Readers
 * @author        Stephan Schmidt <schst@php.net>
 */
class patTemplate_Reader_File extends patTemplate_Reader
{
   /**
    * reader name
    * @var        string
    */
    protected $_name ='File';

   /**
    * read templates from any input 
    *
    * @final
    * @param    string    file to parse
    * @param    array     options, not implemented in current versions, but future versions will allow passing of options
    * @return    array    templates
    */
    public function readTemplates($input, $options = array())
    {
        $this->_currentInput = $input;
        $fullPath  = $this->_resolveFullPath( $input );
        $content   = file_get_contents( $fullPath );

        $templates = $this->parseString( $content );
        
        return $templates;
    }

   /**
    * resolve path for a template
    *
    * @param    string        filename
    * @return   string        full path
    */    
    private function _resolveFullPath( $filename )
    {
        $baseDir  = $this->_options['root'];
        $fullPath = $baseDir . '/' . $filename;
        return $fullPath;
    }
}
```

If you want to support the `parse="off"` functionality for external templates, you will have to create a second method called `loadTemplate()`. This method will receive a unique identifier and should return the data associated with it as a string. In the above example, you would just strip the call to `parseString()`.

## Possible readers ##

 * Read from database
 * Read from a template server
 * Read from shared memory

## Other template engines ##

Readers may also be used to read templates that have been created for other template engines than patTemplate. We already delivered a reader, that is able to read templates that have been created for HTML_Template_IT and treat them like patTemplate templates.
If you want to implement a reader for other engines, you'll have to make yourself familiar with the internal structure of patTemplate. We'll post more information on this subject at a latter point.

## Caching ##

patTemplate supports caching of the returned templates structures. As the caching is still in beta state and the internal plugin API may change, documentation on this topic will follow, once the API is stable enough.

# Output Filters #

Output Filters allow you to modify the output, after all variables have been added and the template has been parsed. You could use it, to remove unecessesary whitespace, compress the output or obfuscate all email addresses.

## Creating you own output filter ##

An output filter has to be a class that extends from `patTemplate_OutputFilter`. You have to place the file that contains your filter in the folder `patTemplate/OutputFilter`.
In this class you only need to implement one method called `apply()`. This method will be called by patTemplate when `patTemplate::displayParsedTemplate()` is called by the script. Before the resulting HTML code is sent to the browser, your filter will have the oportunity to modify or filter the resulting HTML.
The apply method has to accept one string parameter, in which it will receive the HTML code. After modifying it, you just have to return to modified HTML.

## A simple example ##

The following example shows how to implement an output filter, that removes all linebreaks and extra spaces, indentations, etc. from the HTML code before sending it to the browser. The class has to be placed in the file patTemplate/OutputFilter/StripWhitespace.php (actually it already is there as this example is included in the distribution). 

```php
<?php
/**
 * patTemplate StripWhitespace output filter
 *
 * Will remove all whitespace and replace it with a single space.
 *
 * @package       patTemplate
 * @subpackage    Filters
 * @author        Stephan Schmidt <schst@php.net>
 */
class patTemplate_OutputFilter_StripWhitespace extends patTemplate_OutputFilter
{
   /**
    * filter name
    *
    * @abstract
    * @var    string
    */
    protected    $_name    =    'StripWhitespace';

   /**
    * remove all whitespace from the output
    *
    * @param    string        data
    * @return   string        data without whitespace
    */
    public function apply( $data )
    {
        $data = str_replace( "\n", ' ', $data );
        $data = preg_replace( '/\s\s+/', ' ', $data );
    
        return $data;
    }
}
```

## Applying output filters ##

Applying an output filter is an easy task. You just have to call one method on your patTemplate object and pass the desired output filter. You may create a filter chain by applying as many output filters as you like.
If you applied more than one filter, the will be called in the same order as you applied them. 

```php
<?php
$tmpl = new patTemplate();
$tmpl->setRoot( 'templates' );
$tmpl->applyOutputFilter( 'StripWhitespace' );

$tmpl->readTemplatesFromInput( 'page.tmpl', 'File' );

/**
 * output filter will be applied here
 */
$tmpl->displayParsedTemplate();
```

## Passing parameters to the filter ##

You may also create an output filter that can be parameterised by the script that applies the filter. If the filter class needs to access the parameters set by the script, you may use the method `patTemplate_OutputFilter::getParam()`.
When applying a filter, all parameters have to be passed as an array in the second parameter of `patTemplate::applyOutputFilter()`.

# Input Filters #

Input Filters are similar to Output Filters but are used in a totally different context. The let you filter the templates after they are read from the filesystem, database or any other location, but before the template is being parsed and analyzed.

## Why input filters? ##

You may use input filters for various tasks. You could strip all whitespace from you templates to speed up the parsing process, remove unneeded comments or unpack templates if they are stored in zipped format.
You may also use it in some special cases, where you need to modify the templates but are not able to modify them in their original storage location.

## Implementing an Input Filter ##

Implementing an Input Filter is exactly the same as creating a new Output Filter. You have to extend a new class from `patTemplate_InputFilter` and place it in a file in the patTemplate/InputFilter directory. The last part of the class name has to be identical to the name of the file.
In this class, you simply have to implement one method:
 * `string patTemplate_OutputFilter::apply( string templateCode )`

patTemplate_Reader will pass the template code to this method before it is analyzed by the lexer and you may modify it according to your needs.

## A simple example ##

The following example strips HTML comments from the templates before they are analyzed. This allows you to place them between the `<patTemplate:tmpl>` and `<patTemplate:sub> `tags, although it is not allowed to place data there. 

```php
<?php
/**
 * patTemplate StripComments input filter
 *
 * Will remove all HTML comments.
 *
 * @package        patTemplate
 * @subpackage    Filters
 * @author        Stephan Schmidt <schst@php.net>
 */
class patTemplate_InputFilter_StripComments extends patTemplate_InputFilter
{
   /**
    * filter name
    *
    * @var    string
    */
    protected $_name = 'StripComments';

   /**
    * compress the data
    *
    * @param     string        data
    * @return    string        data without whitespace
    */
    public function apply($data) {
        $data = preg_replace('°<!--.*-->°msU', '', $data);
        return $data;
    }
}
```

## Applying input filters ##

Applying an input filter is an easy task. You just have to call one method on your patTemplate object and pass the desired output filter. You may create a filter chain by applying as many input filters as you like.
If you applied more than one filter, the will be called in the same order as you applied them. 

```php
<?php
$tmpl = new patTemplate();
$tmpl->setRoot('templates');
$tmpl->applyInputFilter('StripComments');

$tmpl->readTemplatesFromInput('page.tmpl', 'File');

/**
 * output filter will be applied here
 */
$tmpl->displayParsedTemplate();
```

## Passing parameters to the filter ##

You may also create an input filter that can be parameterised by the script that applies the filter. If the filter class needs to access the parameters set by the script, you may use the method `patTemplate_InputFilter::getParam()`.
When applying a filter, all parameters have to be passed as an array in the second parameter of `patTemplate::applyInputFilter()`.

# Custom Tags #

Custom functions allow you to create new tags, and define how they should be handled. This way, you may hand over tools to the template designers, that they may use to insert any dynamic content. Think of a site, where your users may register as users and login with their usernames. You could create a new tag that retrieves the name from the database and displays it in the template. Other examples include a gettext implementation.

## Using custom functions ##

Using a custom function is as easy as eating cheese cake. They can be used like the builtin tags tmpl, sub, var, etc. 

```xhtml
<patTemplate:tmpl name="page">
<div>
   Today is <patTemplate:time format="m/d/Y"/>
</div>
</patTemplate:tmpl>
```

This will output `"Today is [current date]."`, where [current day] will be replaced with the current date.

```xhtml
<patTemplate:tmpl name="root">
This is a template that is used to display code.
<patTemplate:phpHighlight>
<?php
$i = 0;
while( $i < 10 )
{
  echo "This is line $i.<br />";
  $i++;
}?>
</patTemplate:phpHighlight>
</patTemplate:tmpl>
```

In the above example, the PHP code enclosed between the `<patTemplate:phpHighlight>` tags will be syntax highlighted in the output. 

## Creating a custom Function ##

Custom Functions have to be placed in patTemplate/Function and extended from patTemplate_Function. You have to implement one method that represents the function:
string patTemplate_Function::call( array params, string content )
The reader will pass an associative array containing all attributes of your tag as well as a string as second parameter, which will contain all character data (and HTML tags) between the opening and closing tags.
In this method you may compute the result and return it as a string. This result will then be inserted in the template instead of your function tag as well as the enclosed content.
You may use all functions, that are located in the patTemplate/Function folder, as patTemplate will auto-load the classes.
Template functions will be evaluated while analyzing the template, there's currently no way to use template variables or any input from the PHP script in the funcitons. Functions may be nested, patTemplate will always evaluate the innermost function first.

## Code examples ##

This example is the code used for the custom function time, which is able to display the current time as well as reformat any timestamp you pass to this. 

```php
<?php
/**
 * patTemplate function that calculates the current time
 * or any other time and returns it in the specified format.
 *
 * @package       patTemplate
 * @subpackage    Functions
 * @author        Stephan Schmidt <schst@php.net>
 */
class patTemplate_Function_Time extends patTemplate_Function
{
   /**
    * name of the function
    * @var       string
    */
    protected $_name = 'Time';

   /**
    * call the function
    *
    * @param     array    parameters of the function (= attributes of the tag)
    * @param     string   content of the tag
    * @return    string   content to insert into the template
    */ 
    public function call( $params, $content )
    {
        if( !empty( $content ) )
        {
            $params['time'] = $content;
        }
        
        if( isset( $params['time'] ) )
        {
            $params['time'] = strtotime( $params['time'] );
        }
        else
        {
            $params['time'] = time();
        }
        
        return date( $params['format'], $params['time'] );
    }
}
```

# Template Caches #

The template cache has been developed to speed up patTemplate based applications. It will save you the overhead of analysing the template files, for every request. Instead, it will serailize the result of the reader and store it anywhere you like; on the next request to the same template, it will check, whether the file is still valid and load it from cache.

## How does it work? ##

When you are calling `patTemplate::readTemplatesFromInput()`, patTemplate will include and instantiate the desired reader which will then load and analyze the template you specified. This will be done everytime the template is requested although the process is not influenced by any variables or user feedback.
This technique has two drawbacks:
 1. The reader class consist of 1400+ lines of code, which have to be compiled
 2. The reader makes use of preg_* functions, which can get time consuming

To get rid of these performance brakes, I implemented the template cache, which implements a quite simple functionality: After the reader analyzed the template and returns an array containing the structure, the template cache will serialize this structure and store it with a unique key. On the next request, patTemplate asks the template cache, whether there's a stored structure for a specific key. If yes, it will be usnerialized and used instead of reading the template again.

## Using a template cache ##

Like all patTemplate modules, using a template cache is easy. Basically, you just need to add one line of code to your scripts. 

```php
<?php
$tmpl = new patTemplate();
$tmpl->setRoot( 'templates' );

/**
 * Use a template cache based on file system
*/
$tmpl->useTemplateCache( 'File', array(
                                        'cacheFolder' => './tmplCache',
                                        'lifetime' => 60 )
                                      );

$tmpl->readTemplatesFromInput( 'page.tmpl', 'File' );

$tmpl->displayParsedTemplate();
```

The first parameter in the call to useTemplateCache() defines which cache should be used. if you are unsured, which caches you have installed, take a look at the folder patTemplate/TemplateCache. The second parameter is an array with all parameters for the template cache. You'll have to check the documentation of the template cache you are using for a list of all supported parameters.

In the example that uses the 'File' cache, there are two parameters:
 * cacheFolder defines, where the cache files will be stored
 * lifetime defines, how long the cache is valid. In this case, we use a cache for 60 seconds. You may also set the cache to 'auto', if you want the cache to be rebuilt, when the source file changes.

## Creating a new template cache ##

patTemplate ships with a template cache, that stores data on the filesystem. If you need a faster storage container, like shared memory, you may easily implement it.
Create a new file in patTemplate/TemplateCache and create a class, that extends patTemplate_Cache. In this class, you only need to implement the following methods:

 * `array patTemplate_TemplateCache::load( string key, int modificationTime )`
 * `boolean patTemplate_TemplateCache::write( string key, array templates )`

The load() method will receive a unique key as well as the time, when the original file has been modified, if the reader supports this feature. You will have to check, whether there is a cache file for the specified key and whether it still is valid. If the file is valid, you will have to unserialize the stored data and return the resulting template structure to patTemplate.
The write() method will receive the unique key, as well as the template structure, that has to be stored. Just serialize it and store it with the key, so it can be loaded at a later point.

## Take a look at the code ##

To fully grasp, how the template cache works, take a look at the 'File' cache:

```php
<?php
/**
 * patTemplate Template cache that stores data on filesystem
 *
 * Possible parameters for the cache are:
 * - cacheFolder : set the folder from which to load the cache
 * - lifetime : seconds for which the cache is valid, if set to auto, it will check
 *   whether the cache is older than the original file (if the reader supports this)
 *
 * @package       patTemplate
 * @subpackage    Caches
 * @author        Stephan Schmidt <schst@php.net>
 */
class patTemplate_TemplateCache_File extends patTemplate_TemplateCache
{
   /**
    * parameters of the cache
    *
    * @var        array
    */
    protected $_params = array(
                         'cacheFolder' => './cache',
                         'lifetime'       => 'auto'
                        );

   /**
    * load template from cache
    *
    * @param    string           cache key
    * @param    integer          modification time of original template
    * @return   array|boolean    either an array containing the templates or false cache could not be loaded
    */
    public function load( $key, $modTime = -1 )
    {
        $filename = $this->_getCachefileName( $key );
        if( !file_exists( $filename ) || !is_readable( $filename ) )
            return false;

        $generatedOn = filemtime( $filename );
        $ttl         = $this->getParam( 'lifetime' );
        if( $ttl ** 'auto' )
        {
            if( $modTime < 1 )
                return false;
            if( $modTime > $generatedOn )
                return false;
            return unserialize( file_get_contents( $filename ) );
        }
        elseif( is_int( $ttl ) )
        {
            if( $generatedOn + $ttl < time() )
                return false;
            return unserialize( file_get_contents( $filename ) );
        }
        
        return false;
    }
    
   /**
    * write template to cache
    *
    * @param     string        cache key
    * @param     array         templates to store
    * @return    boolean       true on success
    */
    public function write( $key, $templates )
    {
        $fp = @fopen( $this->_getCachefileName( $key ), 'w' );
        if( !$fp )
            return false;
        flock( $fp, LOCK_EX );
        fputs( $fp, serialize( $templates ) );
        flock( $fp, LOCK_UN );
        return true;
    }
    
   /**
    * get the cache filename
    *
    * @param    string        cache key
    * @return   string        cache file name
    */
    private function _getCachefileName( $key )
    {
        return $this->getParam( 'cacheFolder' ) . '/' . $key . '.cache';
    }
}
```
	
As you can see, implementing a template cache is really simple and should not pose a problem to the experienced PHP developer

# Template Dumpers #

Dumpers help you with debugging your application, as they display information about the loaded templates and assigned variables. patTemplate has been developed to help solve the webproblem and the output is most of the time displayed in the webbrowser. That's why we provide a dump that displays a nice (and interactive) HTML rendition of patTemplate's properties.

## Writing a new Dump ##

If you are using patTemplate in a CLI environment or do not like the style of the Dump we provide, you may implement your own Dumper object. Just follow the following steps:
 1. Create a new file in patTemplate/Dump
 1. Create a new class in this file, that extends patTemplate_Dump
 1. Implement the needed methods: `displayHeader()`, `displayFooter()`, `dumpGlobals()` and `dumpTemplates()`

The methods `displayHeader()` and `displayFooter()` do not accept any parameters. The `dumpGlobals()` method will receive an array with all global template variables. The method `dumpTemplates()` will recieve two arrays, one with the template structures and content and one with the variables, that have been assigned.		
	
## Make use of print_r() ##
To get familiar with the structures passed to the `Dump` object, we recommend to use `print_r()` or `var_dump()` on the parameters.
