<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-danger">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="card-body pb-2">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['id_user' => $user['id_user']]); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nippos">Nippos</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nippos', $user['nippos']); ?>" type="number" id="nippos" name="nippos" class="form-control" placeholder="nippos">
                        <?= form_error('nippos', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama">Nama</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nama', $user['nama']); ?>" type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                        <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="no_telp">Nomor Telepon</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('no_telp', $user['no_telp']); ?>" type="number" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                        <?= form_error('no_telp', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="role">Role</label>
                    <div class="col-md-6">
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'admin' ? 'checked' : ''; ?> <?= set_radio('role', 'admin','mandor'); ?> value="admin" type="radio" id="admin" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="admin">Admin</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'gudang' ? 'checked' : ''; ?> <?= set_radio('role', 'gudang','mandor'); ?> value="gudang" type="radio" id="gudang" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="gudang">Gudang</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= $user['role'] == 'mandor' ? 'checked' : ''; ?> <?= set_radio('role', 'gudang','mandor'); ?> value="mandor" type="radio" id="mandor" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="mandor">Mandor</label>
                        </div>
                        <?= form_error('role', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="rute">Rute</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('rute', $user['rute']); ?>" type="number" id="rute" name="rute" class="form-control" placeholder="Rute" min="1">
                        <?= form_error('rute', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_petugas">ID Petugas</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('id_petugas', $user['id_petugas']); ?>" type="text" id="id_petugas" name="id_petugas" class="form-control" placeholder="ID Petugas">
                        <?= form_error('id_petugas', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-danger btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>