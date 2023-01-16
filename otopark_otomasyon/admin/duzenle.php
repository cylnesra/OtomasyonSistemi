<?php require 'header.php'; ?>
<br>
<div style="width:750px; margin-top:10px;" class="container">
<?php
$duzenle = $db -> query("SELECT * FROM arac_kayit WHERE arac_id= ".(int)$_GET['id']);
$sonuc = $duzenle ->fetch(PDO::FETCH_ASSOC);
?>
    <div class="card p-5">
            <form action="" method="post">

  <?php 
  
// araç park edildiğinde tekrar düzenlemek için gerekli kodlar

if($_POST){
    $plaka =$_POST['arac_plaka'];
    $kat =$_POST['arac_kat'];
    $blok =$_POST['arac_blok'];
if(isset($_POST['gerigel'])) {
  echo  '<div class="alert alert-danger text-center" role="alert">
  <strong>İŞLEM YAPMADAN GERİ DÖNÜYORSUNUZ!</strong>
</div>';
header('Refresh:2; parkedenarac.php');
}
elseif ($plaka<>"" && $kat<>"" && $blok<>"" ) {
   if($db -> query("UPDATE arac_kayit SET arac_plaka = '$plaka' , arac_kat = '$kat' , arac_blok='$blok'  WHERE arac_id=".$_GET['id']));
 {
  echo  '<div class="alert alert-primary text-center" role="alert">
<strong>İŞLEM BAŞARILI! ANA SAYFAYA YÖNLENDİRİLİYORSUNUZ</strong>
</div>';
  header('Refresh:2; parkedenarac.php');
  
   }
}
}  
  ?>

    <table class="table">
      <br>
  <tr>
<h2 class="text-center">ARAÇ DÜZENLE</h2>
<td><b style= "color:red;">ARAÇ PLAKA</b><b> =><?php echo $sonuc['arac_plaka']?> </b> <input type="text" name="arac_plaka" class="form-control" value="<?php echo $sonuc['arac_plaka']?>"></td>
</tr>
<tr>
  <td>
  <b><b style="color:red;">ŞU AN BULUNDUĞU KAT </b> => <?php echo $sonuc['arac_kat']; ?> </b>

  <div class="mb-3">
       <select name="arac_kat"  class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;"></br>
            <option value="<?php echo $sonuc['arac_kat'] ?>">DEĞİŞTİRMEK iÇİN TIKLAYINIZ</option>
            <option value="KAT 1">KAT 1</option>
            <option value="KAT 2">KAT 2</option>
            <option value="KAT 3">KAT 3</option>
                  </select>
               </div>
                    </td>
                </tr>
                <tr>
                    <td>
                  <b><b style="color:red;">ŞU AN BULUNDUĞU BLOK </b> => <?php echo $sonuc['arac_blok'] ?> </b>
 <div class="mb-3">
   <select name="arac_blok"  class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;" ></br>
          <option value="<?php echo $sonuc['arac_blok']?> ">DEĞİŞTİRMEK iÇİN TIKLAYINIZ</option>
           <option value="A BLOK">A BLOK</option>
           <option value="B BLOK">B BLOK</option>
           <option value="C BLOK">C BLOK</option>
           <option value="D BLOK">D BLOK</option>
           <option value="E BLOK">E BLOK</option>
        </select>
               </div> 
   </td>
   </tr>
</table>
<button type="submit" name="gerigel" class="btn bg-danger" style="color:white;">GERİ GEL</button>
<button type="submit" name="kaydet" class="btn bg-primary" style="color:white; float:right;">KAYDET</button>                
</form>
</div>
</div>

