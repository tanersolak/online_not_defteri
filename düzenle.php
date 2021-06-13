<?php
require_once "controllers/authController.php";
if (!isset($_SESSION['uye_id'])) {
    header('location: giris.php');
    exit();

}

$guvenlik=$_GET['duzenle'];
echo $guvenlik;
$sql = "SELECT * FROM `notlar_tablo` WHERE not_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $guvenlik);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if(($_SESSION['uye_id'])!==($row['uye_id'])){
    header('location: index.php');
    exit();
}
?>

<?php
$id = $_GET['duzenle'];

$sql = "SELECT * FROM `notlar_tablo` WHERE not_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Not Defteri</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ea90b6fae9.js" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
        }
    </style>


</head>

<body style="height: 100vh;">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-lg-5">
            <a class="navbar-brand" href="index.php"><?php echo $_SESSION['uye_adi'], " ", $_SESSION['uye_soyadi']; ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Anasayfa</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?logout=1">Çıkış Yap</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="card">
            <div class="card-header ">
                <h3 style="text-align:center;">Not Düzenle</h3>

            </div>
            <div class="card-body" style="border: 10px;">
                <form action="index.php?duzenle=<?php echo $row['not_id'] ?>" method="POST" autocomplete="off">

                    <input type="text" class="form-control" value="<?php echo $row['not_text']; ?>" name="duzenli_not" required>

                    <br>
                    <div class="form-group">

                        <input  onclick="return changeconfig()" type="submit" value="Düzenle" name="duzenle-btn" style="width:33%; margin-left:33%;" class="btn float-right not_btn bg-dark text-white"><br><br>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }

        function deleteconfig() {

            var del = confirm("Silmek istediğine emin misin?");

            return del;
        }

        function changeconfig() {

            var del = confirm("Düzenlemek istediğine emin misin?");

            return del;
        }
    </script>
</body>

</html>