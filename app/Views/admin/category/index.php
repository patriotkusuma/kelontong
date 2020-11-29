<?= view('themes/head') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Manage Category</h3>
                <div class="card-tools form-inline">
                    <div class="mr-3">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Tambah Data
                        </button>
                    </div>
                    <div class="input-group input-group-sm" style="width: 150px;">

                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $key => $value) : ?>
                            <tr id="data-category-<?= $value['category_id'] ?>">
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['category_name']; ?></td>
                                <td class="btn btn-<?= $value['status'] == 'ACTIVE' ? 'success' : 'danger' ?>"><?= $value['status']; ?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-success modal-edit" data-toggle="modal" data-target="#editModal">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                    <a class="btn btn-danger category-hapus" id="<?= $value['category_id'] ?>">
                                        <i class="fas fa-trash-alt"></i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>/admin/categories/proses" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name">
                    </div>
                    <div class="form-group">
                        <label for="category_status">Category Status</label>
                        <select name="category_status" class="form-control" id="">
                            <option value="">Pilih Status</option>
                            <option value="ACTIVE">Active</option>
                            <option value="INACTIVE">Tidak Active</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= view('themes/body') ?>

<script>
    $('.category-hapus').click(function() {
        var id = $(this).attr("id");

        Swal.fire({
            title: 'Do you want to delete?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonClass: `btn-danger`,
            confirmButtonText: `Yes, delete it!`,
            cancelButtonClass: `btn-success`,
            cancelButtonText: `No, Cancel it!`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: 'http://localhost:8080/admin/categories/' + id,
                    type: 'delete',
                    error: function(data) {
                        Swal.fire({
                            title: 'Someting is wrong',
                            icon: 'warning',
                            text: data,
                        })
                    },
                    success: function(data) {
                        $('#data-category-' + id).remove();
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: 'Data Deteled Successfully',
                        })
                    }
                })
            } else {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    icon: 'info',
                    title: 'Change are not save!',
                    text: 'Your data is saved!'
                })
            }
        })
    })
</script>
<?= view('themes/footer') ?>