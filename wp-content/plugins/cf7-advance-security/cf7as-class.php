<?php
/*
 * CF7 Advance Security(C)
 * @get_cf7as_sidebar_options()
 * @get_cf7as_sidebar_content()
 * */
?>
<?php 
// get all options value for "Custom Share Buttons with Floating Sidebar"
// Get plugin options
$isEnable=get_option('cf7as_captcha');
/** Start Captcha Code */
if( !empty($isEnable) ) {
	
	add_action( 'wpcf7_init', 'cf7as_shortcodes_capctha' );	
	
	add_filter( 'wpcf7_validate_cf7ascaptcha', 'cf7as_captcha_confirmation_validation_filter', 10, 2 );
	
	add_filter( 'wpcf7_validate_cf7ascaptcha*', 'cf7as_captcha_confirmation_validation_filter', 10, 2 );
	
	if( !function_exists('cf7as_captcha_confirmation_validation_filter') ) :
	
		function cf7as_captcha_confirmation_validation_filter( $result, $tag ) {
			//check captcha type
			if( $tag->type=='cf7ascaptcha' ) {
				
				$tag->name= 'cf7as-captchcode';
				$finalCechking = '';
				$cptha1=sanitize_text_field($_POST['cf7as_hdn_cpthaval1']);
				$cptha2=sanitize_text_field($_POST['cf7as_hdn_cpthaval2']);
				$cptha3=sanitize_text_field($_POST['cf7as_hdn_cpthaaction']);
				
				if( $cptha3=='x' ) { 
					$finalCechking=( $cptha1*$cptha2 );
				}elseif( $cptha3=='+' ) { 
					$finalCechking=( $cptha1+$cptha2 );
				}else {
					$finalCechking=( $cptha1-$cptha2 );
					}
				$cptcha_value = isset( $_POST['cf7as-captchcode'] )	? trim( wp_unslash( strtr( (string) $_POST['cf7as-captchcode'], "\n", " " ) ) )	: '';
				
				if( $cptcha_value=='' ) {
					$result->invalidate($tag,'Captcha is required.');
				}
				
				if( $cptcha_value!='' && $cptcha_value!=$finalCechking ) {
					
					$result->invalidate($tag,'Wrong answer!');
				 }
				 //check double security
				 $cptcha_value = isset( $_POST['cf7as-zplus'] )	? sanitize_text_field($_POST['cf7as-zplus'])	: '';
				 
				 if( $cptcha_value!='' ) {
					$result->invalidate($tag,'Spam killer activated');
				  }
			 
			}
			return $result;
     }
  endif;
}
/** captcha */
if( !function_exists('cf7as_shortcodes_capctha') ) :

 function cf7as_shortcodes_capctha() {
			wpcf7_add_form_tag(
				'cf7ascaptcha',
				'cf7as_captcha_shortcode_handler', 
				array( 
					'name-attr' => true 
					)
			);
 }
endif;
if( !function_exists('cf7as_captcha_shortcode_handler') ) :

	function cf7as_captcha_shortcode_handler( $tag ) {
		
		$operationAry=array('+','x','-');
		$random_action=array_rand($operationAry,2);
		$random_actionVal=$operationAry[$random_action[0]];
		$actnVal1=rand(1,9);
		$actnVal2=rand(1,9);
		$cf7as_captcha='<p class="cf7ascaptcha"><input name="cf7as_hdn_cpthaval1" id="cf7as_hdn_cpthaval1" type="hidden" value="'.$actnVal1.'" /><input name="cf7as_hdn_cpthaval2" id="cf7as_hdn_cpthaval2" type="hidden" value="'.$actnVal2.'" /><input name="cf7as_hdn_cpthaaction" id="cf7as_hdn_cpthaaction" type="hidden" value="'.$random_actionVal.'" />';
		$cf7as_captcha.='What is <span class="cf7as-firstAct">'.$actnVal2.'</span> '.$random_actionVal.'<span class="cf7as-firstAct"> '.$actnVal1.'</span> ? <br><span class="wpcf7-form-control-wrap cf7as-captchcode"> <input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" size="5" value="" name="cf7as-captchcode" placeholder="Type your answer" style="width:200px;margin-bottom:10px;" oninput="this.value = this.value.replace(/[^0-9.]/g, \'\').replace(/(\..*)\./g, \'$1\');"></span><input type="hidden" name="cf7as-zplus" value=""></p>';
		return $cf7as_captcha;
	}
endif;
/** End Captcha Code */
/** form css */
add_action('wp_head','add_cf7as_inline_style');

if( !function_exists('add_cf7as_inline_style') ) :
	function add_cf7as_inline_style() {
		
		$inlinecss=get_option('cf7as-inlinecss');

		$cf7as_style='<style>'.$inlinecss.'</style>';
		
		print $cf7as_style;
	}
endif;