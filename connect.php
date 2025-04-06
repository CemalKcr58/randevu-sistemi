<?php
    $con = new mysqli("localhost", "root", "", "sistemodev");
    $con->query("SET CHARACTER SET utf8");
    $con->query("set names 'utf8'");

    if ($con->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $con->connect_error);
    }



?>