<?php /**
 * @file
 * Contains \Drupal\getlocations\EventSubscriber\InitSubscriber.
 */

namespace Drupal\getlocations\EventSubscriber;

use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class InitSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    return [KernelEvents::REQUEST => ['onEvent', 0]];
  }

  public function onEvent() {
    if (\Drupal::moduleHandler()->moduleExists('colorbox')) {
      $getlocations_colorbox = getlocations_colorbox_settings();
      if ($getlocations_colorbox['enable']) {
        $settings = ['getlocations_colorbox' => $getlocations_colorbox];
        // @FIXME
        // The Assets API has totally changed. CSS, JavaScript, and libraries are now
        // attached directly to render arrays using the #attached property.
        // 
        // 
        // @see https://www.drupal.org/node/2169605
        // @see https://www.drupal.org/node/2408597
        // drupal_add_js($settings, 'setting');

        $getlocations_paths = getlocations_paths_get();
        // @FIXME
        // The Assets API has totally changed. CSS, JavaScript, and libraries are now
        // attached directly to render arrays using the #attached property.
        // 
        // 
        // @see https://www.drupal.org/node/2169605
        // @see https://www.drupal.org/node/2408597
        // drupal_add_js($getlocations_paths['getlocations_colorbox_path']);

      }
    }
  }

}
