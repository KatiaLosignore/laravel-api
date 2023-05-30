<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link {{Route::currentRouteName() == 'admin.dashboard'?'active':''}}" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home"></use>
                </svg>
                Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.projects.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.projects.index') active @endif">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home"></use>
                </svg>
                Projects
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.types.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.types.index') active @endif">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home"></use>
                </svg>
                Types
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.technologies.index')}}" class="nav-link @if (Route::currentRouteName() == 'admin.technologies.index') active @endif">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home"></use>
                </svg>
                Technologies
            </a>
        </li>




    </ul>
</div>
