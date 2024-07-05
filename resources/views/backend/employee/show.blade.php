<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Profile Photo</th>
                <th>
                    <img src="{{ asset('uploads/profile_photo') }}/{{ $employee->profile_photo }}" alt="Profile Photo" class="img-thumbnail" width="100">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Employee Name</td>
                <td>{{ $employee->name }}</td>
            </tr>
            <tr>
                <td>Username</td>
                <td>{{ $employee->username ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $employee->email }}</td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>{{ $employee->date_of_birth ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>{{ $employee->gender ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{{ $employee->phone ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $employee->address ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    @foreach ($employee->roles as $role)
                        <span class="badge bg-primary">{{ $role->name }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    @if ($employee->status == 'Active')
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td>Bio</td>
                <td>{{ $employee->bio ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Last Login At</td>
                <td>{{ $employee->last_login_at ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Created By</td>
                <td>{{ $employee->created_by }}</td>
            </tr>
            <tr>
                <td>Updated By</td>
                <td>{{ $employee->updated_by }}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{ $employee->created_at->format('d M, Y h:i A') }}</td>
            </tr>
            <tr>
                <td>Updated At</td>
                <td>{{ $employee->updated_at->format('d M, Y h:i A') }}</td>
            </tr>
        </tbody>
    </table>
</div>
