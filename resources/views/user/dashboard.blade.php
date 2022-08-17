<x-app-layout>
    <div class="row">
        <div class="col-md-12">
            <x-auth-validation-errors class="alert alert-danger alert-dismissible" :errors="$errors" />
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    {{ Session::get('error') }}
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-thumbs-up"></i>
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <h3>Personal Details</h3>
                                </li>
                                <li class="nav-item">
                                    <strong class="mr-3">Firstname: </strong>{{ $patient->firstname }}
                                </li>
                                <li class="nav-item">
                                    <strong class="mr-3">Lastname: </strong>{{ $patient->lastname }}
                                </li>
                                <li class="nav-item">
                                    <strong class="mr-3">Gender: </strong>{{ $patient->gender }}
                                </li>
                                <li class="nav-item">
                                    <strong class="mr-3">DOB: </strong>{{ $patient->dob }}
                                </li>
                                <li class="nav-item">
                                    <strong class="mr-3">Phone: </strong>{{ $patient->phone }}
                                </li>
                                <li class="nav-item">
                                    <strong class="mr-3">Address: </strong>{{ $patient->address }}
                                </li>
                                <li class="nav-item-divider nav-item"></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="nav flex-column">
                                <li class="nav-item-header nav-item">Activity</li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon fa fa-bell"> </i>
                                        <span>Notifications</span>
                                        <div class="ml-auto badge badge-pill badge-info">8</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon fa fa-folder-open"> </i>
                                        <span>Collections</span>
                                    </a>
                                </li>
                                <li class="nav-item-divider nav-item"></li>
                                <li class="nav-item">
                                    <a href="{{ route('user-map') }}" class="nav-link">
                                        <i class="nav-link-icon fa fa-map-marker"> </i>
                                        <span>Nearest health facility</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
