<?php
class Setting extends SettingsAppModel {

	var $name = 'Setting';
	var $useTable = "settings_settings";
	
	function writeSettings() {
		$filename = "views".DS."site_settings";
		$data = cache($filename);
		if($data != null) {
			$settings = unserialize($data); 
		} else {
			$settings = $this->find('all');
			//debug($settings);
			cache($filename, serialize($settings));
		}
		//debug($settings);
		foreach($settings as $setting) {
			Configure::write($setting['Setting']['key'], $setting['Setting']['value']);
		}
	}

}
?>