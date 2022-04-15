<?php require_once('includes/session.php'); ?>
<?php
require_once('ayarlar/baglan.php');
$sss=$db->prepare("SELECT * FROM sss where sss_id=:id");
$sss->execute(array(
        'id'=>$_GET['id']
      ));
$ssscek=$sss->fetch(PDO::FETCH_ASSOC);
?>
<?php require_once('includes/header.php'); ?>

<h3 class="text-center mt-5">Sık Sorulan Soru Ekle</h3>

<div class="container">
<form action="ayarlar/islem.php" method="post">
<div class="row">


<div class="col-md-12">
<label>Başlık</label>
<input type="text" class="form-control" name="sss_title" value="<?php echo $ssscek['sss_title'] ?>">
</div>

<div class="col-md-12 mt-2">
<label>Açıklama</label>
<input type="text" class="form-control" name="sss_desc" value="<?php echo $ssscek['sss_desc'] ?>">
</div>
 <button type="submit" name="sssduzenle" class="btn btn-primary mt-3">DÜZENLE</button>
</div>
<input type="hidden" name="sss_id" value="<?php echo $ssscek['sss_id'] ?>">
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