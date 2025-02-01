@extends('admin.app.app')
@section('page-title')
    'Welcome back, {{ Auth::user()->name }} 👋
@endsection

@section('content')
    <div class="row row-cols-xxl-5 row-cols-md-4 row-cols-1 align-items-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-muted float-end mt-n1 fs-18"><i
                            class="ti ti-external-link"></i></a>
                    <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Total Visitors</h5>
                    <div class="d-flex align-items-center gap-2 my-3">
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                <i class="ti ti-calendar-week"></i>
                            </span>
                        </div>
                        <h3 class="mb-0 fw-bold">#
                        </h3>
                    </div>
                    
                </div>
            </div>
        </div><!-- end col -->

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-muted float-end mt-n1 fs-18"><i
                            class="ti ti-external-link"></i></a>
                    <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Checked in</h5>
                    <div class="d-flex align-items-center gap-2 my-3">
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                <i class="ti ti-users"></i>
                            </span>
                        </div>
                        <h3 class="mb-0 fw-bold">#</h3>
                    </div>
                    {{-- <p class="mb-1">
                        <span class="text-primary me-1"><i class="ti ti-minus"></i></span>
                        <span class="text-nowrap text-muted">New Patients</span>
                        <span class="float-end"><b>61</b></span>
                    </p>
                    <p class="mb-0">
                        <span class="text-primary me-1"><i class="ti ti-minus"></i></span>
                        <span class="text-nowrap text-muted">Old Patients</span>
                        <span class="float-end"><b>75.5K</b></span>
                    </p> --}}
                </div>
            </div>
        </div><!-- end col -->

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-muted float-end mt-n1 fs-18"><i
                            class="ti ti-external-link"></i></a>
                    <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Checked out</h5>
                    <div class="d-flex align-items-center gap-2 my-3">
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                <i class="ti ti-hospital-circle"></i>
                            </span>
                        </div>
                        <h3 class="mb-0 fw-bold">#</h3>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-muted float-end mt-n1 fs-18"><i
                            class="ti ti-external-link"></i></a>
                    <h5 class="text-muted fs-13 text-uppercase" title="Number of Orders">Today's Visitors</h5>
                    <div class="d-flex align-items-center gap-2 my-3">
                        <div class="avatar-md flex-shrink-0">
                            <span class="avatar-title bg-primary-subtle text-primary rounded fs-22">
                                <i class="ti ti-health-recognition"></i>
                            </span>
                        </div>
                        <h3 class="mb-0 fw-bold">#</h3>
                    </div>
                    {{-- <p class="mb-1">
                        <span class="text-primary me-1"><i class="ti ti-point-filled"></i></span>
                        <span class="text-nowrap text-muted">Operations</span>
                        <span class="float-end"><b>20.69k</b></span>
                    </p>
                    <p class="mb-0">
                        <span class="text-primary me-1"><i class="ti ti-point-filled"></i></span>
                        <span class="text-nowrap text-muted">General</span>
                        <span class="float-end"><b>79.18k</b></span>
                    </p> --}}
                </div>
            </div>
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="d-flex card-header justify-content-between border-bottom border-dashed align-items-center">
                    <h4 class="header-title">Gender</h4>
                    
                </div>

                <div class="card-body">
                    <div id="gender-chart" class="apex-charts" data-colors="#465dff,#6ac75a,#67baf1"></div>

                    <div class="row mt-3">
                        {{-- @foreach ($chartData['labels'] as $index => $label)
                            <div class="col text-start">
                                <p class="text-muted mb-1">{{ ucfirst($label) }} </p>
                                <h4 class="mb-2">
                                    <span class="ti ti-man text-primary"></span>
                                    <span>{{ $chartData['series'][$index] }}</span>
                                </h4>

                            </div>
                        @endforeach --}}


                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
        </div>

        <div class="col-lg-8">
            <div class="card card-h-100">

                <div class="card-header d-flex flex-wrap border-bottom border-dashed align-items-center gap-3">
                    <h4 class="header-title me-auto">Visitors</h4>
                </div>

                <div class="card-body pt-1">
                    <div dir="ltr">
                        <div id="sessions-overview-users" class="apex-charts" data-colors="#465dff,#783bff"></div>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>
@endsection
