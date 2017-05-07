<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package TeamOne
 */
?>
	</div>
	</div>

	<div id="footer">
		<div class="footer_column">
			<h2>COURSES &amp; CLINICS</h2>
			<ul>
				<li>Dog HAndling</li>
				<li>Horse Handling</li>
				<li>Cattle Station</li>
				<li>1 Day Clinics</li>
				<li>2 Day Clinics</li>
				<li>4 Week Course</li>
				<li>General Enquiries</li>
			</ul>
		</div>
		<div class="footer_column">
			<h2>SHOP</h2>
			<ul>
				<li>Horse equip</li>
				<li>Dog equip</li>
				<li>outdoor gear</li>
				<li>preferred suppliers</li>
				<li>My Account</li>
				<li>Browse All</li>
			</ul>
		</div>
		<div class="footer_column">
			<h2>ABOUT</h2>
			<ul>
				<li>Geoff &amp; Vicki</li>
				<li>Our Trainers</li>
				<li>Trainees</li>
				<li>How to get here</li>
				<li>Stay with Us</li>
				<li>FAQ</li>
			</ul>
		</div>
		<div class="footer_column">
			<h2>LINKS</h2>
			<ul class="socialize">
				<li>
					<?php if (get_theme_mod( 'facebook_account' )) : ?>
					<a class="socialicon facebookicon" href="<?php echo esc_url(get_theme_mod( 'facebook_account')); ?>" target="blank"></a>
					<?php endif ?>
				</li>
				<li>
					<?php if (get_theme_mod( 'linkedin_account' )) : ?>
					<a class="socialicon linkedinicon" href="<?php echo esc_url(get_theme_mod( 'linkedin_account')); ?>" target="blank"></a>
					<?php endif ?>
				</li>
			</ul>


		</div>
		<div class="footer_column">
			<h2>CONTACT</h2>
			<ul>
				<li>Wonderland Station</li>
				<li>1486 Hervey Range Road</li>
				<li>Alice River</li>
				<li>Queensland</li>
				<li><a class="tel" href="tel:+61747888222">+61(0)7 4788 8222</a></li>
				<li><a class="mail" href="mailto:gandvtoomby@bigpond.com">gandvtoomby@bigpond.com</a></li>
			</ul>
		</div>

		<div id="copyinfo">
			<a href="<?php echo esc_url( esc_attr__( 'http://wordpress.org/', 'teamone' ) ); ?>">
				<?php printf( esc_attr__( 'Made with L&#9829;ve.', 'teamone' ), 'WordPress' ); ?>
			</a>
			<?php printf( esc_attr__( '  %1$s by %2$s.', 'teamone' ), 'teamone', '<a href="http://cp3402.freddymutnosh.com/" rel="designer">Ashley Ryland, Daniel Tomasic, Mick White</a>' ); ?></div>
	</div>
	</div>
	</div>
	<?php wp_footer(); ?>
	</body>

	</html>
