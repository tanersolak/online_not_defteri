<?php
require_once "controllers/authController.php";
if (!isset($_SESSION['uye_id'])) {
    header('location: giris.php');
    exit();
}
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
    <div class="container" style="margin-top:10px;">
        
            <div class="card">
                <div class="card-header ">
                    <h3 style="text-align:center;">Not Ekle</h3>

                </div>
                <div class="card-body">
                    <form action="index.php" method="POST" autocomplete="off" >

                        <input type="text" class="form-control" name="not" required>
                        <br>
                        <div class="form-group">

                            <input type="submit" value="Not al" name="not-btn" style="margin-left:33%;width:33%;" class="btn float-right not_btn bg-dark text-white"><br>
                        </div>
                    </form>
                </div>
            </div>
        
    </div>
    <section class="pt-4 d-flex align-items-center" style="min-height: 100%;">

        <div class="container px-lg-5">
            <div class="row gx-lg-5 mt-5">


                <?php
                $sql = "SELECT * FROM `uye_tablo` JOIN notlar_tablo ON uye_tablo.uye_id=notlar_tablo.uye_id WHERE uye_mail=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $_SESSION['uye_mail']);
                $stmt->execute();
                $result = $stmt->get_result();
                ?>


                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="col-lg-6 col-xxl-4 mb-5">
                        <div class="card bg-warning border-0 h-100">
                            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                                <div class="feature bg-dark bg-gradient text-white rounded-3 mb-4 mt-n4"><i class="fas fa-check"></i></div>
                                <p class="fs-4 fw-bold "><?php echo $row['not_text'] ?> <br><br><?php echo $row['tarih'] ?> </p>
                                <a href="düzenle.php?duzenle=<?php echo $row['not_id'] ?>" class="mx-auto btn btn-primary"><i class="far fa-edit"></i> Düzenle</a>
                                <a onclick="return deleteconfig()" href="index.php?sil=<?php echo $row['not_id'] ?>" class="mx-auto btn btn-danger"><i class="bi bi-trash"></i> Sil</a>
                                

                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            </div>
        </div>

    </section>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        
    function deleteconfig(){

    var del=confirm("Silmek istediğine emin misin?");
    
    return del;
    }
    
    </script>
</body>

</html>