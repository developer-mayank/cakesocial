<?php
if(isset($javascript)):
        echo $javascript->link('jquery-1.2.6.min.js');
        echo $javascript->link('jquery.imgareaselect-0.5.1.min.js');
endif;
?>

<?php 
        echo $cropimage->createJavaScript($uploaded['imageWidth'],$uploaded['imageHeight'],151,151); 
        echo $form->create('Foto', array('action' => 'createimage_step3',"enctype" => "multipart/form-data"));    
        echo $form->input('id');
        echo $form->hidden('name');
        echo $cropimage->createForm($uploaded["imagePath"], 151, 151);
        echo $form->submit('Done', array("id"=>"save_thumb"));
        echo $form->end();
?> 