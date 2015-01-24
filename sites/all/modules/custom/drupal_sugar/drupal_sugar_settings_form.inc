<?php


/**
 * Config form for Sugar API settings
 * Requires URL, Username and Password
 *
 * @param $form
 * @param $form_state
 * @return mixed
 */
function drupal_sugar_settings_form($form, &$form_state)
{
    $form['drupal_sugar_config_url'] = array(
        '#type' => 'textfield',
        '#title' => t('SugarCRM URL'),
        '#default_value' => variable_get('drupal_sugar_config_url'),
        '#size' => 100,
        '#maxlength' => 255,
        //'#description' => t("SugarCRM URL."),
        '#required' => TRUE,
    );

    $form['drupal_sugar_config_username'] = array(
        '#type' => 'textfield',
        '#title' => t('SugarCRM API Username'),
        '#default_value' => variable_get('drupal_sugar_config_username'),
        '#size' => 30,
        '#maxlength' => 255,
        //'#description' => t("SugarCRM API Username."),
        '#required' => TRUE,
    );

    $form['drupal_sugar_config_password'] = array(
        '#type' => 'password',
        '#title' => t('SugarCRM API Password'),
        '#default_value' => variable_get('drupal_sugar_config_password'),
        '#size' => 30,
        '#maxlength' => 255,
        //'#description' => t("SugarCRM API Password."),
        '#required' => TRUE,
    );

    return system_settings_form($form);
}