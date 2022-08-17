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
                <div class="card-header">Registered Patients
                    <div class="btn-actions-pane-right">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th class="text-center">Gender</th>
                            <th>DOB</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($patients as $item)
                                <tr>
                                    <td class="text-center text-muted">
                                        @php
                                            $count++;
                                            echo $count;
                                        @endphp
                                    </td>
                                    <td>{{ $item->firstname }}</td>
                                    <td>{{ $item->lastname }}</td>
                                    <td class="text-center">{{ $item->gender }}</td>
                                    <td>{{ $item->dob }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" data-target=".bd-example-modal-lg{{ $item->id }}" class="mr-2 btn-icon btn-icon-only btn btn-outline-primary">
                                            <i class="pe-7s-check btn-icon-wrapper"> </i>
                                        </button>
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
@foreach ($patients as $item)
    <div class="modal fade bd-example-modal-lg{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin-patient-collect') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Record Medication Collection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="user_id" value="{{ $item->user_id }}" required>
                        <div class="position-relative form-group">
                            <label for="Name" class="">ARV Quantity</label>
                            <input name="quantity" id="Name" placeholder="e.g 1 bottle" type="text" class="form-control" required>
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

