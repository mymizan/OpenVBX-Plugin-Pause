<?php
$ci = &get_instance();
$ci->load->helper('format');

function limit_exceeded($duration, $enabled, $instance_id, $limit){
	if (!$enabled)
		return false; //throttling disabled

	$number = normalize_phone_to_E164($_REQUEST['From']);
	$data = PluginData::get($instance_id . "__" . $number);
	$duration = intval($duration) * 60; //convert it into seconds
	
	if (!$data){
		PluginData::set($instance_id . "__" . $number, array(
			'limit' => 1,
			'added' => time()
			));
		return false;
	}

	//clean expired time
	if (!empty($data['added']) && (time() - $data['added']) > $duration ){
		PluginData::set($instance_id . "__" . $number, array(
			'limit' => 1,
			'added' => time()
			));
		$data = PluginData::get($instance_id . "__" . $number);
	}

	if ($data['limit'] >= $limit && (time() - $data['added']) <= $duration){
		PluginData::set($instance_id . "__" . $number, array(
			'limit' => $data['limit'] + 1
			));
		return true;
	}
}
