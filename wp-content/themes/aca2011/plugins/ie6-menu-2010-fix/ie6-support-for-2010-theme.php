<?php
/* 
Plugin Name: IE6 Support for 2010 Theme
Plugin URI: http://firelords.net/wp-plugins/ie6-support-2010/
Version: 1.0.0
Author: Alexei Teplyakov
Description: A plugin that adds fixes for 2010 theme for IE6 browser; in order to make changes to CSS edit the ie6fix.css file located under the /css/ folder. Please note that all applied styles will work for IE6 only!

	(c) Alexei Teplyakov, 2010

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

*/

// Plugin class
if (!class_exists("IE6Support2010"))
{
	class IE6Support2010
	{
		function IE6Support2010()
		{
			$this->pluginURL = WP_PLUGIN_URL . "/" . plugin_basename(dirname(__FILE__));
		}
		
		function addHeaderCode()
		{
			?>
<!--[if lte IE 6]>
<style type="text/css">
* html body
{
	behavior: url("<?php echo $this->pluginURL . '/htc/csshover3.htc'; ?>");
}
</style>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->pluginURL . '/css/ie6fix.css'; ?>" />
<![endif]-->
			<?php
		}
	}

}
if (class_exists("IE6Support2010"))
{
	$ie6Support2010 = new IE6Support2010();
}

//Actions and Filters	
if (isset($ie6Support2010))
{
	//Actions
	add_action('wp_head', array(&$ie6Support2010, 'addHeaderCode'), 1);
}

?>