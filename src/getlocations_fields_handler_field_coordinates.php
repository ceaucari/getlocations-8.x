<?php
namespace Drupal\getlocations;

/**
 * @file
 * getlocations_fields_handler_field_coordinates.inc
 * @author Bob Hutchinson http://drupal.org/user/52366
 * @copyright GNU GPL
 *
 * Coordinates field handler.
 */

class getlocations_fields_handler_field_coordinates extends getlocations_fields_handler_field_latitude {

  function construct() {
    parent::construct();
    $this->additional_fields['longitude'] = 'longitude';
  }

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
// return theme('getlocations_latitude_dms', array('latitude' => $values->{$this->field_alias})) . ', ' . theme('getlocations_longitude_dms', array('longitude' => $values->{$this->aliases['longitude']}));

    }
    else {
      return \Drupal\Component\Utility\SafeMarkup::checkPlain($values->{$this->field_alias}) . ', ' . \Drupal\Component\Utility\SafeMarkup::checkPlain($values->{$this->aliases['longitude']});
    }
  }
}
