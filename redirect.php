<?php
require_once('systemx/ayarlar/baglan.php');
if(isset($_POST['vknsorgula'])){
  $id = $_POST['id'];
  Header("Location:$site/$id.html");
}
?>