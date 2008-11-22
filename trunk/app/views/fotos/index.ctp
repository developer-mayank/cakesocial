<h2>Мои фото</h2>
<? echo $this->element('foto',array('user_id' => $user_id));?>
<?if(isset ($foto) && $foto):?>
<div class = "message">Фото добавлено</div>
<?
else: 
echo $form->create('Foto',array('enctype' => 'multipart/form-data'));
echo $form->input('Foto.user_id',array('type'=>'hidden', 'value' => $user_id));
echo $form->input('Image.src', array('label'=>'Новое фото', 'type'=>'file'));
//Новое фото: echo $form->file('Image.src',array('label'=>'Описание')); 
echo $form->input('describe',array('label'=>'Описание'));
echo $form->submit('Добавить фото'); 
echo $form->end(); ?>
<?endif?>