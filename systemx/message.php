<?php require_once('includes/session.php'); ?>
<?php
require_once('ayarlar/baglan.php');
$message=$db->prepare("SELECT * FROM message ORDER BY message_id DESC;");
      $message->execute();
?>
<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<div class="container">
    <h3 class="text-center mt-5">Mesajlar</h3>

   
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Ad Soyad</th>
                <th>Konu</th>
                <th>Tarih</th>
                <th>Durum</th>
                <th>Düzenle</th>
                <th>Sil</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($message as $messagecek){
        ?>
            <tr>
                <td><?php echo $messagecek['message_name'] ?></td>
                <td><?php echo $messagecek['message_subject'] ?></td>
                <td><?php echo $messagecek['message_date'] ?></td>
                <td><?php if($messagecek['message_status']=="1"){ echo '<button class="btn btn-success">Okunmuş</button>'; }else{ echo '<button class="btn btn-danger">Okunmamış</button>'; } ?></td>
                <td><a href="message-edit.php?id=<?php echo $messagecek['message_id'] ?>"><button class="btn btn-success">DÜZENLE</button></a></td>
                <td><a href="ayarlar/islem.php?message_delete=basarili&id=<?php echo $messagecek['message_id'] ?>"><button class="btn btn-danger">SİL</button></a></td>
            </tr>
<?php
}
?>
        </tbody>
    </table>


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
    $('#example').DataTable({
        "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
    });
} );
    </script>

<?php require_once('includes/footer.php'); ?>