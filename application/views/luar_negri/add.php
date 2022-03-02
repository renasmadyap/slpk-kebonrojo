<script>
function sum(){
	var ems_doc = document.getElementById('ems_doc').value;
	var ems_brg = document.getElementById('ems_brg').value;
	var ems = parseInt(ems_doc) + parseInt(ems_brg);
	if (!isNaN(ems)){
	document.getElementById('ems_jml').value = ems;}

	var pos_expt_doc = document.getElementById('pos_expt_doc').value;
	var pos_expt_brg = document.getElementById('pos_expt_brg').value;
	var pos_expt = parseInt(pos_expt_doc) + parseInt(pos_expt_brg);
	if (!isNaN(pos_expt)){
	document.getElementById('pos_expt_jml').value = pos_expt;}

    var pp_cpt_doc = document.getElementById('pp_cpt_doc').value;
	var pp_cpt_brg = document.getElementById('pp_cpt_brg').value;
	var pp_cpt = parseInt(pp_cpt_doc) + parseInt(pp_cpt_brg);
	if (!isNaN(pp_cpt)){
	document.getElementById('pp_cpt_jml').value = pp_cpt;}

    var pp_laut_doc = document.getElementById('pp_laut_doc').value;
	var pp_laut_brg = document.getElementById('pp_laut_brg').value;
	var pp_laut = parseInt(pp_laut_doc) + parseInt(pp_laut_brg);
	if (!isNaN(pp_laut)){
	document.getElementById('pp_laut_jml').value = pp_laut;}

    var r_ln_doc = document.getElementById('r_ln_doc').value;
	var r_ln_brg = document.getElementById('r_ln_brg').value;
	var r_ln = parseInt(r_ln_doc) + parseInt(r_ln_brg);
	if (!isNaN(r_ln)){
	document.getElementById('r_ln_jml').value = r_ln;}

    var e_pack_doc = document.getElementById('e_pack_doc').value;
	var e_pack_brg = document.getElementById('e_pack_brg').value;
	var e_pack = parseInt(e_pack_doc) + parseInt(e_pack_brg);
	if (!isNaN(e_pack)){
	document.getElementById('e_pack_jml').value = e_pack;}

    var lain_doc = document.getElementById('lain_doc').value;
	var lain_brg = document.getElementById('lain_brg').value;
	var lain = parseInt(lain_doc) + parseInt(lain_brg);
	if (!isNaN(lain)){
	document.getElementById('lain_jml').value = lain;}

	var ems_doc = document.getElementById('ems_doc').value;
	var pos_expt_doc = document.getElementById('pos_expt_doc').value;
    var pp_cpt_doc = document.getElementById('pp_cpt_doc').value;
    var pp_laut_doc = document.getElementById('pp_laut_doc').value;
    var r_ln_doc = document.getElementById('r_ln_doc').value;
    var e_pack_doc = document.getElementById('e_pack_doc').value;
    var lain_doc = document.getElementById('lain_doc').value;
	var doc = parseInt(ems_doc) + parseInt(pos_expt_doc) + parseInt(pp_cpt_doc) + parseInt(pp_laut_doc) + parseInt(r_ln_doc) + parseInt(e_pack_doc) + parseInt(lain_doc);
	if (!isNaN(doc)){
	document.getElementById('jml_doc').value = doc;}
    
    var ems_brg = document.getElementById('ems_brg').value;
	var pos_expt_brg = document.getElementById('pos_expt_brg').value;
    var pp_cpt_brg = document.getElementById('pp_cpt_brg').value;
    var pp_laut_brg = document.getElementById('pp_laut_brg').value;
    var r_ln_brg = document.getElementById('r_ln_brg').value;
    var e_pack_brg = document.getElementById('e_pack_brg').value;
    var lain_brg = document.getElementById('lain_brg').value;
	var brg = parseInt(ems_brg) + parseInt(pos_expt_brg) + parseInt(pp_cpt_brg) + parseInt(pp_laut_brg) + parseInt(r_ln_brg) + parseInt(e_pack_brg) + parseInt(lain_brg);
	if (!isNaN(brg)){
	document.getElementById('jml_brg').value = brg;}

    var ems_jml = document.getElementById('ems_jml').value;
	var pos_expt_jml = document.getElementById('pos_expt_jml').value;
    var pp_cpt_jml = document.getElementById('pp_cpt_jml').value;
    var pp_laut_jml = document.getElementById('pp_laut_jml').value;
    var r_ln_jml = document.getElementById('r_ln_jml').value;
    var e_pack_jml = document.getElementById('e_pack_jml').value;
    var lain_jml = document.getElementById('lain_jml').value;
	var total = parseInt(ems_jml) + parseInt(pos_expt_jml) + parseInt(pp_cpt_jml) + parseInt(pp_laut_jml) + parseInt(r_ln_jml) + parseInt(e_pack_jml) + parseInt(lain_jml);
	if (!isNaN(total)){
	document.getElementById('total').value = total;}
}
</script>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-danger">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                            Form Entry Data P.U Luar Negeri
                        </h4>
                        <div class="col-auto">
                        <a href="<?= base_url('puln') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open('', [], ['total' => 0]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nippos">Nippos</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nippos', $_SESSION['nippos']); ?>" name="nippos" readonly="readonly" id="nippos" type="text" class="form-control" placeholder="Nippos...">
                        <?= form_error('nippos', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_petugas">Nama Petugas</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_petugas', $_SESSION['nama_petugas']); ?>" name="nama_petugas" id="nama_petugas" type="text" readonly="readonly" class="form-control" placeholder="Nama Petugas...">
                        <?= form_error('nama_petugas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="mitra">Nama Mitra </label>
                    <div class="col-md-9">
                        <?= set_value('mitra'); ?>
                        <select name="mitra_id" id="mitra_id" class="custom-select">
                                <option value="" selected disabled>Pilih Mitra</option>
                                <?php foreach ($mitra as $m) : ?>
                                    <option <?= set_select('mitra', $m['id_mitra']) ?> value="<?= $m['id_mitra'] ?>"><?= $m['nama_mitra']. ' | '. $m['wilayah'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        <?= form_error('mitra', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_po">No. P.O.</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_po'); ?>" name="no_po" id="no_po" type="number" class="form-control" placeholder="NO. P.O....">
                        <?= form_error('no_po', '<small class="text-danger">', '</small>'); ?>
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
                    <label class="col-md-3 text-md-right" for="tgl_masuk">Tanggal Entry</label>
                    <div class="col-md-9">
                        <input value="<?= date('d/m/Y'); ?>" type="text" readonly="readonly" class="form-control" placeholder="Tanggal Masuk...">
                        <input value="<?= set_value('tgl_masuk', date('Y-m-d')); ?>" name="tgl_masuk" id="tgl_masuk" type="hidden" readonly="readonly" class="form-control" placeholder="Tanggal Masuk...">
                        <?= form_error('tgl_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jam_input">Jam Entry</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jam_input', date('H:i:s')); ?>" name="jam_input" id="jam_input" readonly="readonly" type="text" class="form-control time" placeholder="Jam Entry...">
                        <?= form_error('jam_input', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="">Jumlah Kiriman :</label>
					<label class="col-md-3 text-md-left" for="">Dokumen :</label>
					<label class="col-md-3 text-md-left" for="">Barang :</label>
					<label class="col-md-3 text-md-left" for="">Jumlah :</label>
				</div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ems">EMS</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('ems_doc',0); ?>" name="ems_doc" id="ems_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('ems_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('ems_brg',0); ?>" name="ems_brg" id="ems_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('ems_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('ems_jml',0); ?>" name="ems_jml" id="ems_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('ems_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pos_expt">POS EXPORT</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pos_expt_doc',0); ?>" name="pos_expt_doc" id="pos_expt_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('pos_expt_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_expt_brg',0); ?>" name="pos_expt_brg" id="pos_expt_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('pos_expt_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_expt_jml',0); ?>" name="pos_expt_jml" id="pos_expt_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pos_expt_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pp_cpt">PP CEPAT</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pp_cpt_doc',0); ?>" name="pp_cpt_doc" id="pp_cpt_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('pp_cpt_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pp_cpt_brg',0); ?>" name="pp_cpt_brg" id="pp_cpt_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('pp_cpt_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pp_cpt_jml',0); ?>" name="pp_cpt_jml" id="pp_cpt_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pp_cpt_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pp_laut">pp_laut</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pp_cpt_doc',0); ?>" name="pp_laut_doc" id="pp_laut_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('pp_laut_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pp_laut_brg',0); ?>" name="pp_laut_brg" id="pp_laut_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('pp_laut_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pp_laut_jml',0); ?>" name="pp_laut_jml" id="pp_laut_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pp_laut_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="r_ln_">R-LN</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('r_ln_doc',0); ?>" name="r_ln_doc" id="r_ln_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('r_ln_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('r_ln_brg',0); ?>" name="r_ln_brg" id="r_ln_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('r_ln_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('r_ln_jml',0); ?>" name="r_ln_jml" id="r_ln_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('r_ln_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="e_pack">E-PACKET</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('e_pack_doc', 0); ?>" name="e_pack_doc" id="e_pack_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('e_pack_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('e_pack_brg', 0); ?>" name="e_pack_brg" id="e_pack_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('e_pack_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('e_pack_jml', 0); ?>" name="e_pack_jml" id="e_pack_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('e_pack_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="lain">LAINNYA</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('lain_doc',0); ?>" name="lain_doc" id="lain_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('lain_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_brg',0); ?>" name="lain_brg" id="lain_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_jml',0); ?>" name="lain_jml" id="lain_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jml">JUMLAH</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('jml_doc',0); ?>" name="jml_doc" id="jml_doc" type="number" readonly="readonly" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('jml_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('jml_brg',0); ?>" name="jml_brg" id="jml_brg" type="number" readonly="readonly" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('jml_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('total',0); ?>" name="total" id="total" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
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