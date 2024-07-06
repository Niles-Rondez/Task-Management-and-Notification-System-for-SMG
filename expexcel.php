<?php
require('conn.php');
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=report.xls");

require('reports.php');


?>