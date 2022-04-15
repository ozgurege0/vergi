<?php require_once('includes/session.php'); ?>
<?php 
require_once('ayarlar/baglan.php');

$hero=$db->prepare("SELECT * FROM hero where hero_id=:id");
$hero->execute(array(
        'id'=>0
      ));
$herocek=$hero->fetch(PDO::FETCH_ASSOC);
?>
<?php require_once('includes/header.php'); ?>

<div class="container">
    <h3 class="text-center mt-5">Hero Ayarları</h3>
    <form action="ayarlar/islem.php" enctype="multipart/form-data" method="post">
        <div class="row mt-3">

      <div class="col-md-12">
          <label>Hero Resmi: <img src="../<?php echo $herocek["hero_img"] ?>" alt="" width="200px"></label>
          <input class="form-control" type="file" id="formFile" name="hero_img">

      </div>

        <div class="col-md-12 mt-2">
      <label>Hero Başlığı</label>
        <input type="text" class="form-control" name="hero_title" value="<?php echo $herocek['hero_title'] ?>">
      </div>

      <div class="col-md-12 mt-2">
      <label>Hero Yazısı</label>
        <textarea type="text" class="form-control" style="height: 100px" name="hero_text"><?php echo $herocek['hero_text'] ?></textarea>
      </div>
      <div class="row">
          <button type="submit" name="herokaydet" class="btn btn-primary mt-3">KAYDET</button>
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