@extends('dashboard.master')
@section('title', 'Presensi')

@section('button_nav')

|| Data Presensi || &nbsp;&nbsp;
<button type="button" id="addBtn" class=" btn btn-light btn-outline-primary"><i class="bi bi-plus-circle"></i>&nbsp;Add New</button>
&nbsp;

Toggle column: <a class="toggle-vis" data-column="1">Id</a>
<!-- -- <a class="toggle-vis" data-column="5">Password</a> -->

@endsection

@section('content')

<div class="col-md-12">
    <div class="table-responsive">
        <table id="datatable" class="table table-bordered  border-light table-striped align-middle nowrap" style="width:100%">
            <thead class="bg-purple">
                <tr>
                    <td>Action</td>
                    <th>Id</th>
                    <th>Tanggal Presensi</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Tanggal Berakhir Member</th>
                </tr>
            </thead>
            <tfoot class="bg-purple">
                <tr>
                    <td>Action</td>
                    <th>Id</th>
                    <th>Tanggal Presensi</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Tanggal Berakhir Member</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@include('presence.modal_add_edit_show')

@endsection

@push('scripts')
<!-- CDN -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script> -->
<!--  -->
<!-- first loaded -->
<script>

</script>

<!-- Datatables -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#datatable tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="' + title + '" />')
        });

        var table = $('#datatable').DataTable({
            scrollX: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('presences.index') }}",
                data: function(req) {
                    // req.alldata = alldata;
                }
            },
            method: 'POST',
            columns: [{
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable: false
                },
                {
                    data: 'id',
                    name: 'id',
                    visible: false,
                },
                {
                    data: 'presence_date',
                    name: 'presence_date'
                },
                {
                    data: 'customer_name',
                    name: 'customer_name'
                },
                {
                    data: 'nama_product',
                    name: 'nama_product',
                },
                {
                    data: 'price',
                    name: 'price',
                },
                {
                    data: 'end_of_membership',
                    name: 'end_of_membership',
                    // render: $.fn.dataTable.render.number(',', '.', 0, '')
                },
            ],
            order: [
                // [29, 'desc']
            ],
            columnDefs: [{
                // targets: [0],
                // searchable: false,
                // orderable: false,
                // className: "dt-center",
                // targets: "_all"
                // targets: [2, 4, 5]
            }],
        });

        // Toggle Column
        $('a.toggle-vis').on('click', function(e) {
            e.preventDefault();
            var column = table.column($(this).attr('data-column'));
            column.visible(!column.visible());
        });
        // Apply the search
        table.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change clear', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });


    });
</script>

<!-- fungsi-fungsi tombol tambah, view, edit, dll -->
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    // Tombol tambah data
    $('#addBtn').click(function() {
        $(document).find('span.error-text').text('');
        $('#modal-title').html("Form submit data");
        $('#id').val('');
        $('#form-modal_add_edit_show').trigger("reset");
        $('#saveBtn').show();

        $('#modal_add_edit_show').modal('show');
    });


    // Tombol simpan data
    $('#saveBtn').click(function(e) {
        e.preventDefault();
        saveData()
    });

    function saveData() {
        var formData = new FormData($("#form-modal_add_edit_show")[0]);
        $.ajax({
            url: "{{ route('presences.store') }}",
            type: "POST",
            data: formData,
            dataType: 'json',
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $(document).find('span.error-text').text('');
            },
            success: function(data) {
                if (data.status == 0) {
                    $.each(data.error, function(prefix, val) {
                        $('span.' + prefix + '_error').text(val[0]);
                    });
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Make sure all the required data is filled in, check again!',
                    })

                } else {
                    $('#form-modal_add_edit_show')[0].reset();
                    $('#form-modal_add_edit_show').trigger("reset");
                    $('#modal_add_edit_show').modal('hide');
                    $('#datatable').DataTable().ajax.reload();
                    if ($('#id').val() == '') {
                        Swal.fire(
                            'Good job!',
                            'Data has been successfully added!',
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Good job!',
                            'Data has been successfully updated!',
                            'success'
                        )
                    }
                }
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    };

    // Tombol edit data
    $('body').on('click', '.editData', function() {
        $(document).find('span.error-text').text('');
        var id = $(this).data('id');
        $('#saveBtn').show();

        $.get("{{ route('presences.index') }}" + "/" + id + "/edit", function(data) {
            $('#modal-title').html("Form edit data");
            $('#id').val(data.id);
            $('#presence_date').val(data.presence_date);
            $('#customer_name').val(data.customer_name);
            $('#nama_product').val(data.nama_product);
            $('#price').val(data.price);
            $('#end_of_membership').val(data.end_of_membership);

            $('#modal_add_edit_show').modal('show');
        })

    });

    $('body').on('click', '.showData', function() {
        $(document).find('span.error-text').text('');
        var id = $(this).data('id');
        $('#saveBtn').hide();

        $.get("{{ route('presences.index') }}" + "/" + id + "/edit", function(data) {
            $('#modal-title').html("Form show data");
            $('#id').val(data.id);
            $('#presence_date').val(data.presence_date);
            $('#customer_name').val(data.customer_name);
            $('#nama_product').val(data.nama_product);
            $('#price').val(data.price);
            $('#end_of_membership').val(data.end_of_membership);

            $('#modal_add_edit_show').modal('show');
        })

    });

    $("#customer_name").on('change', function() {
        let customer_name = $("#customer_name").val();
        $.ajax({
            url: "{{ route('presences.transactionsData') }}",
            type: "post",
            data: {
                customer_name: customer_name
            },
            dataType: 'json',
            success: function(data) {
                $('#nama_product').val(data.nama_product);
                $('#price').val(data.price);
                $('#end_of_membership').val(data.end_of_membership);
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });

    $('body').on('click', '.deleteData', function() {
        var id = $(this).data("id");

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('presences.store') }}" + '/' + id,
                    success: function(data) {
                        $('#datatable').DataTable().ajax.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    'Your file is safe :)',
                    'error'
                )
            }
        })

    });
</script>

@endpush

@section('style')
<style>
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }

    .hide {
        display: none;
    }

    .form-floating>.select2-container>.selection>.select2-selection {
        padding-top: 1.625rem;
        padding-bottom: 0.625rem;
        height: 3.60rem;
        border-top: white solid;
        border-bottom: green 2px solid;
        border-left: green 2px solid;
        border-right: green 2px solid;
    }
</style>
@endsection