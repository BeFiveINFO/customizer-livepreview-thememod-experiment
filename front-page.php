<?php

/*Template Name: Home Page*/

get_header(); ?>

<h1>Front Page</h1>
<?php if ( ! class_exists( 'Kirki' ) ) : ?>
	<h2>This theme requires Kirki.</h2>
<?php else: ?>
	<table border="1" >
		<tr>
			<th>Variable taken at</th>
			<th>Result</th>
			<th>Note</th>
		</tr>
		<tr>
			<td><a href="https://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme" target="_blank">after_setup_theme</a> (action hook)</td>
			<td><span class="var_dump"><?php var_dump( BeFive_LivePreview_ThemeOption_Test::$test_after_setup_theme); ?></span></td>
			<td>"after_setup_theme is the first action hook available to themes, triggered immediately after the active theme's functions.php file is loaded."</td>
		</tr>
		<tr>
			<td><a href="http://codex.wordpress.org/Functions_File_Explained" target="_blank">functions.php</a></td>
			<td><span class="var_dump"><?php var_dump( BeFive_LivePreview_ThemeOption_Test::$test_functions); ?></span></td>
			<td>In the functions.php</td>
		</tr>
		<tr>
			<td><a href="https://codex.wordpress.org/Plugin_API/Action_Reference/init" target="_blank">init</a> (action hook)</td>
			<td><span class="var_dump"><?php var_dump( BeFive_LivePreview_ThemeOption_Test::$test_init); ?></span></td>
			<td>"Typically used by plugins to initialize. The current user is already authenticated by this time."</td>
		</tr>
		<tr>
			<td><a href="https://codex.wordpress.org/Plugin_API/Action_Reference/wp_loaded" target="_blank">wp_loaded</a> (action hook)</td>
			<td><span class="var_dump"><?php var_dump( BeFive_LivePreview_ThemeOption_Test::$test_wp_loaded); ?></span></td>
			<td>"After WordPress is fully loaded"</td>
		</tr>
		<tr>
			<td><a href="https://codex.wordpress.org/Plugin_API/Filter_Reference/template_include" target="_blank">template_include</a> (filter hook)</td>
			<td><span class="var_dump"><?php var_dump( BeFive_LivePreview_ThemeOption_Test::$template_include); ?></span></td>
			<td>"This filter hook is executed immediately before WordPress includes the predetermined template file. This can be used to override WordPress's default template behavior." Used for layout by wrapping as in Root Sage.</td>
		</tr>
		<tr>
			<td><a href="http://codex.wordpress.org/Function_Reference/wp_head" target="_blank">wp_head</a> (action hook)</td>
			<td><span class="var_dump"><?php var_dump( BeFive_LivePreview_ThemeOption_Test::$test_wp_head); ?></span></td>
			<td>Triggered after wp_enqueue_scripts and before wp_print_styles</td>
		</tr>
	</table>
	<p>See <a href="https://codex.wordpress.org/Plugin_API/Action_Reference#Template_Actions" target="_blank">Action_Reference / Template_Actions</a> for details.</p>
<?php endif; ?>
<!-- List Blog Posts -->
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
<p></p><?php echo get_excerpt(300); ?>
<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>

	<?php endwhile; ?>

<?php endif; ?>




<?php get_footer(); ?>