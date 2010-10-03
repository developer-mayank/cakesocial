<?php
class JaxoptionHelper extends AppHelper {
	
   function make($update_div) {
        $options = array(
    		'update'   => $update_div,
			'loading'  => "Element.show('div_spinner');",
			'complete' => "Element.hide('div_spinner');");
    	return $options;
   }
}
?>