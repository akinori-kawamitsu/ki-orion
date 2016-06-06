<?php
function ki_orion_script() {
	wp_enqueue_style('ki-orion-style', get_stylesheet_uri(), array(), null, 'all');	
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'kcss', get_template_directory_uri().'/js/kcss.js', array('jquery'), null, false);
	wp_enqueue_script( 'togglemenu', get_template_directory_uri().'/js/togglemenu.js', array('jquery'), null, false);
}
add_action('wp_enqueue_scripts','ki_orion_script');


function action_navigation_menu_setup(){
	register_nav_menus( array('gnav' => 'グローバルナビゲーション' ,
							  'snav' => 'サブナビゲーション',
							  'fnav' => 'フッターナビゲーション'));
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
if (function_exists('register_sidebar')) {
 
 register_sidebar(array(
 'name' => 'サイドバー1',
 'id' => 'sidebar1',
 'description' => '3カラムタイプの場合、左サイドバーに入れる項目をここに配置します。',
 'before_title' => '<h3 class="side-itle">',
 'after_title' => '</h3>'
 ));
 
 register_sidebar(array(
 'name' => 'サイドバー2',
 'id' => 'sidebar2',
 'description' => '右サイドバーに入れる項目をここに配置します。',
 'before_title' => '<h3 class="side-itle">',
 'after_title' => '</h3>'
 ));
 
}

// Enable thumbnail image 
add_theme_support( 'post-thumbnails' );
// Enable editor style
add_editor_style('editor-style.css');
// Enable jQuery



//　カテゴリーのリスト
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

// taglist
function ki_taglist(){
	wp_tag_cloud(array(
					   'format' => 'list',
					   'smallest' => 13,
					   'largest' => 13,
					));
}
add_shortcode('taglist','ki_taglist');

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

/*ビジュアルリッチエディタにボタン追加*/
function ilc_mce_buttons($buttons){
array_push($buttons, "backcolor", "copy", "cut", "paste", "fontsizeselect", "cleanup");
return $buttons;
}
add_filter("mce_buttons", "ilc_mce_buttons");


