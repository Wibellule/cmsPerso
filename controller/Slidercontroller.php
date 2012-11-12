<?php
class Slidercontroller extends controller{

	function index(){
	}
	
	function view(){
	}
	
	function admin_index(){
		$this->loadModel('slider');
		$d['slider'] = $this->slider->find(array(
			'fields'	=>	'id,name,file,online'
		));
		$d['total'] = count($d['slider']);
		// debug($d['total']);
		$this->set($d);
	}
	
	function admin_edit(){
	}
	
	function admin_delete(){
	}

}
?>