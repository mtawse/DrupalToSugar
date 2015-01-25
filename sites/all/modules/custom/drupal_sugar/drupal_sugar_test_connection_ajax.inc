<?php


/**
 * Test the Sugar REST connection
 * Called via AJAX
 */
function drupal_sugar_test_connection_ajax()
{
    /* Instantiate and authenticate */
    $sugar = new \Spinegar\Sugar7Wrapper\Rest();

    $sugar_url = $_REQUEST['sugarURL'];
    // trim any trailing slash
    $sugar_url = rtrim($sugar_url, '/');
    $sugar_username = $_REQUEST['username'];
    $sugar_password = $_REQUEST['password'];


    $response = $sugar->setUrl($sugar_url . '/rest/v10/')
        ->setUsername($sugar_username)
        ->setPassword($sugar_password)
        ->connect();

    drupal_json_output($response);
}
