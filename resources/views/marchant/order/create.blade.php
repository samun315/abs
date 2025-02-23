@extends('master')
@section('title', 'Add Balance')
<style nonce="{{ $cspNonce }}">
    .payment-option {
        display: block;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .payment-box {
        background: #eee;
        padding: 15px;
        border-radius: 5px;
        text-align: left;
        font-weight: bold;
        transition: 0.3s;
        border: 2px solid transparent;
        color: #007bff;
        display: flex;
        justify-content: space-between;
        /* Ensures checkmark is at the end */
        align-items: center;
        position: relative;
        width: 100%;
    }

    input:checked+.payment-box {
        background: #eee;
        border-color: #007bff;
    }

    .checkmark {
        display: none;
        font-size: 18px;
        color: rgb(185, 185, 207);
        font-weight: bold;
    }


    input:checked+.payment-box .checkmark {
        display: inline-block;
    }


    .payment-text {
        flex-grow: 1;
        /* Ensures the text takes all available space */
    }

    input:checked+.payment-box .checkmark {
        display: inline-block;
    }
    
    .table {
            border-collapse: collapse;
            width: 100%;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
</style>
@section('content')
    <x-toolbar-component title="Add Balance" :breadcrumbs="[
        ['label' => 'Home', 'url' => route('dashboard')],
        ['label' => 'Order Management', 'url' => 'javascript:void(0)'],
        ['label' => 'Order', 'url' => 'javascript:void(0)'],
        ['label' => 'Add Balance', 'active' => true],
    ]" actionUrl="{{ route('marchant.order.balance.index') }}"
        actionIcon="fas fa-table" actionLabel="Order list" />
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-fluid">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <form method="POST" action="{{route('marchant.order.balance.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 row">
                                <div class="col-md-12">
                                    <label class="required fs-5 fw-bold mb-2">Payment Gateway</label>
                                    @foreach ($paymentGateways as $gateway)
                                        <label class="payment-option text-left" for="payment_gateway_{{ $gateway->id }}">
                                            <input type="radio" class="payment_gateway" name="payment_gateway_id"
                                                value="{{ $gateway->id }}" id="payment_gateway_{{ $gateway->id }}" hidden>
                                            <div class="payment-box">
                                                <span class="payment-text">{{ strtoupper($gateway->gateway_name) }}
                                                    ({{ $gateway->currency_code }})
                                                </span>
                                                <span class="checkmark">&#10004;</span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
    
                                <div class="col-md-12 fv-row mb-5 amount_div">
                                    <label class="required fs-5 fw-bold mb-2">Amount</label>
                                    <input type="number" name="amount" id="kt_amount" step="0.0001"
                                        class="form-control form-control-solid amount bg-gradient @error('amount') is-invalid @enderror"
                                        placeholder="Enter Amount" autocomplete="off" required />
                                    @error('amount')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="col-md-12 fv-row mb-5 amount_div">
                                    <label class="required fs-5 fw-bold mb-2">Transaction ID/Reference ID</label>
                                    <input type="text" name="transaction_id" id="kt_transaction_id"
                                        class="form-control form-control-solid transaction_id bg-gradient @error('transaction_id') is-invalid @enderror"
                                        placeholder="Enter Transaction ID/Reference ID" autocomplete="off" required />
                                    @error('transaction_id')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="col-md-12 fv-row mb-5 amount_div">
                                    <label class="required fs-5 fw-bold mb-2">Upload Attachment</label>
                                    <input type="file" id="kt_attachment"
                                        class="form-control form-control-solid @error('attachment_url') is-invalid @enderror"
                                        name="attachment_url" />
                                    @error('attachment_url')
                                        <span class="text-danger mt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 row detailsDiv">
                                <div class="col-md-12 mt-9">
                                    <table class="table border border-2">
                                        <tr class="highlight text-white">
                                            <th class="ps-2">FIELD</th>
                                            <th>INFORMATION</th>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Please Send Balance</td>
                                            <td>TK <span class="bd_amount">200</span> <span class="kt_currency">BDT</span></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Gateway</td>
                                            <td class="gateway_name_column"></td>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Currency</td>
                                            <td>
                                                <span class="kt_currency"></span><br>
                                                Rate : 💎 1 IMO Diamond = <span class="rate-box"></span><span class="kt_currency"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Amount <span class="kt_currency"></span> to IMO Diamond</td>
                                            <td>
                                                <input type="text"  name="diamond_quantity" id="kt_diamond_quantity">
                                                Amount <span class="kt_currency">BDT</span> <span class="bd_amount">200</span> TK = 💎 <span class="diamond_amount">90.49737556561</span> IMO Diamond
                                            </td>
                                        </tr>
                                        <tr class="highlight text-white">
                                            <th class="ps-2" colspan="2">Gateway Details</th>
                                        </tr>
                                        <tr>
                                            <th class="ps-2" colspan="2"><strong class="gateway_details">City bank ltd.</strong></th>
                                        </tr>
                                        <tr>
                                            <td class="ps-2">Uploaded Attachment</td>
                                            <td class="upload_file">Upload</td>
                                        </tr>
                                    </table>
                                </div>
                                {{-- <div class="pull-right">
                                    <button class="btn btn-sm btn-primary">Request For Order</button>
                                </div> --}}
                           
                            </div>
                            <div class="row">
                                <div class="col-md-9 fv-row mb-5"></div>
                                <div class="col-md-3 fv-row mb-5 d-grid">
                                    <button type="submit" class="btn btn-primary me-5">Request For Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                 
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
    <script src="{{ asset('assets/custom/js/marchant/order/index.js') }}"
        {{ Sri::html('assets/custom/js/marchant/order/index.js') }}></script>
    <!--end::Page Custom Stylesheets(used by this page)-->

@endsection
