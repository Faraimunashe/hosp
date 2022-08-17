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
                <div class="card-header">Available Facilities
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                                Create New
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Cordinates</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($hospitals as $item)
                                <tr>
                                    <td class="text-center text-muted">
                                        @php
                                            $count++;
                                            echo $count;
                                        @endphp
                                    </td>
                                    <td>{{ $item->cordidates }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{ $item->id }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <form action="{{ route('admin-add_hospital') }}" method="POST" class="">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Facility</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="Name" class="">Name</label>
                            <input name="name" id="Name" placeholder="e.g Gweru General Hospital" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="position-relative form-group">
                            <label for="Address" class="">Address</label>
                            <input name="address" id="Address" placeholder="e.g 82 Shurungwi Road" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="Latitude" class="">Latitude</label>
                            <input name="latitude" id="Latitude" placeholder="e.g -18.886879" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="Longitude" class="">Longitude</label>
                            <input name="longitude" id="Longitude" placeholder="e.g 20.7984236" type="text" class="form-control" required>
                        </div>
                    </div>
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
@foreach ($hospitals as $hos)
    <div class="modal fade bd-example-modal-lg{{ $hos->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <form action="{{ route('admin-edit_hospital') }}" method="POST" class="">
                @csrf
                <input type="hidden" name="hospital_id" value="{{ $hos->id }}" required>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update {{ $hos->name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="Name" class="">Name</label>
                                <input name="name" id="Name" value="{{ $hos->name }}" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="Address" class="">Address</label>
                                <input name="address" id="Address" value="{{ $hos->address }}" type="text" class="form-control" required>
                            </div>
                        </div>
                        @php
                            $cords = explode (",", $hos->cordidates);
                        @endphp
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="Latitude" class="">Latitude</label>
                                <input name="latitude" id="Latitude" value="{{ $cords[0] }}" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="Longitude" class="">Longitude</label>
                                <input name="longitude" id="Longitude" value="{{ $cords[1] }}" type="text" class="form-control" required>
                            </div>
                        </div>
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
@endforeach
