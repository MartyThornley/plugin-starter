# Plugin Starter
A set of starter files for faster WordPress plugin development.

To use simply copy the files into your plugins folder and replace the placeholders with version of your plugin's name as described below.

After that, nodify the classes and fucntions as you see fit.

**Do bulk search and replace for the following in all files**
* _PLUGIN_TITLE_ 			readable title of plugin "My Plugin Name"
* _PLUGIN_SLUG_				slug of plugin name "my-plugin-name"
* _PLUGIN_FUNCTION_NAME_ 	function like name for plugin "my_plugin_name"
* _PLUGIN_VERSION_			version number
* PLUGIN_CLASS_NAME			class style name for plugin "MyPluginName"

**Replace name in file names**
* Replace PLUGIN_CLASS_NAME - ( all files in inc/classes )
* Replace PLUGIN_SLUG_NAME - ( main file in base folder )

**Class Structure**

*class-PluginClassName.php*

This is the base class and should not be called directly.
It should be used to define everything that the other classes might need to use.
For example, it is already setup to define the plugin's directory, URL, version and more.
All other classes extend this class and can then make use of those variables.

*class-PluginClassNameSetup.php*

This is where the plugin is actually created. The base class is not instantiated. This one is.
It should include and instantiate the other classes as needed. 
You should be able to look through this class and see what is being done where and by what classes.

*The Rest*
The rest are all optional and can be removed or added to as needed.
If you are not doing anything in the admin, the admin class can be removed.
If you want to use custom post types, you might copy one of the classes and add a new one where CPT's are defined. 
In that new class, extend the base class and you get access to all the already defined variables.