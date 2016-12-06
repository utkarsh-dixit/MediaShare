<?php
/*/
Plugin Name: Media Share
Plugin URI: brutable.com
Description: An media share plugin for wordpress.
Version: 101
Author: Hudixt
Author URI: http://brutable.com
/*/

// create custom plugin settings menu
add_action('admin_menu', 'media_share_create_menu');

function media_share_create_menu() {

	//create new top-level menu
	add_menu_page('Media Share Plugin Settings', 'Media Share Settings', 'administrator', __FILE__, 'media_share_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register' );
}


function register() {
	//register our settings
	register_setting( 'media_share', 'facebook' );
	register_setting( 'media_share', 'twitter' );
	register_setting( 'media_share', 'linkedin' );
		register_setting( 'media_share', 'reddit' );
			register_setting( 'media_share', 'google' );
				register_setting( 'media_share', 'pinterest' );
	register_setting( 'media_share', 'Style' );
	register_setting( 'media_share', 'Class1' );
	register_setting( 'media_share', 'Class2' );
	register_setting( 'media_share', 'Class3' );
	register_setting( 'media_share', 'Class4' );	
}

function media_share_settings_page() {

?>



<div class="wrap">
<h2>Media Share</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'media_share' ); ?>
    <?php do_settings_sections( 'media_share' ); ?>
    <table class="form-table">

        <tr valign="top">
        <th scope="row">Facebook</th>
        <td><input type="checkbox" class="share" name="facebook" value="1" <?php if(get_option('facebook')=="1"){ echo "checked";}?> /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Twitter</th>
        <td><input type="checkbox" class="share" name="twitter" value="1" <?php if(get_option('twitter')=="1"){ echo "checked";}?> /></td>
        </tr>
         <tr valign="top">
        <th scope="row">Pinterest</th>
        <td><input type="checkbox" class="share" name="pinterest" value="1" <?php if(get_option('pinterest')=="1"){ echo "checked";}?> /></td>
        </tr>

 <tr valign="top">
        <th scope="row">Reddit</th>
        <td><input type="checkbox" class="share" name="reddit" value="1" <?php if(get_option('reddit')=="1"){ echo "checked";}?> /></td>
        </tr>

 <tr valign="top">
        <th scope="row">Twitter</th>
        <td><input type="checkbox" class="share" name="twitter" value="1" <?php if(get_option('twitter')=="1"){ echo "checked";}?> /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Linkedin</th>
        <td><input type="checkbox" class="share" name="linkedin" value="1" <?php if(get_option('linkedin')=="1"){ echo "checked";}?> /></td>
        </tr>
   <tr valign="top">
        <th scope="row">Style 1</th>
        <td><input type="radio" class="share" name="Style" value="1" <?php if(get_option('Style')=="1"){ echo "checked";}?> >Style 1</td>
        </tr>
   <tr valign="top">
        <th scope="row">Style 2</th>
        <td><input type="radio" class="share" name="Style" value="2" <?php if(get_option('Style')=="2"){ echo "checked";}?> > Style 2</td>
        </tr>
   <tr valign="top">
        <th scope="row">Style 3</th>
        <td><input type="radio" class="share" name="Style" value="3" <?php if(get_option('Style')=="3"){ echo "checked";}?> > Style 3</td>
        </tr>
   <tr valign="top">
        <th scope="row">Style 4</th>
        <td><input type="radio" class="share" name="Style" value="4" <?php if(get_option('Style')=="4"){ echo "checked";}?> > Style 4</td>
        </tr>
        <tr valign="top">
        <th scope="row">Style 5</th>
        <td><input type="radio" class="share" name="Style" value="5" <?php if(get_option('Style')=="5"){ echo "checked";}?> > Style 5</td>
        </tr>


   <tr valign="top">
        <th scope="row">Class 1</th>
        <td><input type="text" class="share" name="Class1" value="<?php if(get_option('Class1')!==""){ echo get_option('Class1');}?>" /></td>
        </tr>
<tr valign="top">
        <th scope="row">Class 2</th>
        <td><input type="text" class="share" name="Class2" value="<?php if(get_option('Class2')!==""){ echo get_option('Class2');}?>" /></td>
        </tr>
<tr valign="top">
        <th scope="row">Class 3</th>
        <td><input type="text" class="share" name="Class3" value="<?php if(get_option('Class3')!==""){ echo get_option('Class3');}?>" /></td>
        </tr>
<tr valign="top">
        <th scope="row">Class 4</th>
        <td><input type="text" class="share" name="Class4" value="<?php if(get_option('Class4')!==""){ echo get_option('Class4');}?>" /></td>
        </tr>
</table>
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
<?php
function theme_slug_filter_the_content( $content ) {
$facebook = get_option('facebook');
$twitter = get_option('twitter');
$pinterest = get_option('pinterest');
$google = get_option('google');
$reddit = get_option('reddit');
$linkedin = get_option('linkedin');
if($facebook == 1)
{
$content1 = '"facebook"';
}
else
{
}
if($twitter == 1)
{
$content1 = $content1.',"twitter"';
}
else{
}

if($pinterest == 1)
{
$content1 = $content1.',"pinterest"';

}
else{

}

if($google == 1)
{
$content1 = $content1.',"google"';

}
else{
}
if($linkedin == 1)
{
$content1 = $content1.',"linkedin"';
}
else
{
}

if($reddit== 1)
{
$content1 = $content1.',"reddit"';

}
else{
$reddit = "";
}

$style=get_option("Style");
$class1=get_option("Class1");
$class2=get_option("Class2");
$class3=get_option("Class3");
$class4=get_option("Class4");
    $custom_contente = '.sti({
     			primary_menu: ['.$content1.' ]
});
';
if ($class1<>'')
{$custom_content1 = 'jQuery(".'.$class1.'")'.$custom_contente;
}
if ($class2<>'')
{$custom_content2 = 'jQuery(".'.$class2.'")'.$custom_contente;
}

if ($class3<>'')
{$custom_content3 = 'jQuery(".'.$class3.'")'.$custom_contente;
}
if ($class4<>'')
{$custom_content4 = 'jQuery(".'.$class4.'")'.$custom_contente;
}

$custom_content .= '<script  type="text/javascript"> 
jQuery(window).load(function() {
'.$custom_content1.$custom_content3.$custom_content5.$custom_content4.'
});
</script>'.$style;

    $custom_content .= $content;
    return $custom_content;
}
add_filter( 'the_content', 'theme_slug_filter_the_content' );

add_action( 'wp_enqueue_scripts', 'my_js_include_function' );
function my_js_include_function() {
    wp_enqueue_script( 'media_share.js', plugins_url('mediashare.js', __FILE__) , array('jquery') );
}
$url = $style.'/this.css';
add_action( 'wp_enqueue_scripts', 'mediasharecss' );

$style=get_option("Style");
if($style=='1')
{

    function mediasharecss() {
        wp_enqueue_style( 'prefix-style', plugins_url('style1/this.css', __FILE__) );
    }
}
elseif($style=='2')
{

    function mediasharecss() {
        wp_enqueue_style( 'prefix-style', plugins_url('style2/this.css', __FILE__) );
    }
}
elseif($style=='3')
{

    function mediasharecss() {
        wp_enqueue_style( 'prefix-style', plugins_url('style3/this.css', __FILE__) );
    }
}
elseif($style=='4'){

    function mediasharecss() {
        wp_enqueue_style( 'prefix-style', plugins_url('style4/this.css', __FILE__) );
    }
}
elseif($style=='5')
{

    function mediasharecss() {
        wp_enqueue_style( 'prefix-style', plugins_url('style5/this.css', __FILE__) );
    }
}


?>