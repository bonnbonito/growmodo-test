<?php
/**
 * Front page call-to-action banner.
 *
 * @package bonn_growmodo
 */

namespace Bonn\GrowModo;

$wprig_img_uri = get_theme_file_uri( 'assets/images/' );
$wprig_cta = array(
	'title' => bonn_growmodo()->get_setting( 'footer_cta_title' ) ? bonn_growmodo()->get_setting( 'footer_cta_title' ) : __( 'Start Your Real Estate Journey Today', 'bonn-growmodo' ),
	'text' => bonn_growmodo()->get_setting( 'footer_cta_description' ) ? bonn_growmodo()->get_setting( 'footer_cta_description' ) : __( "Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Take the first step towards your real estate goals and explore our available properties or get in touch with our team for personalized assistance.", 'bonn-growmodo' ),
	'button_text' => bonn_growmodo()->get_setting( 'footer_cta_button_text' ) ? bonn_growmodo()->get_setting( 'footer_cta_button_text' ) : __( 'Explore Properties', 'bonn-growmodo' ),
	'button_url' => bonn_growmodo()->get_setting( 'footer_cta_button_url' ),
);
$wprig_cta = apply_filters( 'bonn_growmodo_footer_cta', $wprig_cta );
?>
<section class="cta">
	<div class="cta__content">
		<h2 class="cta__title"><?php echo esc_html( $wprig_cta['title'] ); ?></h2>
		<p class="cta__text"><?php echo esc_html( $wprig_cta['text'] ); ?></p>
	</div>
	<a class="btn btn--primary cta__button"
		href="<?php echo esc_url( $wprig_cta['button_url'] ); ?>"><?php echo esc_html( $wprig_cta['button_text'] ); ?></a>
</section><!-- .cta -->