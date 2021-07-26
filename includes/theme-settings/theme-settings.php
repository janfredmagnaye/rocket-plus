<?php
	/**
	 * Register Theme Options
	 */
	function rocketThemeOptions(){
		  add_theme_page(
			  'Rocket Theme Options', 	//Page Title
			  'Rocket Theme Options',   //Menu Title
			  'manage_options', 			//Capability
			  'theme-options', 				//Page ID
			  'rocketThemeOptionsPage',		//Functions
			  null, 						//Favicon
			  99							//Position
		  );
	}
	/**
	 * Theme Options Page
	 */
	function rocketThemeOptionsPage() {
		echo '<div class="wrap">';
			echo '<h1>Primeview Rocket Theme Options</h1>';

			$tab_option = array ('Home','Social Media','Website Settings','Frontend Settings', 'Page Settings', 'Copyright Section', 'Add ons','Third Party Scripts','Optimizations','Woocommerce Support');
			$x = 0;
			echo '<div class="tab">';
			foreach ($tab_option as $option_setting) {
				echo '<button id="tab-'.$x.'" class="tablinks" onclick="openTabRocket(event, '.$x.')">'.$option_setting.'</button>';
				$x++;
			}
			echo '</div>';
			?>
			<!-- Home -->
			<div id="0" class="tabcontent active">
					<div class="rckt-home">
						<img src='<?= get_template_directory_uri() ?>/assets/images/banner.png'>
					</div>
					<h2>Theme Shortcodes</h2>
					<br>
					<h3>Template Shortcodes</h3>
					<table>
						<tr>
							<td>Navigation Menu: </td>
							<td><code>[rocketmenu]</code></td>
						</tr>
						<tr>
							<td>Developer Section: </td>
							<td><code>[developer]</code></td>
						</tr>
						<tr>
							<td>Copyright Section: </td>
							<td><code>[copyright]</code></td>
						</tr>
					</table>
					<br>

					<h3>Blog Shortcodes</h3>
					<table>
						<tr>
							<td>Recent Posts:</td>
							<td><code>[recent-posts post=5 template=news ]</code></td>
						</tr>
					</table>

					<br>
					<h3>Site Information Shortcodes</h3>
					<table>
						<tr>
							<td>Site URL: </td>
							<td><code>[siteinfo type=url]</code></td>
						</tr>
						<tr>
							<td>Site Name: </td>
							<td><code>[siteinfo type=name]</code></td>
						</tr>
						<tr>
							<td>Phone Number: </td>
							<td><code>[phonenumber]</code></td>
						</tr>
						<tr>
							<td>Address # 1: </td>
							<td><code>[address1]</code></td>
						</tr>
						<tr>
							<td>Address # 2: </td>
							<td><code>[address2]</code></td>
						</tr>
						<tr>
							<td>Email Address: </td>
							<td><code>[emailaddress]</code></td>
						</tr>
					</table>

					<br>
					<h3>Social Media Shortcodes</h3>
					<table>
						<tr>
							<td>Facebook:</td>
							<td><code>[social-media mode="facebook"]</code></td>
						</tr>
						<tr>
							<td>Twitter:</td>
							<td><code>[social-media mode="twitter"]</code></td>
						</tr>
						<tr>
							<td>Google Plus:</td>
							<td><code>[social-media mode="google_plus"]</code></td>
						</tr>
						<tr>
							<td>LinkedIn: </td>
							<td><code>[social-media mode="linkedin"]</code></td>
						</tr>
						<tr>
							<td>Youtube: </td>
							<td><code>[social-media mode="youtube"]</code></td>
						</tr>
						<tr>
							<td>Instagram: </td>
							<td><code>[social-media mode="instagram"]</code></td>
						</tr>
						<tr>
							<td>Pinterest:</td>
							<td><code>[social-media mode="pinterest"]</code></td>
						</tr>
					</table>

					<br>
					<h3>Useful Shortcodes</h3>
					<table>
						<tr>
							<td>Placeholder Texts:</td>
							<td><code>[placeholder length=100]</code></td>
						</tr>
						<tr>
							<td>Current Year:</td>
							<td><code>[year]</code></td>
						</tr>
					</table>
				</div>
			<form method="post" enctype="multipart/form-data" action="options.php">
			<?php
				settings_fields( 'option-group' );
				do_settings_sections( 'option-group' );
			?>
				<!-- Social Media settings -->
				<div id="1" class="tabcontent">
					<h3> Social Media settings</h3>
					<p><b>Shortcode :</b> [social-media]</p>
					<p><b>Parameters : </b> mode = facebook , twitter , google_plus , linkedin , youtube , instagram , pinterest </p>
					<p><b>Example : </b> [social-media mode="facebook"]</p>
					<table class="rckt-table">
						<tr>
							<td>Facebook: </td>
							<td><input placeholder="Facebook" type="text" name="facebook" value="<?= esc_attr( get_option('facebook') ) ?>" /> </td>
						</tr>
						<tr>
							<td>Twitter: </td>
							<td><input placeholder="Twitter" type="text" name="twitter" value="<?= esc_attr( get_option('twitter') )?>" /></td>
						</tr>
						<tr>
							<td>Google Plus: </td>
							<td><input placeholder="Google Plus" type="text" name="google_plus" value="<?= esc_attr( get_option('google_plus') )?>" /></td>
						</tr>
						<tr>
							<td>LinkedIn: </td>
							<td><input placeholder="LinkedIN" type="text" name="linkedin" value="<?= esc_attr( get_option('linkedin') )?>" /></td>
						</tr>
						<tr>
							<td>Youtube: </td>
							<td><input placeholder="Youtube" type="text" name="youtube" value="<?= esc_attr( get_option('youtube') )?>" /></td>
						</tr>
						<tr>
							<td>Instagram: </td>
							<td><input placeholder="Instagram" type="text" name="instagram" value="<?= esc_attr( get_option('instagram') )?>" /></td>
						</tr>
						<tr>
							<td>Pinterest: </td>
							<td><input placeholder="Pinterest" type="text" name="pinterest" value="<?= esc_attr( get_option('pinterest') )?>" /></td>
						</tr>
					</table>
					<hr>
					<h3>Site Information</h3>
					<p><b>Phone Number :</b> [phonenumber]</p>
					<p><b>Address 1 :</b> [address1]</p>
					<p><b>Address 2 (Optional):</b> [address2]</p>
					<p><b>Email Address :</b> [emailaddress]</p>
					<table class="rckt-table">
						<tr>
							<td>Phone Number: </td>
							<td><input placeholder="(000)-000-xxxx" type="text" name="phonenumber" value="<?= esc_attr( get_option('phonenumber') ) ?>" /> </td>
						</tr>
						<tr>
							<td>Address 1: </td>
							<td><input placeholder="1717 N. 77th ST. Suite 4 Scottsdale, AZ 85257" type="text" name="address1" value="<?= esc_attr( get_option('address1') ) ?>" /> </td>
						</tr>
						<tr>
							<td>Address 2: </td>
							<td><input placeholder="615 Piikoi St, Suite 1503 Honolulu, Hawaii 96814" type="text" name="address2" value="<?= esc_attr( get_option('address2') ) ?>" /> </td>
						</tr>
						<tr>
							<td>Email Address: </td>
							<td><input placeholder="sample@email.com" type="text" name="email-address" value="<?= esc_attr( get_option('email-address') ) ?>" /> </td>
						</tr>
					</table>
				</div>
			
				<!-- Website settings -->
				<div id="2" class="tabcontent">
					<h3> Website Settings</h3>
					<table class="rckt-table">
						<tr>
							<td>Frontend Favicon: </td>
							<td><input placeholder="Frontend Favicon" type="text" name="favicon" value="<?= esc_attr( get_option('favicon') )?>" /></td>
						</tr>
						<tr>
							<td>Backend Favicon: </td>
							<td><input placeholder="Admin Backend Favicon" type="text" name="admin_favicon" value="<?= esc_attr( get_option('admin_favicon') )?>" /></td>
						</tr>
					</table>
				</div>			
			
				<!-- Frontend settings  -->
				<div id="3" class="tabcontent">
					<h3> Frontend Settings</h3>
					<table class="rckt-table">
						<tr>
							<td>Header Background Color </td>
							<td><input type="text" name="header-bgcolor" class="color-field" value="<?= esc_attr( get_option('header-bgcolor') )?>" /></td>
						</tr>
						<tr>
							<td>Page Background Color </td>
							<td><input type="text" name="page-bgcolor" class="color-field" value="<?= esc_attr( get_option('page-bgcolor') )?>" /></td>
						</tr>
						<tr>
							<td>Footer Background Color </td>
							<td><input type="text" name="footer-bgcolor" class="color-field" value="<?= esc_attr( get_option('footer-bgcolor') )?>" /></td>
						</tr>
					</table>
					<h3> Responsive Settings</h3>
					<table class="rckt-table">
						<tr>
							<td class="w-25">Mobile Breakpoint in PX ( Default: 800px )</td>
							<td class="w-25"><input type="text" name="mobile-breakpoint" value="<?= esc_attr( get_option('mobile-breakpoint') ) ?>" /> px </td>
						</tr>
					</table>
					<h3>Rocket Mobile Menu Settings</h3>
					<table class="rckt-table">	
						<tr>
							<td class="w-25">Enable Rocket Mobile Menu</td>
							<td class="w-25"><input type="checkbox" name="rocket-mobile-menu" value="true" <?php if(get_option('rocket-mobile-menu') == "true") echo "checked"; ?> /></td>							
						</tr>
						<tr>
						<td class="w-25">Mobile Menu Top Offset</td>
							<td class="w-25"><input type="text" name="mobile-top-offset" value="<?= esc_attr( get_option('mobile-top-offset') ) ?>" placeholder="30px" /> px </td>
						</tr>
					</table>
				</div>
				
				<!-- Copyright settings -->
				<div id="4" class="tabcontent">
					<h3> Page Settings</h3>
					<table class="rckt-table">
						<tr>
							<td class="w-25">Header Template</td>
							<td class="w-25"><input type="radio" name="header-template" value="left"<?= ((get_option('header-template') === 'left') ? "checked='checked'" : '') ?>>Default</td>
							<td class="w-25"><input type="radio" name="header-template" value="center"<?= ((get_option('header-template') === 'center') ? "checked='checked'" : '') ?>>Center Logo</td>
							<td class="w-25"><input type="radio" name="header-template" value="right"<?= ((get_option('header-template') === 'right') ? "checked='checked'" : '') ?>>Right Logo</td>
						</tr>
						<tr>
							<td class="w-25">Footer Template</td>
							<td class="w-25"><input type="radio" name="footer-template" value="columns"<?= ((get_option('footer-template') === 'columns') ? "checked='checked'" : '') ?>>Default ( 2 columns )</td>
							<td class="w-25"><input type="radio" name="footer-template" value="center"<?= ((get_option('footer-template') === 'center') ? "checked='checked'" : '') ?>>Center Contents</td>
						</tr>
						<tr>
							<td>Scroll to Top </td>
							<td class="w-25"><input type="checkbox" name="scroll-to-top" value="true" <?php if(get_option('scroll-to-top') == "true") echo "checked"; ?> />
						<tr>
						<tr>
							<td>Preloader </td>
							<td class="w-25"><input type="checkbox" name="preloader" value="true" <?php if(get_option('preloader') == "true") echo "checked"; ?> />
						<tr>
						<tr>
							<td>Default Banner</td>
							<td class="w-25"><input type="text" name="default-banner" value="<?= esc_attr( get_option('default-banner') )?>" placeholder="/wp-content/...." /></td>
						<tr>
						<tr>
							<td>Default Post Thumbnail</td>
							<td class="w-25"><input type="text" name="post-placeholder" value="<?= esc_attr( get_option('post-placeholder') )?>" placeholder="/wp-content/...." /></td>
						<tr>
					</table>
				</div>
					
				<div id="5" class="tabcontent">
					<p><b>Get Developer Part : </b> [developer] </p>
					<p><b>Get Copyright Part : </b> [copyright] </p>
					<p><b>Get Year Part : </b>[year]</p>
					<table class="rckt-table">
						<tr>
							<td>Copyright : </td>
							<td><textarea rows="6" type="text" name="copyright" value="<?= esc_attr( get_option('copyright') )?>" ><?= esc_attr( get_option('copyright') )?></textarea></td>
						</tr>
						<tr>
							<td>Developer : </td>
							<td><textarea rows="6" type="text" name="developer" value="<?= esc_attr( get_option('developer') )?>" ><?= esc_attr( get_option('developer') )?></textarea></td>
						</tr>
					</table>
				</div>

				<!-- Theme Features settings -->
				<div id="6" class="tabcontent">
					<h3> Enable Theme Features - Add Ons</h3>
					<table class="rckt-table">
						<tr>
							<td>FontAwesome 5 : </td>
							<td><input type="checkbox" name="font_awesome" value="true" <?php if(get_option('font_awesome') == "true") echo "checked"; ?> /> <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">Read Documentation</a></td>
						</tr>
						<tr>
							<td>Scroll Reveal : </td>
							<td><input type="checkbox" name="scroll_reveal" value="true" <?php if(get_option('scroll_reveal') == "true") echo "checked"; ?> /><a target="_blank" href="https://github.com/jlmakes/scrollreveal.js">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>Owl Carousel v2.3.3: </td>
							<td><input type="checkbox" name="owl" value="true" <?php if(get_option('owl') == "true") echo "checked"; ?> /> <a target="_blank" href="https://owlcarousel2.github.io/OwlCarousel2/demos/basic.html">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>Hamburgers </td>
							<td><input type="checkbox" name="hamburgers" value="true" <?php if(get_option('hamburgers') == "true") echo "checked"; ?> /> <a target="_blank" href="https://jonsuh.com/hamburgers/">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>JS Parallax Scrolling : </td>
							<td><input type="checkbox" name="parallax" value="true" <?php if(get_option('parallax') == "true") echo "checked"; ?> /> <a target="_blank" href="https://pixelcog.github.io/parallax.js/">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>Dark Mode Widget: </td>
							<td><input type="checkbox" name="dark_mode" value="true" <?php if(get_option('dark_mode') == "true") echo "checked"; ?> /> <a target="_blank" href="https://darkmodejs.learn.uno/">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>QR Shortcode: </td>
							<td><input type="checkbox" name="qr-shortcode-module" value="true" <?php if(get_option('qr-shortcode-module') == "true") echo "checked"; ?> /> <a target="_blank" href="https://darkmodejs.learn.uno/">Read Documentation</a> </td>
						</tr>
					</table>
				</div>
				<!-- Third Party Scripts -->
				<div id="7" class="tabcontent">
					<h3> Third Party Scripts</h3>
					<table class="rckt-table">
						<tr>
							<td>Before Closing <code>&lt;/head&gt;</code> : </td>
							<td><textarea rows="10" type="text" name="before_closing_head_scripts" value="<?= esc_attr( get_option('before_closing_head_scripts') )?>" ><?= esc_attr( get_option('before_closing_head_scripts') )?></textarea></td>
						</tr>
						<tr>
							<td>After Opening <code>&lt;body&gt;</code> : </td>
							<td><textarea rows="10" type="text" name="after_opening_body_scripts" value="<?= esc_attr( get_option('after_opening_body_scripts') )?>" ><?= esc_attr( get_option('after_opening_body_scripts') )?></textarea></td>
						</tr>
						<tr>
							<td>Before Closing <code>&lt;/body&gt;</code> : </td>
							<td><textarea rows="10" type="text" name="before_closing_body_scripts" value="<?= esc_attr( get_option('before_closing_body_scripts') )?>" ><?= esc_attr( get_option('before_closing_body_scripts') )?></textarea></td>
						</tr>
					</table>						
					<table class="rckt-table">	
						<tr>
							<td>Google Font link : </td>
							<td><input type="text" name="google-font-import" value="<?= esc_attr( get_option('google-font-import') )?>" placeholder="https://fonts.google.com..." /></td>
						</tr>
					</table>
				</div>

				<!-- Optimizations -->
				<div id="8" class="tabcontent">
					<h3> Optimizations</h3>
					<table class="rckt-table">
						<tr>
							<td>Critical CSS : </td>
							<td><textarea rows="10" type="text" name="rocket_critical_css" value="<?= esc_attr( get_option('rocket_critical_css') )?>" ><?= esc_attr( get_option('rocket_critical_css') )?></textarea></td>
						</tr>
					</table>
					<!-- <span>Enable Optimizations: </span>
					<input type="checkbox" name="rocket_optimizations" value="true" < ?php if(get_option('rocket_optimizations') == "true") echo "checked"; ?> />
					<table class="rckt-table optimizations" < ?php optimizations_table(); ?>>
						<tr>
							<td>Optimize Theme Scripts & Styles</td>
							<td><input type="checkbox" name="optimize_theme_scripts_styles" value="true" < ?php if(get_option('optimize_theme_scripts_styles') == "true") echo "checked"; ?> /></td>
						</tr>
						<tr>
							<td>Move jQuery to the footer</td>
							<td><input type="checkbox" name="footer_jQuery" value="true" < ?php if(get_option('footer_jQuery') == "true") echo "checked"; ?> /></td>
						</tr>
						<tr>
							<td>Add rel on Preload</td>
							<td><input type="checkbox" name="rel_preload" value="true" < ?php if(get_option('rel_preload') == "true") echo "checked"; ?> /></td>
						</tr>
						<tr>
							<td>Add async attribute on scripts</td>
							<td><input type="checkbox" name="async_scripts" value="true" < ?php if(get_option('async_scripts') == "true") echo "checked"; ?> /></td>
						</tr>
						<tr>
							<td>Disable WooCommerce block styles (front-end)</td>
							<td><input type="checkbox" name="disable_wc_blk_styles" value="true" < ?php if(get_option('disable_wc_blk_styles') == "true") echo "checked"; ?> /></td>
						</tr>
					</table> -->
				</div>

				<!-- WooCommerce Support -->
				<div id="9" class="tabcontent">
					<h3>Woocommerce Settings Support</h3>
					<?
					if(is_woocommerce_activated()){
						rocket_theme_wc_options();
					} else {
						echo 'No Woocommerce Plugin Detected.';
					}
					?>
				</div>				


				<div class="copyright"><p>© copyright 2021<a href="https://primeview.com" target="_blank">  Primeview</a></p></div>
				<?= submit_button(); ?>
			</form>

		</div>

		<script type="text/javascript">
			
			function openTabRocket(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			// Get the element with id="defaultOpen" and click on it
			document.getElementById("tab-0").click();
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e) {
					$('#output_banner').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>	
<?php
	}

	/**
	 * Register Theme Settings
	 */
	function rocketThemeSettings() {

		/* Default values */
		$copyright = '<p>[year] </p><p>All Rights Reserved.</p>';
		$developer = '<p>Created by One of the Leading Phoenix Web Design Firms <a href="//primeview.com/" target="_blank">Primeview</a></p><p>Optimized by Phoenix Arizona SEO Company <a href="//optimizex.com/" target="_blank">OptimizeX</a></p>';

		add_option( 'header-bgcolor', '#1e73be' );
		add_option( 'page-bgcolor', '#FFFFFF' );
		add_option( 'footer-bgcolor', '#8E8A89' );
		add_option( 'header-template', 'left' );
		add_option( 'footer-template', 'columns' );
		add_option( 'mobile-breakpoint', '800' );
		add_option('copyright', $copyright);
		add_option('developer', $developer);
		
		register_setting( 'option-group', 'facebook' );
		register_setting( 'option-group', 'twitter' );
		register_setting( 'option-group', 'google_plus' );
		register_setting( 'option-group', 'linkedin' );
		register_setting( 'option-group', 'youtube' );
		register_setting( 'option-group', 'instagram' );
		register_setting( 'option-group', 'pinterest' );
		register_setting( 'option-group', 'phonenumber' );
		register_setting( 'option-group', 'address1' );
		register_setting( 'option-group', 'address2' );
		register_setting( 'option-group', 'email-address' );
		register_setting( 'option-group', 'favicon' );
		register_setting( 'option-group', 'admin_favicon' );
		register_setting( 'option-group', 'font_awesome' );
		register_setting( 'option-group', 'scroll_reveal' );
		register_setting( 'option-group', 'owl' );
		register_setting( 'option-group', 'hamburgers' );
		register_setting( 'option-group', 'parallax' );
		register_setting( 'option-group', 'dark_mode' );
		register_setting( 'option-group', 'loader' );
		register_setting( 'option-group', 'copyright' );
		register_setting( 'option-group', 'developer' );

		register_setting( 'option-group', 'before_closing_head_scripts' );
		register_setting( 'option-group', 'before_closing_body_scripts' );
		register_setting( 'option-group', 'after_opening_body_scripts' );

		register_setting( 'option-group', 'google-font-import' );
		register_setting( 'option-group', 'footer_jQuery' );
		// register_setting( 'option-group', 'rocket_optimizations' );
		// register_setting( 'option-group', 'optimize_theme_scripts_styles' );
		// register_setting( 'option-group', 'rocket_critical_css' );
		// register_setting( 'option-group', 'rel_preload' );
		// register_setting( 'option-group', 'async_scripts' );
		// register_setting( 'option-group', 'disable_wc_blk_styles' );
 
		register_setting( 'option-group', 'header-bgcolor' );
		register_setting( 'option-group', 'page-bgcolor' );
		register_setting( 'option-group', 'footer-bgcolor' );
		register_setting( 'option-group', 'rocket-mobile-menu' );
		register_setting( 'option-group', 'mobile-breakpoint');
		register_setting( 'option-group', 'mobile-top-offset');
		
		register_setting( 'option-group', 'header-template' );
		register_setting( 'option-group', 'footer-template' );
		register_setting( 'option-group', 'scroll-to-top' );
		register_setting( 'option-group', 'preloader' );
		register_setting( 'option-group', 'default-banner' );
		register_setting( 'option-group', 'post-placeholder' );

		register_setting( 'option-group', 'qr-shortcode-module' );

		if(is_woocommerce_activated()){
			rocket_woocommerce();
		}
	}

	function dynamicCSS() {
		$header = get_option('header-bgcolor');
		$footer = get_option('footer-bgcolor');
		$page   = get_option('page-bgcolor');
		$mm_offset = get_option('mobile-top-offset');
	?>
		<style type="text/css">
			.site-header, nav.navbar {
				background-color:<?php echo $header; ?>;
			}
			footer, .site_main_footer, .site_copyright {
				background-color:<?php echo $footer; ?>;
			}
			.site{
				background-color:<?php echo $page; ?>;
			}
			div#rocket-mobile-menu {
				top: <?php echo $mm_offset ?>;
				position: fixed;
    			left: 100%;
			}
		</style>
	<?php

	}


	function dynamicJS() {
		$optionJS = get_option('header-template');
	?>

	<?
	}
	
	

	
