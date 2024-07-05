<ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
        <a href="{{ Auth::user()->user_type === 'backend' ? route('backend.dashboard') : route('dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
        </a>
    </li>

    @if (Auth::user()->user_type === 'backend')
        <li class="nav-item nav-category">Super Admin</li>
        @can('SettingMenu')
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#setting" role="button" aria-expanded="false" aria-controls="setting">
                <i class="link-icon" data-feather="settings"></i>
                <span class="link-title">Setting</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="setting">
                <ul class="nav sub-menu">
                    @can('default.setting')
                    <li class="nav-item">
                        <a href="{{ route('backend.default.setting') }}" class="nav-link">Default</a>
                    </li>
                    @endcan
                    @can('seo.setting')
                    <li class="nav-item">
                        <a href="{{ route('backend.seo.setting') }}" class="nav-link">Seo</a>
                    </li>
                    @endcan
                    @can('mail.setting')
                    <li class="nav-item">
                        <a href="{{ route('backend.mail.setting') }}" class="nav-link">Mail</a>
                    </li>
                    @endcan
                    @can('sms.setting')
                    <li class="nav-item">
                        <a href="{{ route('backend.sms.setting') }}" class="nav-link">Sms</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @endcan

        <li class="nav-item nav-category">Admin</li>
        @can('RolePermissionMenu')
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#rolePermission" role="button" aria-expanded="false" aria-controls="rolePermission">
                <i class="link-icon" data-feather="lock"></i>
                <span class="link-title">Role Permission</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="rolePermission">
                <ul class="nav sub-menu">
                    @can('role.index')
                    <li class="nav-item">
                        <a href="{{ route('backend.role.index') }}" class="nav-link">Role</a>
                    </li>
                    @endcan
                    @can('permission.index')
                    <li class="nav-item">
                        <a href="{{ route('backend.permission.index') }}" class="nav-link">Permission</a>
                    </li>
                    @endcan
                    @can('role-permission.index')
                    <li class="nav-item">
                        <a href="{{ route('backend.role-permission.index') }}" class="nav-link">Assigning</a>
                    </li>
                    @endcan
                </ul>
            </div>
        </li>
        @endcan
        @can('employee.index')
        <li class="nav-item">
            <a href="{{ route('backend.employee.index') }}" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Employee</span>
            </a>
        </li>
        @endcan
        @can('user.index')
        <li class="nav-item">
            <a href="{{ route('backend.user.index') }}" class="nav-link">
                <i class="link-icon" data-feather="user"></i>
                <span class="link-title">User</span>
            </a>
        </li>
        @endcan
    @else
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="link-icon" data-feather="hash"></i>
                <span class="link-title">User</span>
            </a>
        </li>
    @endif
</ul>
