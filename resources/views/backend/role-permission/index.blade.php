@extends('layouts.template_master')

@section('title', 'Assigning Roles')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Assigning Roles List</h3>
                <a href="{{ route('backend.role-permission.create') }}" class="btn btn-info"><i data-feather="plus-circle"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="allDataTable" class="table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Role Name</th>
                                <th>Permissions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Read Data
        $('#allDataTable').DataTable({
            processing: true,
            serverSide: true,
            searching: true,
            ajax: {
                url: "{{ route('backend.role-permission.index') }}",
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'name' },
                { data: 'permissions', name: 'permissions' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        // Delete Data
        // $(document).on('click', '.deleteBtn', function(){
        //     var id = $(this).data('id');
        //     var url = "{{ route('backend.role-permission.destroy', ":id") }}";
        //     url = url.replace(':id', id)
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "You can bring it back though!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //         }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 url: url,
        //                 method: 'DELETE',
        //                 success: function(response) {
        //                     $('#allDataTable').DataTable().ajax.reload();
        //                     toastr.warning('Role in permission delete successfully.');
        //                 }
        //             });
        //         }
        //     })
        // })
    });
</script>
@endsection
