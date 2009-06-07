<?php
class Setting extends SettingsAppModel {

	var $name = 'Setting';
	var $useTable = "settings_settings";
	
	function writeSettings() {
		$settings = $this->find('all');
		foreach($settings as $setting) {
			Configure::write($setting['Setting']['key'], $setting['Setting']['value']);
		}
	}

}
?>