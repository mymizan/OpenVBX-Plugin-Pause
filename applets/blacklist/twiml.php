<?php
$ci = &get_instance();
$ci->load->helper('format');

$flow_type = AppletInstance::getFlowType();
$next = AppletInstance::getDropZoneUrl('next');
$from = normalize_phone_to_E164($_POST['From']);

$blacklist = explode("\n", trim(AppletInstance::getValue('blacklist')));

foreach ($blacklist as $key => $value){
	$blacklist[$key] = normalize_phone_to_E164($value);
}

$response = new TwimlResponse;

if (in_array($from, $blacklist)){
	//reject calls
	if ( $flow_type == 'voice'){
		$response->reject();
	} else {
		//empty response for sms
	}
} else {
	$response->redirect($next);
}

$response->respond();