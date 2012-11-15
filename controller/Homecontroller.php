<?php
class Homecontroller extends controller{

	function index(){
	
		/**
		*SLIDERS
		*/
		$this->loadModel('slider');
		$conditions = array('online' => 1);
		$d['sliders'] = $this->slider->find(array(
			'conditions' 	=> $conditions
		));
		$this->set($d);
		
		/**
		*FOCUS
		*/
		
		/**
		*FOOTER
		*/
	}
	
	function admin_index(){
	}

}
?>