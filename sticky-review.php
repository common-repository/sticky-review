<?php 
/*
 * Plugin Name: Sticky Review
 * Plugin URI: https://wordpress.org/plugins/sticky-review
 * Description: You can Show your your product or site reviews with this plugin easily.
 * Version: 1.0.1
 * Author: bPlugins
 * Author URI: bPlugins.com
 * Text Domain: sticky-review
 * Domain Path: /languages
 * License: GPLv3
 */

/* Plugin Initialization */
define('SRS_PLUGIN_DIR', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' ); 
define('SRS_VER', '1.0.1' ); 

add_action('plugin_loaded','bpsr_load_textdomain');
function bpsr_load_textdomain(){
	load_textdomain('sticky-review', SRS_PLUGIN_DIR.'languages');
}

//Script and style
function bpsr_style_and_scripts() {
	wp_enqueue_style( 'review-style', SRS_PLUGIN_DIR. 'public/assets/css/review-style.css' , array(), SRS_VER, 'all');
	wp_enqueue_script( 'sticky-main-js', SRS_PLUGIN_DIR. 'public/assets/js/main.js' , array('jquery'), SRS_VER , true );
}
add_action( 'wp_enqueue_scripts', 'bpsr_style_and_scripts' );

// Sticky Reviews
function bpsr_reveiw_content(){ ?>
<div class="srs-core-ui">
	<div class="srs-review-slider">
		<div class="srs-review-container">
			
				<!-- GET OPTION DATA FROM CODESTAR -->
				<?php $sr_opt = get_option('_b_sticky_review'); ?>
				<style>
					.srs-review-slider {
						bottom: 0;
						<?php echo esc_html($sr_opt['sr_review_position']); ?>: 2%;
					}
					.srs-review-slider .srs-review {
						background: <?php echo esc_attr($sr_opt['sr_review_bg']); ?>;
						color: <?php echo esc_attr($sr_opt['sr_text_color']); ?>;
					}
					.srs-footing .srs-button {
						color: <?php echo esc_attr($sr_opt['sr_btn_link_color']); ?>;
					}
					.srs-footing a:hover {
						color:<?php echo esc_attr($sr_opt['sr_btn_link_hover']); ?>;
						border-bottom: 1px solid <?php echo esc_attr($sr_opt['sr_btn_link_hover']); ?>;
					}
					.close_btn {
						color: <?php echo esc_attr($sr_opt['sr_text_color']); ?>;
					}
				</style>
				<?php 

				if(isset($sr_opt['sr_reviews']) && is_array($sr_opt['sr_reviews'])):
				foreach($sr_opt['sr_reviews'] as $sr_meta ): ?>
				
				<div class="srs-review review1.1 srs-curr srs-prev">
					<div class="close_btn">&#x2715;</div>
					<div class="srs_left">
						<?php if( $sr_opt['sr_img'] ): ?>
							<img class="srs-gravatar" src="<?php echo esc_url($sr_opt['sr_img']); ?>">
						<?php else: ?>
							<img class="srs-gravatar" src="<?php echo plugin_dir_url( __FILE__ ); ?>assets/img/rev-hand.png">
						<?php endif; ?>
						<p>
						<?php 
							if( !empty($sr_opt['sr_title'])){
							 echo esc_html($sr_opt['sr_title']);
							 }else{
								echo esc_html__('Reviews', 'sticky-reiview'); 
							}
						?>
						</p>
					</div>
					<div class="srs_right">
						<h3 class="srs-heading"><?php echo esc_html($sr_meta['sr_name']); ?></h3>
						<span class="rating">
							<?php 
							$sr_ratings = $sr_meta['sr_ratings'];
							for($i = 0; $i < $sr_ratings; $i++ ){ ?><i class="star_rating"></i><?php } ?>
						</span>
						<div class="srs-content">
						<?php 
							if( isset($sr_meta['sr_text']) && !empty($sr_meta['sr_text'])){
								echo esc_html(wp_trim_words( $sr_meta['sr_text'], 15, '...' ));
							}
						?>
						</div>
						<div class="srs-footing">
							<?php if($sr_opt['sr_review_page']['url']): ?>
								<a class="srs-button srs-small" href="<?php echo esc_url($sr_opt['sr_review_page']['url']); ?>" target="<?php echo esc_attr($sr_opt['sr_review_page']['target']); ?>"><?php echo esc_html($sr_opt['sr_review_page']['text']); ?></a>
							<?php else: ?>
								<div class="srs-footing">
									<a class="srs-button srs-small" href="#" target="_blank"><?php esc_html_e('View More', 'sticky-review'); ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<?php else: 
				for($i=0; $i< 2; $i++): ?>
				<div class="srs-review review1.1 srs-curr srs-prev">
					<div class="close_btn">&#x2715;</div>
					<div class="srs_left">
						<img class="srs-gravatar" src="<?php echo SRS_PLUGIN_DIR; ?>public/assets/img/rev-hand.png">
						<p><?php echo esc_html__('Review', 'sticky-review'); ?></p>
					</div>
					<div class="srs_right">
						<h3 class="srs-heading"><?php echo esc_html__('John Doe','sticky-review'); ?></h3>
						<span class="rating">
						<i class="star_rating"></i><i class="star_rating"></i><i class="star_rating"></i><i class="star_rating"></i><i class="star_rating"></i>
						</span>
						<div class="srs-content">
						<?php echo esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat sequi laboriosam sunt similique suscipit cupiditate optio tempora doloremque vel debitis?', 'sticky-review'); ?></div>
						<div class="srs-footing">
							<a class="srs-button srs-small" href="#" target="_blank"><?php echo esc_html__('View More', 'sticky-review'); ?></a>
						</div>
					</div>
				</div>
			<?php endfor; endif; ?>
		</div>
	</div>
</div>
<!-- End of srs-core-ui -->

<?php
}
add_action( 'wp_footer', 'bpsr_reveiw_content');

// Option panel
require_once 'inc/codestar/codestar-framework.php';
require_once 'inc/sticky-review-options.php';