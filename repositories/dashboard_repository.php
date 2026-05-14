<?php

require_once __DIR__ . '/../config/db_conn.php';

function getTotalCattle(PDO $conn) :int{
    $sql = "SELECT COUNT(*) AS total_cattle FROM cattle";
    $stmt = $conn->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return (int)$row['total_cattle'];
}

function getSickCattle(PDO $conn) :int{
    $sql = "SELECT COUNT(*) AS sick_cattle FROM cattle WHERE status = 'Sick' and archived = 0";
    $stmt = $conn->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return (int)$row['sick_cattle'];
}

function getPregnantCattle(PDO $conn) :int{
    $sql = "SELECT COUNT(*) AS pregnant_cattle FROM cattle WHERE status = 'Pregnant' and archived = 0";
    $stmt = $conn->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return (int)$row['pregnant_cattle'];
}

function getMonthlySales(PDO $conn) :array{
    $sql = "SELECT 
                MONTH(sale_date) AS month, 
                YEAR(sale_date) AS year, 
                SUM(sale_price) AS total_sales 
            FROM cattle_sales 
            WHERE YEAR(sale_date) = YEAR(CURRENT_DATE()) 
            GROUP BY MONTH(sale_date), YEAR(sale_date)";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCurrentMonthSales(PDO $conn) :float{
    $sql = "SELECT COALESCE(SUM(sale_price), 0) AS total_sales
            FROM cattle_sales
            WHERE YEAR(sale_date) = YEAR(CURRENT_DATE())
              AND MONTH(sale_date) = MONTH(CURRENT_DATE())";
    $stmt = $conn->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return (float)($row['total_sales'] ?? 0);
}

function getLowFeedInventory(PDO $conn) :array{
    $sql = "SELECT feed_id, feed_name, quantity FROM feed_inventory WHERE quantity <= minimum_stock";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMortalityCount(PDO $conn) :int{
    $sql = "SELECT COUNT(*) AS mortality_count 
    FROM cattle_mortality 
    WHERE MONTH(death_date) = MONTH(CURRENT_DATE()) 
    AND YEAR(death_date) = YEAR(CURRENT_DATE())";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return (int)$result['mortality_count'];
}

function generatePDFReport(){
    // This function will generate a PDF report of the cattle inventory
    // You can use a library like TCPDF or FPDF to create the PDF
    // For simplicity, this is just a placeholder function
    echo "PDF report generated successfully.";
}

?>