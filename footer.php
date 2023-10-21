

	<footer class="footer">
		
		<div class="footer__container default-container">
			<div class="footer__logo">
				<a href="<?= get_site_url()  ?>" class="blog">
					<img src="<?= get_stylesheet_directory_uri()?>/assets/images/logo.png" alt="Marvel" class="block w-100 h-auto" width="408" height="168">
				</a>
			</div>
			
			<div class="footer__info flex justify-between">
				<nav class="footer__nav">
					<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'menu_class' => 'footernav', 'theme_location' => 'secondary-menu','depth'=>1 ) ); ?>
				</nav>
				<div class="footer__text">

					<div class="footer__text--set flex justify-start items-start w-100">
						<div class="footer__text--set--img">
							<img src="<?= get_stylesheet_directory_uri()?>/assets/images/insider.png" alt="" class="block img-responsive">
						</div>
						<div class="footer__text--set--det">
							<h2>MARVEL INSIDER</h2>
							<p>Get Rewarded for Being a Marvel Fan</p>
						</div>
					</div>

					<div class="footer__text--set flex justify-start items-start w-100">
						<div class="footer__text--set--img">
							<img src="<?= get_stylesheet_directory_uri()?>/assets/images/marvelU.png" alt="" class="block img-responsive">
						</div>
						<div class="footer__text--set--det">
							<h2>MARVEL UNLIMITED</h2>
							<p>Access Over 30,000+ Digital Comics</p>
						</div>
					</div>

				</div>
				<div class="footer__smi">
					<h2>FOLLOW MARVEL</h2>
					<ul class="flex justify-cente">
						<li>
							<a href="#" target="_blank">
								<img src="<?= get_stylesheet_directory_uri()?>/assets/images/fb.png" alt="">
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="<?= get_stylesheet_directory_uri()?>/assets/images/ig.png" alt="">
							</a>
						</li>
						<li>
							<a href="#" target="_blank">
								<img src="<?= get_stylesheet_directory_uri()?>/assets/images/tw.png" alt="">
							</a>
						</li>
						
					</ul>
				</div>
			</div>


			<div class="footer__copyright">
				<ul class="flex justify-center items-center flex-wrap-wrap">
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Your California Privacy Rights</a></li>
					<li><a href="#">Children's Online Privacy Policy</a></li>
					<li><a href="#">Do Not Sell My Personal Information</a></li>
					<li><a href="#">License Agreement</a></li>
					<li><a href="#">Marvel Insider Terms</a></li>
					<li> &copy; <?php echo date('Y') ?> MARVEL</li>
				</ul>
			</div>

		</div>	
	</footer>
		
	</main><!-- end of #main-wrapper -->

	<?php wp_footer(); ?>
</body>
</html> 