<?= view('themes/head') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Manage Category</h1>
                <div class="card-tools form-inline">
                    <div class="mr-3">
                        <button type="button" data-toggle="modal" data-target="#myModal" id="tambah-data" onclick="submit('tambah')" class="btn btn-primary">
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
            <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <input type="hidden" name="category_id" id="category_id">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name">
                    </div>
                    <div class="form-group">
                        <label for="category_status">Category Status</label>
                        <select name="category_status" class="form-control" id="category_status">
                            <option value="">Pilih Status</option>
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="INACTIVE">INACTIVE</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a onclick="tambahData()" class="btn btn-primary " id="btn-tambah">Tambah Data</a>
                    <a onclick="updateData()" class="btn btn-primary " id="btn-ubah">Ubah</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= view('themes/body') ?>

<script>
    $(document).ready(function() {
        loadData();


    });

    function submit(id) {

        $('#category_name').val('');
        $('#category_status').val('');

        if (id == 'tambah') {
            $('#myModalTitle').text('Tambah Data');
            $('#btn-tambah').show();
            $('#btn-ubah').hide();
        } else {
            $('#myModalTitle').text('Ubah Data');
            $('#btn-tambah').hide();
            $('#btn-ubah').show();

            $.ajax({
                url: '<?= base_url(); ?>/admin/categories/' + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#category_id').val(data['category_id']);
                    $('#category_name').val(data['category_name']);
                    $('#category_status').val(data['status']);
                }
            })
        }
    }

    function updateData() {
        var id = $('#category_id').val();
        var category_name = $('#category_name').val();
        var category_status = $('#category_status').val();

        $.ajax({
            url: '<?= base_url() ?>/admin/categories/update/' + id,
            type: 'post',
            data: 'category_name=' + category_name + '&category_status=' + category_status,
            dataType: 'json',
            success: function(data) {
                $('#myModal').modal('hide');
                loadData();

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    icon: 'success',
                    title: 'Update Data Successfully',
                })
            }
        })
    }

    function tambahData() {
        var category_name = $('#category_name').val();
        var category_status = $('#category_status').val();

        $.ajax({
            url: '<?= base_url() ?>/admin/categories/add',
            type: 'post',
            data: 'category_name=' + category_name + '&category_status=' + category_status,
            dataType: 'json',
            success: function(data) {
                if (data['status'] == 200) {
                    $('#myModal').modal('hide');
                    $('#table-body').empty();
                    loadData();
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        icon: 'success',
                        title: 'Data Inserted Successfully',
                    })
                }
            },
        })
    }

    function deleteData(id) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: `Iya, Hapus saja!`,
            cancelButtonText: `Tidak, Batal!`,
            customClass: {
                confirmButton: 'btn btn-danger mr-3',
                cancelButton: 'btn btn-primary',
            },
            buttonsStyling: false,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>/admin/categories/' + id,
                    type: 'delete',
                    error: function(data) {
                        Swal.fire({
                            title: 'Someting is wrong',
                            icon: 'warning',
                            text: data,
                        })
                    },
                    success: function(data) {
                        $('#table-body').empty();
                        loadData();
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
    }

    function loadData() {

        $('#table-body').empty();
        $.ajax({
            url: '<?= base_url('/admin/categories/show') ?>',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(key, value) {
                    key = key + 1;
                    if (value['status'] == 'ACTIVE') {
                        var status = 'success';
                    } else {
                        var status = 'danger';
                    }
                    $('#table-body').append(`
                        <tr>
                            <td>` + key + `</td>
                            <td>` + value['category_name'] + `</td>
                            <td><a class="btn btn-` + status + `">` + value['status'] + `</a></td>
                            <td class="text-center">
                                <a class="btn btn-success modal-edit" data-toggle="modal" data-target="#myModal" onclick="submit(` + value['category_id'] + `)">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                </a>
                                <a class="btn btn-danger category-hapus" onclick="deleteData(` + value['category_id'] + `)">
                                    <i class="fas fa-trash-alt"></i>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    `);
                })
            }
        })
    }
</script>
<?= view('themes/footer') ?>