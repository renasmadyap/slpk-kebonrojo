<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Data P.U Luar Negeri
                </h4>
            </div>
            <div class="col-auto">
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
					<th>Tanggal Entry</th>
					<th>Nama Petugas</th>
                    <th>Nama Mitra</th>
					<th>No. P.O.</th>
					<th>Tujuan Kirim</th>
                    <th>Jam Entry</th>
					<th>JUMLAH Dokumen</th>
					<th>JUMLAH Barang</th>
					<th>TOTAL</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($pu_ln) :
                    foreach ($pu_ln as $ln) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
							<td><?= $ln['tgl_masuk'];?></td>
							<td><?= $ln['nama_petugas']; ?></td>
                            <td><?= $ln['nama_mitra']. ' | '. $ln['wilayah']; ?></td>
							<td><?= $ln['no_po']; ?></td>
							<td><?= $ln['tujuan_krm'];?></td>
							<td><?= $ln['jam_input'];?></td>
							<td><?= $ln['jml_doc']; ?></td>
							<td><?= $ln['jml_brg']; ?></td>
							<td><?= $ln['total']; ?></td>
                            <td>
								<a href="<?= base_url('mandorln/detail/') . $ln['id_pu_ln'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-search"></i></a>
								<a href="<?= base_url('koreksiln/koreksiln/') . $ln['id_pu_ln'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-upload" ></i></a>
                            </td>
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
        </table>
    </div>
</div>