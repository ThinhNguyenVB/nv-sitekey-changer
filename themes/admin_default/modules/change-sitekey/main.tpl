<!-- BEGIN: lack_permission -->
<div class="alert alert-danger"><strong>{LANG.lack_permission}</strong></div>
<!-- END: lack_permission -->

<!-- BEGIN: main -->
<!-- BEGIN: warn -->
<div class="alert alert-danger"><strong>{LANG.warn}</strong></div>
<!-- END: warn -->
<form name="sitekey_changer" id="sitekey_changer" method="POST" action="{NV_BASE_ADMINURL}index.php?{NV_LANG_VARIABLE}={NV_LANG_DATA}&amp;{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}">
	<input type="hidden" name="action" value="1" />
	<div class="form-group">
		<strong>{LANG.current_sitekey}</strong> :<input class="form-control" type="text" name="old_sitekey" value="{OLD_SITEKEY}" id="old_sitekey" readonly="readonly"/>
	</div>
	<!-- BEGIN: compare -->
	<div class="form-group">
		<strong>{LANG.new_sitekey}</strong> :<input class="form-control" type="text" name="new_sitekey" value="{NEW_SITEKEY}" id="new_sitekey" readonly="readonly"/>
	</div>
	<div class="clear margin-top-lg">
		<button type="submit" id="change_now" type="button" class="btn btn-danger">{LANG.change_now}</button>
	</div>
	<!-- END: compare -->
</form>
<div class="change_sitekey_result">
	<!-- BEGIN: success -->
	<div class="alert alert-success"><strong>{LANG.change_success}</div>
	<!-- END: success -->
	<!-- BEGIN: error -->
	<div class="alert alert-danger"><strong>{LANG.change_error}</strong></div>
	{LANG.new_sitekey} :<input class="form-control" type="text" name="new_sitekey" value="{NEW_SITEKEY}" id="new_sitekey" readonly="readonly"/>
	<!-- END: error -->
</div>
<script type="text/javascript">
$("#change_now").click(function(event){
    if(!confirm ("{LANG.change_confirm}"))
       event.preventDefault();
});
</script>
<!-- END: main -->