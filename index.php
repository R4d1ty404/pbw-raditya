<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PemroWeb Radit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">My Daily Journal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#article">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#schedule">Schedule</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-danger" id="light-mode"><i class="bi bi-brightness-alt-high-fill"></i></a>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-dark" id="dark-mode"><i class="bi bi-moon-fill"></i></a>
                </li>
            </div>
        </div>
    </nav>

    <main>
        <section id="hero" class="text-center p-5 bg-danger-subtle text-md-start">
            <div class="container">
                <div class="d-md-flex flex-md-row-reverse align-items-center">
                    <img src="img/banner.png" class="img-fluid" width="300">
                    <div id="hero-text" class="text-dark">
                        <h1 class="fw-bold display-4">Create Memories, Save Memories, Everyday</h1>
                        <h4 class="lead display-6">Mencatat semua kegiatan sehari-hari yang ada tanpa terkecuali</h4>
                        <h6>
                            <span id="tanggal"></span>
                            <span id="jam"></span>
                        </h6>
                    </div>
                </div>
            </div>
        </section>

        <!-- article begin -->
        <section id="article" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <?php
            $sql = "SELECT * FROM article ORDER BY tanggal DESC";
            $hasil = $conn->query($sql); 

            while($row = $hasil->fetch_assoc()){
            ?>
                <div class="col">
                <div class="card h-100">
                    <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                    <h5 class="card-title"><?= $row["judul"]?></h5>
                    <p class="card-text">
                        <?= $row["isi"]?>
                    </p>
                    </div>
                    <div class="card-footer">
                    <small class="text-body-secondary">
                        <?= $row["tanggal"]?>
                    </small>
                    </div>
                </div>
                </div>
                <?php
            }
            ?> 
            </div>
        </div>
        </section>
        <!-- article end -->

        <?php
        $sql_gallery = "SELECT gambar FROM gallery ORDER BY tanggal DESC";
        $hasil_gallery = $conn->query($sql_gallery);
        ?>

        <section id="gallery" class="text-center p-5 bg-danger-subtle text-dark">
            <div class="container">
                <h1 class="fw-bold display-4 pb-3">Gallery</h1>

                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">

                        <?php
                        $active = true;
                        while ($row = $hasil_gallery->fetch_assoc()) {
                        ?>
                            <div class="carousel-item <?= $active ? 'active' : '' ?>">
                                <img 
                                    src="img/<?= htmlspecialchars($row['gambar']) ?>" 
                                >
                            </div>
                        <?php
                            $active = false;
                        }
                        ?>

                    </div>

                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </section>



        <section id="schedule" class="text-center p-5 bg-body text-dark">
            <div class="container">
                <header><h1 class="fw-bold display-4 pb-3">Jadwal Kuliah Dan Kegiatan Mahasiswa</h1></header>
                <div class="row row-cols-1 row-cols-md-3 gap-2 justify-content-md-start justify-content-center">
                    <div class="card border-danger-subtle text-dark mb-3 p-0" style="max-width: 18rem;">
                        <div class="card-header text-white fw-bold bg-danger-subtle">Senin</div>
                        <div class="card-body">
                            <p class="card-text fw-bold">Sistem Operasi</p>
                            <p class="card-text">12:30-15:00 H.5.7</p>
                            <p class="card-text fw-bold">Rekayasa Perangkat Lunak</p>
                            <p class="card-text">15:30-18:00 H.3.1</p>
                        </div>
                    </div>
                    <div class="card border-danger-subtle text-dark mb-3 p-0" style="max-width: 18rem;">
                        <div class="card-header text-white fw-bold bg-danger-subtle">Selasa</div>
                        <div class="card-body">
                            <p class="card-text fw-bold">Basis Data</p>
                            <p class="card-text">07:00-08:40 D.2.K</p>
                            <p class="card-text fw-bold">Pendidikan Kewarganegaraan</p>
                            <p class="card-text">18:30-20:10 Kulino</p>                        
                        </div>
                    </div>
                    <div class="card border-danger-subtle text-dark mb-3 p-0" style="max-width: 18rem;">
                        <div class="card-header text-white fw-bold bg-danger-subtle">Rabu</div>
                        <div class="card-body">
                            <p class="card-text fw-bold">Basis Data</p>
                            <p class="card-text">08:40-10:20 H.5.6</p>
                            <p class="card-text fw-bold">Pemorograman Berbasis Web</p>
                            <p class="card-text">10:20-12:00 D.2.J</p>
                        </div>
                    </div>
                    <div class="card border-danger-subtle text-dark mb-3 p-0" style="max-width: 18rem;">
                        <div class="card-header text-white fw-bold bg-danger-subtle">Kamis</div>
                        <div class="card-body">
                            <p class="card-text fw-bold">Probabilitas Dan Statistik</p>
                            <p class="card-text">15:30-18:000 H.3.1</p>
                        </div>
                    </div>
                    <div class="card border-danger-subtle text-dark mb-3 p-0" style="max-width: 18rem;">
                        <div class="card-header text-white fw-bold bg-danger-subtle">Jumat</div>
                        <div class="card-body">
                            <p class="card-text fw-bold">Technopreneurship</p>
                            <p class="card-text">12:30-14:10 H.5.6</p>
                        </div>
                    </div>
                    <div class="card border-danger-subtle text-dark mb-3 p-0" style="max-width: 18rem;">
                        <div class="card-header text-white fw-bold bg-danger-subtle">Sabtu</div>
                        <div class="card-body">
                            <p class="card-text fw-bold">Tidak Ada Jadwal</p>
                        </div>
                    </div>
                    <div class="card border-danger-subtle text-dark mb-3 p-0" style="max-width: 18rem;">
                        <div class="card-header text-white fw-bold bg-danger-subtle">Minggu</div>
                        <div class="card-body">
                            <p class="card-text fw-bold">Tidak Ada Jadwal</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="profile" class="p-5 text-center text-md-start bg-body">
            <div class="container">
                <header><h1 class="fw-bold display-4 pb-3 text-center">Profil Mahasiswa</h1></header>
                <div class="d-md-flex flex-md-row align-items-center gap-5 justify-content-center">
                    <img src="img/pp.jpeg" class="rounded-circle mb-3 mt-3" width="200px" height="200px">
                    <div class="card border-danger-subtle text-dark mb-3 p-4">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">Raditya Perwira Putra</h5>
                            <p class="card-text">Mahasiswa Teknik Informatika</p>
                            <table width="100%">
                                <tbody style="text-align: justify;">
                                    <tr>
                                        <th scope="row" style="text-align: end;">NIM :</th>
                                        <td>A11.2024.15718</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="text-align: end;">Program Studi :</th>
                                        <td>Teknik Informatika</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="text-align: end;">Email :</th>
                                        <td>raditpp315@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="text-align: end;">Telepon :</th>
                                        <td>087704564581</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" style="text-align: end;">Alamat :</th>
                                        <td>Plamongan Indah, Kab. Demak. Jawa Tengah . Indonesia</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="text-center p-5 bg-body text-dark">
        <div>
            <a href="https://www.linkedin.com/in/raditya-p-putra/"><i class="bi bi-linkedin h2 p-2 text-dark"></i></a>
        </div>
        <div><p>@ 2025 Latihan Bootstrap - Raditya Perwira Putra (A11.2024.15718)</p></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script type="text/javascript">
        window.setTimeout("TampilWaktu()", 1000);
        
        function TampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("TampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML = waktu.getHours() + waktu.getMinutes() + waktu.getSeconds();
        }

        const cards = document.getElementsByClassName("card");
        const cards_body = document.getElementsByClassName("card-body");
        const cards_footer = document.getElementsByClassName("card-footer");
        const cards_header = document.getElementsByClassName("card-header")
        const footer = document.getElementsByTagName("footer")[0];

        // Dark Mode nya Boyyy
        document.getElementById("dark-mode").onclick = function(){
            // Hero Start
            document.getElementById("hero").classList.remove("bg-danger-subtle");
            document.getElementById("hero").classList.add("bg-dark");
            document.getElementById("hero-text").classList.remove("text-dark");
            document.getElementById("hero-text").classList.add("text-white");
            // Hero End

            // Article Start
            document.getElementById("article").classList.remove("bg-body");
            document.getElementById("article").classList.add("bg-black");
            document.getElementById("article").classList.remove("text-dark");
            document.getElementById("article").classList.add("text-white");
            for (let i=0;i<cards.length;i++){
                cards[i].classList.remove("bg-body");
                cards[i].classList.add("bg-dark");
            }
            for (let i=0;i<cards_body.length;i++){
                cards_body[i].classList.remove("text-dark");
                cards_body[i].classList.add("text-white");
            }
            for (let i=0;i<cards_footer.length;i++){
                cards_footer[i].classList.remove("text-body-secondary");
                cards_footer[i].classList.add("text-white");
            }
            // Article End

            // Gallery Start
            document.getElementById("gallery").classList.remove("bg-danger-subtle");
            document.getElementById("gallery").classList.add("bg-dark");
            document.getElementById("gallery").classList.remove("text-dark");
            document.getElementById("gallery").classList.add("text-white");
            // Gallery End

            // Schedule Start
            document.getElementById("schedule").classList.remove("bg-body");
            document.getElementById("schedule").classList.add("bg-black");
            document.getElementById("schedule").classList.remove("text-dark");
            document.getElementById("schedule").classList.add("text-white");
            for (let i=0;i<cards.length;i++){
                cards[i].classList.remove("bg-body");
                cards[i].classList.add("bg-dark");
                cards[i].classList.remove("border-danger-subtle");
            }
            for (let i=0;i<cards_body.length;i++){
                cards_body[i].classList.remove("text-dark");
                cards_body[i].classList.add("text-white");
            }
            for (let i=0;i<cards_footer.length;i++){
                cards_footer[i].classList.remove("text-body-secondary");
                cards_footer[i].classList.add("text-white");
            }
            for (let i=0;i<cards_header.length;i++){
                cards_header[i].classList.remove("bg-danger-subtle");
                cards_header[i].classList.add("bg-secondary");
            }
            // Schedule End

            // Profile Start
            document.getElementById("profile").classList.remove("bg-body");
            document.getElementById("profile").classList.add("bg-black");
            document.getElementById("profile").classList.remove("text-dark");
            document.getElementById("profile").classList.add("text-white");
            // Profile End
            
            // Footer Start
            footer.classList.remove("bg-body");       
            footer.classList.add("bg-dark");
            footer.classList.remove("text-dark");
            footer.classList.add("text-white");
            document.getElementsByClassName("bi-linkedin")[0].classList.remove("text-dark");
            document.getElementsByClassName("bi-linkedin")[0].classList.add("text-white");
            // Footer End
        }

        // Light Mode nya Boyyy
        document.getElementById("light-mode").onclick = function(){
            // Hero Start
            document.getElementById("hero").classList.remove("bg-dark");
            document.getElementById("hero").classList.add("bg-danger-subtle");
            document.getElementById("hero-text").classList.remove("text-white");
            document.getElementById("hero-text").classList.add("text-dark");
            // Hero End

            // Article Start
            document.getElementById("article").classList.remove("bg-black");
            document.getElementById("article").classList.add("bg-body");
            document.getElementById("article").classList.remove("text-white");
            document.getElementById("article").classList.add("text-dark");
            for (let i=0;i<cards.length;i++){
                cards[i].classList.remove("bg-dark");
                cards[i].classList.add("bg-body");
            }
            for (let i=0;i<cards_body.length;i++){
                cards_body[i].classList.remove("text-white");
                cards_body[i].classList.add("text-dark");
            }
            for (let i=0;i<cards_footer.length;i++){
                cards_footer[i].classList.remove("text-white");
                cards_footer[i].classList.add("text-body-secondary");
            }
            // Article End

            // Gallery Start
            document.getElementById("gallery").classList.remove("bg-dark");
            document.getElementById("gallery").classList.add("bg-danger-subtle");
            document.getElementById("gallery").classList.remove("text-white");
            document.getElementById("gallery").classList.add("text-dark");
            // Gallery End

            // Schedule Start
            document.getElementById("schedule").classList.remove("bg-black");
            document.getElementById("schedule").classList.add("bg-body");
            document.getElementById("schedule").classList.remove("text-white");
            document.getElementById("schedule").classList.add("text-dark");
            for (let i=0;i<cards.length;i++){
                cards[i].classList.remove("bg-dark");
                cards[i].classList.add("bg-body");
                cards[i].classList.add("border-danger-secondary");
            }
            for (let i=0;i<cards_body.length;i++){
                cards_body[i].classList.remove("text-white");
                cards_body[i].classList.add("text-dark");
            }
            for (let i=0;i<cards_footer.length;i++){
                cards_footer[i].classList.remove("text-white");
                cards_footer[i].classList.add("text-body-secondary");
            }
            for (let i=0;i<cards_header.length;i++){
                cards_header[i].classList.remove("bg-secondary");
                cards_header[i].classList.add("bg-danger-subtle");
            }
            // Schedule End

            // Profile Start
            document.getElementById("profile").classList.remove("bg-black");
            document.getElementById("profile").classList.add("bg-body");
            document.getElementById("profile").classList.remove("text-white");
            document.getElementById("profile").classList.add("text-dark");
            // Profile End

            // Footer Start
            footer.classList.remove("bg-black");       
            footer.classList.add("bg-body");
            footer.classList.remove("text-white");
            footer.classList.add("text-dark");
            document.getElementsByClassName("bi-linkedin")[0].classList.remove("text-white");
            document.getElementsByClassName("bi-linkedin")[0].classList.add("text-dark");
            // Footer End
        }

    </script>
</body>
</html>