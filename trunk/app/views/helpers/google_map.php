<?php
/*
 * CakeMap -- a google maps integrated application built on CakePHP framework.
 * Copyright (c) 2005 Garrett J. Woodworth : gwoo@rd11.com
 * rd11,inc : http://rd11.com
 *
 * @author      gwoo <gwoo@rd11.com>
 * @version     0.10.1311_pre_beta
 * @license     OPPL
 *
 * Modified by 	Mahmoud Lababidi <lababidi@bearsontherun.com>
 * Date			Dec 16, 2006
 * 
 *
 */
class GoogleMapHelper extends Helper {

	var $errors = array();

	var $key = "ABQIAAAAGZBW7gt42T-mBJ95FIPGwRSntjUbqNgGmjzPhe4keAHyUrmfnRTqZp0XQZE_z4Kc1585VnllROhUOQ";

	function map($default, $style = 'width: 200px; height: 300px' )
	{
		$out = "<div id=\"map\"";
		$out .= isset($style) ? "style=\"".$style."\"" : null;
		$out .= " ></div>";
		$out .= "
		<script type=\"text/javascript\">
		//<![CDATA[
		if (GBrowserIsCompatible()) 
		{	
			var map = new GMap(document.getElementById(\"map\"));
			map.enableScrollWheelZoom();
            map.setCenter(new GLatLng(".$default['lat'].",".$default['long']."), ".$default['zoom'].");
		}
		//]]>
		</script>";
		return $out;
	}

	function addMarkers($data)
	{
		$out = "
			<script type=\"text/javascript\">
			//<![CDATA[
			if (GBrowserIsCompatible()) 
			{
			";
			if(is_array($data))
			{
				$i = 0;
				foreach($data as $n=>$m){
					$keys = array_keys($m);
					$point = $m[$keys[0]];
					if(!preg_match('/[^0-9\\.\\-]+/',$point['longitude']) && preg_match('/^[-]?(?:180|(?:1[0-7]\\d)|(?:\\d?\\d))[.]{1,1}[0-9]{0,15}/',$point['longitude'])
						&& !preg_match('/[^0-9\\.\\-]+/',$point['latitude']) && preg_match('/^[-]?(?:180|(?:1[0-7]\\d)|(?:\\d?\\d))[.]{1,1}[0-9]{0,15}/',$point['latitude']))
					{
						$out .= "
							var point = new GLatLng(".$point['latitude'].",".$point['longitude'].");
							map.addOverlay(new GMarker(point));";
						    $i++;
						
					}
				}
			}
		$out .=	"} 
				//]]>
			</script>";
		return $out;
	}
	
	function addClick($var, $script=null)
	{
		$out = "
			<script type=\"text/javascript\">
			//<![CDATA[
			if (GBrowserIsCompatible()) 
			{
			" 
			.$script
			.'GEvent.addListener(map, "click", '.$var.', true);'
			."} 
				//]]>
			</script>";
		return $out;
	}	
	
	function addMarkerOnClick($innerHtml = null)
	{
		$mapClick = '
			var mapClick = function (overlay, point) {
				var point = new GPoint(point.x,point.y);
				var marker = new GMarker(point,icon);
				map.addOverlay(marker)
				GEvent.addListener(marker, "click", 
				function() {
					marker.openInfoWindowHtml('.$innerHtml.');
				});
			}
		';
		return $this->addClick('mapClick', $mapClick);
		
	}	

}
?>
