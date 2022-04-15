<?php
@ob_start();
@session_start();
require_once('baglan.php');

if(isset($_POST['admingiris'])){

	$admin_kullanici=$_POST['admin_kullanici'];
	$admin_parola=md5($_POST['admin_parola']);

	$sorgu=$db->prepare("SELECT * FROM user where admin_id=:id and admin_kullanici=:kullanici and admin_parola=:parola");
    $sorgu->execute(array(
		'id'=>0,
		'kullanici'=>$admin_kullanici,
		'parola'=>$admin_parola
	  ));
	  
	  echo $kontrol=$sorgu->rowCount();

	  if($kontrol==1){

		$_SESSION['admin_kullanici']=$admin_kullanici;
		session_regenerate_id();
		
		header("Location:../index.php");
		exit;

	  }else{
		  header("Location:../login.php?durum=basarisiz");
		  exit;
	  }
}

if(isset($_POST['kullanicikaydet'])){

    $kullanicikaydet=$db->prepare("UPDATE user SET 
    
    admin_kullanici=:admin_kullanici
    ");

    $guncelle=$kullanicikaydet->execute(array(
        'admin_kullanici' => htmlspecialchars($_POST["admin_kullanici"],ENT_QUOTES,'UTF-8'),
    ));

    if($guncelle){
        header("Location:../admin.php?islem=basarili");
    }else{
        header("Location:../admin.php?islem=basarisiz");
    }
}

if(isset($_POST['parolakaydet'])){

	$hash=md5($_POST["admin_parola"]);

    $parolakaydet=$db->prepare("UPDATE user SET 
    admin_parola=:admin_parola
    ");

    $guncelle=$parolakaydet->execute(array(
        'admin_parola' => $hash
    ));

    if($guncelle){
        header("Location:../admin.php?islem=basarili");
    }else{
        header("Location:../admin.php?islem=basarisiz");
    }
}

if(isset($_POST['seokaydet'])){

    $seokaydet=$db->prepare("UPDATE seo SET 
    
    seo_title=:seo_title,
    seo_description=:seo_description,
    seo_keywords=:seo_keywords
    ");

    $guncelle=$seokaydet->execute(array(
        'seo_title' => htmlspecialchars($_POST["seo_title"],ENT_QUOTES,'UTF-8'),
        'seo_description' => htmlspecialchars($_POST["seo_description"],ENT_QUOTES,'UTF-8'),
        'seo_keywords' => htmlspecialchars($_POST["seo_keywords"],ENT_QUOTES,'UTF-8'),
    ));

    if($guncelle){
        header("Location:../seoayar.php?islem=basarili");
    }else{
        header("Location:../seoayar.php?islem=basarisiz");
    }

}

if (isset($_POST['herokaydet'])) { //hero düzenleme işlemi

	
	if($_FILES['hero_img']["size"] > 0)  { 


		$uploads_dir = '../../assets/img';
		@$tmp_name = $_FILES['hero_img']["tmp_name"];
		@$name = $_FILES['hero_img']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE hero SET
			hero_title=:title,
			hero_text=:text,
			hero_img=:resimyol
			WHERE hero_id=0");
		$update=$duzenle->execute(array(
			'title' => htmlspecialchars($_POST['hero_title'],ENT_QUOTES,'UTF-8'),
			'text' => htmlspecialchars($_POST['hero_text'],ENT_QUOTES,'UTF-8'),
			'resimyol' => $refimgyol
			));
		


		if ($update) {

			$resimsilunlink=$_POST['hero_img'];
			unlink("../../$resimsilunlink");

			Header("Location:../hero.php?islem=basarili");

		} else {

			Header("Location:../hero.php?islem=basarisiz");
		}



	} else {

		$duzenle=$db->prepare("UPDATE hero SET
			hero_title=:title,
			hero_text=:text
			WHERE hero_id=0");
		$update=$duzenle->execute(array(
			'title' => htmlspecialchars($_POST['hero_title'],ENT_QUOTES,'UTF-8'),
			'text' => htmlspecialchars($_POST['hero_text'],ENT_QUOTES,'UTF-8'),
			));



		if ($update) {

			Header("Location:../hero.php?islem=basarili");

		} else {

			Header("Location:../hero.php?islem=basarisiz");
		}
	}

}

if(isset($_POST["featuresekle"])){

	$kaydet=$db->prepare("INSERT INTO features SET
			features_icon=:icon,
			features_title=:title,
			features_desc=:desc
			");
		$insert=$kaydet->execute(array(
			'icon' => htmlspecialchars($_POST['features_icon'],ENT_QUOTES,'UTF-8'),
			'title' => htmlspecialchars($_POST['features_title'],ENT_QUOTES,'UTF-8'),
			'desc' => htmlspecialchars($_POST['features_desc'],ENT_QUOTES,'UTF-8'),
			
			));

			if($insert){
				Header("Location:../features.php?islem=basarili");
			}else{
				Header("Location:../features.php?islem=basarisiz");
			}


}

if(isset($_POST['featuresduzenle'])){ //özellik düzenle
	
	$id=$_POST["features_id"];
	$duzenle=$db->prepare("UPDATE features SET
			features_icon=:icon,
			features_title=:title,
			features_desc=:desc
			WHERE features_id={$_POST['features_id']}");
		$update=$duzenle->execute(array(
			'icon' => htmlspecialchars($_POST['features_icon'],ENT_QUOTES,'UTF-8'),
			'title' => htmlspecialchars($_POST['features_title'],ENT_QUOTES,'UTF-8'),
			'desc' => htmlspecialchars($_POST['features_desc'],ENT_QUOTES,'UTF-8'),
			
			));

			if($update){
				Header("Location:../features-edit.php?id=$id&islem=basarili");
			}else{
				Header("Location:../features-edit.php?&islem=basarisiz");
			}
}

if(@$_GET['features_delete']=="basarili"){ //özellik sil

	$sil=$db->prepare("DELETE FROM features WHERE features_id=:features_id");
    $kontrol=$sil->execute(array(
        'features_id' => @$_GET["id"]
    ));

    if($kontrol){

        Header("Location:../features.php?islem=basarili");
    }else{
        Header("Location:../features.php?islem=basarisiz");
    }

}

if(isset($_POST["sssekle"])){

	$kaydet=$db->prepare("INSERT INTO sss SET
			sss_title=:title,
			sss_desc=:desc
			");
		$insert=$kaydet->execute(array(
			'title' => htmlspecialchars($_POST['sss_title'],ENT_QUOTES,'UTF-8'),
			'desc' => htmlspecialchars($_POST['sss_desc'],ENT_QUOTES,'UTF-8'),
			
			));

			if($insert){
				Header("Location:../sss.php?islem=basarili");
			}else{
				Header("Location:../sss.php?islem=basarisiz");
			}


}

if(isset($_POST['sssduzenle'])){ //sss düzenle
	
	$id=$_POST["sss_id"];
	$duzenle=$db->prepare("UPDATE sss SET
			sss_title=:title,
			sss_desc=:desc
			WHERE sss_id={$_POST['sss_id']}");
		$update=$duzenle->execute(array(
			'title' => htmlspecialchars($_POST['sss_title'],ENT_QUOTES,'UTF-8'),
			'desc' => htmlspecialchars($_POST['sss_desc'],ENT_QUOTES,'UTF-8'),
			
			));

			if($update){
				Header("Location:../sss-edit.php?id=$id&islem=basarili");
			}else{
				Header("Location:../sss-edit.php?&islem=basarisiz");
			}
}

if(@$_GET['sss_delete']=="basarili"){ //özellik sil

	$sil=$db->prepare("DELETE FROM sss WHERE sss_id=:sss_id");
    $kontrol=$sil->execute(array(
        'sss_id' => @$_GET["id"]
    ));

    if($kontrol){

        Header("Location:../sss.php?islem=basarili");
    }else{
        Header("Location:../sss.php?islem=basarisiz");
    }

}

if(isset($_POST["contactekle"])){

	$kaydet=$db->prepare("INSERT INTO contact SET
			contact_icon=:icon,
			contact_title=:title,
			contact_desc=:desc
			");
		$insert=$kaydet->execute(array(
			'icon' => htmlspecialchars($_POST['contact_icon'],ENT_QUOTES,'UTF-8'),
			'title' => htmlspecialchars($_POST['contact_title'],ENT_QUOTES,'UTF-8'),
			'desc' => htmlspecialchars($_POST['contact_desc'],ENT_QUOTES,'UTF-8'),
			
			));

			if($insert){
				Header("Location:../contact.php?islem=basarili");
			}else{
				Header("Location:../contact.php?islem=basarisiz");
			}
}

if(@$_GET['contact_delete']=="basarili"){ //özellik sil

	$sil=$db->prepare("DELETE FROM contact WHERE contact_id=:contact_id");
    $kontrol=$sil->execute(array(
        'contact_id' => @$_GET["id"]
    ));

    if($kontrol){

        Header("Location:../contact.php?islem=basarili");
    }else{
        Header("Location:../contact.php?islem=basarisiz");
    }

}

if(isset($_POST['contactduzenle'])){ //iletişim düzenle
	
	$id=$_POST["contact_id"];
	$duzenle=$db->prepare("UPDATE contact SET
			contact_icon=:icon,
			contact_title=:title,
			contact_desc=:desc
			WHERE contact_id={$_POST['contact_id']}");
		$update=$duzenle->execute(array(
			'icon' => htmlspecialchars($_POST['contact_icon'],ENT_QUOTES,'UTF-8'),
			'title' => htmlspecialchars($_POST['contact_title'],ENT_QUOTES,'UTF-8'),
			'desc' => htmlspecialchars($_POST['contact_desc'],ENT_QUOTES,'UTF-8'),
			
			));

			if($update){
				Header("Location:../contact-edit.php?id=$id&islem=basarili");
			}else{
				Header("Location:../contact-edit.php?&islem=basarisiz");
			}
}

if(isset($_POST["messageadd"])){

	$kaydet=$db->prepare("INSERT INTO message SET
			message_name=:name,
			message_mail=:mail,
			message_subject=:subject,
			message_message=:message
			");
		$insert=$kaydet->execute(array(
			'name' => htmlspecialchars($_POST['message_name'],ENT_QUOTES,'UTF-8'),
			'mail' => htmlspecialchars($_POST['message_mail'],ENT_QUOTES,'UTF-8'),
			'subject' => htmlspecialchars($_POST['message_subject'],ENT_QUOTES,'UTF-8'),
			'message' => htmlspecialchars($_POST['message_message'],ENT_QUOTES,'UTF-8'),
			));

			if($insert){
				Header("Location:../../index?islem=basarili#contact");
			}else{
				Header("Location:../../index?islem=basarisiz#contact");
			}
}

if(isset($_POST['messageduzenle'])){ //mesaj düzenle
	
	$id=$_POST["message_id"];
	$duzenle=$db->prepare("UPDATE message SET
			message_name=:name,
			message_mail=:mail,
			message_subject=:subject,
			message_message=:message,
			message_status=:status
			WHERE message_id={$_POST['message_id']}");
		$update=$duzenle->execute(array(
			'name' => htmlspecialchars($_POST['message_name'],ENT_QUOTES,'UTF-8'),
			'mail' => htmlspecialchars($_POST['message_mail'],ENT_QUOTES,'UTF-8'),
			'subject' => htmlspecialchars($_POST['message_subject'],ENT_QUOTES,'UTF-8'),
			'message' => htmlspecialchars($_POST['message_message'],ENT_QUOTES,'UTF-8'),
			'status' => htmlspecialchars($_POST['message_status'],ENT_QUOTES,'UTF-8'),
			));

			if($update){
				Header("Location:../message-edit.php?id=$id&islem=basarili");
			}else{
				Header("Location:../message-edit.php?&islem=basarisiz");
			}
}

if(@$_GET['message_delete']=="basarili"){ //mesaj sil

	$sil=$db->prepare("DELETE FROM message WHERE message_id=:message_id");
    $kontrol=$sil->execute(array(
        'message_id' => @$_GET["id"]
    ));

    if($kontrol){

        Header("Location:../message.php?islem=basarili");
    }else{
        Header("Location:../message.php?islem=basarisiz");
    }
}

if (isset($_POST['settingkaydet'])) { //ayar düzenleme işlemi

	
	if($_FILES['setting_logo']["size"] > 0)  { 


		$uploads_dir = '../../assets/img';
		@$tmp_name = $_FILES['setting_logo']["tmp_name"];
		@$name = $_FILES['setting_logo']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE setting SET
			setting_footer=:footer,
			setting_logo=:resimyol
			WHERE setting_id=0");
		$update=$duzenle->execute(array(
			'footer' => htmlspecialchars($_POST['setting_footer'],ENT_QUOTES,'UTF-8'),
			'resimyol' => $refimgyol
			));
		


		if ($update) {

			$resimsilunlink=$_POST['setting_logo'];
			unlink("../../$resimsilunlink");

			Header("Location:../setting.php?islem=basarili");

		} else {

			Header("Location:../setting.php?islem=basarisiz");
		}



	} else {

		$duzenle=$db->prepare("UPDATE setting SET
			setting_footer=:footer
			WHERE setting_id=0");
		$update=$duzenle->execute(array(
			'footer' => htmlspecialchars($_POST['setting_footer'],ENT_QUOTES,'UTF-8'),
			));



		if ($update) {

			Header("Location:../setting.php?islem=basarili");

		} else {

			Header("Location:../setting.php?islem=basarisiz");
		}
	}

}

?>