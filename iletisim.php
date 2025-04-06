<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim - Randevu Sistemi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Randevu Sistemi - İletişim</h1>
        <nav>
            <ul>
                <li><a href="index.html">Anasayfa</a></li>
                <li><a href="services.html">Hizmetler</a></li>
                <li><a href="contact.html">İletişim</a></li>
            </ul>
        </nav>
    </header>

    <section id="contact">
        <h2>Bizimle İletişime Geçin</h2>
        <p>Herhangi bir soru, öneri veya geri bildirimde bulunmak için aşağıdaki formu doldurabilirsiniz.</p>
        
        <!-- İletişim Formu -->
        <form id="contactForm">
            <label for="name">Adınız:</label>
            <input type="text" id="name" name="name" required placeholder="Adınızı girin">

            <label for="email">E-posta Adresiniz:</label>
            <input type="email" id="email" name="email" required placeholder="E-posta adresinizi girin">

            <label for="message">Mesajınız:</label>
            <textarea id="message" name="message" required placeholder="Mesajınızı yazın..."></textarea>

            <button type="submit">Gönder</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2025 Randevu Sistemi</p>
    </footer>

    <script>
        // İletişim formunun gönderilmesi
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Sayfa yenilenmesini engelle

            // Form verilerini al
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const message = document.getElementById("message").value;

            // Geri bildirim mesajı
            alert(`Teşekkürler ${name}! Mesajınız başarıyla gönderildi.`);
            
            // Formu sıfırlama
            document.getElementById("contactForm").reset();
        });
    </script>
</body>
</html>
