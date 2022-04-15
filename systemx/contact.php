<?php require_once('includes/session.php'); ?>
<?php
require_once('ayarlar/baglan.php');
$contact=$db->prepare("SELECT * FROM contact");
      $contact->execute();
?>
<?php require_once('includes/header.php'); ?>

<div class="container">
    <h3 class="text-center mt-5">Özellikler</h3>
<a href="contact-add.php"><button class="btn btn-primary">EKLE</button></a>
    <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">İkon</th>
      <th scope="col">Ad</th>
      <th scope="col">Düzenle</th>
      <th scope="col">Sil</th>
    </tr>
  </thead>
  <tbody>
<?php 
foreach($contact as $contactcek){ 
?>
    <tr>
      <th scope="row"><?php echo $contactcek['contact_id'] ?></th>
      <td><i class="<?php echo $contactcek['contact_icon'] ?> fa-xl"></i></td>
      <td><h5><?php echo $contactcek['contact_title'] ?></h5></td>
      <td><a href="contact-edit.php?id=<?php echo $contactcek['contact_id'] ?>"><button class="btn btn-success">DÜZENLE</button></a></td>
      <td><a href="ayarlar/islem.php?contact_delete=basarili&id=<?php echo $contactcek['contact_id'] ?>"><button class="btn btn-danger">SİL</button></a></td>
    </tr>
<?php
}
?>
  </tbody>
</table>
</div>
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