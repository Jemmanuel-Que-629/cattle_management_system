<?php

function redirectToDashboard(int $roleId, string $roleName, string $baseUrl): void
{
	$roleName = trim($roleName);

	if ($roleName === '') {
		$roleName = match ($roleId) {
			1 => 'Admin',
			2 => 'Manager',
			default => 'Employee',
		};
	}

	$target = 'views/employee/dashboard.php';

	if ($roleId === 1 || $roleName === 'Admin') {
		$target = 'views/admin/dashboard.php';
	} elseif ($roleId === 2 || $roleName === 'Manager') {
		$target = 'views/manager/dashboard.php';
	}

	$baseUrl = rtrim($baseUrl, '/') . '/';
	header('Location: ' . $baseUrl . ltrim($target, '/'));
	exit();
}

?>
