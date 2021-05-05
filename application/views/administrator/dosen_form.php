<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Dosen
    </div>

    <?php echo form_open_multipart('administrator/dosen/tambah_dosen_aksi') ?>

    <div class="form-group">
        <label>NIDN</label>
        <input type="text" name="nidn" class="form-control">
        <?php echo form_error('nidn', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Nama Dosen</label>
        <input type="text" name="nama_dosen" class="form-control">
        <?php echo form_error('nama_dosen', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">
        <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="">--Pilih Jenis Kelamin--</option>
            <option>Laki-Laki</option>
            <option>Perempuan</option>
        </select>
        <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
        <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>No. Telepon</label>
        <input type="text" name="telp" class="form-control">
        <?php echo form_error('telp', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Foto</label><br>
        <input type="file" name="photo">
    </div>

    <button type="submit" class="btn btn-primary mb-3 mt-3">Simpan</button>


    <?php form_close(); ?>
</div>