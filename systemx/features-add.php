<?php require_once('includes/session.php'); ?>
<?php require_once('includes/header.php'); ?>

<h3 class="text-center mt-5">Özellik Ekle</h3>

<div class="container">
<form action="ayarlar/islem.php" method="post">
<div class="row">

<div class="col-md-6">
<label>Fontawesome İkon Klası</label>
<input type="text" class="form-control" name="features_icon">
</div>

<div class="col-md-6">
<label>Başlık</label>
<input type="text" class="form-control" name="features_title">
</div>

<div class="col-md-12 mt-2">
<label>Açıklama</label>
<input type="text" class="form-control" name="features_desc">
</div>
 <button type="submit" name="featuresekle" class="btn btn-primary mt-3">EKLE</button>
</div>
</form>
</div>
<?php require_once('includes/footer.php'); ?>