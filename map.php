<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Sistemi - Konum</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAP_API_KEY&callback=initMap" async defer></script>
</head>
<body>
    <header>
        <h1>Randevu Sistemi</h1>
        <nav>
            <ul>
                <li><a href="index.html">Anasayfa</a></li>
                <li><a href="services.html">Hizmetler</a></li>
                <li><a href="map.html">Konum</a></li>
            </ul>
        </nav>
    </header>

    <section id="map">
        <h2>Konum</h2>
        <div id="mapCanvas" style="width: 100%; height: 400px;"></div>
    </section>

    <footer>
        <p>&copy; 2025 Randevu Sistemi</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
