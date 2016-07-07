<?php
// Script and css in head
function ki_orion_script() {
	wp_enqueue_style('ki-orion-style', get_stylesheet_uri(), array(), null, 'all');	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'kcss', get_template_directory_uri().'/js/kcss.js', array('jquery'), null, false);
	wp_enqueue_script( 'togglemenu', get_template_directory_uri().'/js/togglemenu.js', array('jquery'), null, false);
}
add_action('wp_enqueue_scripts','ki_orion_script');

// Custom menu
function action_navigation_menu_setup(){
	register_nav_menus( array('gnav' => 'Header navigation' ,
							  'snav' => 'Sub navigation',
							  'fnav' => 'Footer navigation'));
}
add_action('after_setup_theme', 'action_navigation_menu_setup');

// Disable serial number at nav menus
add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

// Enable widget
function ki_widgets_init() {
 register_sidebar(array(
 'name' => 'sidebar1',
 'id' => 'sidebar1',
 'description' => 'sidebar first menu',
 'before_title' => '<h3 class="side-itle">',
 'after_title' => '</h3>'
 ));
 
 register_sidebar(array(
 'name' => 'sidebar2',
 'id' => 'sidebar2',
 'description' => 'sidebar second menu',
 'before_title' => '<h3 class="side-itle">',
 'after_title' => '</h3>'
 ));
}
add_action('widgets_init','ki_widgets_init');

// Enable thumbnail image 
add_theme_support( 'post-thumbnails' );

// Enable editor style
add_editor_style('editor-style.css');

// title tag
add_theme_support( 'title-tag' );

/* Enable custom header
add_theme_support(array(
	'default-image'			=> '',
	'random-default'		=> false,
	'width'					=> 1920,
	'height'				=> 500,
	'flex-height'			=> true,
	'flex-width'			=> true,
	'default-text-color'	=> '',
	'header-text'			=> true,
	'uploads'				=> true,
	'wp-head-callback'		=> '',
	'admin-head-callback'	=> '',
	'admin-preview-callback'=> '',
));
add_theme_support( 'custom-header', $defaults );
*/

//　The list of categories
function ki_catlist() {
	$kiexcat = get_category_by_slug('top') -> term_id;
	echo '<ul class="sitemap">';
	wp_list_categories(array(
							 'hide_empty' => 0,
							 'exclude' => $kiexcat,
							 'title_li' => "",
							 'carrent_category' => 1,
							 ));
	echo '</ul>';
}

// Title tag

/*
	アーカイブページで現在のカテゴリー・タグ・タームを取得する
*/
function get_current_term(){
	$id;
	$tax_slug;
	if(is_category()){
		$tax_slug = "category";
		$id = get_query_var('cat');	
	}else if(is_tag()){
		$tax_slug = "post_tag";
		$id = get_query_var('tag_id');	
	}else if(is_tax()){
		$tax_slug = get_query_var('taxonomy');	
		$term_slug = get_query_var('term');	
		$term = get_term_by("slug",$term_slug,$tax_slug);
		$id = $term->term_id;
	}
	return get_term($id,$tax_slug);
}
/*
  参照： http://blog.ks-product.com/wrodpress-get-current-term/
  
あとはアーカイブ（category.php、tag.phpなど）テンプレートの任意の場所に以下のソースコードを記述
$term = get_current_term(); 
//以下は必要に応じて記述
echo $term->name; //名前を表示
echo $term->slug; //スラッグを表示
echo $term->description; //説明文を表示
echo $term->count; //投稿数を表示
*/

// Call page content by slug.
function ki_page_content($pageslug) {
	$kipage_query = new WP_Query(array('pagename' => $pageslug ));
	if ($kipage_query -> have_posts()):  $kipage_query -> the_post();
			the_content();
		endif;
    wp_reset_postdata();
}

// Call page link by slug.
function ki_page_link($page_slug) {
	$kipage_query = new WP_Query(array('pagename' => $page_slug ));
	if ($kipage_query -> have_posts()):  $kipage_query -> the_post();
			the_permalink();
		endif;
	wp_reset_postdata();
}

// Call category archive link by category slug.
function ki_cat_link($cat_slug) {
	$kicat_query = get_category_by_slug($cat_slug);
	echo get_category_link($kicat_query->term_id); 
}
