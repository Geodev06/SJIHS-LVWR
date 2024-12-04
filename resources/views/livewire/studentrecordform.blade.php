<div class="row">
    <div class="card">
        <div class="row card-body p-5">
            <div class="col-lg-12">
                <p class="text-success">Basic information</p>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    @csrf
                    <label for="">Firstname</label>
                    <br>
                    @error('firstname')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="firstname" class="form-control form-control" id="" placeholder="Enter Firstname">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">

                    <label for="">Middlename</label>
                    <br>
                    @error('middlename')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="middlename" class="form-control form-control" id="" placeholder="Enter Middlename">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">

                    <label for="">Lastname</label>
                    <br>
                    @error('lastname')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="lastname" class="form-control form-control" id="" placeholder="Enter Lastname">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">

                    <label for="">Ext. name</label>
                    <br>
                    @error('ext_name')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="ext_name" class="form-control form-control" id="" placeholder="Enter Ext. name">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label for="sex">Sex</label>
                    <div class="d-flex justify-content-center">
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="radio" wire:model="sex" class="form-check-input" name="sex" value="M" checked> Male <i class="input-helper"></i>
                            </label>
                        </div>
                        <div class="form-check form-check-primary mx-3">
                            <label class="form-check-label">
                                <input type="radio" wire:model="sex" class="form-check-input" name="sex" value="F"> Female <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">

                    <label for="">Birthdate</label>
                    <br>
                    @error('birthdate')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="date" wire:model="birthdate" class="form-control form-control" id="" placeholder="Enter Middlename">
                </div>
            </div>


            <div class="col-lg-5">
                <div class="form-group">

                    <label for="">LRN</label>
                    <br>
                    @error('lrn')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="lrn" class="form-control form-control" id="" placeholder="Enter LRN">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="form-group">

                    <label for="">Elementary School</label>
                    <br>
                    @error('elem_school_name')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="elem_school_name" class="form-control form-control" id="" placeholder="Enter Elementary school">
                </div>
            </div>

            <div class="col-lg-5">
                <div class="form-group">

                    <label for="">Elementary School ID</label>
                    <br>
                    @error('elem_school_id')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="elem_school_id" class="form-control form-control" id="" placeholder="Enter Elementary school ID">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="form-group">

                    <label for="">Elementary School Adrress</label>
                    <br>
                    @error('elem_school_address')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="elem_school_address" class="form-control form-control" id="" placeholder="Enter Elementary school Address">
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">

                    <label for="">Citation</label>
                    <br>
                    @error('citation')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="citation" class="form-control form-control" id="" placeholder="Enter Citation">
                </div>
            </div>

            <div class="col-lg-2">
                <div class="form-group">

                    <label for="">General Average</label>
                    <br>
                    @error('general_average')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="general_average" class="form-control form-control" id="" placeholder="Enter General Average">
                </div>
            </div>

            <hr>
            <div class="col-lg-12">
                <p class="text-success">Other information</p>
            </div>


            <div class="col-lg-6">
                <div class="form-group">

                    <label for="">PEPT. Rating</label>
                    <br>
                    @error('pept_rating')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="pept_rating" class="form-control form-control" id="" placeholder="Enter Rating">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">

                    <label for="">ALS. Rating</label>
                    <br>
                    @error('als_rating')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="als_rating" class="form-control form-control" id="" placeholder="Enter Rating">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">

                    <label for="">PEPT. Date</label>
                    <br>
                    @error('pept_date')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="date" wire:model="pept_date" class="form-control form-control" id="" placeholder="Enter Date">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">

                    <label for="">ALS. Address</label>
                    <br>
                    @error('als_address')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="als_address" class="form-control form-control" id="" placeholder="Enter Address">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">

                    <label for="">Others</label>
                    <br>
                    @error('others')
                    <span class="text-danger  error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="others" class="form-control form-control" id="" placeholder="Enter Other Particulars">
                </div>
            </div>

            <div class="col-lg-12 d-flex">
                <a href="{{ route('admin.manage_student_record') }}" class="d-flex align-items-center btn btn-secondary mr-2"> <i class="mr-2 icon-arrow-left-circle"></i> Cancel </a>
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
            window.location.replace("{{ route('admin.manage_student_record') }}")
        })
    </script>
    @endscript
</div>