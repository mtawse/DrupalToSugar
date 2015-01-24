<?php
/**
 * @author Martin Tawse martin.tawse@gmail.com
 * Date: 24/01/2015
 */

class SugarRestClient
{
    private $sugar;

    function __construct()
    {

        /* Instantiate and authenticate */
        $this->sugar = new \Spinegar\Sugar7Wrapper\Rest();

        $sugar_url = variable_get('drupal_sugar_config_url');
        // trim any trailing slash
        $sugar_url = rtrim($sugar_url, '/');
        $sugar_username = variable_get('drupal_sugar_config_username');
        $sugar_password = variable_get('drupal_sugar_config_username');


        $this->sugar->setUrl($sugar_url . '/rest/v10/')
            ->setUsername($sugar_username)
            ->setPassword($sugar_password)
            ->connect();
    }


    /**
     * @todo this call is a bit slow and returns more than I need...
     *
     * Fetch the Sugar metatdata
     * This will include module list and field definitions
     * Cache the results in a session to improve performance
     *
     * @return array
     */
    public function get_sugar_metadata()
    {
        if (!isset($_SESSION['drupal_sugar_metadata']) || empty($_SESSION['drupal_sugar_metadata'])) {
            $parameters = array('type_filter' => 'modules');
            $_SESSION['drupal_sugar_metadata'] = $this->sugar->getEndpoint('metadata', $parameters);
        }

        return $_SESSION['drupal_sugar_metadata'];
    }
}