<?
class Department extends AppModel {

        var $name = 'Department';
		
		function get()
		{
			return $this->find('list',array('order'=>'name asc'));
		}
		
}