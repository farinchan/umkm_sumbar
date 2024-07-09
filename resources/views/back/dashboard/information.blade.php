@extends('back.app')
@section('seo')
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl" id="kt_content_container">
            <div class="card">
                <div class="card-body p-lg-15">
                    <div class="mb-13">
                        <div class="mb-15">
                            <h4 id="privacy-policy" class="fs-2x text-gray-800 w-bolder mb-6"># Privacy Policy </h4>
                            {!! $setting_website->privacy_policy !!}
                        </div>
                    </div>
                    <div class="mb-13">
                        <div class="mb-15">
                            <h4 id="terms-and-conditions" class="fs-2x text-gray-800 w-bolder mb-6"># Terms and Conditions
                            </h4>
                            {!! $setting_website->terms_and_conditions !!}
                        </div>
                    </div>
                    <div class="mb-13">
                        <div class="mb-15">
                            <h4 id="return-policy" class="fs-2x text-gray-800 w-bolder mb-6"># Return Policy </h4>
                            {!! $setting_website->return_policy !!}
                        </div>
                    </div>
                    <div class="mb-13">
                        <div class="mb-15">
                            <h4 id="shipping-policy" class="fs-2x text-gray-800 w-bolder mb-6"># Shipping Policy </h4>
                            {!! $setting_website->shipping_policy !!}
                        </div>
                    </div>
                    <div class="mb-13">
                        <div class="mb-15">
                            <h4 id="cancellation-policy" class="fs-2x text-gray-800 w-bolder mb-6"># Cancellation Policy
                            </h4>
                            {!! $setting_website->cancellation_policy !!}
                        </div>
                    </div>
                    <div class="mb-13">
                        <div class="mb-15">
                            <h4 id="refund-policy" class="fs-2x text-gray-800 w-bolder mb-6"># Refund Policy </h4>
                            {!! $setting_website->refund_policy !!}
                        </div>
                    </div>
                    <div class="mb-13">
                        <div class="mb-15">
                            <h4 id="payment-policy" class="fs-2x text-gray-800 w-bolder mb-6"># Payment Policy </h4>
                            {!! $setting_website->payment_policy !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
