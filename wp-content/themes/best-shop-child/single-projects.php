<?php
/**
* Template Name: Projects
*
* Template Post Type: projects
**/
get_header();
?>
	<div id="primary" class="content-area">
		<div class="container">
            <div class="breadcrumb-wrapper">
				<?php best_shop_breadcrumb(); ?>
			</div>
			<div class="page-grid">
				<main id="main" class="site-main">
					<?php
						the_title();
                        the_excerpt();
                        the_author();
						the_post_thumbnail();
						best_shop_nav();
						best_shop_get_related_posts();
						best_shop_get_comments();
					?>
				</main><!-- #main -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();
