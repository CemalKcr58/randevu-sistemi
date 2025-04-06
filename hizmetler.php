<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Randevu Sistemi - Hizmetler</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
</head>
<body>
    <header>
        <h1>Randevu Sistemi</h1>
        <nav>
            <ul>
                <li><a href="index.html">Anasayfa</a></li>
                <li><a href="services.html">Hizmetler</a></li>
            </ul>
        </nav>
    </header>

    <section id="services">
        <h2>Hizmet Seç ve Randevu Al</h2>

        <!-- Hizmet Seçim Formu -->
        <form id="appointmentForm">
            <label for="service">Hizmet Seç:</label>
            <select id="service" onchange="updateSubServices()">
                <option value="">Hizmet Seçin</option>
                <option value="berber">Berber</option>
                <option value="kuafor">Kuaför</option>
                <option value="dis_hekimi">Diş Hekimi</option>
            </select>

            <div id="subServicesContainer" style="display: none;">
                <h3>Alt Hizmetler:</h3>
                <!-- Alt hizmetler checkboxları burada dinamik olarak görünecek -->
            </div>

            <label for="district">İlçe Seç:</label>
            <select id="district">
                <option value="kadikoy">Kadıköy</option>
                <option value="besiktas">Beşiktaş</option>
                <option value="sarikaya">Sarıyer</option>
            </select>

            <!-- Hizmet Bilgisi -->
            <div id="serviceInfo" style="display:none;">
                <p id="serviceDescription"></p>
                <p><strong>Toplam Fiyat:</strong> <span id="totalPrice">0</span> TL</p>
            </div>

            <!-- Randevu Al Butonu -->
            <button type="button" id="randevuButton" onclick="goToPaymentPage()" disabled><a href="odeme.html">Randevu Al</a></button>
        </form>

        <!-- Harita Bölümü -->
        <div id="mapCanvas" style="width: 100%; height: 400px; margin-top: 30px;"></div>
    </section>

    <footer>
        <p>&copy; 2025 Randevu Sistemi</p>
    </footer>

    <script>
        // Hizmetlerin alt hizmetleri ve fiyatları
        const services = {
            berber: {
                "saç_kesimi": 150,
                "sakal_tirasi": 100,
                "sac_boyama": 200,
                "sac_bakimi": 120,
                "sapka_modeli": 50,
                "joel_bakimi": 30
            },
            kuafor: {
                "maske": 80,
                "sac_bakimi": 120,
                "manikur": 60,
                "pedikur": 70,
                "sac_rengi": 150,
                "keratin": 250
            },
            dis_hekimi: {
                "dis_kontrol": 200,
                "temizlik": 250,
                "dis_beyazlatma": 500,
                "kanal_tedavisi": 600,
                "dis_dolgusu": 400,
                "ortodonti": 2500
            }
        };

        // Hizmet seçildiğinde alt hizmetleri güncelleyen fonksiyon
        function updateSubServices() {
            const service = document.getElementById("service").value;
            const subServicesContainer = document.getElementById("subServicesContainer");

            if (service === "") {
                subServicesContainer.style.display = "none";
                return;
            }

            // Alt hizmetler bölmesini görünür yap
            subServicesContainer.style.display = "block";

            // Alt hizmetleri temizle
            subServicesContainer.innerHTML = '<h3>Alt Hizmetler:</h3>';

            // Seçilen hizmete göre alt hizmetleri ekle
            Object.keys(services[service]).forEach(subService => {
                const checkboxDiv = document.createElement("div");
                checkboxDiv.innerHTML = `
                    <input type="checkbox" id="${subService}" value="${subService}" onchange="updateServiceInfo()">
                    <label for="${subService}">${subService.replace("_", " ").toUpperCase()}</label> - 
                    <span id="price-${subService}">${services[service][subService]} TL</span>
                `;
                subServicesContainer.appendChild(checkboxDiv);
            });
        }

        // Alt hizmetler seçildiğinde toplam fiyatı güncelleyen fonksiyon
        function updateServiceInfo() {
            const service = document.getElementById("service").value;
            const selectedSubServices = [];
            let totalPrice = 0;

            // Seçilen alt hizmetleri kontrol et
            const checkboxes = document.querySelectorAll(`#subServicesContainer input[type="checkbox"]:checked`);
            checkboxes.forEach(checkbox => {
                const subService = checkbox.value;
                selectedSubServices.push(subService);
                totalPrice += services[service][subService];
            });

            // Seçilen hizmetlerin bilgilerini göster
            const serviceDescription = document.getElementById("serviceDescription");
            const totalPriceElement = document.getElementById("totalPrice");

            if (selectedSubServices.length > 0) {
                serviceDescription.innerText = `Seçilen Alt Hizmetler: ${selectedSubServices.join(', ')}`;
                totalPriceElement.innerText = totalPrice;
                document.getElementById("serviceInfo").style.display = 'block'; // Hizmet bilgilerini göster
                document.getElementById("randevuButton").disabled = false; // "Randevu Al" butonunu aktif yap
            } else {
                document.getElementById("serviceInfo").style.display = 'none'; // Hizmet bilgilerini gizle
                document.getElementById("randevuButton").disabled = true; // Butonu devre dışı bırak
            }
        }

        // Randevu Al butonuna tıklanırsa ödeme sayfasına yönlendirme
        function goToPaymentPage() {
            alert("Randevunuz alınmıştır. Ödeme sayfasına yönlendiriliyorsunuz.");
        }

        // Harita Entegrasyonu
        function initMap() {
            const location = { lat: 41.0082, lng: 28.9784 }; // İstanbul'un koordinatları
            const map = new google.maps.Map(document.getElementById("mapCanvas"), {
                zoom: 13,
                center: location,
            });
            new google.maps.Marker({
                position: location,
                map: map,
                title: "Buradayız!",
            });
        }
    </script>
</body>
</html>
