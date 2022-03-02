<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-danger">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                            Form Edit Mitra
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('mitra') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['id_mitra' => $mitra['id_mitra']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_mitra">Nama Mitra</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_mitra', $mitra['nama_mitra']); ?>" name="nama_mitra" id="nama_mitra" type="text" class="form-control" placeholder="Nama Mitra...">
                        <?= form_error('nama_mitra', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="wilayah">Wilayah</label>
                    <div class="col-md-9">
                        <div class="custom-control custom-radio">
                            <input <?= $mitra['wilayah'] == 'SBU' ? 'checked' : ''; ?> <?= set_radio('wilayah', 'SBU','SDA'); ?> value="SBU" type="radio" id="SBU" name="wilayah" class="custom-control-input">
                            <label class="custom-control-label" for="SBU">SBU</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $mitra['wilayah'] == 'SBS' ? 'checked' : ''; ?> <?= set_radio('wilayah', 'SBS','SDA'); ?> value="SBS" type="radio" id="SBS" name="wilayah" class="custom-control-input">
                            <label class="custom-control-label" for="SBS">SBS</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $mitra['wilayah'] == 'SDA' ? 'checked' : ''; ?> <?= set_radio('wilayah', 'SBS','SDA'); ?> value="SDA" type="radio" id="SDA" name="wilayah" class="custom-control-input">
                            <label class="custom-control-label" for="SDA">SDA</label>
                        </div>
                        <?= form_error('wilayah', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="alamat">Alamat</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('alamat', $mitra['alamat']); ?>" name="alamat" id="alamat" type="text" class="form-control" placeholder="Alamat...">
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-danger">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>