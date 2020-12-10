<?= $this->section('custom_css') ?>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/summernote/summernote-bs4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url() ?>/themes/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

<?= $this->endSection() ?>
<?= view('themes/head') ?>
<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Manage Category</h1>
                <div class="card-tools form-inline">
                    <div class="mr-3">
                        <button type="button" data-toggle="modal" data-target="#myModal" id="tambah-data" onclick="submit('tambah')" class="btn btn-primary disabled">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Tambah Data
                        </button>
                    </div>
                    
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-16" style="width: 100%;">
                <table class="table table-head-fixed text-nowrap" id="table-user" style="width: 100%;">
                    <thead style="width: 20%;">
                        <tr>
                            <th></th>
                            <th>Profile</th>
                            <th>Full Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" style="width: 100%;">

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
    var table;
    $(document).ready(function() {
        table = $('#table-user').DataTable( {
            ajax: {
                url: "../admin/users/show",
                dataSrc: 'results',
                dataType: 'json',
                type: 'GET',
            },
            responsive: true,
            autoWidth: false,
            bInfo: false,
            lengthMenu: [
                [5, 10, 25],
                [5, 10, 25],
            ],
            lengthChange: true,
            bProcessing: true,
            retrieve: true,
            language: {
                processing: "Sedang memuat data..",
                decimal: ",",
                thousands: "."
            },
            columns: [
                {   
                    data: null,
                    sortable: false,
                    render: function(data, type, row, meta){
                        return meta.row+1;
                    }
                },
                {
                    data: 'profile_picture',
                    mRender: function(data, type, row){
                        return `<img  src='<?= base_url()?>/img/`+data+`' alt='`+data+`' class="img-circle elevation-2" style="width: 35px; width: 35px;">`
                    }
                    
                },
                {data: 'fullname'},
                {data: 'username'},
                {
                    data: 'email',
                    mRender: function(data, type, row){
                        return `<small>`+data+`</small>`;
                    }
                },
                {
                    data: 'active',
                    mRender: function(data, type, row){
                        if(data == 1){
                            return `<small class='btn btn-xs btn-info'><i class="fas fa-check-circle mr-2"></i>ACTIVE</small>`
                        }else{
                            return `<small class='btn btn-xs btn-danger'><i class="fas fa-times-circle mr-2"></i>INACTIVE</small>`
                        }
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row){
                        return `
                        <a class="btn btn-sm btn-danger disabled" onclick="detailData(`+data+`)"><i class="fas fa-search mr-2"></i>Detail</a>
                        <a data-toggle="modal" onclick="submit(`+data+`)" class="btn btn-sm btn-success disabled" data-target="#myModal" ><i class="fas fa-edit mr-2"></i>Edit</a> 
                        <a class="btn btn-sm btn-danger disabled" onclick="deleteData(`+data+`)"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>
                        `
                    },
                    
                }
            ],
        });
    });

    function submit(id) {
        $('#product_id').val('');
        $('#sku').val('');
        $('#name').val('');
        $('#category_id').val('');
        $('#category_id').empty();
        $('#harga').val('');
        $('#stok').val('');
        $('#status').val('');


        if (id == 'tambah') {
            $('#myModalTitle').text('Tambah Data');
            $('#btn-tambah').show();
            $('#btn-ubah').hide();
            $.ajax({
                url: '../admin/categories/active',
                type: 'get',
                dataType: 'json',
                success: function(data){
                    $.each(data['results'],function(key,value){
                        $('#category_id').append(`
                        <option value='`+value['category_id']+`'>`+value['category_name']+`</option>
                    `);
                    });
                    
                }
            })
        } else {
            $('#myModalTitle').text('Ubah Data');
            $('#btn-tambah').hide();
            $('#btn-ubah').show();

            $.ajax({
                url: "../admin/products/" + id,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    $.each(data['category'], function(key, value){
                        $('#category_id').append(
                            `
                            <option value='`+value['category_id']+`'>`+value['category_name']+`</option>
                            `
                        );
                    })
                    $.each(data['product'], function(key, value){
                        $('#product_id').val(value['product_id']);
                        $('#sku').val(value['sku']);
                        $('#name').val(value['name']);
                        $('#category_id').val(value['category_id']);
                        $('#harga').val(value['harga']);
                        $('#stok').val(value['stok']);
                        $('#status').val(value['product_status']);
                    });
                },
                error: function(error){
                    console.log(error);
                }
            })
        }
    }

    function updateData() {
        var id = $('#product_id').val();
        var sku = $('#sku').val();
        var name = $('#name').val();
        var category_id = $('#category_id').val();
        var harga = $('#harga').val();
        var stok = $('#stok').val();
        var status = $('#status').val();

        $.ajax({
            url: '../admin/products/update/' + id,
            type: 'post',
            data: 'sku=' + sku +'&name='+name+'&category_id='+category_id+'&harga='+harga+'&stok='+stok+'&status='+status,
            dataType: 'json',
            success: function(data) {
                $('#myModal').modal('hide');
                table.ajax.reload();

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    icon: 'success',
                    title: 'Update Data Successfully',
                })
            },
            error: function(error){
                console.log(error);
            }
        })
    }

    function tambahData() {
        var sku = $('#sku').val();
        var name = $('#name').val();
        var category_id = $('#category_id').val();
        var harga = $('#harga').val();
        var stok = $('#stok').val();
        var status = $('#status').val();

        $.ajax({
            url: '../admin/products/add',
            type: 'post',
            data: 'sku='+sku+'&name='+name+'&category_id='+category_id+'&harga='+harga+'&stok='+stok+'&status='+status,
            dataType: 'json',
            success: function(data) {
                if (data['status'] == 200) {
                    table.ajax.reload();
                    $('#myModal').modal('hide');
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
                    url: '../admin/products/' + id,
                    type: 'delete',
                    error: function(data) {
                        Swal.fire({
                            title: 'Someting is wrong',
                            icon: 'warning',
                            text: data,
                        })
                    },
                    success: function(data) {
                        table.ajax.reload();

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            icon: 'success',
                            title: "Data Deleted Successfully",
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
</script>
<?= $this->section('custom_js') ?>
<!-- Categories JS -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>/themes/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/themes/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/themes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/themes/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/themes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<?= $this->endSection() ?>
<?= view('themes/footer') ?>