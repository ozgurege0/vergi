<?php require_once('includes/session.php'); ?>
<?php
require_once('ayarlar/baglan.php');
$contact=$db->prepare("SELECT * FROM contact where contact_id=:id");
$contact->execute(array(
        'id'=>$_GET['id']
      ));
$contactcek=$contact->fetch(PDO::FETCH_ASSOC);
?>
<?php require_once('includes/header.php'); ?>

<h3 class="text-center mt-5">İletişim Bilgisi</h3>

<div class="container">
<form action="ayarlar/islem.php" method="post">
<div class="row">

<div class="col-md-6">
<label>Fontawesome İkon Klası</label>
<input type="text" class="form-control" name="contact_icon" value="<?php echo $contactcek['contact_icon'] ?>">
</div>

<div class="col-md-6">
<label>Başlık</label>
<input type="text" class="form-control" name="contact_title" value="<?php echo $contactcek['contact_title'] ?>">
</div>

<div class="col-md-12 mt-2">
<label>Açıklama</label>
<input type="text" class="form-control" name="contact_desc" value="<?php echo $contactcek['contact_desc'] ?>">
</div>
 <button type="submit" name="contactduzenle" class="btn btn-primary mt-3">DÜZENLE</button>
</div>
<input type="hidden" name="contact_id" value="<?php echo $contactcek['contact_id'] ?>">
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