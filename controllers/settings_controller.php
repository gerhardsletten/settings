<?php
class SettingsController extends SettingsAppController {

	var $name = 'Settings';
	var $helpers = array('Html', 'Form');
	//var $scaffold;
	var $paginate = array(
		'limit' => 50,
		'order' => array('Setting.key' => 'asc')
	);
	
	var $cacheAction = array(
	    '_writeSettings'  => 3600
	);
	
	function beforeFilter() {
		parent::beforeFilter(); 
		
		/*$this->Auth->deny('index', 'clearcache');*/

	}
	
	function _readConfigure() {
		$configure = Configure::getInstance();
		$config_array = array();
		$start = false;
		foreach($configure as $key => $value) {
			
			if ($key == "SettingsEnd") {
				break;
			}
			
			if($start) {
				foreach($value as $key2 => $value2) {
					if(is_array($value2)) {
						foreach($value2 as $key3 => $value3) {
							$thekey = $key . "." . $key2 . "." . $key3;
							$config_array[$thekey] = $value3;
						}
					} else {
						$thekey = $key . "." . $key2;
						$config_array[$thekey] = $value2;
					}
					
					
					//Configure::write($thekey, $value2);
					//echo $key . "." . $key2 . "." . $value2 . "<br />\n";
				}
			}
			if($key == "SettingsStart") {
				$start = true;
			} 
			
		}
		return $config_array;
	}
	
	function admin_import($action = null) {
		//debug($configure);
		$config = $this->_readConfigure();
		//debug($config);
		$exists = array();
		$error = array();
		$success = array();
		if($action == "start") {
			foreach($config as $key => $value) {
				//debug($key . ":" . $value);
				if($this->Setting->findByKey($key)) {
					$exists[$key]= $config[$key];
				} else {
					$this->Setting->create();
					//$setting = array();
					$setting['Setting']['key'] = $key;
					$setting['Setting']['value'] = $value;
					if ($this->Setting->save($setting)) {
						$success[$key]= $config[$key];
					} else {
						$error[$key]= $config[$key];
					}
				}
			}
		}
		
		//debug($success);
		//$this->redirect(array('action'=>'index'));
		
		$this->set(compact('success', 'exists', 'error'));
	}
	
	function admin_index() {
		//debug($configure);
		$this->Setting->recursive = 0;
		$this->set('settings', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Setting.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('setting', $this->Setting->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Setting->create();
			if ($this->Setting->save($this->data)) {
				$this->Session->setFlash(__('The Setting has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Setting could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Setting', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Setting->save($this->data)) {
				$this->Session->setFlash(__('The Setting has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Setting could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Setting->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Setting', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Setting->del($id)) {
			$this->Session->setFlash(__('Setting deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>