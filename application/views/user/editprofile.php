<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center font-weight-bold"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/editprofile'); ?>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label font-weight-bold">NIP</label>
                <div class="col-sm-10">
                    <input type="nip" class="form-control" id="nip" name="nip" value="<?= $user['nip'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label font-weight-bold">Nama</label>
                <div class="col-sm-10">
                    <input type="name" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3" >', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label font-weight-bold">Alamat</label>
                <div class="col-sm-10">
                    <input type="alamat" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2 font-weight-bold">Foto</div>
                <div class="col-sm-10">
                    <!-- nama gambar -->
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?> " class="img-thumbnail">
                        </div>

                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>

                                <br>
                                <h6 class="p-1 small text-danger ">*Max 2 MB. Format gambar jpg | png | jpeg | JPG</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>

                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->