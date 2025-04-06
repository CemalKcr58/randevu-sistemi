<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödeme Sayfası</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Randevu Sistemi - Ödeme</h1>
        <nav>
            <ul>
                <li><a href="index.html">Anasayfa</a></li>
                <li><a href="services.html">Hizmetler</a></li>
            </ul>
        </nav>
    </header>

    <section id="payment">
        <h2>Ödeme Yap</h2>
        <form id="paymentForm">
            <label for="cardNumber">Kart Numarası:</label>
            <input type="text" id="cardNumber" placeholder="XXXX XXXX XXXX XXXX" required>

            <label for="expiryDate">Son Kullanma Tarihi:</label>
            <input type="month" id="expiryDate" required>

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" required>

            <button type="submit">Ödeme Yap</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2025 Randevu Sistemi</p>
    </footer>

    <script>
        // Ödeme işlemi
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            alert('Ödeme başarılı!');
            window.location.href = "services.html"; // Ödeme başarılıysa Hizmetler sayfasına yönlendir
        });
    </script>
</body>
</html>
