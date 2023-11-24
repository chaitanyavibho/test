@extends('layouts.layout')
@section('content')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Latest Trasaction</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">(#) Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" colspan="2">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">#14256</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-2.jpg" alt=""
                                                            class="avatar-xs rounded-circle mr-2"> Philip Smead
                                                    </div>
                                                </td>
                                                <td>15/1/2018</td>
                                                <td>$94</td>
                                                <td><span class="badge badge-success">Delivered</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#14257</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-3.jpg" alt=""
                                                            class="avatar-xs rounded-circle mr-2"> Brent Shipley
                                                    </div>
                                                </td>
                                                <td>16/1/2019</td>
                                                <td>$112</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#14258</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-4.jpg" alt=""
                                                            class="avatar-xs rounded-circle mr-2"> Robert Sitton
                                                    </div>
                                                </td>
                                                <td>17/1/2019</td>
                                                <td>$116</td>
                                                <td><span class="badge badge-success">Delivered</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#14259</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-5.jpg" alt=""
                                                            class="avatar-xs rounded-circle mr-2"> Alberto Jackson
                                                    </div>
                                                </td>
                                                <td>18/1/2019</td>
                                                <td>$109</td>
                                                <td><span class="badge badge-danger">Cancel</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#14260</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-6.jpg" alt=""
                                                            class="avatar-xs rounded-circle mr-2"> David Sanchez
                                                    </div>
                                                </td>
                                                <td>19/1/2019</td>
                                                <td>$120</td>
                                                <td><span class="badge badge-success">Delivered</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">#14261</th>
                                                <td>
                                                    <div>
                                                        <img src="assets/images/users/user-2.jpg" alt=""
                                                            class="avatar-xs rounded-circle mr-2"> Philip Smead
                                                    </div>
                                                </td>
                                                <td>15/1/2018</td>
                                                <td>$94</td>
                                                <td><span class="badge badge-warning">Pending</span></td>
                                                <td>
                                                    <div>
                                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
@endsection
