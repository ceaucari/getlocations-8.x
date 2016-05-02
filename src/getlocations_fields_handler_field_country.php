<?php
namespace Drupal\getlocations;

/**
 * @file
 * getlocations_fields_handler_field_country.inc
 * @author Bob Hutchinson http://drupal.org/user/52366
 * @copyright GNU GPL
 *
 * Country field handler.
 */

class getlocations_fields_handler_field_country extends views_handler_field {

  function option_definition() {
    $options = parent::option_definition();
    $options['style'] = array('default' => 'name');
    return $options;
  }

  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);
    $form['style'] = array(
      '#title' => t('Display style'),
      '#type' => 'select',
      '#options' => array('name' => t('Country name'), 'code' => t('Country code')),
      '#default_value' => $this->options['style'],
    );
  }

  function render($values) {
    if ($this->options['style'] == 'name') {
      if (\Drupal\Component\Utility\Unicode::strlen($values->{$this->field_alias}) == 2) {
        return \Drupal\Component\Utility\SafeMarkup::checkPlain(getlocations_get_country_name($values->{$this->field_alias}));
      }
      else {
        return \Drupal\Component\Utility\SafeMarkup::checkPlain($values->{$this->field_alias});
      }
    }
    else {
      if (\Drupal\Component\Utility\Unicode::strlen($values->{$this->field_alias}) == 2) {
        return \Drupal\Component\Utility\SafeMarkup::checkPlain(\Drupal\Component\Utility\Unicode::strtoupper($values->{$this->field_alias}));
      }
      else {
        return \Drupal\Component\Utility\SafeMarkup::checkPlain(\Drupal\Component\Utility\Unicode::strtoupper(getlocations_get_country_id($values->{$this->field_alias})));
      }
    }
  }
}
