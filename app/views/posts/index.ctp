<h1>Service messages</h1>
<?php
if (count($post_list)== 0)
{
echo 'You have no messages!';
}
else
{
foreach ($post_list as $post):
// clear: both;border: 1px solid Blue;width:500px;

echo '<div style="float : left;">';

echo $this->element('userview', array("user" => $post['users']));

echo '<div style="float : left;width : 130px;margin-top : 30px;">';
echo $html->link($post['p']['co'].' messages', '/posts/view/'.$post['users']['id']);
echo '</div>';

echo '<div style="float : left;width : 90px;margin-top : 30px;">';
echo $html->link($post['p']['nco'].' new messages', '/posts/view/'.$post['users']['id']);
echo '</div>';

echo '</div>';

endforeach;
}
?>