<?php require_once('includes/session.php'); ?>
<?php 
require_once('ayarlar/baglan.php');

$seo=$db->prepare("SELECT * FROM seo where seo_id=:id");
$seo->execute(array(
        'id'=>0
      ));
$seocek=$seo->fetch(PDO::FETCH_ASSOC);
?>
<?php require_once('includes/header.php'); ?>

<div class="container">
    <h3 class="text-center mt-5">Seo Ayarları</h3>
    <form action="ayarlar/islem.php" method="post">
        <div class="row mt-3">

      <div class="col-md-12">
      <label>Site Başlığı</label>
        <input type="text" class="form-control" name="seo_title" value="<?php echo $seocek['seo_title'] ?>">
      </div>

      <div class="col-md-6 mt-2">
      <label>Site Açıklaması</label>
        <textarea type="text" class="form-control" style="height: 100px" name="seo_description"><?php echo $seocek['seo_description'] ?></textarea>
      </div>

      <div class="col-md-6 mt-2">
      <label>Site Anahtar Kelimeleri</label>
        <textarea type="text" class="form-control" style="height: 100px" name="seo_keywords"><?php echo $seocek['seo_keywords'] ?></textarea>
      </div>
      <div class="row">
          <button type="submit" name="seokaydet" class="btn btn-primary mt-3">KAYDET</button>
      </div>
        </div>
    </form>
    <?php
    if($_GET['islem']=="basarili"){
        ?>
        <div class="alert alert-success mt-3" role="alert">
  <b>İşlem Başarılı!</b> Veri başarıyla kaydedildi.
</div>
        <?php
    }elseif($_GET['islem']=="basarisiz"){
        ?>
            <div class="alert alert-danger mt-3" role="alert">
  <b>İşlem Başarısız!</b> Veri kaydedilemedi.
</div>
        <?php
    }
    ?>
</div>

<?php require_once('includes/footer.php'); ?>