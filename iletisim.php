<?php
// POST metodu ile gelinip gelinmediğini kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Formdan gelen verileri değişkenlere atama (Güvenlik için htmlspecialchars kullanıyoruz)
    $isim = isset($_POST['isim']) ? htmlspecialchars($_POST['isim']) : 'Belirtilmedi';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'Belirtilmedi';
    $telefon = isset($_POST['telefon']) ? htmlspecialchars($_POST['telefon']) : 'Belirtilmedi';
    $konu = isset($_POST['konu']) ? htmlspecialchars($_POST['konu']) : 'Belirtilmedi';
    $tercih = isset($_POST['tercih']) ? htmlspecialchars($_POST['tercih']) : 'Belirtilmedi';
    $mesaj = isset($_POST['mesaj']) ? htmlspecialchars($_POST['mesaj']) : 'Belirtilmedi';
    $onay = isset($_POST['onay']) ? htmlspecialchars($_POST['onay']) : 'Onaylanmadı';

    // Verileri düzenli bir tablo formatında ekrana yazdırma
    echo "<!DOCTYPE html>
    <html lang='tr'>
    <head>
        <meta charset='UTF-8'>
        <title>Form Sonuçları</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        <link rel="icon" href="img/brain.png">
    </head>
    <body class='bg-light mt-5'>
        <div class='container'>
            <div class='row justify-content-center'>
                <div class='col-md-8'>
                    <div class='card shadow border-0'>
                        <div class='card-header bg-success text-white text-center fs-4 fw-bold'>
                            İletişim Formu Başarıyla Ulaştı
                        </div>
                        <div class='card-body'>
                            <table class='table table-bordered table-striped'>
                                <tbody>
                                    <tr><th style='width:30%'>Ad Soyad</th><td>$isim</td></tr>
                                    <tr><th>E-posta</th><td>$email</td></tr>
                                    <tr><th>Telefon</th><td>$telefon</td></tr>
                                    <tr><th>Konu</th><td>$konu</td></tr>
                                    <tr><th>Geri Dönüş Tercihi</th><td>$tercih</td></tr>
                                    <tr><th>Onay Durumu</th><td>$onay</td></tr>
                                    <tr><th>Mesaj</th><td>$mesaj</td></tr>
                                </tbody>
                            </table>
                            <div class='text-center mt-4'>
                                <a href='iletisim.html' class='btn btn-outline-secondary'>Geri Dön</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>";
} else {
    // Sayfaya direkt girilirse yönlendir
    header("Location: iletisim.html");
    exit();
}
?>