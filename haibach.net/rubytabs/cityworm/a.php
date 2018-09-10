<?php
include("header.php");
?>
<section class="content-header">

<h1>
Rota
</h1>
      
</section>
<section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rota Kaydetme Paneli</h3>
            </div>
            <form role="form" method="post">
              <div class="box-body">

              <div class="form-group">
<label for="exampleInputEmail1">Rota Adı</label>
<input type="text" name="rotaadi" class="form-control" placeholder="Rota Adı Giriniz.">
</div>

<div class="form-group">
                  
<label>Rota Açıklama</label>

<textarea class="form-control" name="rotaaciklama" rows="3" placeholder="Rota Açıklaması Giriniz"></textarea>
                
</div>

<div class="form-group">
<label for="exampleInputEmail1">Fiyat</label>
<input type="text" name="rotafiyat" class="form-control" placeholder="Fiyat Giriniz.">
</div>

<div class="form-group">
                  <label>Rota Sesi Seçiniz</label>
                  <select class="form-control" name="rotasesi">
                  <?php
                  try{
$db = new PDO('mysql:host=localhost;dbname=architec_cityguide','architec_city','q123456');
$db->exec('SET CHARACTER SET utf8');
}catch(PDOException $e){
echo 'Hata: '.$e->getMessage();
}
foreach($db->query('SELECT * FROM rota_ses') as $listele) {
  $no = $listele['rota_ses_id'];
  $adi = $listele['rota_ses_adi'];
if($adi!=""){
  echo('<option id="'.$no.'" value="'.$no.'_'.$adi.'">'.$adi.'</option>');
}
}
?>
                  </select>
                </div>
<div class="form-group">             
<div class="checkbox">            
<label>
<input type="checkbox">         
Aktif mi ?
</label>
</div>
</div>

<div class="box-footer">
<button type="submit" name="trkaydet" class="btn btn-primary">Kaydet</button>   
</div>
</form>
</div>
 </div>
 </div>

 <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Rota Kaydetme Paneli(İngilizce)</h3>
            </div>
            <form role="form" method="post">
              <div class="box-body">

              <div class="form-group">
<label for="exampleInputEmail1">Rota Adı İngilizce</label>
<input type="text" name="rotaadien" class="form-control" placeholder="Rota Adı Giriniz İngilizce.">
</div>

<div class="form-group">
                  
<label>Rota Açıklama İngilizce</label>

<textarea class="form-control" name="rotaaciklamaen" rows="3" placeholder="Rota Açıklaması Giriniz İngilizce"></textarea>
                
</div>

<div class="form-group">
<label for="exampleInputEmail1">Fiyat İngilizce</label>
<input type="text" name="rotafiyaten" class="form-control" placeholder="Fiyat Giriniz İngilizce.">
</div>

<div class="form-group">
                  <label>Rota Sesi Seçiniz İngilizce</label>
                  <select class="form-control" name="rotasesien">
                  <?php
                  try{
$db = new PDO('mysql:host=localhost;dbname=architec_cityguide','architec_city','q123456');
$db->exec('SET CHARACTER SET utf8');
}catch(PDOException $e){
echo 'Hata: '.$e->getMessage();
}
foreach($db->query('SELECT * FROM rota_ses') as $listele) {
  $no = $listele['rota_ses_id'];
  $adi = $listele['rota_ses_adi_en'];
if($adi!=""){
  echo('<option id="'.$no.'" value="'.$no.'_'.$adi.'">'.$adi.'</option>');
}
}
?>
                  </select>
                </div>
<div class="form-group">             
<div class="checkbox">            
<label>
<input type="checkbox">         
Aktif mi ?
</label>
</div>
</div>

<div class="box-footer">
<button type="submit" name="save" class="btn btn-primary">Kaydet</button>   
</div>
</form>
</div>
 </div>
</section> 

</section> <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Model Listesi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>ID</th>
                <th>Rota Adı</th>
                <th>Rota Açıklama</th>
                <th>Rota Adı İng</th>
                <th>Rota Açıklama İng</th>
                <th>Fiyatı</th>
                <th>Rota Sesi</th>                
                <th>Rota Sesi İng</th>                
                <th>Aktif</th>
                <th>Kayıt Tarihi</th>
                <th>Kaydeden</th>
                <th>Düzenle</th>
                <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                <?php 


 $baglanti = new mysqli('localhost', 'architec_city', 'q123456', 'architec_cityguide'); // Veritabanı bağlantımızı yapıyoruz.
    if(mysqli_connect_error()) //Eğer hata varsa yazdırıyoruz 
    {
        echo mysqli_connect_error();
        exit; //eğer bağlantıda hata varsa PHP çalışmasını sonlandırıyoruz.
    }

$baglanti->set_charset("utf8"); // Türkçe karakter sorunu olmaması için utf8'e çeviriyoruz.

$sorgu = $baglanti->query("SELECT * FROM rota_tanim");

while ($sonuc = $sorgu->fetch_assoc()){
$id = $sonuc['rota_tanim_id'];
$adi = $sonuc['rota_tanim_adi'];
$aciklama = $sonuc['rota_tanim_aciklama'];
$rota_tanim_adi_en = $sonuc['rota_tanim_adi_en'];
$rota_tanim_aciklama_en = $sonuc['rota_tanim_aciklama_en'];
$fiyati = $sonuc['fiyati'];
$rota_ses_id=$sonuc['rota_ses_id'];
$rota_ses_id_en=$sonuc['rota_ses_id'];
$aktif = $sonuc['aktif'];
$kayit_tarihi = $sonuc['kayit_tarihi'];
$kaydeden = $sonuc['kaydeden'];

?>
    
    <tr>
      <td><?php echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
      <td><?php echo $adi; ?></td>
      <td><?php echo $aciklama; ?></td>
      <td><?php echo $rota_tanim_adi_en; ?></td>
      <td><?php echo $rota_tanim_aciklama_en; ?></td>
      <td><?php echo $fiyati;?></td>
      <td>
          <?php
        try{
$db = new PDO('mysql:host=localhost;dbname=architec_cityguide','architec_city','q123456');
$db->exec('SET CHARACTER SET utf8');
}catch(PDOException $e){
echo 'Hata: '.$e->getMessage();
}
foreach($db->query('SELECT * FROM rota_ses WHERE rota_ses_id='.$rota_ses_id.'') as $listele) {
  $adi = $listele['rota_ses_adi'];
if($adi!=""){
  echo $adi;
}
}
?>
        </td>
        <td>
          <?php
        try{
$db = new PDO('mysql:host=localhost;dbname=architec_cityguide','architec_city','q123456');
$db->exec('SET CHARACTER SET utf8');
}catch(PDOException $e){
echo 'Hata: '.$e->getMessage();
}
foreach($db->query('SELECT * FROM rota_ses WHERE rota_ses_id='.$rota_ses_id.'') as $listele) {
  $adi = $listele['rota_ses_adi_en'];
if($adi!=""){
  echo $adi;
}
}
?>
        </td>
      <td><input type="checkbox" <?php if($aktif=="1"){echo('checked');}?>></td>
      <td><?php echo $kayit_tarihi; ?></td>
      <td><?php echo $kaydeden; ?></td>
      <td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
        <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
    </tr>

<?php 
} 
// Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. 
?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>


<?php



if (isset($_POST['trkaydet']))
{
$baglan=   mysql_connect("localhost","architec_city","q123456") or die ('Sunucuya Bağlanamadım.');
$asd=      mysql_select_db("architec_cityguide",$baglan) or die ('Veritabanı Bağlanamadık !');
mysql_query("SET NAMES utf8");
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
date_default_timezone_set('Europe/Istanbul');
$kayittarihi2=date('Y.m.d H:i:s');

if (isset($_POST['rotaadi'])) {
  $rotaadi = $_POST['rotaadi'];
}

if (isset($_POST['rotaaciklama'])) {
  $rotaaciklama = $_POST['rotaaciklama'];
}
if (isset($_POST['rotafiyat'])) {
  $rotafiyat = $_POST['rotafiyat'];
}
if (isset($_POST['rotasesi'])) {
  $rotasesitr = explode("_",$_POST['rotasesi']);
    $rotasesitr_id = $rotasesitr[0];
    $rotasesitr_name = $rotasesitr[1];}

$ekle=     mysql_query("INSERT INTO rota_tanim (rota_tanim_adi,rota_tanim_aciklama,rota_tanim_adi_en,rota_tanim_aciklama_en,fiyati,rota_ses_id,aktif,kayit_tarihi,kaydeden) VALUES ('$rotaadi','$rotaaciklama','','','$rotafiyat','0','$rotasesitr_id','1','$kayittarihi2','admin')") or die (mysql_Error());
echo('<div class="box-footer" style="background-color:Chartreuse">');
echo("<center><h2>Türkçe Yazma Başarılı</h2></center>"); 
echo('</div>'); }

  if (isset($_POST['save']))
  {
  $baglan=   mysql_connect("localhost","architec_city","q123456") or die ('Sunucuya Bağlanamadım.');
  $asd=      mysql_select_db("architec_cityguide",$baglan) or die ('Veritabanı Bağlanamadık !');
  mysql_query("SET NAMES utf8");
  mysql_query("SET CHARACTER SET utf8");
  mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
  date_default_timezone_set('Europe/Istanbul');
  $kayittarihi=date('Y.m.d H:i:s');
  
  if (isset($_POST['rotaadien'])) {
    $rotaadi = $_POST['rotaadien'];
  }
  
  if (isset($_POST['rotaaciklamaen'])) {
    $rotaaciklama = $_POST['rotaaciklamaen'];
  }
  if (isset($_POST['rotafiyaten'])) {
    $rotafiyaten = $_POST['rotafiyaten'];
  }
  if (isset($_POST['rotasesien'])) {
    $rotasesien = explode("_",$_POST['rotasesien']);
      $rotasesien_id = $rotasesien[0];
      $rotasesien_name = $rotasesien[1];}
  
  
  $ekle=     mysql_query("INSERT INTO rota_tanim (rota_tanim_adi,rota_tanim_aciklama,rota_tanim_adi_en,rota_tanim_aciklama_en,fiyati,rota_ses_id,aktif,kayit_tarihi,kaydeden) VALUES 
  ('','','$rotaadi','$rotaaciklama','$rotafiyaten','0','$rotasesien_id','1','$kayittarihi','admin')") or die (mysql_Error());
  echo('<div class="box-footer" style="background-color:Chartreuse">');
  echo("<center><h2>Türkçe Yazma Başarılı</h2></center>"); 
  echo('</div>'); }
?>
<?php
include("footer.php");
?>