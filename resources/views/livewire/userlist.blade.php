<div class="row">
    <div class="col-lg-12">
        <h3>Users</h3>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="">Search</label>

            <input type="text" class="form-control form-control" wire:model.live.debounce.150ms="search" placeholder="Search">
        </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive table-striped border rounded">
                    <table class="table">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th class="font-weight-bold">Name</th>
                                <th class="font-weight-bold">Email</th>
                                <th class="font-weight-bold">Sex</th>
                                <th class="font-weight-bold">Status</th>
                                <th class="font-weight-bold">Created at</th>
                                <th class="font-weight-bold">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse($records as $item)
                            <tr>
                                <td>{{ $item->name ?? ''}} </td>
                                <td>{{ $item->email ?? ''}}</td>
                                <td>
                                    @if($item->sex == 'M')
                                    <span class="badge badge-info p-2">Male</span>
                                    @else
                                    <span class="badge badge-dark p-2">Female</span>

                                    @endif
                                </td>
                                <td>
                                    @if($item->active_flag == 'Y')
                                    <span class="badge badge-success p-2">Active</span>
                                    @else
                                    <span class="badge badge-danger p-2">Inactive</span>

                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('Y-m-d') ?? ''}}</td>
                                <td>
                                    <a href="{{ route('admin.user_form',[encrypt($item->id), encrypt(2) ]) }}" class="btn btn-sm btn-primary"><i class="icon-folder"></i></a>
                                </td>


                            </tr>
                            @empty
                            <div class="col-lg-12">
                                <td colspan="5" class="text-center">No Data</td>
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $records->links() }}
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        {{ $records->links() }}
    </div>

</div>