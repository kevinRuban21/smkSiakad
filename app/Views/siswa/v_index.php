<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user"></i> <?= $subjudul ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('Siswa/Input') ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php

                                use CodeIgniter\Database\BaseUtils;

                    if(session()->get('insert')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('insert');
                        echo '</div>';
                    }
                    if(session()->get('update')){
                        echo '<div class="alert alert-success">';
                        echo session()->get('update');
                        echo '</div>';
                    }
                    if(session()->get('delete')){
                        echo '<div class="alert alert-danger">';
                        echo session()->get('delete');
                        echo '</div>';
                    }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center bg-success">
                            <th width="5px">NO</th>
                            <th width="30px">NIPD</th>
                            <th width="30px">NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jurusan</th>
                            <th>Angkatan</th>
                            <th>TTL</th>
                            <th width="25px">JK</th>
                            <th>Foto</th>
                            <th width="20px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($siswa as $key => $d){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $d['nipd'] ?></td>
                                <td class="text-center">
                                    <?= $d['nisn'] ?>
                                    <?php if ($d['status'] == '1') {
                                        echo '<span class="badge bg-success">Aktif</span>';
                                    }elseif ($d['status'] == '2') {
                                        echo '<span class="badge bg-primary">Alumni</span>';
                                    }elseif ($d['status'] == '3') {
                                        echo '<span class="badge bg-warning">Pindah</span>';
                                    }elseif ($d['status'] == '4') {
                                        echo '<span class="badge bg-danger">Drop Out</span>';
                                    } ?>
                                </td>
                                <td><?= $d['nama_siswa'] ?></td>
                                <td><?= $d['jurusan'] ?></td>
                                <td class="text-center"><?= $d['tahun_angkatan'] ?></td>
                                <td class="text-center"><?= $d['tempat_lahir'] ?>-<?= $d['tgl_lahir'] ?></td>
                                <td class="text-center"><?= $d['jk'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></td>
                                <td class="text-center"><img class="img-circle" src="<?= base_url('fotosiswa/'. $d['foto_siswa']) ?>" width="80px"></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Siswa/Edit/' . $d['id_siswa']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?= base_url('Siswa/DeleteData/' . $d['id_siswa']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>

                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


        <script>
            $(function () {
                $("#example1").DataTable({
                "paging": true,
                "searching": true,
                "responsive": true, 
                "lengthChange": true, 
                "autoWidth": false,
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>