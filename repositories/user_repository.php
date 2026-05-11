<?php

    require_once __DIR__ . '/../config/db_conn.php';

    function fetchUserByEmail(PDO $conn, string $email){
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

?>