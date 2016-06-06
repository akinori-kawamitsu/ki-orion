<!-- ここからOGP -->
<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" />
<?php
if (is_singular() && ! is_archive() && ! is_front_page() && ! is_home()){//投稿ページ、固定ページの場合
     if(have_posts()): while(have_posts()): the_post();
          echo '<meta property="og:title" content="'.the_title("", "", false).'" />';echo "\n";
          echo '<meta property="og:description" content="'.mb_substr(get_the_excerpt(), 0, 100).'" />';echo "\n";//抜粋を表示
     endwhile; endif;
} else {//投稿ページ以外の場合（アーカイブページやホームなど）
     echo '<meta property="og:title" content="'; bloginfo('name'); echo'" />';echo "\n";
     echo '<meta property="og:description" content="'; bloginfo('description'); echo '" />';echo "\n";//「一般設定」管理画面で指定したブログの説明文を表示
}
?>
<?php
$str = $post->post_content;
$searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';//投稿にイメージがあるか調べる
if (has_post_thumbnail() && ! is_archive() && ! is_front_page() && ! is_home()){
     $image_id = get_post_thumbnail_id();
     $image = wp_get_attachment_image_src( $image_id, 'full');
     echo '<meta property="og:image" content="'.$image[0].'" />';echo "\n";
} else if ( preg_match( $searchPattern, $str, $imgurl ) && ! is_archive() && ! is_front_page() && ! is_home()) {
     echo '<meta property="og:image" content="'.$imgurl[2].'" />';echo "\n";
} else {//投稿にサムネイルも画像も無い場合、もしくはアーカイブページの処理
     echo '<meta property="og:image" content="" />';echo "\n";
}
?>
<!-- ここまでOGP -->
