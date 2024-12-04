<div>
    <h5>Create New User</h5>

    <form class="pt-2 card" id="form_user">

        <div class="row card-body">
            <div class="col-lg-7">
                <div class="form-group">
                    @csrf
                    <label for="name">Name</label>
                    <br>
                    <span class="text-danger error-name error-text"></span>
                    <input type="text" class="form-control form-control-lg" placeholder="Enter Name" name="name" id="name">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="form-group">
                    <label for="email">Email</label>
                    <br>
                    <span class="text-danger error-email error-text"></span>
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter Email" id="email">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="form-group">
                    <label for="sex">Sex</label>
                    <div class="d-flex">
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex" value="male" checked> Male <i class="input-helper"></i>
                            </label>
                        </div>
                        <div class="form-check form-check-primary mx-3">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex" value="female"> Female <i class="input-helper"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
            <div class="">
                <!-- Changed to type submit for proper form submission -->
                <a href="/manage-users" class="btn btn-md btn-secondary  font-weight-medium auth-form-btn" id="btn_submit">BACK</a>

                <button type="submit" class="btn btn-md btn-primary  font-weight-medium auth-form-btn" id="btn_submit">SUBMIT</button>
            </div>
        </div>
        </div>

       

    </form>

    <script>
        // Updated event listener for form submission
        $('#form_user').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
            start_loading(); // Start loading animation

            $('.error-text').text('');
            send_request('POST', '/user-save', $(this).serialize(), function(xhr) {
                // Handle before sending request (if needed)
            }, function(res) {
                if (res.success == false) {
                    handle_form_response(res, '#form_user'); // Handle response and display errors
                }

                if (res.success == true) {
                    toastr.success(res.msg)
                    $('#form_user')[0].reset()
                }

                stop_loading(); // Stop loading animation after the response is handled
            }, function(xhr, status, err) {
                toastr.error(xhr.responseJSON.errors)

                stop_loading(); // Ensure loading animation stops on error
            });
        });
    </script>

</div>