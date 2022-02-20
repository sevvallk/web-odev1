<?php

include("config.php");

session_start();

if (isset($_SESSION["user"]) === FALSE) {
  header("Location: giris.php");
} else {

$result = mysqli_query($open, "SELECT * FROM `seyehat` LIMIT 50");
if ($result == FALSE) {
    exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "An error occurred while selecting data on database"]]));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
    <a class="favoriler" href="index.php">Anasayfa</a>
        <a href="#"></a>
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
        <h1 class="heading"> Tüm <span>Yolculuklar</span> </h1>
        <div class="box-container">
        <?php
        foreach ($result as $yolculuklar) {
            $result = mysqli_query($open, "SELECT `name`, `surname`, `e-mail`, `tel` FROM `users` WHERE `id` = '".$yolculuklar["userID"]."' ");
            if ($result == FALSE) {
                exit(json_encode(["result" => NULL, "error" => ["code" => NULL, "message" => "An error occurred while selecting data on database"]]));
            }

            $userInfo = mysqli_fetch_array($result);
        ?>
            <div class="box" data-aos="fade-up">
                <div class="image">
                    <h4 class="profil_name"><?=$userInfo["name"]?> <?=$userInfo["surname"]?></h4>
                </div>
                <div class="content">
                    <h3 class="dest"><i class="fas fa-map-marker-alt"></i><?=$yolculuklar["nerden"]?>-<?=$yolculuklar["nereye"]?></h3>
                    <h3 class="date"><i class="fas fa-calendar"></i><?=$yolculuklar["tarih"]?></h3>
                    <p><?=$yolculuklar["aciklama"]?></p>
                    <p><b><?=$yolculuklar["kisi"]?> Kişi</b></p>
                    <div class="fiyat:"><b><?=$yolculuklar["fiyat"]?> TL</b></div>
                    <a href="fav-ekle.php?id=<?=$yolculuklar["id"]?>&userID=<?=$yolculuklar["userID"]?>" class="btn"><i class="fa fa-heart" aria-hidden="true"></i> fav ekle</a>
                    <a href="#" class="btn message" data-name="<?php echo $userInfo["name"]; ?>" data-surname="<?php echo $userInfo["surname"]; ?>" data-email="<?php echo $userInfo["e-mail"]; ?>" data-tel="<?php echo $userInfo["tel"]; ?>"><i class="fa fa-envelope" aria-hidden="true"></i> iletişim bilgileri</a>
                    <a href="rezervasyon-ekle.php?seyehatID=<?=$yolculuklar["id"]?>&userID=<?=$yolculuklar["userID"]?>"   class="btn"><i class="fa fa-calendar" aria-hidden="true"></i> rezervasyon</a>
                    <a href="./odeme.php" class="btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i> satın al</a>
                    <a href="puanlama.php?seyehatID=<?=$yolculuklar["id"]?>&userID=<?=$yolculuklar["userID"]?>" class="btn" ><i  aria-hidden="true"></i> puanla</a>
                </div>
            </div>
        <?php } ?>
        </div>
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
<?php } ?>