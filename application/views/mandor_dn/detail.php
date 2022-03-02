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
$id_pu_dn = $pu_dn['id_pu_dn'];
$mitra_id = $pu_dn['mitra_id'];
$nama_mitra=mysqli_query($con,"select * from mitra m JOIN pu_dn dn ON m.id_mitra = dn.mitra_id WHERE dn.mitra_id = '$mitra_id' and dn.id_pu_dn = '$id_pu_dn'");
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-danger">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                            Form Detail Data P.U Negeri
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('mandordn') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                    <label class="col-md-3 text-md-right" for="nippos">Nippos</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nippos', $pu_dn['nippos']); ?>" name="nippos" readonly="readonly" id="nippos" type="text" class="form-control" placeholder="Nippos...">
                        <?= form_error('nippos', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_petugas">Nama Petugas</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_petugas', $pu_dn['nama_petugas']); ?>" name="nama_petugas" readonly="readonly" id="nama_petugas" type="text" class="form-control" placeholder="Nama Petugas...">
                        <?= form_error('nama_petugas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="mitra">Nama Mitra </label>
                    <div class="col-md-9">
                    <?php foreach ($nama_mitra as $m) : ?>
                        <input value="<?php echo $m['nama_mitra']. ' | '. $m['wilayah'];?>" name="mitra" id="mitra" type="text" readonly="readonly" class="form-control" placeholder="Nama Mitra...">
                        <?php endforeach; ?>
                        <?= form_error('mitra', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tgl_masuk">Tanggal Entry</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('tgl_masuk', $pu_dn['tgl_masuk']); ?>" name="tgl_masuk" readonly="readonly" id="tgl_masuk" type="date" class="form-control time" placeholder="Tanggal Masuk...">
                        <?= form_error('tgl_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tgl_masuk">Jam Entry</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('tgl_masuk', $pu_dn['jam_input']); ?>" name="tgl_masuk" readonly="readonly" id="tgl_masuk" type="text" class="form-control time" placeholder="Tanggal Masuk...">
                        <?= form_error('tgl_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="no_po">No. P.O.</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_po', $pu_dn['no_po']); ?>" name="no_po" id="no_po" type="text" readonly="readonly" class="form-control" placeholder="NO. P.O....">
                        <?= form_error('no_po', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jadwal_pu">Jadwal PU KE</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jadwal_pu', $pu_dn['jadwal_pu']); ?>" name="jadwal_pu" id="jadwal_pu" type="text" readonly="readonly" class="form-control" placeholder="Jadwal PU KE...">
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
                        <input value="<?= set_value('instan_doc', $pu_dn['instan_doc']); ?>" name="instan_doc" id="instan_doc" type="text" readonly="readonly" class="form-control" placeholder="Dokumen...">
                        <?= form_error('instan_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('instan_brg', $pu_dn['instan_brg']); ?>" name="instan_brg" id="instan_brg" type="text" readonly="readonly" class="form-control" placeholder="Barang...">
                        <?= form_error('instan_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('instan_jml', $pu_dn['instan_jml']); ?>" name="instan_jml" id="instan_jml" type="text" readonly="readonly" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('instan_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Pos_express">POS EXPRESS</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pos_exp_doc', $pu_dn['pos_exp_doc']); ?>" name="pos_exp_doc" id="pos_exp_doc" type="text" readonly="readonly" class="form-control" placeholder="Dokumen...">
                        <?= form_error('pos_exp_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_exp_brg', $pu_dn['pos_exp_brg']); ?>" name="pos_exp_brg" id="pos_exp_brg" type="text" readonly="readonly" class="form-control" placeholder="Barang...">
                        <?= form_error('pos_exp_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_exp_jml', $pu_dn['pos_exp_jml']); ?>" name="pos_exp_jml" id="pos_exp_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pos_exp_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pkh">PKH</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pkh_doc', $pu_dn['pkh_doc']); ?>" name="pkh_doc" id="pkh_doc" type="text" readonly="readonly" class="form-control" placeholder="Dokumen...">
                        <?= form_error('pkh_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pkh_brg', $pu_dn['pkh_brg']); ?>" name="pkh_brg" id="pkh_brg" type="text" readonly="readonly" class="form-control" placeholder="Barang...">
                        <?= form_error('pkh_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pkh_jml',$pu_dn['pkh_jml']); ?>" name="pkh_jml" id="pkh_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pkh_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="perlaksus">PERLAKSUS</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('perlaksus_doc', $pu_dn['perlaksus_doc']); ?>" name="perlaksus_doc" id="perlaksus_doc" readonly="readonly" type="text" class="form-control" placeholder="Dokumen...">
                        <?= form_error('perlaksus_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('perlaksus_brg', $pu_dn['perlaksus_brg']); ?>" name="perlaksus_brg" id="perlaksus_brg" readonly="readonly" type="text" class="form-control" placeholder="Barang...">
                        <?= form_error('perlaksus_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('perlaksus_jml', $pu_dn['perlaksus_jml']); ?>" name="perlaksus_jml" id="perlaksus_jml"  type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('perlaksus_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="log">LOGISTIK</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('log_doc',$pu_dn['log_doc']); ?>" name="log_doc" id="log_doc" type="text" readonly="readonly" class="form-control" placeholder="Dokumen...">
                        <?= form_error('log_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('log_brg',$pu_dn['log_brg']); ?>" name="log_brg" id="log_brg" type="text" readonly="readonly" class="form-control" placeholder="Barang...">
                        <?= form_error('log_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('log_jml', $pu_dn['log_jml']); ?>" name="log_jml" id="log_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('log_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="lain">LAINNYA</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('lain_doc', $pu_dn['lain_doc']); ?>" name="lain_doc" id="lain_doc" type="text" readonly="readonly" class="form-control" placeholder="Dokumen...">
                        <?= form_error('lain_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_brg', $pu_dn['lain_brg']); ?>" name="lain_brg" id="lain_brg" type="text" readonly="readonly" class="form-control" placeholder="Barang...">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_jml', $pu_dn['lain_jml']); ?>" name="lain_jml" id="lain_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('lain_jml', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jml">JUMLAH</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('jml_doc', $pu_dn['jml_doc']); ?>" name="jml_doc" id="jml_doc" type="text" readonly="readonly" class="form-control" placeholder="Dokumen...">
                        <?= form_error('jml_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('jml_brg', $pu_dn['jml_brg']); ?>" name="jml_brg" id="jml_brg" type="text" readonly="readonly" class="form-control" placeholder="Barang...">
                        <?= form_error('jml_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('total', $pu_dn['total']); ?>" name="total" id="total" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('total', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>