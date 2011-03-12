<?php
// $Id: page.tpl.php,v 1.4 2010/12/31 15:00:09 jarek Exp $

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<div id="wrapper">
  <div id="header">

    <div id="branding">
      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if ($site_name): ?>
        <?php if ($title): ?>
          <div id="site-name"><strong>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
          </strong></div>
        <?php else: /* Use h1 when the content title is empty */ ?>
          <h1 id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
          </h1>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($site_slogan): ?>
        <div id="site-slogan"><?php print $site_slogan; ?></div>
      <?php endif; ?>
    </div> <!-- /#branding -->

  <?php if ($page['header_menu']): ?>
    <div id="header-menu">
      <?php print render($page['header_menu']); ?>
    </div>
  <?php endif; ?>


  </div> <!-- /#header -->

  <div id="main">
    <?php if ($page['content']): ?>
      <div id="content" class="column">
        <div class="inner">
          <?php if ($breadcrumb): ?><div id="breadcrumb" class="clearfix"><?php print $breadcrumb; ?></div><?php endif; ?>
          <?php if ($messages): ?><div id="messages"><?php print $messages; ?></div><?php endif; ?>
          <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>

          <a id="main-content"></a>
          <?php print render($title_prefix); ?>
          
          <?php if ($title && !isset($node)): ?>
            <h1 class="page-title"><?php print $title ?></h1>
          <?php endif; ?>
          
          <?php print render($title_suffix); ?>

          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </div> <!-- /.inner -->
      </div> <!-- /#content -->
    <?php endif; ?>

    <?php if ($page['sidebar']): ?>
      <div id="sidebar" class="column">
          <?php print render($page['sidebar']); ?>
      </div> <!-- /#sidebar-first -->
    <?php endif; ?>

  </div> <!-- /#main -->

  <div id="footer">

    <?php if ($page['footer_column_first'] || $page['footer_column_second']): ?>
      <h2 class="element-invisible"><?php print t('Footer'); ?></h2>
      <div id="footer-columns">
        <?php if ($page['footer_column_first']): ?>
          <div id="footer-column-first" <?php if (!$page['footer_column_second']): ?>class="single"<?php endif; ?>>
            <?php print render($page['footer_column_first']); ?>
          </div>
        <?php endif; ?>

        <?php if ($page['footer_column_second']): ?>
          <div id="footer-column-second" <?php if (!$page['footer_column_first']): ?>class="single"<?php endif; ?>>
            <?php print render($page['footer_column_second']); ?>
          </div>
        <?php endif; ?>
      </div><!-- /#footer-columns -->
    <?php endif; ?>

    <div id="closure">
      <div id="info">Drupal theme by <a href="http://www.woothemes.com">WooThemes</a> and <a href="http://www.kiwi-themes.com">Kiwi Themes</a></div>

      <?php if ($page['footer_menu']): ?>
        <div id="footer-menu">
          <?php print render($page['footer_menu']); ?>
        </div> <!-- /#footer-menu -->
      <?php endif; ?>
    </div> <!-- /#closure -->

  </div> <!-- /#footer -->
</div> <!-- /#wrapper -->