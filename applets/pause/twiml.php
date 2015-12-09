<?php
$enabled = AppletInstance::getValue('enabled');
$duration = AppletInstance::getValue('duration');
$limit = AppletInstance::getValue('limit');
$blocked_applet = AppletInstance::getValue('blocked_applet');
$unblocked_applet = AppletInstance::getValue('unblocked_applet');

$response = new TwimlResponse;

// Call flows still use the legacy <Sms> TwiML
// for sending messages during calls.
if(AppletInstance::getFlowType() == 'voice')
{
	$response->sms($sms);
}
else
{
	$response->message($sms);
}

if(!empty($next))
{
	$response->redirect($next);
}

$response->respond();