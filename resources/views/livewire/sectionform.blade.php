<div class="row">
    <div class="card">
        <div class="row card-body p-5">
            <div class="col-lg-12">
                <p class="text-success">Basic Section information</p>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    @csrf
                    <label for="">Section Name</label>
                    <br>
                    @error('name')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <input type="text" wire:model="name" class="form-control form-control" id="" placeholder="Enter Section Name">
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">School Year</label>
                    <br>
                    @error('school_year')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <div wire:ignore>
                        <select class="form-control" id="school_year" wire:model="school_year">
                            @foreach($schoolYears as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach

                        </select>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Level</label>
                    <br>
                    @error('level')
                    <span class="text-danger error-text"> {{ $message }}</span>
                    @enderror
                    <div wire:ignore>
                        <select class="form-control" id="level" wire:model="level">
                            <option value="" selected>Choose level</option>
                            <option value="7" selected>7</option>
                            <option value="8" selected>8</option>
                            <option value="9" selected>9</option>
                            <option value="10" selected>10</option>

                        </select>
                    </div>

                </div>
            </div>

            <div class="col-lg-6 mb-2">
                <div class="form-group m-0">
                    <label for="">Section Adviser</label>
                    <br>
                    @error("adviser_id")
                    <span class="text-danger error-text">{{ $message }}</span>
                    @enderror
                    <div wire:ignore>
                        <select class="form-control" id="adviser_id" wire:model="adviser_id">
                            <option value="" selected>Unassigned</option>
                            @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">
                                {{ $teacher->sex == 'M' ? 'Mr. ' : 'Ms. ' }}{{ $teacher->name ?? '' }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">

                <p class="text-success">Details</p>
            </div>

            <div class="col-lg-12 mb-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="font-weight-bold bg-dark text-white">Subject</th>
                            <th class="font-weight-bold bg-dark text-white">Teacher Assigned</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $subjects = [
                        'filipino' => 'Filipino',
                        'english' => 'English',
                        'math' => 'Mathematics',
                        'science' => 'Science',
                        'ap' => 'Araling panlipunan (AP)',
                        'esp' => 'Edukasyon sa pagpapakatao',
                        'tle' => 'Technology and Livelihood Education (TLE)',

                        ];
                        @endphp

                        @foreach($subjects as $key => $subject)
                        <tr>
                            <td class="font-weight-bold">{{ $subject }}</td>
                            <td>
                                <div class="form-group m-0">
                                    @error("{$key}_teacher_id")
                                    <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                    <div wire:ignore>
                                        <select class="form-control" id="{{ $key }}_teacher_id" wire:model="{{ $key }}_teacher_id">
                                            <option value="" selected>Unassigned</option>
                                            @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">
                                                {{ $teacher->sex == 'M' ? 'Mr. ' : 'Ms. ' }}{{ $teacher->name ?? '' }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="2" class="font-weight-bold">MAPEH</td>
                        </tr>

                        @foreach(['music', 'arts', 'pe', 'health'] as $key)
                        <tr>
                            <td><span class="ml-2">{{ ucfirst($key) }}</span></td>
                            <td>
                                <div class="form-group m-0">
                                    @error("{$key}_teacher_id")
                                    <span class="text-danger error-text">{{ $message }}</span>
                                    @enderror
                                    <div wire:ignore>
                                        <select class="form-control" id="{{ $key }}_teacher_id" wire:model="{{ $key }}_teacher_id">
                                            <option value="" selected>Unassigned</option>
                                            @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">
                                                {{ $teacher->sex == 'M' ? 'Mr. ' : 'Ms. ' }}{{ $teacher->name ?? '' }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


            <div class="col-lg-12 d-flex">
                <a href="{{ route('admin.manage_sections') }}" class="d-flex align-items-center btn btn-secondary mr-2"> <i class="mr-2 icon-arrow-left-circle"></i> Cancel </a>
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
            window.location.replace("{{ route('admin.manage_sections') }}")
        })
    </script>
    @endscript
</div>