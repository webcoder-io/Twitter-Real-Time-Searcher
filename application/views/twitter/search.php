<!-- START of CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>css/twitter.css" type="text/css">
<!-- END of CSS -->
<!-- START of JS -->
<script src="<?php echo base_url();?>js/twitter.js"></script>
<script src="<?php echo base_url();?>js/date.js"></script>
<!-- END of JS -->

<div id="searcher" class="center">
	<div class="col-sm-8 col-sm-offset-2">
		<div class="page-header"><h1>Twitter AJAX Watcher v1 (for Forbes Quiz)</h1></div>
		<form name="searcherForm">
		<div class="form-group">
			<label>Enter your keywords</label>
			<input type="text" name="keywords" class="form-control">
			<span id="error"></span>
		</div>
		<button type="reset" class="btn btn-primary pull-right">Clear</button>
		</form>
	</div>
	<div id="results" class="clear"></div>
</div>
