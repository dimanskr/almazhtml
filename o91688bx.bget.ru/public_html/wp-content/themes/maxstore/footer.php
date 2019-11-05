</div>
<footer id="site-footer" class="rsrc-footer">
	<div class="container">
		<?php if ( is_active_sidebar('footer-left-area')||is_active_sidebar('footer-middle-area')||is_active_sidebar('footer-right-area' ) ) { ?>
		<div id="content-footer-section" class="row clearfix">
			<div class="left-footer-area col-xs-12 col-sm-4">
				<div class="sidebar">
					<?php dynamic_sidebar( 'footer-left-area' ); ?>
				</div>
			</div>
			<div class="middle-footer-area col-xs-12 col-sm-4">
				<div class="sidebar">
					<?php dynamic_sidebar( 'footer-middle-area' ); ?>
				</div>
			</div>
			<div class="right-footer-area col-xs-12 col-sm-4">
				<div class="sidebar">
					<?php dynamic_sidebar( 'footer-right-area' ); ?>
				</div>
			</div>
		</div>
		<div class="bottom-footer-area col-12">
			<div class="sidebar">
				<?php dynamic_sidebar( 'footer-bottom-area' ); ?>
			</div>
		</div>
		<?php } ?>
	</div>
</footer>
<div id="back-top">
	<a href="#top">
		<span></span>
	</a>
</div>

<!-- end main container -->
<!--LiveInternet counter--><span style="display: none;">
	<script type="text/javascript">
		document.write("<a href='//www.liveinternet.ru/click' " +
			"target=_blank><img src='//counter.yadro.ru/hit?t17.1;r" +
			escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
				";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
					screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
			";h" + escape(document.title.substring(0, 150)) + ";" + Math.random() +
			"' alt='' title='LiveInternet: показано число просмотров за 24" +
			" часа, посетителей за 24 часа и за сегодня' " +
			"border='0' width='88' height='31'><\/a>")
	</script>
</span>
<!--/LiveInternet-->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
	(function (d, w, c) {
		(w[c] = w[c] || []).push(function () {
			try {
				w.yaCounter47105172 = new Ya.Metrika({
					id: 47105172,
					clickmap: true,
					trackLinks: true,
					accurateTrackBounce: true,
					webvisor: true
				});
			} catch (e) {}
		});

		var n = d.getElementsByTagName("script")[0],
			s = d.createElement("script"),
			f = function () {
				n.parentNode.insertBefore(s, n);
			};
		s.type = "text/javascript";
		s.async = true;
		s.src = "https://mc.yandex.ru/metrika/watch.js";

		if (w.opera == "[object Opera]") {
			d.addEventListener("DOMContentLoaded", f, false);
		} else {
			f();
		}
	})(document, window, "yandex_metrika_callbacks");
</script>
<noscript>
	<div><img src="https://mc.yandex.ru/watch/47105172" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->

<?php wp_footer(); ?>
</body>

</html>
