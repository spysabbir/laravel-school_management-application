@extends('layouts.template_master')

@section('title', 'Assigning Roles')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Assigning Roles</h3>
                <a href="{{ route('backend.role-permission.index') }}" class="btn btn-info"><i data-feather="list"></i></a>
            </div>
            <div class="card-body">
                <form id="editForm">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="mb-3">
                                <h4>Role: {{ $role->name }}</h4>
                                <input type="hidden" id="role_id" value="{{ $role->id }}">
                            </div>
                        </div><!-- Col -->
                        <div class="col-sm-3">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="PermissionAll" {{ ($role->permissions->count() == DB::table('permissions')->count()) ? 'checked' : '' }}>
                                <label class="form-check-label" for="PermissionAll">
                                    Permission All
                                </label>
                            </div>
                        </div><!-- Col -->
                    </div><!-- Row -->

                    @foreach ($permission_groups as $group)
                    @php
                        $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                    @endphp
                    <div class="row border my-2 py-2">
                        <div class="col-sm-12">
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input group-checkbox" data-group="{{ $group->group_name }}" id="PermissionGroup_{{ $group->group_name }}" {{ App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                <label class="form-check-label" for="PermissionGroup_{{ $group->group_name }}">
                                    <span class="badge bg-success">
                                        {{ $group->group_name }}
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between">
                                @foreach ($permissions as $permission)
                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input group-permission" data-group="{{ $group->group_name }}" name="permission_id[]" value="{{ $permission->id }}" id="permission_id{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="permission_id{{ $permission->id }}">
                                        <span class="badge bg-dark">
                                            {{ $permission->name }}
                                        </span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div><!-- Col -->
                    </div>
                    @endforeach

                    <span class="text-danger error-text update_permission_id_error"></span>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const groupCheckboxes = document.querySelectorAll(".group-checkbox");
        const permissionCheckboxes = document.querySelectorAll(".group-permission");
        const permissionAllCheckbox = document.getElementById("PermissionAll");

        groupCheckboxes.forEach(groupCheckbox => {
            groupCheckbox.addEventListener("change", function () {
                const groupName = this.getAttribute("data-group");
                const groupPermissionCheckboxes = document.querySelectorAll(`.group-permission[data-group="${groupName}"]`);
                const isChecked = this.checked;

                groupPermissionCheckboxes.forEach(permissionCheckbox => permissionCheckbox.checked = isChecked);
                checkPermissionAllCheckbox();
            });
        });

        permissionCheckboxes.forEach(permissionCheckbox => {
            permissionCheckbox.addEventListener("change", function () {
                const groupName = this.getAttribute("data-group");
                const groupPermissionCheckboxes = document.querySelectorAll(`.group-permission[data-group="${groupName}"]`);
                const groupCheckbox = document.querySelector(`.group-checkbox[data-group="${groupName}"]`);

                const allChecked = Array.from(groupPermissionCheckboxes).every(permission => permission.checked);

                groupCheckbox.checked = allChecked;
                checkPermissionAllCheckbox();
            });
        });

        permissionAllCheckbox.addEventListener("change", function () {
            const isChecked = this.checked;
            groupCheckboxes.forEach(groupCheckbox => groupCheckbox.checked = isChecked);
            permissionCheckboxes.forEach(permissionCheckbox => permissionCheckbox.checked = isChecked);
        });

        function checkPermissionAllCheckbox() {
            const allGroupCheckboxes = Array.from(groupCheckboxes);
            const allPermissionCheckboxes = Array.from(permissionCheckboxes);

            const allGroupChecked = allGroupCheckboxes.every(groupCheckbox => groupCheckbox.checked);
            const allPermissionChecked = allPermissionCheckboxes.every(permissionCheckbox => permissionCheckbox.checked);

            permissionAllCheckbox.checked = allGroupChecked && allPermissionChecked;
        }
    });
</script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Update Data
        $('#editForm').submit(function (event) {
            event.preventDefault();
            var id = $('#role_id').val();
            var url = "{{ route('backend.role-permission.update', ":id") }}";
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: "PUT",
                data: $(this).serialize(),
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success: function (response) {
                    if (response.status == 400) {
                        $.each(response.error, function(prefix, val){
                            $('span.update_'+prefix+'_error').text(val[0]);
                        })
                    }else{
                        $('#allDataTable').DataTable().ajax.reload();
                        toastr.success('Role in permission update successfully.');
                    }
                },
            });
        });
    });
</script>
@endsection
