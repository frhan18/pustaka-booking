<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Selamat datang <?= $get_user['name']; ?></h1>


    <div class="row">


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                JUMLAH ANGGOTA</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_user; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-address-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                STOK BUKU TERDAFTAR</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_book; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                BUKU DI PINJAM</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_book_dipinjam; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tag fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                BUKU DI BOOKING</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_book_dibooking; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <hr class="sidebar-divider">


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deleteConfirm(e) {
        Swal.fire({
            title: 'Delete Confirm?',
            text: 'Apakah kamu yakin menghapus anggota ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, deleted!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.assign(e.dataset.deleteUrl);
            }
        })
    }
</script>