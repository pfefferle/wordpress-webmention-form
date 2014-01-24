<?php
/*
 Plugin Name: WebMention Form
 Plugin URI: http://github.com/pfefferle/wordpress-webmention-form
 Description:
 Author: Matthias Pfefferle
 Author URI: http://notizblog.org
 Version: 1.0.0-dev
 License: GPL v3 (http://www.gnu.org/licenses/gpl.html)
 Text Domain: webmention_form
*/

function webmention_form_init() {
  load_plugin_textdomain( 'webmention_form', null, basename( dirname( __FILE__ ) ) );
}
add_action('init', 'webmention_form_init');

function webmention_form() {
  ?>
  <form id="webmention-form" action="<?php echo site_url('?webmention=endpoint'); ?>" method="post">
    <label for="webmention-source"><?php _e('Responding with a post on your own blog? Send me a <a href="http://indiewebcamp.com/webmention">WebMention</a> <sup>(<a href="http://adactio.com/journal/6469/">?</a>)</sup>', 'webmention_form'); ?></label>
    <input id="webmention-source" type="url" name="source" placeholder="URL/Permalink of your article" />
    <input id="webmention-submit" type="submit" name="submit" value="Ping me!" />
    <input id="webmention-target" type="hidden" name="target" value="<?php the_permalink(); ?>" />
  </form>
  <?php
}
add_action('comment_form_after', 'webmention_form', 11);