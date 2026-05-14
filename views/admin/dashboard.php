<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../config/db_conn.php';
require_once __DIR__ . '/../../template/header.php';
require_once __DIR__ . '/../../template/sidebar.php';
require_once __DIR__ . '/../../controller/dashboard_controller.php';
?>

<div class="main-content">

    <div class="dashboard-header">
        <h1>Dashboard Overview</h1>
        <p>Real-time statistics for your cattle management.</p>
    </div>

   <div class="report-controls">
        <button class="btn-print" onclick="generatePDFReport()">
            <span class="material-symbols-outlined">print</span>
            Generate PDF Report
        </button>
    </div>

    <div class="stats-grid">
        <!-- Total Cattle -->
        <div class="stat-card">
            <div class="stat-icon bg-navy">
                <span class="material-symbols-outlined">pets</span>
            </div>
            <div class="stat-details">
                <h3>Total Cattle</h3>
                <p class="stat-number"><?= $totalCattle ?></p>
            </div>
        </div>

        <!-- Sick Cattle -->
        <div class="stat-card">
            <div class="stat-icon bg-red">
                <span class="material-symbols-outlined">medical_services</span>
            </div>
            <div class="stat-details">
                <h3>Sick Cattle</h3>
                <p class="stat-number"><?= $sickCattle ?></p>
            </div>
        </div>

        <!-- Pregnant Cattle -->
        <div class="stat-card">
            <div class="stat-icon bg-green">
                <span class="material-symbols-outlined">child_care</span>
            </div>
            <div class="stat-details">
                <h3>Pregnant Cattle</h3>
                <p class="stat-number"><?= $pregnantCattle ?></p>
            </div>
        </div>

        <!-- Monthly Revenue -->
        <div class="stat-card">
            <div class="stat-icon bg-blue">
                <span class="material-symbols-outlined">payments</span>
            </div>
            <div class="stat-details">
                <h3>Monthly Revenue</h3>
                <p class="stat-number">₱<?= number_format($monthlySales, 2) ?></p>
            </div>
        </div>

        <!-- Mortality Count -->
        <div class="stat-card">
            <div class="stat-icon bg-dark">
                <span class="material-symbols-outlined">skull</span>
            </div>
            <div class="stat-details">
                <h3>Mortality Count</h3>
                <p class="stat-number"><?= $mortalityCount ?></p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Main Content Wrapper */
    .main-content {
        padding: 30px;
        background-color: #f8f9fa;
        min-height: calc(100vh - 60px);
    }

    .dashboard-header {
        margin-bottom: 30px;
    }

    .dashboard-header h1 {
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .dashboard-header p {
        color: #666;
        margin-top: 5px;
    }

    /* Grid Layout */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
    }

    /* Card Styling */
    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    /* Icon Backgrounds */
    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stat-icon span {
        font-size: 30px;
        color: #fff;
    }

    .bg-navy { background-color: var(--navy); } /* Using your navy variable */
    .bg-red { background-color: #dc3545; }
    .bg-green { background-color: #28a745; }
    .bg-blue { background-color: #007bff; }
    .bg-dark { background-color: #343a40; }

    /* Text Details */
    .stat-details h3 {
        font-size: 0.9rem;
        color: #777;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-number {
        font-size: 1.5rem;
        font-weight: 700;
        color: #333;
        margin: 5px 0 0 0;
    }

    .report-controls {
    display: flex;
    justify-content: flex-end; /* This pushes the content to the right */
    margin-bottom: 20px;
    }

    .btn-print {
        background-color: var(--navy); /* Your Navy Blue color */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 10px; /* Space between icon and text */
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-print:hover {
        background-color: #0000a0; /* A slightly lighter blue on hover */
        transform: translateY(-2px);
    }

    .btn-print:active {
        transform: translateY(0);
    }

    .btn-print .material-symbols-outlined {
        font-size: 20px; /* Adjust icon size */
    }

    /* Responsive Adjustments */
    @media (max-width: 480px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        .report-controls {
        justify-content: center; /* Center it on very small mobile screens */
        }
    }
</style>