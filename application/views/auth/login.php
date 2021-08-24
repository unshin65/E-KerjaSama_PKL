<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-3">
                                <div class="p-3">
                                    <div class="text-center">

                                        <img src=<?= base_url('assets/img/profile/logo_kabmalang.png') ?>>
                                    </div>
                                </div>
                                <div class="text-center bg-gray-200">
                                    <h6 class=" text-danger mb-4">Masukkan Nomer Induk Pegawai <br> dan Password !</h6>

                                </div>


                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control" id="nip" name="nip" placeholder="Nomer Induk Pegawai" value="<?= set_value('nip'); ?>">
                                        <?= form_error('nip', '<small class="text-danger pl-3" >', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3" >', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-success  btn-block mb-3 lg-4">
                                        Login
                                    </button>


                                </form>
                                <hr>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>