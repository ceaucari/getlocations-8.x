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

class getlocations_fields_handler_field_wkt extends views_handler_field {

  function construct() {
    parent::construct();
    $this->additional_fields['longitude'] = 'longitude';
  }

  function render($values) {
    $lat = \Drupal\Component\Utility\SafeMarkup::checkPlain($values->{$this->field_alias});
    $lat = trim($lat);
    $lng = \Drupal\Component\Utility\SafeMarkup::checkPlain($values->{$this->aliases['longitude']});
    $lng = trim($lng);
    return 'POINT(' . $lng . ' ' . $lat . ')';
  }
}
