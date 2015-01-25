<?php

/**
 * Check if we have an entry for this webform
 *
 * @param int $nid The webform node ID
 * @return mixed
 */
function drupal_sugar_module_fetch($nid)
{
    //$table = 'drupal_sugar_module';
    $result = db_select('drupal_sugar_modules', 'dsm')
        ->fields('dsm')
        ->condition('nid', $nid, '=')
        ->execute()
        ->fetchAssoc();

    return $result;
}

/**
 * Update the Sugar module used on this form
 *
 * @param int $id
 * @param int $nid
 * @param string $sugar_module
 */
function drupal_sugar_module_update($id, $nid, $sugar_module)
{
    $result = db_update('drupal_sugar_modules') // Table name no longer needs {}
        ->fields(array('sugar_module' => $sugar_module))
        ->condition('id', $id, '=')
        ->condition('nid', $nid, '=')
        ->execute();
}

/**
 * Insert the sugar module for this webform
 *
 * @param int $nid
 * @param string $sugar_module
 */
function drupal_sugar_module_insert($nid, $sugar_module)
{
    $result = db_insert('drupal_sugar_modules')
        ->fields(array(
            'nid' => $nid,
            'sugar_module' => $sugar_module
        ))
        ->execute();
}


function drupal_sugar_module_delete($nid)
{
    $result = db_delete('drupal_sugar_modules')->condition('nid', $nid)->execute();
}


/**
 * Check if we have an entry for this webform
 *
 * @param int $nid The webform node ID
 * @param string $form_key The webform component ID
 * @return mixed
 */
function drupal_sugar_field_fetch($nid, $form_key)
{
    //$table = 'drupal_sugar_module';
    $result = db_select('drupal_sugar_fields', 'dsf')
        ->fields('dsf')
        ->condition('nid', $nid, '=')
        ->condition('form_key', $form_key, '=')
        ->execute()
        ->fetchAssoc();

    return $result;
}


/**
 * Check if we have an entry for this webform
 *
 * @param int $nid The webform node ID
 * @param array $form_keys An array for form keys
 * @return mixed
 */
function drupal_sugar_fields_fetch($nid, $form_keys)
{
    //$table = 'drupal_sugar_module';
    $result = db_select('drupal_sugar_fields', 'dsf')
        ->fields('dsf')
        ->condition('nid', $nid, '=')
        ->condition('form_key', $form_keys, 'IN')
        ->execute()
        ->fetchAllAssoc('id');

    return $result;
}

/**
 * Update the Sugar field used on this form component
 *
 * @param int $id
 * @param int $nid
 * @param string $form_key
 * @param string $sugar_field
 */
function drupal_sugar_field_update($id, $nid, $form_key, $sugar_field)
{
    $result = db_update('drupal_sugar_fields') // Table name no longer needs {}
        ->fields(array('sugar_field' => $sugar_field, 'form_key' => $form_key))
        ->condition('id', $id, '=')
        ->condition('nid', $nid, '=')
        ->execute();
}

/**
 * Insert the sugar field for this webform component
 *
 * @param int $nid
 * @param string $form_key
 * @param string $sugar_field
 */
function drupal_sugar_field_insert($nid, $form_key, $sugar_field)
{
    $result = db_insert('drupal_sugar_fields')
        ->fields(array(
            'nid' => $nid,
            'form_key' => $form_key,
            'sugar_field' => $sugar_field,
        ))
        ->execute();
}