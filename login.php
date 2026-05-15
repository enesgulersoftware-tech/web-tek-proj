<?php
// Gelen verinin POST metodu ile gelip gelmediğini kontrol et
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Öğrenci numarası
    $ogrenci_no = "b251210107"; // Örnek olarak yazdım.
    
    // Proje dokümanına göre belirlenen kurallar
    $dogru_mail = $ogrenci_no . "@sakarya.edu.tr";
    $dogru_sifre = $ogrenci_no;

    // Formdan gelen boşlukları temizleyerek verileri al
    $gelen_email = trim($_POST["email"]);
    $gelen_sifre = trim($_POST["password"]);

    // Eğer form verilerinden biri boş gelmişse güvenlik için tekrar login sayfasına yönlendir
    if (empty($gelen_email) || empty($gelen_sifre)) {
        header("Location: login.html?status=error");
        exit();
    }

    // Bilgilerin doğruluğunu karşılaştır
    if ($gelen_email === $dogru_mail && $gelen_sifre === $dogru_sifre) {
        // Başarılı giriş: İstenilen "Hoşgeldiniz [Öğrenci No]" ekranını basıyoruz
        echo "<!DOCTYPE html>
        <html lang='tr'>
        <head>
            <meta charset='UTF-8'>
            <title>Giriş Başarılı</title>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
        </head>
        <body class='bg-light d-flex align-items-center justify-content-center' style='height: 100vh;'>
            <div class='text-center p-5 shadow bg-white rounded-4'>
                <h1 class='text-success fw-bold mb-3'>Hoşgeldiniz $ogrenci_no</h1>
                <p class='text-muted mb-4'>Kimlik doğrulama işleminiz başarıyla tamamlandı.</p>
                <a href='index.html' class='btn btn-primary px-4 py-2 fw-bold'>Ana Sayfaya Dön</a>
            </div>
        </body>
        </html>";
    } else {
        // Bilgiler hatalıysa URL'ye 'status=error' parametresi ekleyerek login sayfasına yönlendir
        header("Location: login.html?status=error");
        exit();
    }
} else {
    // Sayfaya direkt link üzerinden (GET) girilmeye çalışılırsa login.html'e geri gönder
    header("Location: login.html");
    exit();
}
?>