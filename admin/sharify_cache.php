<?php
	global $wpdb;
    $sharify_delete_trans_sql = 'DELETE FROM ' . $wpdb->options . ' WHERE option_name LIKE "_transient%\_sharifytrans\_%"';
    $wpdb->query($sharify_delete_trans_sql);
?>