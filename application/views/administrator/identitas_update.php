<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Identitas
    </div>

    <?php foreach ($identitas as $id) : ?>

        <form method="post" action="<?php echo base_url('administrator/identitas/update_aksi') ?>">
            <div class="form-group">
                <label>Judul Website</label>
                <input type="hidden" name="id_identitas" class="form-control" value="<?php echo $id->id_identitas ?>">
                <input type="text" name="judul_website" class="form-control" value="<?php echo $id->judul_website ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $id->alamat ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $id->email ?>">
            </div>

            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telp" class="form-control" value="<?php echo $id->telp ?>">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    <?php endforeach; ?>

</div>