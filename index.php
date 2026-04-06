<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Form Elementleri ve PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-success" href="#">Esat PHP Form Elementleri</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active " aria-current="page" href="index.php">Ana Sayfa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Yeni Kullanıcı</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Kayıt olmak için</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-4">
        <?php
        // Form POST metoduyla gönderildiyse buradaki if bloğu çalışıyor. Yani sayfa ilk açıldığında boşuna çalışmıyor
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            echo "<div class='alert alert-success'>";
            echo "<h4 class='text-center'>PHP ile Yakalanan Form Verileri</h4>";
            
            // Dersteki gibi HTML etiketlerini PHP içinde echo ile yazdırarak dinamik bir tablo oluşturdum
            echo "<table class='table table-bordered table-striped mt-3'>";
            echo "<tr class='table-dark'><th>Form Elemanının Adı (name)</th><th>Kullanıcının Girdiği Değer</th></tr>";

            // Derste gördüğümüz 'for' döngüsünün diziler (array) için kullanılan hali olan 'foreach' döngüsünü kullandım. $_POST ile gelen her veriyi sırayla tabloya yazdırıyor
            foreach ($_POST as $isim => $deger) {
                echo "<tr>";
                echo "<td><strong>" . htmlspecialchars($isim) . "</strong></td>";
                
                // Checkbox'lardan gelen veriler (tarzlar) birden fazla olduğu için dizi (array) olarak geliyor. if/else yapısı ile gelen verinin dizi olup olmadığını kontrol ettim.
                if (is_array($deger)) {
                    // Dizi ise aralarına virgül koyarak yazdır.
                    echo "<td>" . htmlspecialchars(implode(", ", $deger)) . "</td>";
                } else {
                    // Normal metin ise direkt yazdır.
                    echo "<td>" . htmlspecialchars($deger) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        ?>
    </div>
    <section id="contact">
        <div class="container-lg">
            <div class="text-center mt-3">
                <h2>40 Adet Form Elementleri</h2>
                <p class="lead">40 Adet form elementlerini listeledim</p>
            </div>
            
            <div class="row justify-content-center my-5">
                <div class="col-lg-6 row g-3">
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        
                        <label for="email" class="form-label">Email Adresi:</label>
                        <div class="mb-4 input-group">
                            <span class="input-group-text"><i class="bi bi-android2">@</i></span>
                            <input type="email" name="eposta" class="form-control" id="email" placeholder="E-mail adresinizi giriniz">    
                        </div>
                        
                        <label for="adiniz" class="form-label">Adınız:</label>
                        <input type="text" name="ad" class="form-control" id="adiniz" placeholder="Adınızı Giriniz">

                        <label for="subject" class="form-label">Seçenekler:</label>
                        <select class="form-select" name="secenek" id="subject">
                            <option value="Secilmedi" selected >Seçeneklerin</option>
                            <option value="Secenek 1" >Lorem.</option>
                            <option value="Secenek 2" >Lorem, ipsum.</option>
                        </select>
                        
                        <div class="form-floating mb-4 mt-5">
                            <textarea id="query" name="teklif_metni" class="form-control" style="height: 140px;"></textarea>
                            <label for="query" class="form-label">Tekliflerin:</label>
                        </div>

                        <div class="mb-4 text-center">
                            <button type="submit" class="btn btn-secondary">Buton (Yukarıdaki Verileri Test Et)</button>
                        </div>
                        <hr>
                        
                        <div class="col-md-6 mt-3">
                            <label class="d-block mb-2">Cinsiyet:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cinsiyet" id="erkek" value="erkek"> <label class="form-check-label" for="erkek">Erkek</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cinsiyet" id="kadin" value="kadin"> <label class="form-check-label" for="kadin">Kadın</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Web Adresi</label>
                            <div class="input-group">
                                <span class="input-group-text">https://</span>
                                <input type="text" name="web_sitesi" class="form-control" placeholder="site adresinizi giriniz"> 
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Favori Renk (Profil Arkaplanı)</label>
                            <input type="color" name="favori_renk" class="form-control form-control-color" value="#563d7c"> 
                        </div>
                    
                        <div class="col-md-6">
                            <label class="form-label">Profil Fotoğrafı Yükle</label>
                            <input class="form-control" name="profil_fotosu" type="file"> 
                        </div>
                        <hr>

                        <div class="form-section mt-3">
                            <h4 class="text-success mb-2">Müzik ve ekipmanlar</h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Enstrümanlar</label>
                                    <select class="form-select" name="enstruman"> 
                                        <option value="Seçilmedi" selected>Seçiniz</option>
                                        <option value="Elektro">Elektro</option>
                                        <option value="Bass">Bass</option>
                                        <option value="Bateri">Bateri</option>
                                        <option value="Piyano">Piyano</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Müzik seviyeniz </label>
                                    <input type="range" name="seviye" class="form-range" min="0" max="100">
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label text-danger">İlgilendiğiniz Tarzlar :</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tarzlar[]" value="Rock" id="rock"> <label class="form-check-label" for="rock">Rock</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tarzlar[]" value="Metal" id="metal"> <label class="form-check-label" for="metal">Metal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tarzlar[]" value="Jazz" id="jazz"> <label class="form-check-label" for="jazz">Jazz</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tarzlar[]" value="Pop" id="pop"> <label class="form-check-label" for="pop">Pop</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tarzlar[]" value="Blues" id="blues"> <label class="form-check-label" for="blues">Blues</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="tarzlar[]" value="Klasik" id="klasik"> <label class="form-check-label" for="klasik">Klasik</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="tecrube" value="Var" role="switch" id="sahneSwitch"> <label class="form-check-label" for="sahneSwitch">Tecrübem var</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="sahne" value="Çıkabilirim" role="switch" id="grupSwitch" checked> <label class="form-check-label" for="grupSwitch">Sahneye çıkabilriim</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="nota" value="Bilir" role="switch" id="notaSwitch"> <label class="form-check-label" for="notaSwitch">Notaları bilirim</label>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Sahne başı ücret beklentisi</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="ucret" class="form-control" aria-label="Tutar"> <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h4 class="text-success mb-3">3. Adres Bilgileri</h4>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <select class="form-select" name="sehir" id="floatingSelect"> 
                                            <option value="Seçilmedi" selected>Seçiniz</option>
                                            <option value="Bilecik">Bilecik</option>
                                            <option value="Söğüt">Söğüt</option>
                                            <option value="Kayseri">Kayseri</option>
                                        </select>
                                        <label for="floatingSelect">Şehir</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" name="ilce" class="form-control" id="ilceInput" placeholder="İlçe"> <label for="ilceInput">İlçe</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" name="posta_kodu" class="form-control" id="postaInput" placeholder="Posta Kodu"> <label for="postaInput">Posta Kodu</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="adres" placeholder="Adres" style="height: 100px"></textarea> <label>Adres</label>
                                    </div>
                                </div>

                                <input type="hidden" name="userId" value="9999"> 
                                
                                <div class="col-md-6">
                                    <label class="form-label">Kargo kodu </label>
                                    <input class="form-control" name="kargo_kodu" type="text" value="bilecik-sogut-2026" readonly> 
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Kargo Tipi</label>
                                    <input class="form-control" type="text" value="Standart Kargo" disabled> 
                                </div>

                                <div class="col-12 mt-3">
                                    <label class="form-label">Site içi arama</label>
                                    <input class="form-control" name="arama_kelimesi" list="datalistOptions" id="exampleDataList" placeholder="Aramak için yazın..."> 
                                    <datalist id="datalistOptions">
                                        <option value="Gitar">
                                        <option value="Amfi">
                                        <option value="Pedal">
                                        <option value="Mikrofon">
                                        <option value="Kablo">
                                    </datalist>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h4 class="text-danger mb-3">4. Onaylar</h4>
                            
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="onay_kvkk" value="Evet" id="kvkkCheck" required> 
                                <label class="form-check-label" for="kvkkCheck">
                                    KVKK Aydınlatma Metnini okudum ve kabul ediyorum.
                                </label>
                            </div>
                            
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="onay_sozlesme" value="Evet" id="sozlesmeCheck" required> 
                                <label class="form-check-label" for="sozlesmeCheck">
                                    Üyelik Sözleşmesini kabul ediyorum.
                                </label>
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" name="onay_ebulten" value="Evet" id="ebultenCheck"> 
                                <label class="form-check-label" for="ebultenCheck">
                                    Kampanyalardan haberdar olmak için E-Bülten'e abone ol.
                                </label>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-success btn-lg" type="submit">Kayıt ol</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="container"> 
        <footer class="py-5 border-top mt-5"> 
            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4"> 
                <p>© 2026 Esat Tüm Hakları Saklıdır.</p> 
            </div> 
        </footer> 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
