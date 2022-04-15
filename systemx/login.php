<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Panel Girişi</title>
  </head>
  <body class="bg-primary">

    <div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <h3 class="text-center">Admin Girişi</h3>
         <form action="ayarlar/islem.php" method="post">
         <div class="row">
                <div class="col-md-6">
                <label>Kullanıcı Adı:</label>
                <input type="text" class="form-control" name="admin_kullanici">
                </div>
                <div class="col-md-6">
                <label>Şifre:</label>
                <input type="password" class="form-control" name="admin_parola">
                </div>
                <button type="submit" name="admingiris" class="btn btn-success mt-3">Giriş Yap</button>
            </div>
         </form>
        </div>
    </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>