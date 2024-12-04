<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @include('core.head')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <x-navbar/>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <x-sidebar />
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
               
                    <!-- Quick Action Toolbar Starts-->
                    <div class="row quick-action-toolbar">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-header d-block d-md-flex">
                                    <h5 class="mb-0">Quick Actions</h5>
                                </div>
                                <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                        <a href="{{ route('admin.student_form') }}" class="btn px-0"> <i class="icon-user mr-2"></i> Add Student</a>
                                    </div>
                                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                                        <a href="{{ route('admin.student_form') }}" class="btn px-0"><i class="icon-docs mr-2"></i> Add User</a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Quick Action Toolbar Ends-->
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-sm-flex align-items-baseline report-summary-header">
                                                <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row report-inner-cards-wrapper">
                                        <div class=" col-md -6 col-xl report-inner-card">
                                            <div class="inner-card-text">
                                                <span class="report-title">EXPENSE</span>
                                                <h4>$32123</h4>
                                                <span class="report-count"> 2 Reports</span>
                                            </div>
                                            <div class="inner-card-icon bg-success">
                                                <i class="icon-rocket"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl report-inner-card">
                                            <div class="inner-card-text">
                                                <span class="report-title">PURCHASE</span>
                                                <h4>95,458</h4>
                                                <span class="report-count"> 3 Reports</span>
                                            </div>
                                            <div class="inner-card-icon bg-danger">
                                                <i class="icon-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl report-inner-card">
                                            <div class="inner-card-text">
                                                <span class="report-title">QUANTITY</span>
                                                <h4>2650</h4>
                                                <span class="report-count"> 5 Reports</span>
                                            </div>
                                            <div class="inner-card-icon bg-warning">
                                                <i class="icon-globe-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl report-inner-card">
                                            <div class="inner-card-text">
                                                <span class="report-title">RETURN</span>
                                                <h4>25,542</h4>
                                                <span class="report-count"> 9 Reports</span>
                                            </div>
                                            <div class="inner-card-icon bg-primary">
                                                <i class="icon-diamond"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row income-expense-summary-chart-text">
                                        <div class="col-xl-4">
                                            <h5>Income And Expenses Summary</h5>
                                            <p class="small text-muted">A comparison of people who mark themselves of their ineterest from the date range given above. Learn more.</p>
                                        </div>
                                        <div class=" col-md-3 col-xl-2">
                                            <p class="income-expense-summary-chart-legend"> <span style="border-color: #6469df"></span> Total Income </p>
                                            <h3>$ 1,766.00</h3>
                                        </div>
                                        <div class="col-md-3 col-xl-2">
                                            <p class="income-expense-summary-chart-legend"> <span style="border-color: #37ca32"></span> Total Expense </p>
                                            <h3>$ 5,698.30</h3>
                                        </div>
                                        <div class="col-md-6 col-xl-4 d-flex align-items-center">
                                            <div class="input-group" id="income-expense-summary-chart-daterange">
                                                <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                                                <input type="text" class="form-control">
                                                <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row income-expense-summary-chart mt-3">
                                        <div class="col-md-12">
                                            <div class="ct-chart" id="income-expense-summary-chart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
              
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</body>
@include('core.scripts')

</html>