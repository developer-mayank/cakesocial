<?php
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class GeoipController extends AppController {
    var $components = array('GeoIp');
    var $uses = array();
    
    function lookup($addr = null)
    {
        $GeoIpData = $this->GeoIp->lookup($addr, true);
        if (!$GeoIpData) {
            // Couldn't find anything or there was a problem with the IP.
            $this->render('some_error_view');
        }
        else {
            // Make available to the view our GeoIpData result.
            $this->set('geo', $GeoIpData);
        }
    }
}
?>