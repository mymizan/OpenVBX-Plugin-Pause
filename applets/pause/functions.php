<?php
$ci = &get_instance();
$ci->load->helper('format');

function limit_exceeded($duration, $enabled, $instance_id, $limit){
	if (!$enabled)
		return false; //throttling disabled

	$number = normalize_phone_to_E164($_REQUEST['From']);
	$data = get_data($number,$instance_id);
	$duration = intval($duration) * 60; //convert it into seconds
	
	if (!$data){
		PluginData::set($instance_id . "__" . $number, array(
			'limit' => 1,
			'added' => time()
			));
	}

	if ($data['limit'] >= $limit){
		update_data($number,$instance_id);
		return true;
	}
}


function update_expired_limit($duration, $number, $instance_id){
	return true;
}

function get_data($number,$instance_id){
	//stub
	update_expired_limit();
	return PluginData::get($instance_id . "__" . $number);
}

function update_data($number,$instance_id){
	//stub
}
