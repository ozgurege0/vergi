<?php
require_once('systemx/ayarlar/baglan.php');
$seo=$db->prepare("SELECT * FROM seo where seo_id=:id");
$seo->execute(array(
        'id'=>0
      ));
$seocek=$seo->fetch(PDO::FETCH_ASSOC);
?>
<?php
include 'class.php';
$id=@$_GET["id"];
$url="https://vknsorgula.net/$id.html";

$html = str_get_html(file_get_contents($url));

$ret = $html->find('.card-body');

?>

<?php 
require_once('includes/header.php');
?>
  <?php
foreach($ret as $retcek){
      ?>

 <meta name="description" content="<?php echo $retcek->find(".text-secondary",0)->plaintext; ?>Firma Bilgileri">
  <meta name="keywords" content="<?php echo $seocek['seo_keywords'] ?>">
    <title><?php echo $seocek['seo_title'] ?> |<?php echo $retcek->find(".text-secondary",0)->plaintext;  ?></title>
  </head>
  <body style="background-color: #dfe4f7">

  <?php
  require_once('includes/navbar.php');
  ?>
<div class="container">
    <h2 class="text-center mt-5">"<?php echo $id; ?>" Vergi No Arama Sonucu</h2>
    <h6 class="text-center mt-2"><?php echo $retcek->find(".text-secondary",0)->plaintext;  ?> Firma Bilgileri</h6>
    <div class="table-responsive">
    <table class="table mt-3 table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <th scope="row">Firma Ünvanı:</th>
      <td><?php echo $retcek->find(".text-secondary",0)->plaintext;  ?></td>
    </tr>
    <tr>
      <th scope="row">Firma Uzun Ünvanı:</th>
      <td><?php echo $retcek->find(".text-secondary",1)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Vergi Numarası:</th>
      <td><?php echo $retcek->find(".text-secondary",2)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Vergi Dairesi:</th>
      <td><?php echo $retcek->find(".text-secondary",4)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Vergi Dairesi No:</th>
      <td><?php echo $retcek->find(".text-secondary",5)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Faliyet Türü:</th>
      <td><?php echo $retcek->find(".text-secondary",7)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Faliyet Kodu:</th>
      <td><?php echo $retcek->find(".text-secondary",8)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Faliyet Türü 2:</th>
      <td><?php echo $retcek->find(".text-secondary",9)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Faliyet Kodu 2:</th>
      <td><?php echo $retcek->find(".text-secondary",10)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Adres Türü:</th>
      <td><?php echo $retcek->find(".text-secondary",11)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Adresi:</th>
      <td><?php echo $retcek->find(".text-secondary",13)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Firma İşe Başlama Tarihi:</th>
      <td><?php echo $retcek->find(".text-secondary",14)->plaintext; ?></td>
    </tr>
    <tr>
      <th scope="row">Firma Kuruluş Tarihi:</th>
      <td><?php echo $retcek->find(".text-secondary",15)->plaintext; ?></td>
    </tr>
    <?php
}
    ?>
  </tbody>
</table>
</div>

</div>

<?php
require_once('includes/footer.php');
?>