<?php
/**
 * @author yuriy
 * @email 7278181@gmail.com
 */
class PagesController extends AppController {

	var $name = 'Pages';
	var $uses = array();

	function display() {
		$path = func_get_args();

		if (!count($path)) {
			$this->redirect('/');
		}
		$count = count($path);
		//debug($path);
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(join('/', array($page)));
	}
}

?>