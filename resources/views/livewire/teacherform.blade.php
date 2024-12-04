<div class="row">
    <div class="card">
        <div class="row card-body p-5">
            <div class="col-lg-12">
                <p class="text-success">Teacher/User Information</p>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    @csrf
                    <label for="">Teacher Name</label>
                    <br>
                    @error('name')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="name" class="form-control form-control" id="" placeholder="Enter Name">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Email</label>
                    <br>
                    @error('email')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="email" class="form-control form-control" id="" placeholder="Enter Email">
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label for="sex">Sex</label>
                    <div class="d-flex" >
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="sex" name="sex" value="M" checked> Male <i class="input-helper"></i>
                            </label>
                        </div>
                        <div class="form-check form-check-primary mx-3">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="sex" name="sex" value="F"> Female <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="sex">Active Status</label>
                    <div class="d-flex" >
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="active_flag" name="active_flag" value="Y" checked> Active <i class="input-helper"></i>
                            </label>
                        </div>
                        <div class="form-check form-check-primary mx-3">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" wire:model="active_flag" name="active_flag" value="N"> Inactive <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-12 d-flex">
                <a href="{{ route('admin.users') }}" class="d-flex align-items-center btn btn-secondary mr-2"> <i class="mr-2 icon-arrow-left-circle"></i> Cancel </a>
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
            window.location.replace("{{ route('admin.users') }}")
        })
    </script>
    @endscript
</div>