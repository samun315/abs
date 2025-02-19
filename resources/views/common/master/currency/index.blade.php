@extends('master')

@section('title', 'Currency List')
@section('content')

    <!--begin::Toolbar -->
    <x-toolbar-component title="Currency List" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('dashboard')],
        ['label' => 'Wallet Management', 'url' => 'javascript:void(0)'],
        ['label' => 'Currency List', 'active' => true],
    ]" />
    <!--end::Toolbar -->

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Card-->
            <div class="card">

                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                    <x-search />
                </div>
                <!--end::Header-->

                <!--begin::Card body-->
                <div class="card-body py-4">
                    @include('message')

                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4" id="currecny-table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted text-uppercase fw-bolder fs-7 gs-0">
                                    <th style="width: 10%">#</th>
                                    <th style="width: 70%">Currency Name</th>
                                    <th style="width: 70%">Currency Code</th>
                                    <th style="width: 10%">Active</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

@endsection

@section('page_script')

    <!-- begin::Page Custom Stylesheets(used by this page) -->
    <script src="{{ asset('assets/custom/js/common/master/currency/index.js') }}" {{ Sri::html('assets/custom/js/common/master/currency/index.js') }}></script>
    <!--end::Page Custom Stylesheets(used by this page)-->

@endsection
