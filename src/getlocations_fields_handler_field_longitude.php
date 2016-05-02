<?php
namespace Drupal\getlocations;

/**
 * @file
 * getlocations_fields_handler_field_longitude.inc
 * @author Bob Hutchinson http://drupal.org/user/52366
 * @copyright GNU GPL
 *
 * Longitude field handler.
 */

class getlocations_fields_handler_field_longitude extends getlocations_fields_handler_field_latitude {

  function render($values) {
    if ($this->options['style'] == 'dms') {
      // @FIXME
// theme() has been renamed to _theme() and should NEVER be called directly.
// Calling _theme() directly can alter the expected output and potentially
// introduce security issues (see https://www.drupal.org/node/2195739). You
// should use renderable arrays instead.
// 
// 
// @see https://www.drupal.org/node/2195739
// return theme('getlocations_longitude_dms', array('longitude' => $values->{$this->field_alias}));

    }
    return parent::render($values);
  }
}
