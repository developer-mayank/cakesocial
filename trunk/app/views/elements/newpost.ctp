<? if ($session->read('newpost'))
{
	echo '<div id="user_new_post" style = "
	 background-color: #d7d7d7;
	 border: 2px solid #8ABC00;
	 z-index:10;
	 position:absolute;
	 margin-bottom : 20px; 
     left:26px;
     top:116px;
     width:305px;
     height:370px;">
	<div style = "position:absolute;background-color: #abb;height:20px;width:305px;">Новое сообщение</div>
	<div></div>
	<div style = "position:absolute;background-color: #abb;height:20px;width:305px;top:350px;">ОТВЕТИТЬ</div>
	<div style = "position:absolute;left:226px;height:20px;width:305px;top:350px;">ЗАКРЫТЬ</div>
	</div>';
}
?>