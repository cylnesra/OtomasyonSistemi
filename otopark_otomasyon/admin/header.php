<?php require 'baglan.php'; 
//izinsiz giriş 
/*$kullanicicek = $db -> prepare('SELECT * FROM kullanici_giris WHERE sifre=:sifre');
$kullanicicek -> execute([
    'sifre' => $_SESSION['sifre']
]);

$say = $kullanicicek -> rowCount();
$kaydet = $kullanicicek -> fetch(PDO::FETCH_ASSOC);
if ($say == 0) {
   header('location:index.php?izinsizgiris');
   
}*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Araç Takip</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="admin.css">
   <title>Otopark Otomasyonu</title>
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
  <body>

  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="anasayfa.php">Ana Sayfa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="parkedenarac.php">Park Eden Araç</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0 mb-3"  action="parkedenarac.php" method="post"> 
   <input class="form control mr-sm-2" type="search" placeholder="Bul.." name="bul" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0 " type="submit" style="margin:10px;">Ara</button>
    <button type="submit" name="cikis" class="btn bg-danger" style="color:white;"><a href="cikis.php" style="color:white; text-decoration:none;">ÇIKIŞ YAP</a></button>
</form>
</div>
</nav>

<?php
// veritabanında istediğimiz plakayı filtreleme işlemleri.

if(isset($_POST['bul'])) {
$bul = $_POST['bul'];
if(!$bul) {
  echo  '<div class="alert alert-danger text-center" role="alert">
     <strong>ARAMA YAPMAK İÇİN BİR ŞEY YAZINIZ!</strong>
</div>';
 header('Refresh:2; parkedenarac.php');
}else{
  $plakabul = $db -> prepare('SELECT * FROM  arac_kayit WHERE arac_plaka LIKE :arac_plaka');
  $plakabul -> execute(array(':arac_plaka' =>'%' .$bul. '%'));
  if ($plakabul -> rowCount()) {
   foreach ($plakabul as $plaka) {
    echo '<div class="alert alert-success text-center" role="alert">'.
    $plaka['arac_plaka'].'<strong><b style="color:red;">ARAÇ HENÜZ ÇIKIŞ YAPMADI!</b></strong>
  </div>';
  header('Refresh:2; parkedenarac.php');
  
}
  }else {
    echo'<div class="alert alert-danger text-center" role="alert">
  <strong>GİRİLEN PLAKA OTOPARKTA YOK!</strong>
  </div>';
  header('Refresh:2; parkedenarac.php');
   }
}
}
?>




  
