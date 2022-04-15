<?php require_once('includes/session.php'); ?>
<?php 
require_once('ayarlar/baglan.php');

$setting=$db->prepare("SELECT * FROM setting where setting_id=:id");
$setting->execute(array(
        'id'=>0
      ));
$settingcek=$setting->fetch(PDO::FETCH_ASSOC);
?>
<?php require_once('includes/header.php'); ?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

  <div class="container">
    <h3 class="text-center mt-5">Site Ayarları</h3>
    <form action="ayarlar/islem.php" enctype="multipart/form-data" method="post">
        <div class="row mt-3">

      <div class="col-md-12">
          <label>Logo: <img src="../<?php echo $settingcek["setting_logo"] ?>" alt="" width="200px"></label>
          <input class="form-control" type="file" id="formFile" name="setting_logo">

      </div>

        <div class="col-md-12 mt-2">
      <label>Hero Başlığı</label>
      <textarea id="summernote" name="setting_footer"><?php echo $settingcek["setting_footer"] ?></textarea>
      </div>

      <div class="row">
          <button type="submit" name="settingkaydet" class="btn btn-primary mt-3">KAYDET</button>
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
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
</script>
<?php require_once('includes/footer.php'); ?>

