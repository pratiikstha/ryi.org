<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div id="page">
	<header class="header" id="header" role="banner">
	  <div class="container clearfix">
	    <?php if ($logo): ?>
	      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo-name"><img src="/sites/all/themes/rangjung/images/name.png" alt="<?php print t('Home'); ?>" class="header__logo-name" /></a>
	    <?php endif; ?>

			<?php print render($page['header']); ?>
		  <div id="navigation">
				<nav id="main-menu" role="navigation" tabindex="-1">
					<?php print render($page['navigation']); ?>
				</nav>
			</div>
		</div>
	</header>


	<div id="highlighted" class="clearfix">
		<?php print render($page['highlighted']); ?>
	</div>

  <div id="main" class="container">
    <div id="content" class="column" role="main">

      <?php if ($is_front): ?>
      <div id ="content-top" class="clearfix">
        <?php print render($page['content_top']); ?>
      </div>
      <?php endif; ?>

      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <?php if (isset($node->type) && $node->type == 'course') { $title = $course_code . ': ' . $title; } ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php //print $feed_icons; ?>

    </div><!-- #content -->

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>
  </div><!-- #main -->

	<div id ="featured">
		<div class="container clearfix">
	  	<?php print render($page['featured']); ?>
		</div>
	</div>

	<div id="postscript" class="container clearfix">
		<?php print render($page['postscript']); ?>
	</div>

	<?php print render($page['footer']); ?>

</div><!-- #page -->

<?php print render($page['bottom']); ?>
