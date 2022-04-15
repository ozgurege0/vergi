<?php require_once('includes/session.php'); ?>
<?php require_once('includes/header.php'); ?>

<h3 class="text-center mt-5">Sık Sorulan Soru Ekle</h3>

<div class="container">
<form action="ayarlar/islem.php" method="post">
<div class="row">


<div class="col-md-12">
<label>Başlık</label>
<input type="text" class="form-control" name="sss_title">
</div>

<div class="col-md-12 mt-2">
<label>Açıklama</label>
<input type="text" class="form-control" name="sss_desc">
</div>
 <button type="submit" name="sssekle" class="btn btn-primary mt-3">EKLE</button>
</div>
</form>
</div>
<?php require_once('includes/footer.php'); ?>