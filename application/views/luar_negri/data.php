<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-danger">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-danger">
                    Data P.U Luar Negeri
                </h4>
                <h3 class="h5 align-middle m-0 font-weight-bold text-danger">
                    <?=Date('d-m-Y');?>
                </h3>
                <div class="col-auto">
                <a href="<?= base_url('puln/add') ?>" class="btn btn-sm btn-danger btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Entry Data
                    </span>
                </a>
            </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama Mitra</th>
					<th>No. P.O.</th>
                    <th>Jadwal P.U KE</th>
					<th>Tujuan Kirim</th>
					<th>Tanggal Entry</th>
					<th>Jam Entry</th>
                    <th>Aksi</th>
					<th>JUMLAH Dokumen</th>
					<th>JUMLAH Barang</th>
					<th>TOTAL</th>
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
                            <td><?= $ln['nama_mitra']. ' | '. $ln['wilayah']; ?></td>
							<td><?= $ln['no_po']; ?></td>
                            <td><?= $ln['jadwal_pu'];?></td>
							<td><?= $ln['tujuan_krm'];?></td>
							<td><?= $ln['tgl_masuk'];?></td>
							<td><?= $ln['jam_input'];?></td>
							<td>
								<a href="<?= base_url('puln/detail/') . $ln['id_pu_ln'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-search"></i></a>
                                <a href="<?= base_url('puln/edit/') . $ln['id_pu_ln'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('puln/delete/') . $ln['id_pu_ln'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
							<td><?= $ln['jml_doc']; ?></td>
							<td><?= $ln['jml_brg']; ?></td>
							<td><?= $ln['total']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>