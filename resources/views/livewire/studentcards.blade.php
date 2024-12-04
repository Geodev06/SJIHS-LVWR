<div class="row">
    <div class="col-lg-12">
        <h3>Student Records</h3>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="">Search</label>

            <input type="text" class="form-control form-control" wire:model.live="lrn" placeholder="Search LRN, Firstname, Middlename or Lastname">
        </div>
    </div>
    <div class="col-lg-8">

    </div>
    @forelse($records as $item)
    <div class="col-lg-3 mb-2">
        <div class="card" style="border-radius: 4px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">{{ $item->fname }} {{ $item->mname }} {{ $item->lname }} {{ $item->ext_name }}</h4>
                        <p>{{ \Carbon\Carbon::parse($item->birthdate)->format('M d, Y') }}</p>
                        <p class="font-weight-bold f-12 m-0" style="letter-spacing: 2px; cursor:pointer"><span class="badge badge-success p-1 text-white">{{ $item->lrn }}</span></p>
                    </div>
                    <a href="{{ route('admin.student_form',[encrypt($item->id), encrypt(2) ]) }}" class="btn btn-sm btn-primary"><i class="icon-folder"></i></a>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="f-12">created by : {{ $item->creator->email ?? ''  }} </p>
                    <p class="f-12">created date : {{ $item->created_at->format('Y-m-d') }} </p>
                </div>

            </div>
        </div>
    </div>
    @empty
    <div class="col-lg-12">
        No Data
    </div>
    @endforelse

    <div class="col-lg-12">
        {{ $records->links() }}
    </div>
</div>