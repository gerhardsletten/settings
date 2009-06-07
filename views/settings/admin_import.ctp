<div class="settings index">
<h2><?php __('Import configure settings');?></h2>
<p>Add <strong>Configure::write('SettingsStart', true);</strong> and <strong>Configure::write('SettingsEnd', true);</strong> to the start and end of your app/config/core.php file. Everything inside will be imported into the settings database.</p>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Start importing', true), array('action'=>'import', 'start')); ?></li>
		<li><?php echo $html->link(__('Or cancel', true), array('action'=>'index')); ?></li>
	</ul>
</div>

<?php if(!empty($success)):?>
<h3><?php __('Successfully imported into settings database');?>:</h3>
	<ul>
<?php foreach ($success as $key => $value): ?>
	<li><?php echo $key; ?></li>
<?php endforeach; ?>
</ul>
<?php endif;?>


<?php if(!empty($exists)):?>
<h3><?php __('Already exists in settings database');?>:</h3>
<ul>
<?php foreach ($exists as $key => $value): ?>
	<li><?php echo $key; ?></li>
<?php endforeach; ?>
</ul>
<?php endif;?>


<?php if(!empty($error)):?>
<h3><?php __('Error: Not imported');?>:</h3>
<ul>
<?php foreach ($error as $key => $value): ?>
	<li><?php echo $key; ?></li>
<?php endforeach; ?>
</ul>
<?php endif;?>

</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Back to index', true), array('action'=>'index')); ?></li>
	</ul>
</div>
