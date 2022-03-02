<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Rekap Data Koreksi Luar Negeri (Berdasarkan Petugas Pick-Up)
                </h4>  
                <h3 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Tanggal Pick-Up : <?= $_POST['tanggal'];?>
                </h3>              
            </div>
            <div class="col-auto">
                    <a href="<?= base_url('laporan_petugas') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
        <table class="table table-striped w-100 nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
					<th>Nama Petugas</th>
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
                $query=mysqli_query($con,"select * ,sum(ems_jml), sum(pos_expt_jml), sum(pp_cpt_jml), sum(pp_laut_jml), sum(r_ln_jml), sum(e_pack_jml), sum(lain_jml), sum(total) 
                from mandor_koreksiln WHERE tgl_masuk BETWEEN '$from' AND '$end' group by nama_petugas");
                $sum=mysqli_query($con,"select sum(ems_jml) as jml_ems, sum(pos_expt_jml) as jml_pos_expt, sum(pp_cpt_jml) as jml_pp_cpt, sum(pp_laut_jml) as jml_pp_laut, sum(r_ln_jml) as jml_r_ln, sum(e_pack_jml) as jml_e_pack, sum(lain_jml) as jml_lain, sum(total) as jml_total from mandor_koreksiln WHERE tgl_masuk BETWEEN '$from' AND '$end'");
                $sum = $sum->fetch_assoc();
                $no = 1;
                if ($query) :
                    foreach ($query as $km) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
							<td><?= $km['nama_petugas']; ?></td>
							<td><?= $km['sum(ems_jml)']; ?></td>
							<td><?= $km['sum(pos_expt_jml)']; ?></td>
							<td><?= $km['sum(pp_cpt_jml)']; ?></td>
							<td><?= $km['sum(pp_laut_jml)'];?></td>
							<td><?= $km['sum(r_ln_jml)']; ?></td>
                            <td><?= $km['sum(e_pack_jml)']; ?></td>
							<td><?= $km['sum(lain_jml)']; ?></td>
							<td><?= $km['sum(total)']; ?></td>
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