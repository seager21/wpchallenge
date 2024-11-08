<?php
/**
 * Right Buttons Panel.
 *
 * @package prime_electronic_store
 */
?>
<div class="panel-right">
	<div class="prime-electronic-store-button-container">
		<a target="_blank" href="<?php echo esc_url( PRIME_ELECTRONIC_STORE_DEMO_URL ); ?>" class="button button-primary solo1">
			<?php esc_html_e("THEME DEMO", "prime-electronic-store"); ?>
		</a>
		<a target="_blank" href="<?php echo esc_url( PRIME_ELECTRONIC_STORE_URL ); ?>" class="button button-primary solo2">
			<?php esc_html_e("GO PRO", "prime-electronic-store"); ?>
		</a>
		<a target="_blank" href="<?php echo esc_url( PRIME_ELECTRONIC_STORE_BUNDLE_URL ); ?>" class="button button-primary solo2">
			<?php esc_html_e("BUY ALL THEMES", "prime-electronic-store"); ?>
		</a>
		<a target="_blank" href="<?php echo esc_url( PRIME_ELECTRONIC_STORE_PRO_DOC_URL ); ?>" class="button button-primary solo1">
			<?php esc_html_e("PRO DOCUMENTATION ", "prime-electronic-store"); ?>
		</a>
	</div>
	<div class="panel-aside">
		<h4><?php esc_html_e( 'UPGRADE TO PRO', 'prime-electronic-store' ); ?></h4>
		<p><?php esc_html_e( 'The Pro version of our theme offers a seamless website customization experience with its intuitive interface. With just a few clicks, you can effortlessly transform the look and feel of your website. Enjoy the freedom to personalize various elements such as colors, background images, patterns, and fonts, elevating your website s aesthetics and brand identity.In addition, the Pro theme goes beyond the basic features of the free version by providing an expanded selection of homepage sections. This enables you to effectively showcase your organizations services and offerings, empowering the growth of your business or cause. Moreover, the Pro version includes a wide range of professionally designed page templates, giving you a head start in creating impactful web pages with ease.
            To ensure a top-notch experience, the Pro version receives regular updates, ensuring compatibility with the latest web technologies and maintaining optimal performance. Additionally, our dedicated support team is readily available to address any questions or concerns you may have, providing timely assistance when you need it most.', 'prime-electronic-store' ); ?></p>
		<a class="button button-primary" href="<?php echo esc_url( PRIME_ELECTRONIC_STORE_URL ); ?>" title="<?php esc_attr_e( 'View Premium Version', 'prime-electronic-store' ); ?>" target="_blank">
            <?php esc_html_e( 'READ MORE ABOUT THE FEATURES HERE', 'prime-electronic-store' ); ?>
        </a>
	</div>
</div>