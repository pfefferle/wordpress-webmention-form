<?php
/*
 Plugin Name: WebMention Form
 Plugin URI: http://github.com/pfefferle/wordpress-webmention-form
 Description: Send WebMentions via a "comment" like form
 Author: Matthias Pfefferle
 Author URI: http://notizblog.org
 Version: 1.0.0-dev
 License: GPL v3 (http://www.gnu.org/licenses/gpl.html)
 Text Domain: webmention_form
*/

if (!class_exists('WebMentionFormPlugin')) :

// initialize plugin
add_action('init', array('WebMentionFormPlugin', 'init'));

/**
 * WebMention Form Plugin Class
 *
 * @author Matthias Pfefferle
 */
class WebMentionFormPlugin {

  /**
   * initialize the plugin, registering WordPress hooks.
   */
  public static function init() {
    add_action('comment_form_after', array('WebMentionFormPlugin', 'form'), 11);
  }

  /**
   * render the form
   */
  public static function form() {
  ?>
    <form id="webmention-form" action="<?php echo site_url('?webmention=endpoint'); ?>" method="post">
      <p>
        <label for="webmention-source"><?php _e('Responding with a post on your own blog? Send me a <a href="http://indiewebcamp.com/webmention">WebMention</a> <sup>(<a href="http://adactio.com/journal/6469/">?</a>)</sup>', 'webmention_form'); ?></label>
        <input id="webmention-source" type="url" name="source" placeholder="URL/Permalink of your article" />
        <input id="webmention-submit" type="submit" name="submit" value="Ping me!" />
        <input id="webmention-target" type="hidden" name="target" value="<?php the_permalink(); ?>" />
      </p>
    </form>
  <?php
  }
}

endif;