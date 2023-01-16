<?php require 'baglan.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="admin.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Üye Kayıt Formu</title>
</head>
  <body>
  <div style="width:750px;" id="container" class="container">
  
    <div class="card p-5 m-5">
  <div class="from ">
<?php

  if(isset($_POST['kullanicikaydet'])) {
  $adsoyad=$_POST['uye_AdSoyad'];
  $mail=$_POST['uye_Mail'];
  $sifre=$_POST['uye_Sifre'];
  $sifre2=$_POST['uye_SifreTekrar'];
  $sifreUzunluk = strlen($sifre);
  $kontrol = $db -> query ("SELECT * FROM  uye_kayit WHERE uye_Mail='$mail' ")->fetch();
  if( !$mail) {
   
  }
  elseif($kontrol){
    echo' <div class="alert alert-danger text-center" role="alert">   
    <strong>BU MAİL ZATEN KAYITLI!</strong>
     </div>';
     header("Refresh:2; kayit.php");

  }elseif($sifreUzunluk < 8){
    echo' <div class="alert alert-danger text-center" role="alert">   
    <strong>GİRİLEN ŞİFRE EN AZ 8 KARAKTERLİ OLMALIDIR!</strong>
     </div>';
     header("Refresh:2; kayit.php");
 
    }elseif($sifre != $sifre2){
    echo' <div class="alert alert-danger text-center" role="alert">   
    <strong>GİRİLEN ŞİFRELER UYUŞMUYOR!LÜTFEN,TEKRAR DENEYİNİZ</strong>
     </div>';
     header("Refresh:2; kayit.php");
  }else{
    $kayit = $db -> prepare("INSERT INTO uye_kayit SET
    uye_AdSoyad=?,
    uye_Mail=?,
    uye_Sifre=?,
    uye_SifreTekrar=?
 ");
 $kullanicikaydet= $kayit -> execute([
  htmlspecialchars($adsoyad),htmlspecialchars($mail),sha1(md5($sifre)),sha1(md5($sifre2))
 ]);
  if($kullanicikaydet){
    echo' <div class="alert alert-primary text-center" role="alert">   
    <strong>KAYIT BAŞARILI! GİRİŞ SAYFASINA YÖNLENDİRİLİYORSUNUZ..</strong>
     </div>';
     header("Refresh:2; index.php");
 }else{
  echo' <div class="alert alert-danger text-center" role="alert">   
  <strong>BİR HATA OLUŞTU!LÜTFEN,TEKRAR DENEYİNİZ</strong>
   </div>';
   header("Refresh:2; kayit.php");
 }


  }
 }

?>

 
<div class="text-center mb-3">
  <h1><b>ÜYE KAYIT</b></h1>
</div>
<form action="kayit.php"  method="post">
<div class="mb-3">
<input type="text" class="form-control mb-4"  name="uye_AdSoyad"  placeholder="Adınızı ve Soyadınızı Giriniz..">    
<input type="email" class="form-control mb-4"  name="uye_Mail"  placeholder="Mailinizi Giriniz..">
<input type="password" class="form-control mb-4" name="uye_Sifre" placeholder="Şifrenizi Giriniz..">
<input type="password" class="form-control mb-4" name="uye_SifreTekrar"  placeholder="Şifrenizi Tekrar Giriniz..">

<div class="text-center">
<a href="index.php"button type="submit" class="btn bg-danger" style="color:white;">GERİ DÖN</a></button>
<button type="submit" class="btn bg-primary" name="kullanicikaydet" style="color:white;">KAYDET</button>
</div>
</div>
</form>

 </div>
</div>
  


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>