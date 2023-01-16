<?php include 'baglan.php';

//session çıkış
session_destroy();

echo '<h1 style=\'text-align:center; margin-top:45px; color:red; font-weight:bold;\'>BAŞARILI BİR ŞEKİLDE ÇIKIŞ YAPTINIZ!
GİRİŞ SAYFASINA YÖNLENDİRİLİYORSUNUZ</h1>';
header('Refresh:1; index.php');

//sayfada Çıkış Yapmak İçin gerekli kodlar

?>