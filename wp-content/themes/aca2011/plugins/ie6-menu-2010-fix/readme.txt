=== IE6 Support for Twenty Ten Theme ===
Contributors: Alexei Teplyakov
Tags: 2010, twenty ten, ie6, browser support, internet explorer 6, fix
Requires at least: 3.0
Tested up to: 3.0
Stable tag: 1.0

This plugin brings Internet Explorer 6 support for the new default Wordpress theme Twenty Ten.

== Description ==

The following fixes are included:

* Header drop-down menu fix (works as expected with first 5 levels of page includes, requires JavaScript enabled in IE6)
* Header menu width fix
* Incorrectly floating avatars in comments fix
* Font fixes
* Widget title fix
* Comment input form resizing bug fix

If there is need to alter styles associated with these fixes (for example, for a child theme), one may edit the `css/ie6fix.css` file included in this release.

**NOTE: This plugin is only effective for Internet Explorer 6 with the Twenty Ten theme (and child themes). All the style fixes will be ignored by other browsers.**

== Installation ==

# Upload the `ie6-support-for-2010-theme` folder with all files to the `/wp-content/plugins` directory;
# Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Will these fixes work with Twenty Ten child themes? =

Yes, but you may have to alter the `css/ie6fix.css` file if you change any styles that are associated with the fixes.

= What about other themes? =

This plugin was designed to bring compatibility to IE6 for Twenty Ten (and child themes) only. Don't forget to deactivate this plugin once you change your Wordpress theme to something else.

= Will this plugin have any effect on other browsers? =

No, all the fixes are applied to Internet Explorer 6 only.

= I found a style fix that was not included with this plugin. =

Please post it on the forums. I will include it with a new version.

== Changelog ==

= 1.0.0 =
* Initial release

== Credits ==

* Alexei Teplyakov (Firelord): Wordpress plugin and minor CSS fixes;
* Peter Nederlof (Peterned): Whatever:hover HTC script.