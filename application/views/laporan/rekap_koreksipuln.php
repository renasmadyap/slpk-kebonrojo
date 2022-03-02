<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Rekap Data Koreksi Luar Negeri
                </h4>                
                <h3 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Tanggal Pick-Up : <?= $_POST['tanggal'];?>
                </h3>
            </div>
            <div class="col-auto">
                    <a href="<?= base_url('laporan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
    <div class="table-responsive">
        <table class="table table-striped w-100 nowrap" id="dataTable1">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama Mitra</th>
					<th>EMS</th>
					<th>POS EXPORT</th>
					<th>PP CEPAT</th>
					<th>PP LAUT</th>
					<th>R-LN</th>
					<th>E-PACKET</th>
                    <th>LAINNYA</th>
					<th>JUMLAH</th>
                </tr>
            </thead>
            <tbody>
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
                $tanggal = $_POST['tanggal'];
                $pecah = explode(' - ', $tanggal);
                $from = date('Y-m-d', strtotime($pecah[0]));
                $end = date('Y-m-d', strtotime(end($pecah)));
                $tgl_inp = date('d-m-Y', strtotime($pecah[0]));
                $tgl_inp1 = date('d-m-Y', strtotime(end($pecah)));
                $_SESSION['tgl_inp'] = $tgl_inp;
                $_SESSION['tgl_inp1'] = $tgl_inp1;
                $nippos=$_POST['nippos'];
                $_SESSION['nipp'] = $nippos;
                $nama = mysqli_query($con, "select nama_petugas from mandor_koreksiln where nippos = '$nippos' group by nippos");
                $row = mysqli_fetch_array($nama);
                $_SESSION['nama_pet'] = $row['nama_petugas'];
                $query=mysqli_query($con,"select *, sum(ems_jml) as jml_ems, sum(pos_expt_jml) as jml_pos_expt, sum(pp_cpt_jml) as jml_pp_cpt, sum(pp_laut_jml) as jml_pp_laut, sum(r_ln_jml) as jml_r_ln, sum(e_pack_jml) as jml_e_pack, sum(lain_jml) as jml_lain, sum(total) as jml_total from mandor_koreksiln INNER JOIN mitra ON mandor_koreksiln.mitra_id = mitra.id_mitra WHERE nippos = '$nippos' AND tgl_masuk BETWEEN '$from' AND '$end' group by mitra_id");
                $sum=mysqli_query($con,"select sum(ems_jml) as jml_ems, sum(pos_expt_jml) as jml_pos_expt, sum(pp_cpt_jml) as jml_pp_cpt, sum(pp_laut_jml) as jml_pp_laut, sum(r_ln_jml) as jml_r_ln, sum(e_pack_jml) as jml_e_pack, sum(lain_jml) as jml_lain, sum(total) as jml_total from mandor_koreksiln WHERE nippos = '$nippos' AND tgl_masuk BETWEEN '$from' AND '$end'");
                $sum = $sum->fetch_assoc();
                $_SESSION['nama'] = mysqli_query($con,"select * from mandor_koreksiln WHERE nippos = '$nippos' group by nippos");
                $no = 1;
                if ($query) :
                    foreach ($query as $km) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $km['nama_mitra']. ' | '. $km['wilayah']; ?></td>
							<td><?= $km['jml_ems']; ?></td>
                            <td><?= $km['jml_pos_expt']; ?></td>
                            <td><?= $km['jml_pp_cpt']; ?></td>
                            <td><?= $km['jml_pp_laut'];?></td>
                            <td><?= $km['jml_r_ln']; ?></td>
                            <td><?= $km['jml_e_pack']; ?></td>
                            <td><?= $km['jml_lain']; ?></td>
                            <td><?= $km['jml_total']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="10" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Jumlah</th>
                    <th colspan="1"></th>
					<th><?= $sum['jml_ems']; ?></th>
					<th><?= $sum['jml_pos_expt']; ?></th>
					<th><?= $sum['jml_pp_cpt']; ?></th>
					<th><?= $sum['jml_pp_laut'];?></th>
					<th><?= $sum['jml_r_ln']; ?></th>
					<th><?= $sum['jml_e_pack']; ?></th>
					<th><?= $sum['jml_lain']; ?></th>
					<th><?= $sum['jml_total']; ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>