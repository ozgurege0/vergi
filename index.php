<?php
require_once('systemx/ayarlar/baglan.php');
$seo=$db->prepare("SELECT * FROM seo where seo_id=:id");
$seo->execute(array(
        'id'=>0
      ));
$seocek=$seo->fetch(PDO::FETCH_ASSOC);

$setting=$db->prepare("SELECT * FROM setting where setting_id=:id");
$setting->execute(array(
        'id'=>0
      ));
$settingcek=$setting->fetch(PDO::FETCH_ASSOC);

$hero=$db->prepare("SELECT * FROM hero where hero_id=:id");
$hero->execute(array(
        'id'=>0
      ));
$herocek=$hero->fetch(PDO::FETCH_ASSOC);

$features=$db->prepare("SELECT * FROM features");
      $features->execute();

      $sss=$db->prepare("SELECT * FROM sss");
      $sss->execute();

      $contact=$db->prepare("SELECT * FROM contact");
      $contact->execute();
?>
<?php 
require_once('includes/header.php');
?>

  <meta name="keywords" content="<?php echo $seocek['seo_keywords'] ?>">
  <meta name="description" content="<?php echo $seocek['seo_description'] ?>">
    <title><?php echo $seocek['seo_title'] ?></title>
  </head>
  <body style="background-color: #dfe4f7">

  <?php
  require_once('includes/navbar.php');
  ?>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?php echo $herocek['hero_img'] ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3"><?php echo $herocek['hero_title'] ?></h1>
        <p class="lead"><?php echo $herocek['hero_text'] ?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <a href="#sorgula"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2">SORGULA</button></a>
        </div>
      </div>
    </div>
  </div>

<div id="sorgula" class="container">
    <div class="row">
<?php
foreach($features as $featurescek){
?>
<div class="col-md-4">
        <div class="card shadow">
  <div class="card-body">
  <i class="<?php echo $featurescek['features_icon'] ?> fa-2xl"></i>
  <h5 class="mt-3"><?php echo $featurescek['features_title'] ?></h5>
  <p class="mt-2"><?php echo $featurescek['features_desc'] ?></p>
  </div>
 </div>
</div>
<?php
}
?>

    </div>

    <h3 class="text-center mt-5">VKN SORGULAMA</h3>
    <form action="redirect" method="post">
    <div class="row">
    <div class="col-md-11">
    <input type="text" class="form-control form-control-lg" name="id" placeholder="Sadece vergi numarasıyla sorgu yapabilirsiniz." required="">
    </div>
    <div class="col-md-1">
    <button class="btn btn-primary btn-lg" type="submit" name="vknsorgula">ARA</button>
    </div>
    </div>
    </form>

    <h3 id="sss" class="text-center mt-5">Sık Sorulan Sorular</h3>
    <div class="accordion" id="accordionExample">
    <?php
$no="0";
foreach($sss as $ssscek){ $no++
?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $no; ?>">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $no; ?>" aria-expanded="true" aria-controls="collapseOne">
      <?php echo $ssscek['sss_title'] ?>
      </button>
    </h2>
    <div id="collapse<?php echo $no; ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <?php echo $ssscek['sss_desc'] ?>
      </div>
    </div>
  </div>
<?php
}
?>

</div>

<h3 id="contact" class="text-center mt-5">İletişim</h3>

<div class="row">
<?php
foreach($contact as $contactcek){
?>
    <div class="col-md-4">
    <div class="card shadow">
    <div class="card-body">
    <i class="<?php echo $contactcek['contact_icon'] ?> fa-2x"></i>
    <h4><?php echo $contactcek['contact_title'] ?></h4>
   <h6><?php echo $contactcek['contact_desc'] ?></h6>
    </div>
</div>
    </div>
<?php
}
?>

</div>

<form id="contact" action="systemx/ayarlar/islem.php" method="post">
<div class="row mt-5">
  <div class="col-md-6">
    <label>Adınız Soyadınız</label>
  <input type="text" class="form-control shadow" name="message_name" required="">
  </div>
  <div class="col-md-6">
    <label>Mail Adresiniz</label>
  <input type="email" class="form-control shadow" name="message_mail" required="">
  </div>

  <div class="col-md-12">
    <label>Konu</label>
  <input type="text" class="form-control shadow" name="message_subject" required="">
  </div>

  <div class="col-md-12">
    <label>Mesajınız</label>
  <textarea type="text" class="form-control shadow" style="height: 100px" name="message_message" required=""></textarea>
  </div>

  <button type="submit" name="messageadd" class="btn btn-primary mt-3">GÖNDER</button>
</div>
</form>

<?php
    if($_GET['islem']=="basarili"){
        ?>
        <div class="alert alert-primary mt-3" role="alert">
  <b>İşlem Başarılı!</b> Mesajınız ulaştırıldı.
</div>
        <?php
    }elseif($_GET['islem']=="basarisiz"){
        ?>
            <div class="alert alert-danger mt-3" role="alert">
  <b>İşlem Başarısız!</b> Mesajınız ulaştırılamadı, lütfen tekrar deneyiniz yada iletişim bilgilerimizden bizlere ulaşınız.
</div>
        <?php
    }
    ?>
</div>
<?php
require_once('includes/footer.php');
?>