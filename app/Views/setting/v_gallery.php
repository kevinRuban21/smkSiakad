<div class="col-md-12">
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title"><?= $subjudul ?></h3>

                <div class="card-tools">
                    <a href="<?= base_url('Setting/InputGallery') ?>" class="btn btn-success btn-sm">
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
                            <th width="50px">NO</th>
                            <th>Keterangan</th>
                            <th width="200px">Foto</th>
                            <th width="100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($gallery as $key => $d){ ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $d['ket'] ?></td>
                                <td class="text-center"><img src="<?= base_url('gallery/'. $d['foto']) ?>" width="90px"></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?= base_url('Setting/EditGallery/' . $d['id_gallery']) ?>" class="btn btn-warning btn-sm mr-2 ml-2"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="<?= base_url('Setting/DeleteDataGallery/' . $d['id_gallery']) ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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