<?php
class SitemapsController extends AppController {
var $components = array('RequestHandler'); 
var $helpers = array('Time', 'Xml'); 
var $name = 'Sitemaps'; 
var $uses = array('User','Uni',); 

function sitemap() { 
Configure::write ('debug', 0);
$users = $this->User->find('all', array('fields' => array('name', 'updated')), null, -1); 
$unis = $this->Uni->find('all', array('fields' => array('id')), null, -1);
//debug($users);
//$unis = $this->Uni->find('all', array('fields' => array('id')), null, -1);
$this->set('users',$users);
$this->set('unis',$unis);

$this->RequestHandler->respondAs('xml'); 
$this->viewPath .= '/xml'; 
$this->layoutPath = 'xml';}
}

/*
 Thanks for share! One idea for static pages: on controller: $file_aboutus = new File(APP . 'views/pages/aboutus.ctp'); $modified_aboutus = $file_aboutus->lastChange(); $this->set('modified_aboutus',$modified_aboutus); on view: toAtom($modified_aboutus)?> Hope it helps! 
 */ 
?>