<?php
require_once __DIR__ . '/functions.php';

$duration = AppletInstance::getValue('duration');
$enabled = AppletInstance::getValue('enabled');
$instance_id = AppletInstance::getInstanceId();
$limit = AppletInstance::getValue('limit');

$blocked_applet = AppletInstance::getValue('blocked_applet');
$unblocked_applet = AppletInstance::getValue('unblocked_applet');
//$flow_type = AppletInstance::getFlowType();

$response = new TwimlResponse;

if ( limit_exceeded($duration, $enabled, $instance_id, $limit) ){
	//number over limit
	$response->redirect($blocked_applet);

} else {
	//number under limit
	$response->redirect($unblocked_applet);
}

$response->respond();