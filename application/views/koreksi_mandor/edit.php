<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'db_slpk');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();}
$id_koreksi = $mandor_koreksi['id_koreksi'];
$mitra_id = $mandor_koreksi['mitra_id'];
$nama_mitra=mysqli_query($con,"select * from mitra m JOIN mandor_koreksi mk ON m.id_mitra = mk.mitra_id WHERE mk.mitra_id = '$mitra_id' and mk.id_koreksi = '$id_koreksi'");
?>
<script>
function sum(){
	var one = document.getElementById('instan_doc').value;
	var two = document.getElementById('instan_brg').value;
	var result = parseInt(one) + parseInt(two);
	if (!isNaN(result)){
	document.getElementById('instan_jml').value = result;}
	var pos1 = document.getElementById('pos_exp_doc').value;
	var pos2 = document.getElementById('pos_exp_brg').value;
	var result1 = parseInt(pos1) + parseInt(pos2);
	if (!isNaN(result1)){
	document.getElementById('pos_exp_jml').value = result1;}
	var pkh1 = document.getElementById('pkh_doc').value;
	var pkh2 = document.getElementById('pkh_brg').value;
	var result2 = parseInt(pkh1) + parseInt(pkh2);
	if (!isNaN(result2)){
	document.getElementById('pkh_jml').value = result2;}
	var perlaksus1 = document.getElementById('perlaksus_doc').value;
	var perlaksus2 = document.getElementById('perlaksus_brg').value;
	var result3 = parseInt(perlaksus1) + parseInt(perlaksus2);
	if (!isNaN(result3)){
	document.getElementById('perlaksus_jml').value = result3;}
	var log1 = document.getElementById('log_doc').value;
	var log2 = document.getElementById('log_brg').value;
	var result4 = parseInt(log1) + parseInt(log2);
	if (!isNaN(result4)){
	document.getElementById('log_jml').value = result4;}
	var lain1 = document.getElementById('lain_doc').value;
	var lain2 = document.getElementById('lain_brg').value;
	var result5 = parseInt(lain1) + parseInt(lain2);
	if (!isNaN(result5)){
	document.getElementById('lain_jml').value = result5;}
	var doc1 = document.getElementById('instan_doc').value;
	var doc2 = document.getElementById('pos_exp_doc').value;
	var doc3 = document.getElementById('pkh_doc').value;
	var doc4 = document.getElementById('perlaksus_doc').value;
	var doc5 = document.getElementById('log_doc').value;
	var doc6 = document.getElementById('lain_doc').value;
	var result6 = parseInt(doc1) + parseInt(doc2) + parseInt(doc3) + parseInt(doc4) + parseInt(doc5) + parseInt(doc6);
	if (!isNaN(result6)){
	document.getElementById('jml_doc').value = result6;}
	var brg1 = document.getElementById('instan_brg').value;
	var brg2 = document.getElementById('pos_exp_brg').value;
	var brg3 = document.getElementById('pkh_brg').value;
	var brg4 = document.getElementById('perlaksus_brg').value;
	var brg5 = document.getElementById('log_brg').value;
	var brg6 = document.getElementById('lain_brg').value;
	var result7 = parseInt(brg1) + parseInt(brg2) + parseInt(brg3) + parseInt(brg4) + parseInt(brg5) + parseInt(brg6);
	if (!isNaN(result7)){
	document.getElementById('jml_brg').value = result7;}
	var jml1 = document.getElementById('jml_doc').value;
	var jml2 = document.getElementById('jml_brg').value;
	var result8 = parseInt(jml1) + parseInt(jml2);
	if (!isNaN(result8)){
	document.getElementById('total').value = result8;}
}
</script>
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
                    <label class="col-md-3 text-md-right" for="nama_petugas">Nippos</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_petugas', $mandor_koreksi['nippos']); ?>" name="nama_petugas" id="nama_petugas" readonly="readonly" type="text" class="form-control" placeholder="Nama Petugas...">
                        <?= form_error('nama_petugas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_petugas">Nama Petugas</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_petugas', $mandor_koreksi['nama_petugas']); ?>" name="nama_petugas" id="nama_petugas" readonly="readonly" type="text" class="form-control" placeholder="Nama Petugas...">
                        <?= form_error('nama_petugas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="mitra">Nama Mitra </label>
                    <div class="col-md-9">
                        <?php foreach ($nama_mitra as $m) : ?>
                        <input value="<?php echo $m['nama_mitra']. ' | '. $m['wilayah'];?>" type="text" readonly="readonly" class="form-control" placeholder="Nama Mitra...">
                        <input value="<?= set_value('mitra', $mandor_koreksi['mitra_id']); ?>" name="mitra" id="mitra" type="hidden" readonly="readonly" class="form-control" placeholder="Nama Mitra...">
                        <?php endforeach; ?>
                        <?= form_error('mitra', '<small class="text-danger">', '</small>'); ?>
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
                    <label class="col-md-3 text-md-right" for="jadwal_pu">Jadwal PU KE</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jadwal_pu', $mandor_koreksi['jadwal_pu']); ?>" name="jadwal_pu" id="jadwal_pu" type="number" readonly="readonly" class="form-control" placeholder="Jadwal PU KE...">
                        <?= form_error('jadwal_pu', '<small class="text-danger">', '</small>'); ?>
                    </div>
				</div>
				<div class="row form-group">
					<label class="col-md-3 text-md-right" for="">Jumlah Kiriman :</label>
					<label class="col-md-3 text-md-left" for="">Dokumen :</label>
					<label class="col-md-3 text-md-left" for="">Barang :</label>
					<label class="col-md-3 text-md-left" for="">Jumlah :</label>
				</div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="instan">INSTAN</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('instan_doc', $mandor_koreksi['instan_doc']); ?>" name="instan_doc" id="instan_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('instan_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('instan_brg', $mandor_koreksi['instan_brg']); ?>" name="instan_brg" id="instan_brg" type="number" class="form-control" placeholder="Barang..."  onkeyup="sum();">
                        <?= form_error('instan_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('instan_jml', $mandor_koreksi['instan_jml']); ?>" name="instan_jml" id="instan_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('instan_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Pos_express">POS EXPRESS</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pos_exp_doc',$mandor_koreksi['pos_exp_doc']); ?>" name="pos_exp_doc" id="pos_exp_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('pos_exp_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_exp_brg',$mandor_koreksi['pos_exp_brg']); ?>" name="pos_exp_brg" id="pos_exp_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('pos_exp_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_exp_jml',$mandor_koreksi['pos_exp_jml']); ?>" name="pos_exp_jml" id="pos_exp_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pos_exp_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pkh">PKH</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pkh_doc',$mandor_koreksi['pkh_doc']); ?>" name="pkh_doc" id="pkh_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('pkh_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pkh_brg',$mandor_koreksi['pkh_brg']); ?>" name="pkh_brg" id="pkh_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('pkh_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pkh_jml',$mandor_koreksi['pkh_jml']); ?>" name="pkh_jml" id="pkh_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pkh_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="perlaksus">PERLAKSUS</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('perlaksus_doc',$mandor_koreksi['perlaksus_doc']); ?>" name="perlaksus_doc" id="perlaksus_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('perlaksus_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('perlaksus_brg',$mandor_koreksi['perlaksus_brg']); ?>" name="perlaksus_brg" id="perlaksus_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('perlaksus_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('perlaksus_jml',$mandor_koreksi['perlaksus_jml']); ?>" name="perlaksus_jml" id="perlaksus_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('perlaksus_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="log">LOGISTIK</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('log_doc',$mandor_koreksi['log_doc']); ?>" name="log_doc" id="log_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('log_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('log_brg',$mandor_koreksi['log_brg']); ?>" name="log_brg" id="log_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('log_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('log_jml',$mandor_koreksi['log_jml']); ?>" name="log_jml" id="log_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('log_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="lain">LAINNYA</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('lain_doc',$mandor_koreksi['lain_doc']); ?>" name="lain_doc" id="lain_doc" type="number" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('lain_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_brg',$mandor_koreksi['lain_brg']); ?>" name="lain_brg" id="lain_brg" type="number" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_jml',$mandor_koreksi['lain_jml']); ?>" name="lain_jml" id="lain_jml" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jml">JUMLAH</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('jml_doc',$mandor_koreksi['jml_doc']); ?>" name="jml_doc" id="jml_doc" type="number" readonly="readonly" class="form-control" placeholder="Dokumen..." onkeyup="sum();">
                        <?= form_error('jml_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('jml_brg',$mandor_koreksi['jml_brg']); ?>" name="jml_brg" id="jml_brg" type="number" readonly="readonly" class="form-control" placeholder="Barang..." onkeyup="sum();">
                        <?= form_error('jml_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('total',$mandor_koreksi['total']); ?>" name="total" id="total" type="number" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('total', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-danger">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>