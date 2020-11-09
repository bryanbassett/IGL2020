<?php
/**
 * Template Name: Story Template
 * 
 *
 * @package IGL 2020
 */

if ( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
} 

?>
<?php	get_template_part( 'template-parts/news-bar'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="bg-center entry-header flex flex-col inline-block m-auto ml-auto mr-auto mt-0 p-10 sm:p-20 sm:pt-10 text-center" style="background-image: url('<?php echo get_the_post_thumbnail_url( ); ?>'); background-size: cover">
		<div class="blur"></div>
		<div class="mb-auto mt-auto">
			<h1 class="m-auto  pt-4 pb-4  text-6xl w-11/12  sm:w-6/12  text-white text-shadow font-primary uppercase"><?php the_title() ?></h1>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content m-auto sm:w-7/12 w-11/12">
		<div class="date font-bold italic mt-10 text-center"><?php  echo get_the_date(); ?></div>
		
		<?php the_content(); ?>
		

	</div><!-- .entry-content -->
	<div class="comment-section ml-auto mr-auto mt-12 sm:w-7/12 w-11/12">
	<?php
if ( post_password_required() ) {
	return;
} ?>

	<div id="comments" class="comments-area<?php if ( ! have_comments() ) { echo '  no-comments'; } ?>">
		<div class="comments-area-title">
			<p class="font-primary igl-text-secondary text-5xl uppercase">comment below</p>
		</div>
		<?php
		
		if ( have_comments() ) : ?>

			<ol class="comment-list">
				<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use wpgrade_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define wpgrade_comment() and that will be used instead.
				 * See wpgrade_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments(); ?>
			</ol><!-- .commentlist -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
				<span class="comment-number  comment-number--dark">&bull;</span>
				<h3 class="comment-navigation__title  assistive-text"><?php esc_html_e( 'Comment navigation'); ?></h3>
				<div class="nav-previous"><?php previous_comments_link( '&larr; Older Comments' ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;') ); ?></div>
			</nav><!-- #comment-nav-below .site-navigation .comment-navigation -->
		<?php endif; // check for comment navigation ?>


		<?php endif; // have_comments() ?>

	</div><!-- #comments .comments-area -->
<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && post_type_supports( get_post_type(), 'comments' ) && ! is_page() ) :
	?>
	<p class="nocomments"><span class="comment-number comment-number--dark  no-comments-box"><i class="icon  icon-times"></i></span><span><?php esc_html_e( 'Comments are closed.' ); ?></span></p>
<?php endif;

$commenter = wp_get_current_commenter();
$req       = get_option( 'require_name_email' );
$aria_req  = ( $req ? " aria-required='true'" : '' );

if ( is_user_logged_in() ) {
	$comments_args = array(
		// change the title of send button=
		'title_reply'          => esc_html__( 'Leave a Comment' ),
		// remove "Text or HTML to be displayed after the set of comment fields"
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'fields'               => apply_filters( 'comment_form_default_fields', array(
			'author' => '<p class="comment-form-author"><label for="author" class="show-on-ie8">Name (required)</label><input id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" type="text" placeholder="' . esc_attr__( 'Name') . '..." size="30" ' . $aria_req . ' /></p>',
			'email'  => '<p class="comment-form-email"><label for="email" class="show-on-ie8">Email (Will not be published, required)</label><input id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" type="text" placeholder="' . esc_attr__( 'your@email.com') . '..." ' . $aria_req . ' /></p>'

			) ),
		'id_submit'            => 'comment-submit',
		'label_submit'         => esc_html__( 'Submit'),
		// redefine your own textarea (the comment body)
		'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="show-on-ie8"></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Write your comment here...') . '"></textarea></p>'
	);
} else {
	$comments_args = array(
		// change the title of send button
		'title_reply'          => esc_html__( 'Leave a Comment'),
		// remove "Text or HTML to be displayed after the set of comment fields"
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'fields'               => apply_filters( 'comment_form_default_fields', array(
			'author' => '<p class="comment-form-author"><label for="author" class="show-on-ie8">' . esc_html__( 'Name (required)') . '</label><input id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" type="text" placeholder="' . esc_attr__( 'Name') . '..." size="30" ' . $aria_req . ' /></p><!--',
			'email'  => '--><p class="comment-form-email"><label for="name" class="show-on-ie8">' . esc_html__( 'Email (Will not be published, required)') . '</label><input id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" type="text" placeholder="' . esc_attr__( 'your@email.com') . '..." ' . $aria_req . ' /></p><!--',
			'url'    => '--><p class="comment-form-url"><label for="url" class="show-on-ie8">' . esc_html__( 'Url') . '</label><input id="url" name="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_attr__( 'Website') . '..." type="text"></p>'
		) ),
		'id_submit'            => 'comment-submit',
		'label_submit'         => esc_html__( 'Submit'),
		// redefine your own textarea (the comment body)
		'comment_field'        => '<p class="comment-form-comment"><label for="comment" class="show-on-ie8"></label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Your thoughts..') . '"></textarea></p>'
	);
}

//if we have no comments than we don't a second title, one is enough
if ( ! have_comments() ) {
	$comments_args['title_reply'] = '';
}

comment_form( $comments_args );
?>
</div>
<?php
$post_id = $post->ID; // current post ID
$cat = get_the_category(); 
$current_cat_id = $cat[0]->cat_ID; // current category ID 

$args = array( 
    'category' => $current_cat_id,
    'orderby'  => 'post_date',
    'order'    => 'DESC'
);
$posts = get_posts( $args );
// get IDs of posts retrieved from get_posts
$ids = array();
foreach ( $posts as $thepost ) {
    $ids[] = $thepost->ID;
}
// get and echo previous and next post in the same category
$thisindex = array_search( $post_id, $ids );
$previd    = isset( $ids[ $thisindex - 1 ] ) ? $ids[ $thisindex - 1 ] : false;
$nextid    = isset( $ids[ $thisindex + 1 ] ) ? $ids[ $thisindex + 1 ] : false;
?>
	<div class="grid grid-cols-3 ml-auto mr-auto otherarticles sm:7/12 text-center w-11/12">
	<?php
		if (false !== $previd ) {
			?><a rel="prev" class="font-primary igl-background-secondary igl-button igl-red-button mr-auto mt-auto prevarticle pl-10 pr-10 text-white uppercase" href="<?php echo get_permalink($previd) ?>">< <?php echo get_the_title($previd); ?></a><?php
		}else{
			?> <span class="noref"></span><?php
		}
		?>
		<a rel="backto" class="backto font-primary igl-button igl-red-button ml-auto mr-auto pl-10 pr-10 uppercase" href="/stories">back to all news stories</a>
		<?php
		if (false !== $nextid ) {
			?><a rel="next" class="font-primary igl-background-secondary igl-button igl-red-button ml-auto mt-auto nextarticle pl-10 pr-10 text-white uppercase" href="<?php echo get_permalink($nextid) ?>"><?php echo get_the_title($nextid); ?> ></a><?php
		}else{
			?> <span class="noref"></span><?php
		}
	?>
	</div>
</article><!-- #post-## -->
<?php	get_template_part( 'template-parts/featured-fund'); ?>

