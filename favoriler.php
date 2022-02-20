<?php

session_start();

include("config.php");

$userID = $_SESSION["user"];

$result = mysqli_query($open, "SELECT `seyehatID` FROM `favoriler` WHERE `userID` = '".$userID."'");
if ($result == FALSE) {
    exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "Database bağlantı sağlanamadı"]]));
}

$n = mysqli_affected_rows($open);
if ($n == 0) {
    $hata = "Favori yolculuğunuz yok!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoriler</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
    <a class="favoriler" href="index.php">Anasayfa</a>
    <a href=""></a>
        <form action="sonuc.php" class="search-form" method="get">
            <input type="arama" name="query" placeholder="ara" id="aramakutusu" required>
            <input class="srcInpt" type="submit" value="Seyehat Ara">
        </form>
        <a style="margin-left:125px;" class="favoriler" href="favoriler.php">Favorilerim</a>
        <a class="favoriler" href="rezervasyon.php">Rezervasyonlarım</a>
        <a class="favoriler" href="logout.php">Çıkış Yap</a>
    </header>
    <br><br><br>
    <section class="form-container" data-aos="zoom-in">
        <form action="seyehat-template.php" method="post">
            <div class="inputBox">
                <span>Nerden</span>
                <input type="text" name="nerden" placeholder="Isparta" required>
            </div>
            <div class="inputBox">
                <span>Nereye</span>
                <input type="text" name="nereye" placeholder="İstanbul" required>
            </div>
            <div class="inputBox">
                <span>Tarih</span>
                <input type="date" name="tarih" required>
            </div>
            <div class="inputBox">
                <span>Kişi sayısı</span>
                <input type="text" name="kisi" placeholder="1" required>
            </div>
            <input type="submit" value="Seyahat Ara" class="btn">
        </form>
    </section>
    <section class="packages" id="packages">
        <h1>
        <?php
        if (!empty($hata)) {
            ?> <h1 class="heading"><?=$hata; exit; ?></h1> <?php
        }
        ?>
        </h1>
        <h1 class="heading"> Favori <span>Yolculuklar</span> </h1>
        <?php
        foreach ($result as $seyehatID) {

            $result = mysqli_query($open, "SELECT * FROM `seyehat` WHERE `id` = '".$seyehatID["seyehatID"]."'");
            if ($result == FALSE) {
                exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "Database bağlantı sağlanamadı"]]));
            }

                foreach ($result as $favoriler) {
                    $result = mysqli_query($open, "SELECT `name`, `surname`, `e-mail`, `tel` FROM `users` WHERE `id` = '".$favoriler["userID"]."' ");
                    if ($result == FALSE) {
                        exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "Database bağlantı sağlanamadı"]]));
                    }

                    $userInfo = mysqli_fetch_array($result);
        ?>
        <div class="box-container">
            <div class="box" data-aos="fade-up">
                <div class="image">
                    <h4 class="profil_name"><?=$userInfo["name"]?> <?=$userInfo["surname"]?></h4>
                </div>
                <div class="content">
                    <h3 class="dest"><i class="fas fa-map-marker-alt"></i><?=$favoriler["nerden"]?>-<?=$favoriler["nereye"]?></h3>
                    <h3 class="date"><i class="fas fa-calendar"></i><?=$favoriler["tarih"]?></h3>
                    <p><?=$favoriler["aciklama"]?></p>
                    <p><b><?=$favoriler["kisi"]?> Kişi</b></p>
                    <div class="fiyat:"><b><?=$favoriler["fiyat"]?> TL</b></div>
                    <a href="#" class="btn message" data-name="<?php echo $userInfo["name"]; ?>" data-surname="<?php echo $userInfo["surname"]; ?>" data-email="<?php echo $userInfo["e-mail"]; ?>" data-tel="<?php echo $userInfo["tel"]; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> iletişim bilgileri</a>
                    <a href="rezervasyon-ekle.php?seyehatID=<?=$favoriler["id"]?>" class="btn"><i class="fa fa-calendar" aria-hidden="true"></i> rezervasyon</a>
                    <a href="./odeme.html" class="btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i> satın al</a>
                </div>
            </div>
        </div>
        <?php } }?>
        <script type="text/javascript">
        $(document).ready(function () {
            $(".message").click(function () {
                $("body").append('<div class="container"><div class="modal"><div class="close"><i class="fas fa-times"></i></div><div class="title">Sürücü Bilgileri</div><div class="table"><div class="row"><div class="cell">Ad</div><div class="cell">'+$(this).attr("data-name")+'</div></div><div class="row"><div class="cell">Soyad</div><div class="cell">'+$(this).attr("data-surname")+'</div></div><div class="row"><div class="cell">E-Posta</div><div class="cell">'+$(this).attr("data-email")+'</div></div><div class="row"><div class="cell">Telefon</div><div class="cell">'+$(this).attr("data-tel")+'</div></div></div></div></div>');
            });
            $("html > body").on("click", "div.container > div.modal > div.close", function () {
                $("html > body > div.container").remove();
            });
        });
        </script>
</body>
</html>
