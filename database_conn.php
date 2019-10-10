<?php
$dbConn = new mysqli('localhost', 'unn_w16010695', 'Alex18alex18', 'unn_w16010695');

if ($dbConn->connect_error) {
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
    exit;
}
?>
