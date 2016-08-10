<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php _e( 'WebMention Form', 'webmention_form' ); ?></title>
		<link rel="stylesheet" href="<?php echo plugins_url( 'style/wordpress-simple-page.css' , __FILE__ ); ?>">
		<?php do_action( 'webmention_form_head' ); ?>
	</head>
	<body>
		<h1><?php _e( 'Send a WebMention', 'webmention_form' ); ?></h1>
		<p>
			<?php _e( 'Responding with a post on your own blog? Send me a <a href="http://indieweb.org/webmention">WebMention</a> by writing something on your website that links to this post and then enter your post URL below.', 'webmention_form' ); ?>
		</p>

		<?php do_action( 'webmention_form_before_form' ); ?>

		<form id="webmention-form" action="<?php echo site_url( '?webmention=endpoint' ); ?>" method="post">
			<?php do_action( 'webmention_form_before_input_fields' ); ?>
			<p>
				<label for="webmention-source"><?php _e( 'Source URL' ); ?>:</label><br />
				<input id="webmention-source" type="url" name="source" placeholder="URL/Permalink of your article" size="70" />
			</p>
			<p>
				<label for="webmention-target"><?php _e( 'Target URL' ); ?>:</label><br />
				<input id="webmention-target" type="url" name="target" placeholder="URL/Permalink of my article" size="70" />
			</p>
			<p>
				<input id="webmention-submit" type="submit" name="submit" value="Ping me!" />
			</p>
			<?php do_action( 'webmention_form_after_input_fields' ); ?>
		</form>
	</body>
</html>
