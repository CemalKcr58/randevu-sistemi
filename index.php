<?php
include("connect.php");

if (isset($_POST['girisyap'])) {
    // Formdan gelen verileri alıyoruz
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Veritabanında kullanıcıyı ve şifreyi kontrol et (prepared statement ile)
    $query = "SELECT * FROM hesaplar WHERE kullanici_adi = ? AND sifre = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password); // 'ss' iki string türü anlamına gelir
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if (mysqli_num_rows($result) > 0) { 
        // Kullanıcı adı ve şifre doğruysa
        echo"<script>location.href='hizmetler.php' </script>";
    } else {
        // Kullanıcı adı veya şifre hatalı
        $error = "Kullanıcı adı veya şifre hatalı!";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con); 
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Sistemi - Giriş ve Kayıt</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Randevu Sistemi</h1>
        <nav>
            <ul>
                <li><a href="iletisim.php">Anasayfa</a></li>
                <li><a href="services.php">Hizmetler</a></li>
                <li><a href="iletisim.php"></a></li>
            </ul>
        </nav>
    </header>

    <section id="auth-section">
        <!-- Giriş Formu -->
        <div id="login-form" class="auth-form">
            <h2>Giriş Yap</h2>
            <form id="loginForm" method="POST">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" name="girisyap">Giriş Yap</button>
            </form>
            
            <?php
            // Hata mesajını gösterme
            if (isset($error)) {
                echo "<p style='color: red;'>$error</p>";
            }
            ?>
            
            <p>Hesabınız yok mu? <a href="kayit.php" id="show-signup">Kayıt Olun</a></p>
        </div>
    </section>
</body>
</html>
