<?php 
echo $form->create('Foto', 
array('action' => 'createimage_step2', "enctype" => "multipart/form-data"));
?>
<?php
        echo $form->input('name');
        echo $form->input('image',array("type" => "file")); 
        echo $form->end('Upload');
?>