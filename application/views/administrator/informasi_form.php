<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input Data Informasi
    </div>

    <form method="POST" action=" <?php echo base_url('administrator/informasi/tambah_informasi_aksi') ?>">
        <div class="form-group">
            <label>Icon</label>
            <input type="hidden" name="id_informasi" class="form-control">
            <input type="text" name="icon" class="form-control">
            <?php echo form_error('icon', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Judul Informasi</label>
            <input type="text" name="judul_informasi" class="form-control">
            <?php echo form_error('judul_informasi', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div class="form-group">
            <label>Isi Informasi</label>
            <textarea type="text" name="isi_informasi" class="form-control" rows="3"></textarea>
            <?php echo form_error('isi_informasi', '<div class="text-danger small" ml-3>') ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>