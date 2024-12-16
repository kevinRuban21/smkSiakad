<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-book"></i> <?= $subjudul ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('BahanAjar/Input') ?>" class="btn btn-success btn-sm">
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
                            <th>NO</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Upload</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($ba as $key => $ba){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><?= $ba['no_ba'] ?></td>
                                <td><?= $ba['nama_ba'] ?></td>
                                <td><?= $ba['deskripsi'] ?></td>
                                <td class="text-center"><?= $ba['tgl_upload'] ?></td>
                                <td class="text-center"><a href="<?= base_url('BahanAjar/View/' . $ba['id_ba']) ?>"><i class="far fa-file-pdf fa-2x text-danger"></i></a></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('BahanAjar/Edit/' . $ba['id_ba']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?= base_url('BahanAjar/DeleteData/' . $ba['id_ba']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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