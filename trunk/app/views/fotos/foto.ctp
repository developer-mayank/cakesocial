<h2>Мои фото</h2>
<?php echo $form->create('User',
 array('enctype' => 'multipart/form-data', 'action' => 'edit'));?>
<?php if ($user['User']['img'] == null): ?>
<div class="optional">
Основное фото:<br/>
<?php echo $form->file('Image.avatar'); ?>
</div>
<?php else: ?>
<?=$html->image('profiles/small/'.$user['User']['img']); ?>
<?php endif ?>
<?php echo $form->submit('Добавить фото'); ?>
<? echo $form->end(); ?>