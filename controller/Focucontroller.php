<?php
class Focucontroller extends controller{

	function index(){
	}
	
	function view(){
	}

	function admin_index(){
		$this->loadModel('focus');
		$d['focus'] = $this->focus->find(array(
			'fields'	=>	'id'
		));
		$d['total'] = count($d['focus']);
		debug($d['total']);
		$this->set($d);
		// $this->loadModel('slider');
		// $d['slider'] = $this->slider->find(array(
			// 'fields'	=>	'id,name,file,online'
		// ));
		// $d['total'] = count($d['slider']);
		// debug($d['total']);
		// $this->set($d);
	}

}
?>