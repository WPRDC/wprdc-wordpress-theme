<?php
/**
 * Retrieve a response from the CKAN API using the GET method
 *
 * @param string $url API URL to retrieve
 * @param array $args Optional. Request Arguments. Default empty array.
 * @return object|bool The response object or false if the status code was not 200.
 */
function ckan_api_get($url, $args = array())
{
    $ckan_url = get_option('wprdc_theme_setting_ckan', 'http://data.wprdc.org');
    $url = esc_url_raw($ckan_url . '/api/3/' . $url);
    $response = wp_remote_get($url, $args);
    $body = json_decode(wp_remote_retrieve_body($response));

    if (wp_remote_retrieve_response_code($response) === 200)
        if (isset($body->result))
            $result = $body->result;
        else
            $result = $body;
    else
        $result = false;
    return $result;
}

/**
 * Return the CKAN URL for Absolute Links
 *
 * @param string $url The extra bit of CKAN URL
 * @return string The absolute CKAN url
 */
function ckan_url($url = '')
{
    $ckan_url = get_option('wprdc_theme_setting_ckan', 'http://opendata.ucsur.pitt.edu/data');
    $url = esc_url($ckan_url . '/' . $url);
    return $url;
}