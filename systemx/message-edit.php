<?php require_once('includes/session.php'); ?>
<?php
require_once('ayarlar/baglan.php');
$message=$db->prepare("SELECT * FROM message where message_id=:id");
$message->execute(array(
        'id'=>$_GET['id']
      ));
$messagecek=$message->fetch(PDO::FETCH_ASSOC);
?>
<?php require_once('includes/header.php'); ?>

<h3 class="text-center mt-5">Mesaj Oku</h3>

<div class="container">
<form action="ayarlar/islem.php" method="post">
<div class="row">


<div class="col-md-6">
<label>Ad Soyad</label>
<input type="text" class="form-control" name="message_name" value="<?php echo $messagecek['message_name'] ?>">
</div>

<div class="col-md-6">
<label>Mail Adresi</label>
<input type="text" class="form-control" name="message_mail" value="<?php echo $messagecek['message_mail'] ?>">
</div>

<div class="col-md-12">
<label>Konu</label>
<input type="text" class="form-control" name="message_subject" value="<?php echo $messagecek['message_subject'] ?>">
</div>

<div class="col-md-12">
    <label>Mesajınız</label>
    <textarea class="form-control" name="message_message"><?php echo $messagecek['message_message'] ?></textarea>
</div>

<div class="col-md-12">
    <label>Durumu</label>

    <select class="form-select" name="message_status">
  <?php
    if($messagecek['message_status']=="1"){
        ?>
        <option value="1" selected>Okunmuş</option>
  <option value="0">Okunmamış</option>
  <?php
    }else{
        ?>
    <option value="1" selected>Okunmuş</option>
  <option value="0" selected>Okunmamış</option>
        <?php
    }
  ?>
</select>

</div>

 <button type="submit" name="messageduzenle" class="btn btn-primary mt-3">DÜZENLE</button>
</div>
<input type="hidden" name="message_id" value="<?php echo $messagecek['message_id'] ?>">
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