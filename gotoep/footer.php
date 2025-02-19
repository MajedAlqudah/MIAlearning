<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						<br>
						Copyrights &copy; 2024 All Rights Reserved by MIA<br>
						
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a target="_blank" href="https://www.facebook.com/ExceptionalProgrammers" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a target="_blank" href="https://twitter.com/exceptionalprog" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a target="_blank" href="https://www.youtube.com/channel/UCnckIffIs_irwEwIjyoFCtQ" class="social-icon si-small si-borderless si-youtube">
								<i class="icon-youtube-play"></i>
								<i class="icon-youtube-play"></i>
							</a>

							<a target="_blank" href="https://plus.google.com/u/0/111814927807344564394" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a target="_blank" href="https://www.dropbox.com/sh/xlbicsv6kp21yhx/AAB2_IhXaStVBNdDxDnEpKQXa?dl=0" class="social-icon si-small si-borderless si-dropbox">
								<i class="icon-dropbox2"></i>
								<i class="icon-dropbox2"></i>
							</a>

							<a target="_blank" href="https://github.com/exceptionalprogrammers" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> MIAelearning@gmail.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +962-777828585  <span class="middot"></span>
					</div>

			</div><!-- #copyrights end -->

			</div>
			
		</footer> <!-- #footer end -->


		

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="../js/functions.js"></script>

	<script type="text/javascript">
		jQuery(document).ready(function($){
			$( '#vertical-nav nav ul li:has(ul)' ).addClass('sub-menu');
			$( '#vertical-nav nav ul li:has(ul) > a' ).append( ' <i class="icon-angle-down"></i>' );

			$( '#vertical-nav nav ul li:has(ul) > a' ).click( function(e){
				var element = $(this);
				$( '#vertical-nav nav ul li' ).not(element.parents()).removeClass('active');
				element.parent().children('ul').slideToggle( function(){
					$(this).find('ul').hide();
					$(this).find('li.active').removeClass('active');
				});
				$( '#vertical-nav nav ul li > ul' ).not(element.parent().children('ul')).not(element.parents('ul')).slideUp();
				element.parent('li:has(ul)').toggleClass('active');
				e.preventDefault();
			});
		});
		

	</script>

</body>
</html>