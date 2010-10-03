<?
$countries= ClassRegistry::init('Country')->getList();

if(isset($geo_ids['country_id']))
{
	$selected_country = $geo_ids['country_id'];
}
else
{
	$selected_country  = '';
}
                      

echo $form->input('Geo.country_id',
                   array('options' => $countries ,
                         'empty' => 'please choose',
                         'selected' => $selected_country,
                         'label' => 'Country')
); 


$options = array('url' => '/regions/get/','update' =>'GeoRegionId',
'with' => 'Form.Element.serialize(\'GeoCountryId\')',
'loading' => "Effect.Pulsate('GeoRegionId',{ pulses: 5, duration: 1.5});Element.show('div_spinner')",
'complete' => "Element.hide('div_spinner')");

echo $ajax->observeField('GeoCountryId',$options);

if(isset($geo_ids['country_id']))
{
  $regions=$this->requestAction('regions/get/'.$geo_ids['country_id']);
  $empty_region = 'please choose';
  if ($geo_ids['region_id'] != 0)
  {
  	$selected_region = $geo_ids['region_id'];
  }
  else
  {
  	 $selected_region ='';
  }
}
else
{
    $regions ='';
    $empty_region = 'no data has been downloaded from the server';
    $selected_region ='';
}
                      
echo $form->input('Geo.region_id',
                   array(
                       'options' => $regions,
                       'empty' => $empty_region,
                       'selected' => $selected_region,
                       'id'=>'GeoRegionId',
                       'label' => 'Region')
);

$options_region = array('url' => '/cities/get/','update' =>'GeoCityId',
'with' => 'Form.Element.serialize(\'GeoRegionId\')',
'loading' => "Effect.Pulsate('GeoCityId',{ pulses: 5, duration: 1.5});Element.show('div_spinner')",
'complete' => "Element.hide('div_spinner')");

echo $ajax->observeField('GeoRegionId',$options_region);

if(isset($geo_ids['region_id']))
{
  $cities = $this->requestAction('cities/get/'.$geo_ids['region_id']);
  $empty_city = 'please choose';
  $selected_city = $geo_ids['city_id'];
  if ($geo_ids['region_id'] != 0)
  {
  	$selected_city = $geo_ids['city_id'];
  }
  else
  {
  	 $selected_city = '';
  }

}
else
{
    $cities  ='';
    $empty_city = 'no data has been downloaded from the server';
    $selected_city = '';
}

echo $form->input('Geo.city_id',
                   array(
                       'options' => $cities,
                       'empty' => $empty_city,
                       'selected' => $selected_city,
                       'id'=>'GeoCityId',
                       'label' => 'City')
);
?>
