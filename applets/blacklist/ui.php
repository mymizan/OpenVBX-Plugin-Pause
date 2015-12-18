<div class="vbx-applet">
	<h3>Blacklist</h3>
	<div class="vbx-full-pane">
		<fieldset class="vbx-input-container">
			<p>Numbers to block - one number per line</p>
			<textarea name="blacklist" class='large'><?php echo AppletInstance::getValue('blacklist'); ?></textarea>
		</fieldset>
	</div><!-- .vbx-split-pane -->
	<h2>Next</h2>
	<div class="vbx-full-pane">
		<?php echo AppletUI::DropZone('next'); ?>
	</div><!-- .vbx-full-pane -->
</div><!-- .vbx-applet -->
