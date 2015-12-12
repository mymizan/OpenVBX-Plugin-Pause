<?php
$enabled = AppletInstance::getValue('enabled');
$duration = AppletInstance::getValue('duration');
$limit = AppletInstance::getValue('limit');
$blocked_applet = AppletInstance::getValue('blocked_applet');
$unblocked_applet = AppletInstance::getValue('unblocked_applet');
?>
<div class="vbx-applet">
	<h3>Enable/Disable</h3>
	<div class="vbx-full-pane">
		<fieldset class="vbx-input-complex vbx-input-container">
			<p>Enable or disable pause applet temporarily</p>
			<select class="medium" name="enabled">
				<option value='1' <?php $enabled == 1 ? "selected='selected'" : " "?>> Enabled </option>
				<option value='0'<?php $enabled == 0 ? "selected='selected'" : " "?>> Disabled </option>
			</select>
		</fieldset>
	</div><!-- .vbx-split-pane -->

	<h3>Duration</h3>
	<div class="vbx-full-pane">
		<fieldset class="vbx-input-container">
			<p>Phone numbers exceeding the limit within this duration(minutes) will be blocked</p>
			<textarea name="duration" placeholder='1'><?php echo AppletInstance::getValue('duration'); ?></textarea>
		</fieldset>
	</div><!-- .vbx-split-pane -->

	<h3>Limit</h3>
	<div class="vbx-full-pane">
		<fieldset class="vbx-input-container">
			<p>Phone numbers exceeding this limit within the duration will be blocked</p>
			<textarea name="limit" placeholder='10'><?php echo AppletInstance::getValue('limit'); ?></textarea>
		</fieldset>
	</div><!-- .vbx-split-pane -->
	
	<h2>Next</h2>
	<p>Go to the next applet if the number hasn't exceeded the limit</p>
	<div class="vbx-full-pane">
		<?php echo AppletUI::DropZone('unblocked_applet'); ?>
	</div><!-- .vbx-full-pane -->

	<h2>Next - if limit exceeds</h2>
	<p>Go to the next applet if the number has exceeded the limit</p>
	<div class="vbx-full-pane">
		<?php echo AppletUI::DropZone('blocked_applet'); ?>
	</div><!-- .vbx-full-pane -->

</div><!-- .vbx-applet -->
