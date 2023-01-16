<?php require 'header.php'; ?> 
<br>

<?php date_default_timezone_set('Europe/Istanbul'); ?>

<div style="width:750px; margin-top:10px" class="container">
<div class="card p-5">
    <form action="" method="post">
    <?php
// Aracın çıkışını, aracın id'sine göre yapma işlemleri.
$duzenle = $db -> query("SELECT * FROM arac_kayit WHERE arac_id= ".(int)$_GET['id']);
$sonuc = $duzenle ->fetch(PDO::FETCH_ASSOC);


if($_POST){
    $cikis_tarih = $_POST['arac_cikis_tarih'];
    
    if(isset($_POST['gerigel'])) {
        echo  '<div class="alert alert-danger text-center" role="alert">
       <strong> İŞLEM YAPMADAN GERİ DÖNÜYORSUNUZ! </strong>
      </div>';
     header('Refresh:2; parkedenarac.php');
    }
    elseif($cikis_tarih <>"") {
      if ($db -> query("UPDATE arac_kayit SET arac_cikis_tarih ='$cikis_tarih' WHERE  arac_id=".$_GET['id'])); {
        echo  '<div class="alert alert-primary text-center" role="alert">
        <strong> İŞLEM BAŞARILI! ANA SAYFAYA YÖNLENDİRİLİYORSUNUZ</strong>
      </div>';
        header('Refresh:2; parkedenarac.php?araccikisbasarili');
      }  
    }
    }
    

?>

<table class="table">


<tr>
   <h1 class="text-center">ARAÇ ÇIKIŞ</h1>
   <td><b style="color:red;">ARAÇ GİRİŞ TARİHİ</b><b> => <?php echo $sonuc['arac_giris_tarih']?> </b> <input type="text" name="arac_cikis_tarih" class="form-control" value="<?php echo date('d-m-Y H:i:s')?>"></td>
</tr>
</table>
<button type="submit" name="gerigel" class="btn bg-danger" style="color:white;">GERİ GEL</button>
<button type="submit" name="kaydet" class="btn bg-primary" style="color:white; float:right;">KAYDET</button>

</form>
</div>
</div>