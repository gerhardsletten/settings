

<?php
App::import('Core', 'Folder');
$items = array();
$plugin_folder = new Folder(APP . "plugins");
$folder = $plugin_folder->ls(null, true);
foreach($folder[0] as $item) {
	$items[$item] = $item;
}
$controller_folder = new Folder(APP . "controllers");
$folder = $controller_folder->ls(null, true);
foreach($folder[1] as $item) {
	$item = str_replace("_controller.php", "", $item);
	$items[$item] = $item;
}

?>
<div class="actions adminmenu">
	<ul>
		<?php foreach($items as $item): ?>
		<li><?php echo $html->link(Inflector::camelize($item), '/admin/' . $item); ?></li>
		<?php endforeach; ?>
	</ul>
</div>