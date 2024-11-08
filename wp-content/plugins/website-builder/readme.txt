=== Draft - Tailwind CSS for WordPress. ===
Contributors:      leeshadle
Tags:              tailwindcss, tailwind, tailwind css, blocks, responsive
Requires at least: 5.3.2
Tested up to:      6.6
Stable tag: 3.0.9
Requires PHP:      7.0.0
License:            GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Add Tailwind CSS to WordPress, in seconds.

== Description ==

Install the free plugin and start using Tailwind CSS in WordPress, instantly.

⏰ Start using Tailwind CSS in WordPress in seconds, no setup required.
⚙️  Effortlessly configure Tailwind CSS right from WordPress.
⚡️  Build even faster with 50+ responsive, [copy & paste block patterns](https://wpdraft.com).

Current [Tailwind CSS](https://tailwindcss.com/) version: 3.4.5

### How It Works:
* Install free Draft plugin
* Configure Tailwind CSS right in the page, post, or site editor or from WP Admin > Settings > Draft settings
* Add Tailwind CSS utility classes to blocks
* Go Pro to improve site performance by purging unused CSS

### Free plugin features:
* Configure Tailwind
* Add Custom CSS ( including ability to @apply Tailwind CSS utility classes )
* Add Tailwind CSS utility classes to Gutenberg blocks
* Add Tailwind CSS utility classes inline to text ( such as headings and paragraphs )

### Pro plugin features:
* Purge Unused CSS ( make your WordPress site blazing fast )
#### Block-Editor Add-ons:
* Dark mode toggle block - add dark mode toggle blocks anywhere to toggle using the Tailwind CSS darkMode 'selector' strategy
* Group block link - add links to the Group block for creating linkable cards and layouts
* Archive title filter - add text before/after archive titles for better archive labeling
[Go Pro](https://wpdraft.com/pricing)

### Free full-site-editing (FSE) block theme:
[Learn more](https://wpdraft.com/theme)

### Free ready-to-use copy & paste block patterns:
[Explore patterns](https://wpdraft.com/wordpress-block-patterns)

### Free ready-to-use copy & paste block templates:
[Explore templates](https://wpdraft.com/wordpress-block-templates)

### Free Video Tutorials
Learn how to speed up your development by adding Tailwind CSS utility classes to Gutenberg blocks:
[Tutorials](https://wpdraft.com/tutorials)


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the `draft` plugin files to the `/wp-content/plugins/` directory, or upload the draft.zip file through the WordPress plugins screen directly by clicking 'Add New' and selecting the zip file from your computer.
2. Install and active the Gutenberg WordPress plugin.
3. Activate the Draft plugin through the 'Plugins' screen in WordPress.
4. Use the Draft plugin on your pages and posts.

== Frequently Asked Questions ==

= Will TailwindCSS utility classes conflict with other plugins? =

If they're using the same utility classes it may override them.  You can always configure the Tailwind CSS to use a prefix if you need a different namespace.

= What themes is the Draft plugin compatible with? =

Any theme built for the Gutenberg editor.

== Screenshots ==

1. Couple the free Draft plugin with our free block theme, free block patterns and free block templates to build WordPress websites fast with Tailwind CSS.
2. The free Draft plugin adds Tailwind CSS to WordPress.  Configure Tailwind CSS, @apply Tailwind CSS utility classes, and add Tailwind CSS utility classes to blocks.
3. The free Draft theme is SUPER light weight (5kb) and is built for Tailwind CSS.
4. Copy & Paste all our free block patterns on our website.
5. Copy & Paste all our free block templates on our website.
6. Configure Tailwind CSS without leaving WordPress.
7. Add custom CSS and @apply Tailwind CSS utility classes to your site without leaving WordPress.

== Changelog ==

= 3.0.9 =
* Fix bug - nested CSS was not applying properly

= 3.0.8 =
* Updating Tailwind CSS to version 3.4.5
* Update PluginSidebar components for WordPress 6.6 compatibility
* Update saving plugin settings to work when custom fields are present in post editor

= 3.0.7 =
* Updating blueprint for plugin Playground

= 3.0.6 =
* Add blueprint for plugin Playground

= 3.0.5 =
* Fix bug by removing welcome guide

= 3.0.4 =
* Fix bug preventing settings from saving (update slug - no longer import slug from package.json)
* Update compatibility to WordPress 6.5
* Update default config to include defaults for primary, secondary, text, and accent tokens
* Update default CSS to include 'text-balance' utility for headings, slight styling updates (h1 font size, images, dark mode default font color)

= 3.0.3 =
* Fix bug toggleFeature bug that crashed editor

= 3.0.2 =
* Fix bug that prevents styles from loading in block editor where metaboxes/custom fields are visible

= 3.0.1 =
* Fix bug that prevents styles from loading in block editor where metaboxes/custom fields are visible

= 3.0.0 =
* Update to latest version of Tailwind CSS (version 3.4.1)
* Add inline Tailwind CSS classes (ie - highlight or underline parts of a heading w/ inline utility classes)

= 2.0.0 =
* Complete Plugin rebuild
* Completely customize your Tailwind CSS configuration as you would outside of WordPress
* Add Custom CSS and leverage Tailwind directives such as @apply, @layer, etc.
* Updated Default Tailwind CSS configuration for building block patterns, pages, and websites

= 1.0.1 =
* Updating Plugin Settings - Removing core ColorPalette component from TailwindCSS Color configuration settings.  New ColorPalette component was breaking the editor.  Will work on finding an alternative.

= 1.0.0 =
* Release

== Copyright ==

Draft WordPress Plugin, Copyright 2021 leeshadle
Draft WordPress Plugin is distributed under the terms of the GNU GPL
