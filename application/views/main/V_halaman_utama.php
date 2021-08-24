<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-in">
        <h1>Selamat Datang di Mitra Kerja Sama</h1><br>
        <img src="<?php echo base_url() ?>assets/front-user/img/tangan.png" alt="tangan Imgs" data-aos="zoom-out" data-aos-delay="100" style="width: 200px">
        <a href="#get-started" class="btn-get-started scrollto">Get Started</a>
        <br>
        <br>
        <!--footer-->
        <footer>
            <div class="container">
                <small>Copyright &copy; 2021 - Bagian Kerja Sama</small>
            </div>
        </footer>
    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= Get Started dan abaut us Section ======= -->
    <section id="get-started" class="padd-section text-center">
        <section id="about-us" class="about-us padd-section">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center">
                    <h2>Alur Mitra Kerja Sama </h2>
                    <p class="separator">.......</p>
                </div>

                <div class="container">
                    <div class="row">

                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="feature-block">

                                <img src="<?php echo base_url() ?>assets/front-user/img/svg/cloud.svg" alt="img">
                                <h4>Awal Kerjasama</h4>
                                <p>1. Pengajuan Permohonan,</p>
                                <p>2. Proses Persetujuan, </p>
                                <p>3. Disetujui/Acc.</p>


                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                            <div class="feature-block">

                                <img src="<?php echo base_url() ?>assets/front-user/img/svg/planet.svg" alt="img">
                                <h4>Perpanjangan Kerjasama</h4>
                                <p>1. Pengajuan Permohonan,</p>
                                <p>2. Disetujui/Acc.</p>


                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                            <div class="feature-block">

                                <img src="<?php echo base_url() ?>assets/front-user/img/svg/asteroid.svg" alt="img">
                                <h4>Daftar Mitra Kerjasama</h4>
                                <p>Daftar nama instansi yang terdaftar sebagai mitra.</p>


                            </div>
                        </div>

                    </div>
                </div>

        </section><!-- End Get Started Section -->

        <!-- ======= Proses Section ======= -->
        <section id="proses" class="padd-section text-center">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center">
                    <h2>Awal Kerjasama</h2>
                    <p class="separator">Pengajuan Permohonan - Proses - Disetujui / Acc.</p>
                </div>

                <?php echo $this->session->flashdata('pesan') ?>

                <form method="post" action="<?php echo base_url('main/awalkerjasama') ?>" enctype="multipart/form-data">
                    <p class="separator" style="text-align: left;">Pengajuan Permohonan </p>

                    <div class="form-group" style="text-align: left;">
                        <label for="username">Nama Instansi</label>
                        <input required type="text" class="form-control" id="username" name="mitra" required="">
                        <small>Masukkan nama instansi</small>
                    </div>

                    <br>

                    <div class="form-group" style="text-align: left;">
                        <label for="No_Naskah">Nomer Naskah</label>
                        <input required type="text" class="form-control" id="No_Naskah" name="no_naskah" required="">
                        <small>Masukkan nomor naskah</small>
                    </div>

                    <br>

                    <div class="form-group" style="text-align: left;">
                        <label for="judul">Judul</label>
                        <input required type="text" class="form-control" id="judul" name="judul" required="">
                        <small>Masukkan judul</small>
                    </div>

                    <br>

                    <div class="form-group" style="text-align: left;">
                        <label for="kepentingan">Kepentingan</label>
                        <textarea name="kepentingan" class="form-control" placeholder="Masukkan kepetingan . . ."></textarea>
                        <!-- <input required type="text" class="form-control" id="kepentingan" name="kepentingan"> -->
                        <small id="kepentingan" class="form-text text-muted">Harap masukkan kepentingan instansi selengkap-lengkapnya.</small>
                    </div><br>

                    <div class="from-group" style="text-align: left;">
                        <label class="control-label">Upload File</label>
                        <input type="file" name="file" required>
                    </div><br>

                    <div class="from-group" style="text-align: left;">
                        <input type="submit" name="send" value="Tambah" class="btn btn-primary btn-sm" style="border-radius: 25px;">
                        <!-- <a href="index.php?page= from-employee" class="btn btn-danger btn-sm" style="border-radius: 25px;">Batal</a> -->
                        <input type="reset" name="reset" value="Reset" class="btn btn-warning btn-sm" style="border-radius: 25px;">
                    </div><br>
                </form>


            </div>

        </section><!-- End proses Section -->

        <!-- ======= Screenshots Section ======= -->
        <section id="screenshots" class="padd-section text-center">
            <div class="container" data-aos="fade-up">
                <div class="section-title text-center">
                    <h2>Perpanjangan Kerjasama</h2>
                    <p class="separator">Pengajuan Permohonan - Disetujui / Acc.</p>
                </div>

                <form method="post" action="#!" enctype="multipart/form-data">
                    <p class="separator" style="text-align: left;">Pengajuan Permohonan </p>

                    <div class="form-group" style="text-align: left;">
                        <label for="username">Nama Instansi</label>
                        <input required type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="form-group" style="text-align: left;">
                        <label for="No_Naskah">Nomer Naskah</label>
                        <input required type="text" class="form-control" id="No_Naskah" name="No_Naskah">
                    </div>

                    <div class="form-group" style="text-align: left;">
                        <label for="judul">Judul</label>
                        <input required type="text" class="form-control" id="judul" name="judul">
                    </div><br>

                    <div class="form-group" style="text-align: left;">
                        <label for="kepentingan">Kepentingan</label>
                        <input required type="text" class="form-control" id="kepentingan" name="kepentingan">
                        <small id="kepentingan" class="form-text text-muted">Harap masukkan kepentingan instansi selengkap-lengkapnya.</small>
                    </div><br>

                    <div class="from-group" style="text-align: left;">
                        <label class="control-label">Upload File</label>
                        <input type="file" name="file" required>
                    </div><br>

                    <div class="from-group" style="text-align: left;">
                        <input id="perpanjangan" type="submit" name="send" value="Tambah" class="btn btn-primary btn-sm" style="border-radius: 25px;">
                        <a href="index.php?page= from-employee" class="btn btn-danger btn-sm" style="border-radius: 25px;">Batal</a>
                        <input type="reset" name="reset" value="Reset" class="btn btn-warning btn-sm" style="border-radius: 25px;">
                    </div><br>
                </form>


            </div>

        </section><!-- End Screenshots Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="padd-section">

            <div class="container" data-aos="fade-up">
                <div class="section-title text-center">
                    <h2>Contact</h2>
                </div>

                <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-3 col-md-4">

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <p>bag-kerjasama@malangkab.go.id</p>
                        </div>

                        <div>
                            <i class="bi bi-phone"></i>
                            <p>0341392029</p>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    </div>

                </div>


            </div>
            </div>
        </section><!-- End Contact Section -->

</main><!-- End #main -->