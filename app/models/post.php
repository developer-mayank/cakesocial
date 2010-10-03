<?
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class Post extends AppModel
{

var $name = 'Post';

function post_list($user_id)
{
	return   $this->query("
		select users.id,users.name,users.fname,users.img,users.is_online, p.co, p.nco
			from 
			(select if(`user_id` = $user_id, user1_id, `user_id`) id, 
			        count(*) co, 
			        sum(if(is_read or (`user_id` = $user_id), 0, 1)) nco
			 from posts 
			 where `user_id` = $user_id or user1_id = $user_id
			 group by 1) p 
			    join 
			 users on (users.id = p.id)
			 order by 3 desc
		");	
}


}
