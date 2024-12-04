<div class="row">
    <div class="card">
        <div class="row card-body p-5">
            <div class="col-lg-12">
                <p class="text-success">School Information</p>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    @csrf
                    <label for="">School Name</label>
                    <br>
                    @error('name')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="name" class="form-control form-control" id="" placeholder="Enter Schol Name">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">School ID</label>
                    <br>
                    @error('school_id')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="school_id" class="form-control form-control" id="" placeholder="Enter School ID">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">District</label>
                    <br>
                    @error('district')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="district" class="form-control form-control" id="" placeholder="Enter District">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Division</label>
                    <br>
                    @error('division')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="division" class="form-control form-control" id="" placeholder="Enter Division">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Region</label>
                    <br>
                    @error('region')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="region" class="form-control form-control" id="" placeholder="Enter Region">
                </div>
            </div>

            <div class="col-lg-8">
                <div class="form-group">
                    <label for="">Principal Name</label>
                    <br>
                    @error('principal')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="principal" class="form-control form-control" id="" placeholder="Enter Principal">
                </div>
            </div>


            <div class="col-lg-12 d-flex">
                <a href="{{ route('admin.schools') }}" class="d-flex align-items-center btn btn-secondary mr-2"> <i class="mr-2 icon-arrow-left-circle"></i> Cancel </a>
                <button type="button" wire:click="save" wire:loading.attr="disabled" class="btn btn-primary btn-icon-text">
                    <i class="icon-doc btn-icon-prepend"></i> Save </button>
            </div>

            <div wire:loading wire:target="save" class="loading-page">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <img src="{{ asset('loader.gif') }}" alt="" srcset="">
                </div>
            </div>

        </div>
    </div>

    @script

    <script>
        $wire.on('record-created', () => {
            window.location.replace("{{ route('admin.schools') }}")
        })
    </script>
    @endscript
</div>