

        <!-- Footer begins here -->
        <div class="row">
        	<div class="col-md-12 footer">
        		<div class="container">
                    <ul class="social text-center">
                        <li class="email">
                            <a href="<?php echo get_site_url() ?>/contact">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="instagram">
                            <a href="https://www.instagram.com/teradata.marketing.apps/" target="_blank">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="facebook">
                            <a href="https://www.facebook.com/TeradataAppsUKI" target="_blank">
                                <i class="fa fa-facebook-official" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="twitter">
                            <a href="https://twitter.com/teradataappsuki" target="_blank">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Footer ends here -->

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

        <!-- Chosen JS -->
        <script src="<?php echo get_stylesheet_directory_uri();?>/chosen.jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <!-- Custom JS -->
        <script src="<?php echo get_stylesheet_directory_uri();?>/js/site.js"></script>

        <script type="text/javascript">
          if (0)
          {
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-17999473-1']);
            _gaq.push(['_trackPageview']);

            (function()
            {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
          }
        </script>

        <script type="text/javascript">
        jQuery(document).ready(function($) {
        	$('#filters a').click(function(e){
        	e.preventDefault();
        	var filter = $(this).attr('id');
        	$('#sortable-portfolio div').show();
        	$('#sortable-portfolio div:not(.' + filter + ')').hide();
        });
        });
        </script>

        <?php wp_footer(); ?>

</body>

</html>
