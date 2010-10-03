<? 
$options = $jaxoption->make('div_post_file');
?>
<div style = "float : left;width : 370px;padding:5px;font-size: 12px;line-height: 110%;
background-color: #f5f5f5;height :420px;overflow-y:scroll;border: 1px solid Blue;margin-bottom : 7px;" id = "mydiv">

<?php
//echo $ajax->remoteTimer(array('url' => array('controller' =>'posts', 'action' => 'newpost'),'update' => 'mydiv','position' => 'top','frequency' => 5));
foreach ($post_list as $po):
  echo '<span class="geo_datum">'.date ('Y-m-d H:i',$po['Post']['created']).'</span>';
  echo ' <b>'.$po['Otpravitel']['name'].'</b> writes :';
  
  echo '<br/>';
  echo $po['Post']['message'];
  echo '<br/>';
  echo '<br/>';
endforeach;
?>
</div>

<div style = "float : right;width : 370px;">

<?php
echo '<div style ="clear: both;">';
echo $this->element('userview', array("user" => $poluzatel));
echo  $html->image('blue_speech_bubble_48.png');
//echo  $html->link('Включить чат-режим', array('controller' => 'my_files', 'action' => 'attach'));
echo '</div>';
echo '<div style ="clear: both;">';
echo $form->create('Post');
echo $form->input('user_id',array('type'=>'hidden', 'value' => $user_id));
echo $form->input('user1_id',array('type'=>'hidden', 'value' => $user1_id));
echo '<fieldset style="display: none;"><input name="_method" value="POST" type="hidden"></fieldset>';
echo 'message :';
echo $form->input('message',array('type'=>'textarea','label'=>false,'class' => 'msq'));

//echo '<div id="div_post_file">';
//echo($html->link($html->image('plus.png'),array('controller' => 'educations', 'action' => 'addUni'),
//array('escape' => false)));
//echo  $ajax->link('Прикрепить к сообщению файл', array('controller' => 'my_files', 'action' => 'attach'),$options);
//echo '</div>';

echo $form->submit('send',array('class' => 'msq'));
echo $form->end();
echo '</div>';
?>
</div>
