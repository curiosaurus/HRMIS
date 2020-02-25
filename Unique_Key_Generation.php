<?php

/**
 * Creating MongoDB like ObjectIDs.
 * Using current timestamp, hostname, processId and a incremting id.
 * 
 * @author Julius Beckmann
 */
function createMongoDbLikeId($timestamp, $hostname, $processId, $id)
{
	// Building binary data.
	$bin = sprintf(
		"%s%s%s%s",
		pack('N', $timestamp),
		substr(md5($hostname), 0, 3),
		pack('n', $processId),
		substr(pack('N', $id), 1, 3)
	);

	// Convert binary to hex.
	$result = '';
	for ($i = 0; $i < 12; $i++) {
		$result .= sprintf("%02x", ord($bin[$i]));
	}

	return $result;
}

foreach(range(0, 0) as $id) {
	var_dump(createMongoDbLikeId(time(), php_uname('n'), getmypid(), $id));
}
