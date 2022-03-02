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
$id_pu_ln = $pu_ln['id_pu_ln'];
$mitra_id = $pu_ln['mitra_id'];
$nama_mitra=mysqli_query($con,"select * from mitra m JOIN pu_ln ln ON m.id_mitra = ln.mitra_id WHERE ln.mitra_id = '$mitra_id' and ln.id_pu_ln = '$id_pu_ln'");
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-danger">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                            Detail Data P.U Luar Negeri
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
                        <input value="<?= set_value('nama_petugas', $pu_ln['nama_petugas']); ?>" name="nama_petugas" readonly="readonly" id="nama_petugas" type="text" class="form-control" placeholder="Nama Petugas...">
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
                    <label class="col-md-3 text-md-right" for="no_po">No. P.O.</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('no_po', $pu_ln['no_po']); ?>" name="no_po" id="no_po" readonly="readonly" type="text" class="form-control" placeholder="NO. P.O....">
                        <?= form_error('no_po', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jadwal_pu">Jadwal PU KE</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('jadwal_pu', $pu_ln['jadwal_pu']); ?>" name="jadwal_pu" readonly="readonly" id="jadwal_pu" type="text" class="form-control" placeholder="Jadwal PU KE...">
                        <?= form_error('jadwal_pu', '<small class="text-danger">', '</small>'); ?>
                    </div>
				</div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tgl_masuk">Tanggal Masuk</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('tgl_masuk', date('Y-m-d'), $pu_ln['tgl_masuk']); ?>" name="tgl_masuk" readonly="readonly" id="tgl_masuk" type="date" class="form-control time" placeholder="Tanggal Masuk...">
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
                        <input value="<?= set_value('ems_doc', $pu_ln['ems_doc']); ?>" name="ems_doc" id="ems_doc" readonly="readonly" type="text" class="form-control" placeholder="Dokumen...">
                        <?= form_error('ems_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('ems_brg', $pu_ln['ems_brg']); ?>" name="ems_brg" id="ems_brg" readonly="readonly" type="text" class="form-control" placeholder="Barang...">
                        <?= form_error('ems_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('ems_jml', $pu_ln['ems_jml']); ?>" name="ems_jml" id="ems_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('ems_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pos_expt">POS EXPORT</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pos_expt_doc', $pu_ln['pos_expt_doc']); ?>" name="pos_expt_doc" readonly="readonly" id="pos_expt_doc" type="text" class="form-control" placeholder="Dokumen...">
                        <?= form_error('pos_expt_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_expt_brg', $pu_ln['pos_expt_brg']); ?>" name="pos_expt_brg" readonly="readonly" id="pos_expt_brg" type="text" class="form-control" placeholder="Barang...">
                        <?= form_error('pos_expt_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pos_expt_jml', $pu_ln['pos_expt_jml']); ?>" name="pos_expt_jml" id="pos_expt_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pos_expt_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pp_cpt">PP CEPAT</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pp_cpt_doc', $pu_ln['pp_cpt_doc']); ?>" name="pp_cpt_doc" readonly="readonly" id="pp_cpt_doc" type="text" class="form-control" placeholder="Dokumen...">
                        <?= form_error('pp_cpt_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pp_cpt_brg', $pu_ln['pp_cpt_brg']); ?>" name="pp_cpt_brg" readonly="readonly" id="pp_cpt_brg" type="text" class="form-control" placeholder="Barang...">
                        <?= form_error('pp_cpt_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pp_cpt_jml', $pu_ln['pp_cpt_jml']); ?>" name="pp_cpt_jml" id="pp_cpt_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pp_cpt_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="pp_laut">PP LAUT</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('pp_laut_doc', $pu_ln['pp_laut_doc']); ?>" name="pp_laut_doc" readonly="readonly" id="pp_laut_doc" type="text" class="form-control" placeholder="Dokumen...">
                        <?= form_error('pp_laut_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pp_laut_brg', $pu_ln['pp_cpt_brg']); ?>" name="pp_laut_brg" readonly="readonly" id="pp_laut_brg" type="text" class="form-control" placeholder="Barang...">
                        <?= form_error('pp_laut_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('pp_laut_jml', $pu_ln['pp_cpt_jml']); ?>" name="pp_laut_jml" id="pp_laut_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('pp_laut_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="r_ln_">R-LN</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('r_ln_doc', $pu_ln['r_ln_doc']); ?>" name="r_ln_doc" readonly="readonly" id="r_ln_doc" type="text" class="form-control" placeholder="Dokumen...">
                        <?= form_error('r_ln_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('r_ln_brg', $pu_ln['r_ln_brg']); ?>" name="r_ln_brg" readonly="readonly" id="r_ln_brg" type="text" class="form-control" placeholder="Barang...">
                        <?= form_error('r_ln_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('r_ln_jml', $pu_ln['r_ln_jml']); ?>" name="r_ln_jml" id="r_ln_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('r_ln_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="lain">LAINNYA</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('lain_doc', $pu_ln['lain_doc']); ?>" name="lain_doc" readonly="readonly" id="lain_doc" type="text" class="form-control" placeholder="Dokumen...">
                        <?= form_error('lain_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_brg', $pu_ln['lain_brg']); ?>" name="lain_brg" readonly="readonly" id="lain_brg" type="text" class="form-control" placeholder="Barang...">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('lain_jml', $pu_ln['lain_jml']); ?>" name="lain_jml" id="lain_jml" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('lain_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="jml">JUMLAH</label>
                    <div class="col-md-3">
                        <input value="<?= set_value('jml_doc', $pu_ln['jml_doc']); ?>" name="jml_doc" id="jml_doc" readonly="readonly" type="text" readonly="readonly" class="form-control" placeholder="Dokumen...">
                        <?= form_error('jml_doc', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('jml_brg', $pu_ln['jml_brg']); ?>" name="jml_brg" id="jml_brg" readonly="readonly" type="text" readonly="readonly" class="form-control" placeholder="Barang...">
                        <?= form_error('jml_brg', '<small class="text-danger">', '</small>'); ?>
                    </div>
					<div class="col-md-3">
                        <input value="<?= set_value('total', $pu_ln['total']); ?>" name="total" id="total" type="text" readonly="readonly" class="form-control" placeholder="Jumlah...">
                        <?= form_error('total', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>