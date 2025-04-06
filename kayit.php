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
    <title>Kayıt Formu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Kayıt Ol</h2>
        <form id="signupForm">
            <label for="fullname">Ad Soyad:</label>
            <input type="text" id="fullname" name="fullname" placeholder="Ad ve Soyad" required>

            <label for="phone">Telefon Numarası:</label>
            <input type="tel" id="phone" name="phone" placeholder="Telefon numaranızı girin" required>

            <label for="dob">Doğum Tarihi:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="password">Şifre:</label>
            <input type="password" id="password" name="password" placeholder="Şifre" required>

            <button type="submit">Kayıt Ol</button>
        </form>
        <p id="error-message" style="color: red; display: none;">18 yaşından küçük olamazsınız!</p>
    </div>

    <script>
        // Kayıt formunun submit işlemi
        document.getElementById('signupForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Doğum tarihi kontrolü
            const dob = new Date(document.getElementById('dob').value);
            const today = new Date();
            const age = today.getFullYear() - dob.getFullYear();
            const m = today.getMonth() - dob.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            // Eğer yaş 18'den küçükse, formu göndermemek ve hata mesajı göstermek
            if (age < 18) {
                document.getElementById('error-message').style.display = 'block';
            } else {
                // Kayıt başarılı
                alert("Kayıt başarılı!");
                // Burada gerçek bir kayıt işlemi yapılabilir
            }
        });
    </script>
</body>
</html>
