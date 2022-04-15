<?php require_once('includes/session.php'); ?>

<?php
require_once('ayarlar/baglan.php');
$user=$db->prepare("SELECT * FROM user where admin_id=:id");
$user->execute(array(
        'id'=>0
      ));
$usercek=$user->fetch(PDO::FETCH_ASSOC);
?>

<?php require_once('includes/header.php'); ?>

<h3 class="text-center mt-5">Admin Ayarları</h3>

<div class="container">
    <div class="row">
      <form action="ayarlar/islem.php" method="post">
      <div class="col-md-12">
            <label>Kullanıcı Adı</label>
            <input type="text" class="form-control" name="admin_kullanici" value="<?php echo $usercek['admin_kullanici'] ?>">
        </div>
        <button class="btn btn-primary mt-2" type="submit" name="kullanicikaydet">KAYDET</button>
      </form>

     <form action="ayarlar/islem.php" method="post">
     <div class="col-md-12 mt-5">
            <label>Yeni Şifrenizi Girebilirsiniz</label>
            <input type="text" class="form-control" name="admin_parola" value="">
        </div>
        <button class="btn btn-primary mt-2" type="submit" name="parolakaydet">KAYDET</button>
     </form>
    </div>
</div>

<?php require_once('includes/footer.php'); ?>