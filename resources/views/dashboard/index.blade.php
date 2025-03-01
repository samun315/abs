@extends('master')

@section('title', 'Dashboard')
@section('content')

    <!--begin::Toolbar  -->
    <x-toolbar-component title="Dashboard" :breadcrumbs="[['label' => 'Home', 'url' => route('dashboard')], ['label' => 'Dashboard', 'active' => true]]" />

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            @can('dashboard.admin')
                <div class="row g-5 g-xl-8">
                    @can('marchant.balance.request.approve.index')
                        <div class="col-xl-3">
                            <!--begin::Statistics Widget 5-->
                            <a href="javascript:void(0)" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span
                                        class="svg-icon svg-icon-white svg-icon-3x ms-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Shopping/Cart1.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>Stockholm-icons / Shopping / Cart1</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs />
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">Pending Order</div>
                                    <div class="fw-bold text-white">{{ $pending_order }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    @endcan
                    @can('marchant.balance.request.approve.index')
                        <div class="col-xl-3">
                            <!--begin::Statistics Widget 5-->
                            <a href="/marchant/all/balance/request" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                    <span
                                        class="svg-icon svg-icon-white svg-icon-3x ms-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/File.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>Stockholm-icons / Files / File</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs />
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1" />
                                                <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1" />
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">Pending Request</div>
                                    <div class="fw-bold text-white">{{ $pending_request }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    @endcan
                    @can('marchant.balance.request.approve.index')
                        <div class="col-xl-3">
                            <!--begin::Statistics Widget 5-->
                            <a href="javascript:void(0)" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                                    <span
                                        class="svg-icon svg-icon-white svg-icon-3x ms-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Files/Cloud-upload.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>Stockholm-icons / Files / Cloud-upload</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs />
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path
                                                    d="M5.74714567,13.0425758 C4.09410362,11.9740356 3,10.1147886 3,8 C3,4.6862915 5.6862915,2 9,2 C11.7957591,2 14.1449096,3.91215918 14.8109738,6.5 L17.25,6.5 C19.3210678,6.5 21,8.17893219 21,10.25 C21,12.3210678 19.3210678,14 17.25,14 L8.25,14 C7.28817895,14 6.41093178,13.6378962 5.74714567,13.0425758 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M11.1288761,15.7336977 L11.1288761,17.6901712 L9.12120481,17.6901712 C8.84506244,17.6901712 8.62120481,17.9140288 8.62120481,18.1901712 L8.62120481,19.2134699 C8.62120481,19.4896123 8.84506244,19.7134699 9.12120481,19.7134699 L11.1288761,19.7134699 L11.1288761,21.6699434 C11.1288761,21.9460858 11.3527337,22.1699434 11.6288761,22.1699434 C11.7471877,22.1699434 11.8616664,22.1279896 11.951961,22.0515402 L15.4576222,19.0834174 C15.6683723,18.9049825 15.6945689,18.5894857 15.5161341,18.3787356 C15.4982803,18.3576485 15.4787093,18.3380775 15.4576222,18.3202237 L11.951961,15.3521009 C11.7412109,15.173666 11.4257142,15.1998627 11.2472793,15.4106128 C11.1708299,15.5009075 11.1288761,15.6153861 11.1288761,15.7336977 Z"
                                                    fill="#000000" fill-rule="nonzero"
                                                    transform="translate(11.959697, 18.661508) rotate(-90.000000) translate(-11.959697, -18.661508) " />
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <!--end::Svg Icon-->
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">Pending Transfer</div>
                                    <div class="fw-bold text-white">{{ $pending_transfer }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    @endcan
                    @can('marchant.balance.request.approve.index')
                        <div class="col-xl-3">
                            <!--begin::Statistics Widget 5-->
                            <a href="/marchant/all/whitelist/request" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <span
                                        class="svg-icon svg-icon-white svg-icon-3x ms-n1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Devices/Phone.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <title>Stockholm-icons / Devices / Phone</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs />
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M7.13888889,4 L7.13888889,19 L16.8611111,19 L16.8611111,4 L7.13888889,4 Z M7.83333333,1 L16.1666667,1 C17.5729473,1 18.25,1.98121694 18.25,3.5 L18.25,20.5 C18.25,22.0187831 17.5729473,23 16.1666667,23 L7.83333333,23 C6.42705272,23 5.75,22.0187831 5.75,20.5 L5.75,3.5 C5.75,1.98121694 6.42705272,1 7.83333333,1 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <polygon fill="#000000" opacity="0.3" points="7 4 7 19 17 19 17 4" />
                                                <circle fill="#000000" cx="12" cy="21" r="1" />
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <div class="text-white fw-bolder fs-2 mb-2 mt-5">Pending Whitelist</div>
                                    <div class="fw-bold text-white">{{ $pending_whitelist }}</div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                    @endcan
                </div>
            @endcan
            @can('dashboard.distributor')
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-fluid">
                        <div class="card shadow-sm">
                            <!-- Cover Image -->
                            <div class="card-body p-0 position-relative">
                                <img src="{{ asset('assets/media/background/background10.jpg') }}"
                                    class="w-100 h-250px object-cover" alt="Cover Image">
                                <div class="position-absolute top-100 start-50 translate-middle">
                                    @if (!empty(getLoggedInUserInfo('logged_session_data.profile_img')))
                                        <img src="{{ asset('uploads/user/profile/' . getLoggedInUserInfo('logged_session_data.profile_img')) }}"
                                            class="rounded-circle border border-white shadow-lg" width="100"
                                            height="100" alt="Profile Image" />
                                    @else
                                        <img src="{{ asset('assets/media/avatars/300-1.jpg') }}"
                                            class="rounded-circle border border-white shadow-lg" width="100"
                                            height="100" alt="Profile Image" />
                                    @endif
                                </div>
                            </div>

                            <!-- Profile Info -->
                            <div class="card-body text-center mt-10">
                                <h3 class="fw-bold text-gray-800"> {{ getLoggedInUserInfo('logged_session_data.full_name') }}
                                </h3>
                                <p class="text-muted">{{ getLoggedInUserInfo('logged_session_data.email') }}</p>


                                <!-- Stats Section -->
                                <div class="row mt-10 bg-light pt-4">
                                    <div class="col">
                                        <span class="fas fa-object-group fa-2x"></span>
                                        <p class="text-muted">Orders</p>
                                        <h4 class="fw-bolder">
                                            @if (isset($user_order))
                                                {{ $user_order }}
                                            @else
                                                0
                                            @endif
                                        </h4>
                                    </div>
                                    <div class="col">
                                        <span class="fas fa-gem fa-2x"></span>
                                        <p class="text-muted d-none d-md-block">Diamonds Balance</p>
                                        <p class="text-muted d-md-none">Balance</p>
                                        <h4 class="fw-bolder">
                                            @if (isset($user_diamond->current_balance))
                                                {{ $user_diamond?->current_balance }}
                                            @else
                                                0
                                            @endif
                                        </h4>
                                    </div>
                                    <div class="col">
                                        <span class="fas fa-shopping-bag fa-2x"></span>
                                        <p class="text-muted">Requests</p>
                                        <h4 class="fw-bolder">
                                            @if (isset($user_request))
                                                {{ $user_request }}
                                            @else
                                                0
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Buttons Section -->
                        <div class="row mt-5 mb-10">
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('marchant.order.balance.index') }}"
                                    class="card text-center bg-success text-white py-8 shadow-lg">
                                    <i class="fas fa-dollar-sign fa-2x text-white"></i>
                                    <h5 class="mt-2">Add Balance</h5>
                                </a>
                            </div>
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('marchant.balance.request.index') }}"
                                    class="card text-center bg-info text-white py-8 shadow-lg">
                                    <i class="fas fa-star-half-alt fa-2x text-white"></i>
                                    <h5 class="mt-2">Send Diamond to Sub Distributor</h5>
                                </a>
                            </div>
                            <div class="col-md-4 mb-4">
                                <a href="{{ route('marchant.transfer.balance.index') }}"
                                    class="card text-center bg-primary text-white py-8 shadow-lg">
                                    <i class="fas fa-gem fa-2x text-white"></i>
                                    <h5 class="mt-2">Transfer Diamonds to IMO</h5>
                                </a>
                            </div>
                        </div>
                        <!--end::Container-->
                    </div>
                </div>
            @endcan
            <!--end::Container-->
        </div>
    @endsection
