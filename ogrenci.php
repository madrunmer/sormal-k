<html>
  <head>
  <title>Ögrenciler</title>
    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta charset="utf-8"/>
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Title</span>
          <div class="mdl-layout-spacer"></div>
          <nav class="mdl-navigation mdl-layout--large-screen-only">
            
            <a class="mdl-navigation__link" href="adminkayit.php">Admin Kaydet</a>
            <a class="mdl-navigation__link" href="index.php">Çıkış Yap</a>
          </nav>
        </div>
      </header>
      <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Title</span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="ogrencikayit.php">Ögrenci Gir</a>
          <a class="mdl-navigation__link" href="duyuru.php">Duyuru Gir</a>
          <a class="mdl-navigation__link" href="notgir.php">Not Gir</a>
          <a class="mdl-navigation__link" href="odevgir.php">Ödev Gir</a>
          <a class="mdl-navigation__link" href="odevy.php">Ödev Gir2</a>
          <a class="mdl-navigation__link" href="ogrenci.php">Ögrenci Listesi</a>
          <a class="mdl-navigation__link" href="adminduyurugor.php">Duyurulara Bak</a>
          <a class="mdl-navigation__link" href="adminnotgor.php">Notlara Bak</a>
          <a class="mdl-navigation__link" href="odevbak.php">Ödev Bak</a>
          <a class="mdl-navigation__link" href="odevcikti.php">Ödev Yeni Bak</a>
        </nav>
      </div>
      <main class="mdl-layout__content">
        <div class="page-content">
        
        
        <div id="contentic">
<center>
<br><br><br><br>
<?php
include_once("baglanti3.php");
error_reporting(0);
 $aera=$_POST['x'];
?>
Sınıf: 
<select name="katagori" id="katagori" >

<?php
$arat=mysql_query("select * from ogrenci");
while ($yaz=mysql_fetch_array($arat)){
$isim=$yaz['sinif'];
$id=$yaz['idnumara'];
echo "<option value=$id>$isim</option>";
}
?>
</select >
<input type="submit" name="box"/ >
<?php

if(isset($_POST['box']))
{
if(isset($il))
 {
$sorgu=mysql_query("select * from ogrenci where sinif like '%$isim%' ");

 }else{
	 $sorgu=mysql_query("select * from ogrenci");

     	 }
	 }
   else
   {
     echo "";
   }
?>
<select class="other" name="il">
  <option value="seçim yapılmadı" selected>Lütfen İl Seçiniz</option>
  <?php
   $query = mysql_query("SELECT sinif FROM ogrenci order by sinif");
   while ($row = mysql_fetch_array($query))
   {
    $liste = $row['sinif'];
    print "<option value=\"$liste\">$liste</option>";
   };
  ?>
  </select>
<form method="post" action="">	
Ögrenci No:<input type="text" name="x" value="<?php echo $aera ?>"/>
<input type="submit" name="button"/>
</form>
<?php

echo "<table>";
 
echo '<tr><td>Numara</td><td>Ad</td><td>Soyad</td><td>Sınıf</td><td>Ödev Ekle</td></tr>';

 if(isset($aera))
 {
$sorgu=mysql_query("select * from ogrenci where idnumara like '%$aera%' ");//isim sütununda a harfi geçenleri çektik.

 }else{
	 $sorgu=mysql_query("select * from ogrenci");

	 }
//verilerin hepsini saydırdık.
if($sorgu){//eğer veri çekildiyse
echo "";

while($kayit=mysql_fetch_array($sorgu)){
    echo '<tr>';
  	echo '<td>'.$kayit["idnumara"].'</td>';
    echo '<td>'.$kayit["ad"].'</td>';
  	echo '<td>'.$kayit["soyad"].'</td>';
    echo '<td>'.$kayit["sinif"].'</td>';
        echo '<td><a href="odevy.php?ogrenciID='.$kayit["idnumara"].'">Ödev Ekle</a></td>';

    echo '</tr>';
}
echo '</table>';
}
else{
echo "Veri çekilemedi";
}
?>


<br><br><br><br>
</center>
</div>  
        </div>
      </main><div style="width:100%; height:80px;background:rgb(63,81,181);"><center style="color:white">Sungur Bilişim</center></div>
    </div>
  </body>
</html>