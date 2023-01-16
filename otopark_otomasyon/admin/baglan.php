<?php  
// veri Tabanı Baglantısı Başlatma
try {
    $db = New PDO ('mysql:host=localhost;dbname=otopark_otomasyon','root','');
    // echo 'Veri Tabanı Başarılı';
} catch (Exception $e) {
    $e -> getMessage();
}
ob_start();
session_start();



?>