------------------------------------------------------------------------------------------------------------
For support please visit: http://www.pixxels.at/

You will find the theme's page on: http://shiro.pixxels.at
------------------------------------------------------------------------------------------------------------

The Theme installs with the basic layout in place. 

/************
* TEMPLATES *
************/

This theme has built-in 4 additional templates:

Template 'Full-Width, No Sidebar" (full-width-page.php)
This template will show the page without the sidebar.

Template 'Colored Background, No Sidebar" (colored-with-sidebar.php)
The page's content has the predefined color or your custom color as background-color. The page is shown with the sidebar.

Template 'Colored Background, Sidebar" (colored-without-sidebar.php)
The page's content has the predefined color or your custom color as background-color. The page is shown without the sidebar.

Template 'Blog' (blog.php)
This page will show your blog-entries. This is useful if you want to have a static front page, but also a blog.



/********************
* CHANGE THE LAYOUT *
*********************/

To change this layout you have the following possibilities:

- change the background: click on Appearance / Background
- use a custom color: click on Appearance / Shiro Options
- use a custom logo: click on Appearance / Header
- use a custom favicon: click on Appearance / Shiro Options
- use your custom color as background color of a page's content: use template Colored-With-Sidebar or Colored-Without-Sidebar


/***************
* INSTRUCTIONS *
****************/

A) Colored Background

You can use the color defined in the options panel as a page’s background color. This looks great, eg. on the front-page or another page that should have a different look.
1. Click “pages”
2. Choose the page you want to edit, click “edit”.
3. Choose the template (on the right-hand side there is a drop-down-list that shows the available templates. There are two templates with colored background: one with, and one without the sidebar. Choose one of them.)
4. Click “Update”


B) Static Front Page and Blog

If you want a static frontpage, but also a page that shows the blog-entries, you have to do the following:
1. Create a page that you call “Home” for example. Type in the content, and if you like you can apply a colored-background-template.
2. Create a page that you call “Blog” for example.
3. Apply the “Blog”-template to this page. You don’t have to give any content to this page.
4. Add the “Blog”-Page to the menu (if it is not automatically done).
5. Settings – Reading: Front-Page displays: Choose “a static page”, and set your “Home”-page as “Front page”. For the “Posts page” choose your “Blog”-page.

You will find the screenshots to these instructions on: http://www.pixxels.at/shiro/customization/templates/


/***************
* RESTRICTIONS *
****************/

1. The site title is limited to 8 chars (upper case) or 10 chars (lower case). If you have longer titles, the words will be wrapped.

2. The navigation menus are limited to two-levels deep.

3. The description text to an image is limited to 140 chars.




Changelog:
------------------------------------------------------------------------------------------------------------

Version 1.1.3 - 7th August 2012
--------------------------------
- added link to next/previous posts in the search results page
- style.css:
  * added "clear:both;" to #comments ol.commentlist
  * removed "height:auto;" and "display: block;" from #content object, #content embed, #content iframe
  * added "overflow:auto;" to ul, ol
  * changed selector .mainpage .entry-header h1, .mainpage .entry-header h1 a:link to .mainpage .entry-header h1, .mainpage .entry-header h1 a
  * changed style for .mainpage a:hover
  * added style for .mainpage #search_submit (and also to theme-options.php)
  * added style for .mainpage .entry-content p span
- replaced lenora with shiro in archive.php
- deleted lines 11 and 25 in custom-header.php ('wp-head-callback' => 'shiro_header_style',)
- made some text localizable in header.php
- added function shiro_head_script to functions.php and removed lines 24-26 from header.php
- updated German translation
- updated theme description




Version 1.1.2 - 24th July 2012
--------------------------------
- theme-options.php, line 109: used esc_url() instead of esc_attr()


Version 1.1.1 - 10th July 2012
--------------------------------
- enhanced custom-header feature by adding custom-header.php, removing some lines in functions.php and changing some lines in header.php
- added previous_posts_link() and next_posts_link() to tag.php, archive.php and categories.php
- removed byline and timestamp from pages (content.php)
- added some space on left edge on category archive pages (category.php)
- theme-options.php, line 109: used esc_attr() instead of esc_attr_e()
- enlarged content area when there is no sidebar (style.css, functions.php)
- changed some styles in style.css to get a better usability and a better readabilty



Version 1.1.0 - 28th June 2012
--------------------------------
- added editor-style.css
- changed some styles in style.css to get a better usability, a better readabilty and a better responsive design.
- used add_theme_support('custom-background') instead of add_custom_background()
- cleaned up shiro_theme_setup() (functions.php) and shiro_admin_enqueue_scripts (includes/theme-options.php)
- replaced the custom logo theme option with the custom header feature
- escaped some urls
- updated language files



Version 1.0.1 - 6th June 2012
--------------------------------
- used 'get_stylesheet_uri()' instead of 'bloginfo( 'stylesheet_url' )' header.php
- renamed 'theme_options_render_page' to 'shiro_theme_options_render_page' in theme-options.php 
- removed  'bloginfo('name')' and used `'wp_title'` filter instead (header.php/functions.php)
- used the_title_attribute() instead of the_title() within 'entry-header <a title...> ' in content.php
- removed line 22+23 in header.php (favicon is now disabled by default) 
- deleted lines 36 to 41 (not necessary for theme translation) in functions.php
(-cleaned up shiro.pixxels.at)



Version 1.0.0 - 29th May 2012
--------------------------------
shiro release date.


