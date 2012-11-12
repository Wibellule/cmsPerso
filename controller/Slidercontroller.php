<?php
class Slidercontroller extends controller{

	function index(){
	}
	
	function view(){
	}
	
	function admin_index(){
		$this->loadModel('slide');
		$d['slide'] = $this->slide->find(array(
			'fields'	=>	'id,name,file'
		));
		$d['total'] = count($d['slide']);
		// debug($d['total']);
		$this->set($d);
	}
	
	function admin_edit(){
	}
	
	function admin_delete(){
	}

}
?>