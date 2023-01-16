<?php include 'header.php'; ?>

<div style="width:750px;" id="container" class="container p-4">
    <div class="card p-4 ">
     <div class="form">

<?php

//koşul false dönüyorsa index.php sayfasına yönlendirir.
if(!$_SESSION || !$_SESSION['valid']) {
  header("Refresh:1; index.php");
}

// Otoparka giriş yapacak araçları kayıt etme.
if(isset($_POST['kaydet'])) {
  $arac_plaka = $_POST['arac_plaka'];
  $arac_kat= $_POST['arac_kat'];
  $arac_blok = $_POST['arac_blok'];
  if(!$arac_plaka || !$arac_kat || !$arac_blok) {
    echo  '<div class="alert alert-danger text-center" role="alert">
    <strong>LÜTFEN, BOŞ ALAN BIRAKMAYINIZ!</strong>
</div>';
header('Refresh:2;anasayfa.php');
  }
   else{
    $kaydet = $db ->prepare('INSERT INTO arac_kayit SET
    arac_plaka = ?,
    arac_kat = ?,
    arac_blok = ?

    ');
   
   $kaydet -> execute([
      $arac_plaka,$arac_kat,$arac_blok  
    ]);
    if($kaydet) {
      echo  '<div class="alert alert-primary text-center" role="alert">
      <strong>İŞLEM BAŞARILI! ARAÇ KAYIT EDİLDİ</strong>
      </div>';
      header('Refresh:2; parkedenarac.php');
      
    }
  }
}

?>

<h1 class="text-center mb-3">ARAÇ KAYIT</h1>
<form action="anasayfa.php" method="post">
    <input type="text" name="arac_plaka" class="form-control text-center" placeholder="Plaka Giriniz.." ><br>
<select name="arac_kat" class="form-control text-center"><br>
            <option value="">KAT SEÇİNİZ</option>
            <option value="KAT 1">KAT 1</option>
            <option value="KAT 2">KAT 2</option>
            <option value="KAT 3">KAT 3</option>
</select><br>
<select name="arac_blok" class="form-control text-center"><br>
            <option value="">BLOK SEÇİNİZ</option>
            <option value="A BLOK">A BLOK</option>
            <option value="B BLOK">B BLOK</option>
            <option value="C BLOK">C BLOK</option>
            <option value="D BLOK">D BLOK</option>
            <option value="E BLOK">E BLOK</option>
</select><br>

<div class="text-center">
    <button type="reset" class="btn bg-danger">SIFIRLA</button>
    <button type="submit"  name="kaydet" class="btn bg-primary">KAYDET</button>
</div>
</form>
</div>
<div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>