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
	
	function admin_edit($id = null){
		
		$this->loadModel('slider');
		if($id === null)
		{
			$slider = $this->slider->findFirst(array(
				'conditions'	=> array('online'=> -1)
			));
			if(!empty($slider))
			{
				$id = $slider->id;
			}
			else
			{
				$this->slider->save(array(
					'online'	=> -1
				));
				$id = $this->slider->id;
			}
		}
		$d['id'] = $id;
		if($this->request->data)
		{
			if($this->request->data && !empty($_FILES['file']['name']))
			{
				//Faire les vérifications de type ici
				if(strpos($_FILES['file']['type'], 'image') !== false)
				{
					$dir = WEBROOT.DS.'img'.DS.date('Y-m');
					if(!file_exists($dir)) mkdir($dir,0777);//Crée le répertoire s'il n'existe pas
					move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$_FILES['file']['name']);
					$this->slider->save(array(
						'name'		=> $this->request->data->name,
						'file'		=> date('Y-m').'/'.$_FILES['file']['name'],
						// 'post_id'	=> $id,
						'type'		=> 'img'
					));
					$this->session->setFlash("L'image a bien &eacute;t&eacute; upload&eacute;e");
				}
				else
				{
					$this->form->errors['file'] = "Le fichier n'est pas une image";
				}
			}
			
			if($this->slider->validates($this->request->data))
			{
				$this->request->data->name = $this->request->data->name;
				$this->request->data->file = date('Y-m').'/'.$_FILES['file']['name'];
				// $this->request->data->user_id = '0';//Id utilisateur
				$this->slider->save($this->request->data);
				$this->session->setFlash('Le contenu a bien &eacute;t&eacute; modifi&eacute;');
				$id = $this->slider->id;
				$this->redirect('admin/slider/index');
				
			}
			else
			{
				$this->session->setFlash('Merci de bien vouloir corriger vos informations','error');
			}
		}
		else
		{
			if($id)
			{
				$this->request->data = $this->slider->findFirst(array(
					'conditions'	=> array('id'=>$id)		
				));
				// $d['id'] = $id;
			}
		}
		$d['image'] = $this->slider->find(array(
			'conditions'	=> array('id'	=> $id)
		));
		$this->set($d);
		// debug($this->request->data);
		// debug($d[0]);
	
	}
	
	function admin_delete_pic($id){
		$this->loadModel('slider');
		$media = $this->slider->findFirst(array(
			'conditions'	=> array('id'=>$id)
		));
		unlink(WEBROOT.DS.'img'.DS.$media->file);
		$this->slider->delete_slide($id);
		$this->session->setFlash("L'image a bien &eacute;t&eacute; supprim&eacute;e");
		$this->redirect('admin/slider/index/');
	}
	
	function admin_delete(){
	}

}
?>