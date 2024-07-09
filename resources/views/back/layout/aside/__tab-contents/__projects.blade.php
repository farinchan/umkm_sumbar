<div class="m-0">
    {{-- <div class="d-flex mb-10">
        @include('back/partials/search/_inline')
        <div class="flex-shrink-0 ms-2">
            <button type="button" class="btn btn-icon btn-bg-light btn-active-icon-primary btn-color-gray-500"
                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span class="path2"></span></i> </button>
            @include('back/partials/menus/_menu-1')
        </div>
    </div> --}}
    <div class="m-0">
        <h1 class="text-gray-800 fw-semibold mb-6 mx-5">Informasi</h1>
        <div class="mb-10">
            <a href="{{ route("information") }}#privacy-policy" class="custom-list d-flex align-items-center px-5 py-4">
                <div class="symbol symbol-40px me-5">
                    <span class="symbol-label">
                        <img src="{{ asset("back/media/icons/information/privacy_policy.png") }}" class="h-50 align-self-center"
                            alt="" />
                    </span>
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Privacy Policy</h5>
                    <span class="text-gray-500 fw-bold">{{ $website->name }}</span>
                </div>
            </a>
            <a href="{{ route("information") }}#terms-and-conditions" class="custom-list d-flex align-items-center px-5 py-4">
                <div class="symbol symbol-40px me-5">
                    <span class="symbol-label">
                        <img src="{{ asset("back/media/icons/information/term_and_condition.png") }}"
                            class="h-50 align-self-center" alt="" />
                    </span>
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Terms and Conditions</h5>
                    <span class="text-gray-500 fw-bold">{{ $website->name }}</span>
                </div>
            </a>
            <a href="{{ route("information") }}#return-policy" class="custom-list d-flex align-items-center px-5 py-4">
                <div class="symbol symbol-40px me-5">
                    <span class="symbol-label">
                        <img src="{{ asset("back/media/icons/information/return_policy.png") }}" class="h-50 align-self-center"
                            alt="" />
                    </span>
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Return Policy</h5>
                    <span class="text-gray-500 fw-bold">{{ $website->name }}</span>
                </div>
            </a>

            <a href="{{ route("information") }}#shipping-policy" class="custom-list d-flex align-items-center px-5 py-4">
                <div class="symbol symbol-40px me-5">
                    <span class="symbol-label">
                        <img src="{{ asset("back/media/icons/information/shipping_policy.png") }}"
                            class="h-50 align-self-center" alt="" />
                    </span>
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Shipping Policy</h5>
                    <span class="text-gray-500 fw-bold">{{ $website->name }}</span>
                </div>
            </a>

            <a href="{{ route("information") }}#cancellation-policy" class="custom-list d-flex align-items-center px-5 py-4">
                <div class="symbol symbol-40px me-5">
                    <span class="symbol-label">
                        <img src="{{ asset("back/media/icons/information/cancellation_policy.png") }}"
                            class="h-50 align-self-center" alt="" />
                    </span>
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Cancelation Policy</h5>
                    <span class="text-gray-500 fw-bold">{{ $website->name }}</span>
                </div>
            </a>

            <a href="{{ route("information") }}#refund-policy" class="custom-list d-flex align-items-center px-5 py-4">
                <div class="symbol symbol-40px me-5">
                    <span class="symbol-label">
                        <img src="{{ asset("back/media/icons/information/refund_policy.png") }}" class="h-50 align self-center"
                            alt="" />
                    </span>
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Refund Policy</h5>
                    <span class="text-gray-500 fw-bold">{{ $website->name }}</span>
                </div>
            </a>

            <a href="{{ route("information") }}#payment-policy" class="custom-list d-flex align-items-center px-5 py-4">
                <div class="symbol symbol-40px me-5">
                    <span class="symbol-label">
                        <img src="{{ asset("back/media/icons/information/payment_policy.png") }}"
                            class="h-50 align-self-center" alt="" />
                    </span>
                </div>
                <div class="d-flex flex-column flex-grow-1">
                    <h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Payment Policy</h5>
                    <span class="text-gray-500 fw-bold">{{ $website->name }}</span>
                </div>
            </a>

        </div>
    </div>
</div>
