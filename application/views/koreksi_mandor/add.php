<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-danger">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                            Form Entry Data P.U Dalam Negeri
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('koreksi') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['total' => 0]); ?>
                
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_petugas">Nama Petugas</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_petugas'); ?>" name="nama_petugas" id="nama_petugas" type="text" class="form-control" placeholder="Nama Petugas...">
                        <?= form_error('nama_petugas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="mitra">Nama Mitra </label>
                    <div class="col-md-9">
                        <input value="<?= set_value('mitra'); ?>" name="mitra" id="mitra" type="text" class="form-control" placeholder="Nama Petugas...">
                        <?= form_error('mitra', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jadwal_pu">Jadwal PU KE</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jadwal_pu'); ?>" name="jadwal_pu" id="jadwal_pu" type="number" class="form-control" placeholder="Jadwal PU KE...">
                        <?= form_error('jadwal_pu', '<small class="text-danger">', '</small>'); ?>
                    </div>
				</div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tgl_masuk">Tanggal Koreksi</label>
                    <div class="col-md-9">
                        <input value="<?= date('d/m/Y'); ?>" type="text" readonly="readonly" class="form-control" placeholder="Tanggal Masuk...">
                        <input value="<?= set_value('tgl_masuk', date('Y-m-d')); ?>" name="tgl_masuk" id="tgl_masuk" type="hidden" readonly="readonly" class="form-control" placeholder="Tanggal Masuk...">
                        <?= form_error('tgl_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="icode">Koreksi Data :</label>
				</div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="instan">INSTAN</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('instan_doc'); ?>" name="instan_doc" id="instan_doc" type="number" class="form-control" placeholder="Dokumen...">
                        <?= form_error('instan_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('instan_brg'); ?>" name="instan_brg" id="instan_brg" type="number" class="form-control" placeholder="Barang...">
                        <?= form_error('instan_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('instan_jml'); ?>" name="instan_jml" id="instan_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('instan_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Pos_express">POS EXPRESS</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pos_exp_doc'); ?>" name="pos_exp_doc" id="pos_exp_doc" type="number" class="form-control" placeholder="Dokumen...">
                        <?= form_error('pos_exp_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_exp_brg'); ?>" name="pos_exp_brg" id="pos_exp_brg" type="number" class="form-control" placeholder="Barang...">
                        <?= form_error('pos_exp_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_exp_jml'); ?>" name="pos_exp_jml" id="pos_exp_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pos_exp_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pkh">PKH</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pkh_doc'); ?>" name="pkh_doc" id="pkh_doc" type="number" class="form-control" placeholder="Dokumen...">
                        <?= form_error('pkh_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pkh_brg'); ?>" name="pkh_brg" id="pkh_brg" type="number" class="form-control" placeholder="Barang...">
                        <?= form_error('pkh_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pkh_jml'); ?>" name="pkh_jml" id="pkh_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pkh_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="perlaksus">PERLAKSUS</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('perlaksus_doc'); ?>" name="perlaksus_doc" id="perlaksus_doc" type="number" class="form-control" placeholder="Dokumen...">
                        <?= form_error('perlaksus_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('perlaksus_brg'); ?>" name="perlaksus_brg" id="perlaksus_brg" type="number" class="form-control" placeholder="Barang...">
                        <?= form_error('perlaksus_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('perlaksus_jml'); ?>" name="perlaksus_jml" id="perlaksus_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('perlaksus_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="log">LOGISTIK</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('log_doc'); ?>" name="log_doc" id="log_doc" type="number" class="form-control" placeholder="Dokumen...">
                        <?= form_error('log_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('log_brg'); ?>" name="log_brg" id="log_brg" type="number" class="form-control" placeholder="Barang...">
                        <?= form_error('log_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('log_jml'); ?>" name="log_jml" id="log_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('log_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="lain">LAINNYA</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('lain_doc'); ?>" name="lain_doc" id="lain_doc" type="number" class="form-control" placeholder="Dokumen...">
                        <?= form_error('lain_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_brg'); ?>" name="lain_brg" id="lain_brg" type="number" class="form-control" placeholder="Barang...">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_jml'); ?>" name="lain_jml" id="lain_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jml">JUMLAH</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('jml_doc'); ?>" name="jml_doc" id="jml_doc" type="number" readonly="readonly" class="form-control" placeholder="Dokumen...">
                        <?= form_error('jml_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('jml_brg'); ?>" name="jml_brg" id="jml_brg" type="number" readonly="readonly" class="form-control" placeholder="Barang...">
                        <?= form_error('jml_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('total'); ?>" name="total" id="total" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('total', '<small class="text-danger">', '</small>'); ?>
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