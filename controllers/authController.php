<?php


require "config/db.php";
session_start();

$errors = array();

$success = array();
$kategoriler = array();
$FName = "";
$LName =  "";
$Email =  "";

$not = "";
$Password = "";

if (isset($_POST['giris-btn'])) {
    $mail = $_POST['mail'];
    $sifre =  hash("sha256", $_POST['sifre']);

    // mail ile eşleşen diğer bilgileri alıyoruz

    $sql = "SELECT * FROM `uye_tablo` where uye_mail=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    $uye = $result->fetch_assoc();

    //şifre kontrolü
    if ($result->num_rows > 0) {
        if ($sifre === $uye['uye_sifre']) {
            $_SESSION['uye_id'] = $uye['uye_id'];
            $_SESSION['uye_adi'] = $uye['uye_adi'];
            $_SESSION['uye_soyadi'] = $uye['uye_soyadi'];
            $_SESSION['uye_mail'] = $uye['uye_mail'];

            header('location: index.php');
            exit();
        } else {
            $errors['login'] = "Yanlış mail ya da şifre!";
        }
    } else {
        $errors['login'] = "Yanlış mail ya da şifre!";
    }
}
//çıkış yapma
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['uye_adi']);
    unset($_SESSION['uye_soyadi']);
    header('location:giris.php');
    exit();
}

//üye kaydetme
if (isset($_POST['kaydol-btn'])) {
    $FName = $_POST['fname'];
    $LName = $_POST['lname'];
    $Email = $_POST['mail'];
    $Password =  hash("sha256", $_POST['password']);
    //email kontrolü
    $emailCheck = "SELECT * FROM uye_tablo where uye_mail=? LIMIT 1";
    $stmt = $conn->prepare($emailCheck);
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $resultmail = $stmt->get_result();
    if ($resultmail->num_rows > 0) {
        $errors["email"] = "Bu Email'e kayıtlı hesap zaten var!";
    }

    if (count($errors) === 0) {

        $sql = "INSERT INTO `uye_tablo` (`uye_adi`, `uye_soyadi`, `uye_mail`, `uye_sifre`) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $FName, $LName,  $Email, $Password);
        $stmt->execute();
    }
}

//NOT EKLEME
if (isset($_POST['not-btn'])) {
    $not = $_POST['not'];
    $date = date("Y-m-d", strtotime('now'));
    $sql = "INSERT INTO `notlar_tablo` (`not_text`,`uye_id`,`tarih`) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $not, $_SESSION['uye_id'], $date);
    $stmt->execute();
}

//NOT SİLME
if (isset($_GET['sil'])) {
    $not = $_GET['sil'];
    $sql = "DELETE FROM notlar_tablo WHERE not_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $not);
    $stmt->execute();
}

//NOT DÜZENLEME
if (isset($_POST['duzenle-btn'])) {
    $not = $_POST['duzenli_not'];
    $duzenle = $_GET['duzenle'];
    $sql = "UPDATE `notlar_tablo` SET not_text=? WHERE not_id=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $not,$duzenle);
    $stmt->execute();
}




/////////////////////////
