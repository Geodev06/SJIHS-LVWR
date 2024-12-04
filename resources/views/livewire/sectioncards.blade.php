<div class="row">
    <div class="col-lg-12">
        <h3>Sections</h3>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            <label for="">Search</label>

            <input type="text" class="form-control form-control" wire:model.live.debounce.150ms="search" placeholder="Search Section Name, Level or SY">
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
                        <h4 class="font-weight-bold mb-0">{{ $item->name }} - {{ $item->level }} - {{ $item->school_year }}</h4>

                    </div>
                    <a href="{{ route('admin.section_form',[encrypt($item->id), encrypt(2) ]) }}" class="btn btn-sm btn-primary"><i class="icon-folder"></i></a>
                </div>
            </div>
            <div class="card-footer">
                <p class="f-12"> Adviser : {{ $item->adviser->name ?? 'Unassigned' }}</p>
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