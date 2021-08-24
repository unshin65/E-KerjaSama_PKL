<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row ">
        <div class="col-lg-10">

            <?= form_error('name', '<div class="text-danger pl-3" >', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <!--susunan tabel-->

            <a href="" class="btn btn-primary mb-3 lg-4" data-toggle="modal" data-target="#newUserModal">
                + Pengguna</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Hapus</th>



                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>

                    <?php foreach ($name as $n) : ?>

                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td scope="row"><?= $n['name']; ?></td>
                            <td scope="row"><?= $n['nip']; ?></td>

                            <td>
                                <!--tombol delete-->

                                <a href="<?= base_url(); ?>hapus_user/hapus/<?= $n['nip']; ?>" class="btn btn-danger mb-3" onclick="return confirm('apakah ingin menghapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>



    <!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->



<!-- modal -->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModallabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exempleModal Label">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- untuk bodynya -->
            <form class="user" method="POST" action="<?= base_url('Tambah/pengguna'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control  " id="name" name="name" placeholder="Nama" value="<?= set_value('name'); ?>">
                        <?= form_error('name', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control  " id="nip" name="nip" placeholder="Nip" value="<?= set_value('nip'); ?>">
                        <?= form_error('nip', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control  " id="status" name="status" placeholder="Status" value="<?= set_value('status'); ?>">
                        <?= form_error('status', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control  " id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
                        <?= form_error('alamat', '<small class="text-danger pl-3" >', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3" >', '</small>'); ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        close
                    </button>
                    <button type="submit" class="btn btn-primary ">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>