<form id="webmention-form" action="<?php echo site_url( '?webmention=endpoint' ); ?>" method="post">
	<p>
		<label for="webmention-source"><?php _e( 'Responding with a post on your own blog? Send me a <a href="http://indiewebcamp.com/webmention">WebMention</a> <sup>(<a href="http://adactio.com/journal/6469/">?</a>)</sup>', 'webmention_form' ); ?></label>
		<input id="webmention-source" type="url" name="source" placeholder="URL/Permalink of your article" />
	</p>
	<p>
		<input id="webmention-submit" type="submit" name="submit" value="Ping me!" />
	</p>
	<input id="webmention-target" type="hidden" name="target" value="<?php the_permalink(); ?>" />
</form>
