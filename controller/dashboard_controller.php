<?php

session_start();

require_once __DIR__ . '/../config/db_conn.php';
require_once __DIR__ . '/../repositories/dashboard_repository.php';

$totalCattle = getTotalCattle($conn);
$sickCattle = getSickCattle($conn);
$pregnantCattle = getPregnantCattle($conn);
$monthlySales = getCurrentMonthSales($conn);
$lowFeeds = getLowFeedInventory($conn);
$mortalityCount = getMortalityCount($conn);

?>