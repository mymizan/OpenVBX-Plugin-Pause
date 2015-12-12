<?php
require_once __DIR__ . '/functions.php';

$duration = AppletInstance::getValue('duration');
$enabled = AppletInstance::getValue('enabled');
$instance_id = AppletInstance::getInstanceId();
$limit = AppletInstance::getValue('limit');

$blocked_applet = AppletInstance::getDropZoneUrl('blocked');
$unblocked_applet = AppletInstance::getDropZoneUrl('unblocked');

//$flow_type = AppletInstance::getFlowType();

$response = new TwimlResponse;

if ( limit_exceeded($duration, $enabled, $instance_id, $limit) ){
	//number over limit
	$response->redirect($blocked_applet);

} else {
	//number within limit
	$response->redirect($unblocked_applet);
}

$response->respond();