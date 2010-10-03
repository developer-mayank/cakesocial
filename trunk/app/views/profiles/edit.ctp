<h2>Profile</h2>
<?php
echo $form->create('Profile',array( 'action' => 'edit'));

echo $form->input('id',array('type'=>'hidden', 'value' => $profile['Profile']['id']));

echo $form->input('profession',array('label'=>'profession','value'=>$profile['Profile']['profession']));

echo $form->input('purpose',array('label'=>'purpose','type'=>'textarea','value'=>$profile['Profile']['purpose']));

echo $form->input('height', array(
                       'options' => $height_options,
                       'selected' => $profile['Profile']['height'] ,
                       'label' => 'height')
);

echo $form->input('sex', array(
                       'options' => $sex_options,
                       'selected' => $profile['Profile']['sex'] ,
                       'label' => 'Gender')
);
echo $form->input('family', array(
                       'options' => $family_options,
                       'empty' => '',
                       'selected' => $profile['Profile']['family'] ,
                       'label' => 'family')
);
echo $form->input('children', array(
                       'options' => $children_options,
                       'empty' => '',
                       'selected' => $profile['Profile']['children'] ,
                       'label' => 'children?')
);

echo $form->input('skype',array('label'=>'skype','value'=>$profile['Profile']['skype']));





echo $form->input('title',array('label'=>'	
About me','type'=>'textarea','value'=>$profile['Profile']['title']));



echo $form->submit('send');
echo $form->end();
?>