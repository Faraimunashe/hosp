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
                <div class="card-header">Collections
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
                            <th>Quantity</th>
                            <th>Attended By</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($collections as $item)
                                <tr>
                                    <td class="text-center text-muted">
                                        @php
                                            $count++;
                                            echo $count;
                                        @endphp
                                    </td>
                                    @php
                                        $user = \App\Models\Patient::where('user_id',$item->user_id)->first();
                                    @endphp
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        @php
                                            $admin = \App\Models\User::find($item->attend_by);
                                            echo $admin->name;
                                        @endphp
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

