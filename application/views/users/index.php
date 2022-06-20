<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="Ph">

        <div class="dashboard-info">
            <!-- Page Heading -->
            <h1 class="h3  text-gray-800">Selamat datang <?= $get_user['name']; ?></h1>
            <p>Temukan buku favorit kamu hanya di <b>Pustaka Booking</b></p>
        </div>

        <hr class="sidebar-divider">


        <div class="dashboard-list__buku">
            <h3 class="text-capitalize text-dark mb-3">Buku Terpopuler</h3>
            <div class="row justify-content-arround align-content-center">
                <?php foreach ($get_buku as $gb) : ?>
                    <div class="col-lg-3 col-md-6 col-sm-10 mb-3">
                        <figure class="figure">
                            <img src="<?= base_url('/upload/' . $gb['image']); ?>" class="img-fluid buku-style">
                            <figcaption class="figure-caption text-dark pt-1"><?= $gb['judul_buku']; ?>- Cipt (<?= $gb['pengarang']; ?>)</figcaption>
                        </figure>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->