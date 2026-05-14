<?php

    require_once __DIR__ . '/../config/db_conn.php';

    function fetchUserByEmail(PDO $conn, string $email){
       $sql = "SELECT
                    u.user_id,
                    u.email,
                    u.password,
                    u.role_id,
                    r.role_name
                FROM users u
                LEFT JOIN roles r ON u.role_id = r.role_id
                WHERE u.email = :email
                LIMIT 1";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':email', $email, PDO::PARAM_STR);
       $stmt->execute();

       return $stmt->fetch(PDO::FETCH_ASSOC);
    }

?>