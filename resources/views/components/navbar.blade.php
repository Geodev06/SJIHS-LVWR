<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome stallar dashboard!</h5>
        <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <span class="font-weight-normal"> {{ Auth::user()->name ?? '' }} </span></a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">

                    <a class="dropdown-item" id="btn_logout"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>

    <script>
        $('#btn_logout').click(function() {
            start_loading(); // Start loading animation
            send_request('POST', '/logout', {
                _token: "{{ csrf_token() }} "
            }, function(xhr) {
                // Handle before sending request (if needed)
            }, function(res) {
                window.location.replace(res.redirect)
                stop_loading(); // Stop loading animation after the response is handled
            }, function(xhr, status, err) {
                toastr.error(xhr.responseJSON.errors)
                stop_loading(); // Ensure loading animation stops on error
            });
        })
    </script>
</nav>