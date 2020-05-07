 <div class="container">
    <div class="row mt-3">
        <div class="col md-6">
            <div class="card">
                <div class="card-header text-center">
                    Form Ubah Data 
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $dokter['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama') ?>.</small>
                        </div>
                        <div class="form-group">
                            <label for="jeniskelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jeniskelamin" name="jeniskelamin" value="<?= $dokter['jeniskelamin']; ?>">
                            <small class="form-text text-danger"><?= form_error('jeniskelamin') ?>.</small>
                        </div>
                         <div class="form-group">
                            <label for="text">Alamat</label>
                            <input type="text" class="form-control" id="alamt" name="alamat" value="<?= $dokter['alamat']; ?>">
                            <small class="form-text text-danger"><?= form_error('alamat') ?>.</small>
                        </div>
                         <div class="form-group">
                            <label for="text">Spesialis</label>
                            <input type="text" class="form-control" id="spesialis" name="spesialis" value="<?= $dokter['spesialis']; ?>">
                            <small class="form-text text-danger"><?= form_error('spesialis') ?>.</small>
                        </div>

                        <div class="form-group">
                            <label for="text">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $dokter['email']; ?>">
                            <small class="form-text text-danger"><?= form_error('email') ?>.</small>
                        </div>

                         <div class="form-group">
                            <label for="text">Telepon</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $dokter['telp']; ?>">
                            <small class="form-text text-danger"><?= form_error('telp') ?>.</small>
                        </div>


                        <div class="form-group">
                            <label for="jurusan">Username</label>
                            <select class="form-control" id="username" name="username">
                                <?php foreach ($username as $i) : ?>
                                <?php if ($i == $dokter['username']) : ?>
                                <option value="<?= $i; ?>" selected><?= $i; ?></option>
                                <?php else : ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div> 