<?php echo $html->css('/settings/css/ajax_filter', NULL, array(), false); ?>

<div class="settings index">
<h2><?php __('Settings');?></h2>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Import Configure settings', true), array('action'=>'import')); ?></li>
		<li><?php echo $html->link(__('Clear cache', true), array('action'=>'clearcache')); ?></li>
	</ul>
</div>
<div id="filter_box">
	<input type="text" name="filter_text" id="filter_text" />
	<button><?php __('Filter settings')?></button>
</div>
<script>

jQuery(document).ready(function() {
	jQuery("#filter_box button").click(function() { 
		var input = jQuery("#filter_text").val();
		filter(input);
	  });
	
});

<?php $url = $this->base .'/admin/settings/query/' ?>
function filter(query) {
  var url = "<?php echo $url; ?>" + query;
//alert(url);
  jQuery("#ajax_update").load(url);

}
</script>
<div id="ajax_update">
	<?php echo $this->element('index_table', array('settings'=>$settings)); ?>
</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Setting', true), array('action'=>'add')); ?></li>
	</ul>
</div>
