<?php if(isset($query)):?>
<p id="message">The query <?php echo $query?> returned <?php echo count($settings)?> matches!</p>
<?php endif; ?>
<?php echo $this->element('index_table', array('settings'=>$settings)); ?>