<?php

function verifyPassword(string $inputPassword, string $hashedPassword): bool
{
    return password_verify($inputPassword, $hashedPassword);
}

?>