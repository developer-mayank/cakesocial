<?php
// It is recommended that you change this so that your database exists somewhere
// outside of your webroot. This file could cause you much bandwidth loss :)
Configure::write('GeoIp.file', WWW_ROOT.'files'.DS.'GeoLiteCity.dat');
//Configure::write('GeoIp.flags', 2); // 2 for GEOIP_SHARED_MEMORY (requires shmop extension)

App::import('Vendor', 'geoip'.DS.'GeoIpTool');

/**
 * The GeoIp Component is a wrapper to Maxmind's original PHP GeoIP API.
 * Aside from being a wrapper, it also includes a custom lookup tool and a
 * custom data object for returned lookups.
 *
 * The data object contains an additional timezone field that was not present
 * in the original geoiprecord object, so in most cases you'll also be able to
 * serve dates based on their timezone.
 *
 * @author Matthew Harris <shugotenshi@gmail.com>
 */
class GeoIpComponent extends Object {
    /**
     * GeoIpTool, the tool used to make regional lookup with.
     *
     * @var GeoIpTool
     * @access public
     */
    var $GeoIpTool;
    
    /**
     * Cilent IP address.
     *
     * @var string
     * @access public
     */
    var $clientIp;
    
    /**
     * Initialize GeoIpTool.
     *
     * @access public
     */
    function startup(&$controller)
    {
        $file   = Configure::read('GeoIp.file');
        $flags  = (int)Configure::read('GeoIp.flags');
        
        $this->GeoIpTool = new GeoIpTool($file, $flags);
    }
    
    /**
     * Lookup a GeoIP record for a particular IP.
     *
     * @param string $ip IP address (can be left null for REMOTE_ADDR)
     * @param boolean $resolveIp Resolve IP if hostname is specified in place of IP
     * @access public
     * @return GeoIpData|false
     */
    function lookup($ip = null, $resolveIp = false)
    {
        if (!$ip) {
            if (!$this->clientIp) {
                // env() already does the proxy checking for us.
                $ip = $this->clientIp = env('REMOTE_ADDR');
            }
        }
        
        if ($ip) {
            // Possible hostname?
            if (!$this->__isIp($ip) && $resolveIp) {
                $resolved = gethostbyname($ip);
                // If gethostbyname() returns the same string that was passed in,
                // then it failed to resolve the IP address. Bail out.
                if ($resolved !== $ip) {
                    $ip = $resolved;
                }
                else {
                    return false;
                }
            }
            // Lookup record matching the IP.
            return $this->GeoIpTool->lookup($ip);
        }
        else {
            return false;
        }
    }
    
    /**
     * Check validity of provided IP address.
     *
     * @access private
     * @return boolean
     */
    function __isIp($check)
    {
        $false = PHP5 ? false : -1;
        return(ip2long($check) !== $false);
    }
}
?>