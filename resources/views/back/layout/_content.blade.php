<!--begin::Container-->
<div class=" container-xxl " id="kt_content_container">
<!--begin::Row-->
<div class="row gy-5 g-xxl-8">
    <!--begin::Col-->
    <div class="col-xxl-4">
@include("back/partials/widgets-2/mixed/_widget-12")
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xxl-8">
<!--begin::Tables Widget 9-->
<div class="card card-xxl-stretch mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold fs-3 mb-1">Members Statistics</span>
			<span class="text-muted mt-1 fw-semibold fs-7">Over 500 members</span>
		</h3>
        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="Click to add a user">
            <a href="#" class="btn btn-sm btn-light btn-active-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends" >
                <i class="ki-duotone ki-plus fs-2"></i>                New Member
            </a>
        </div>
    </div>
    <!--end::Header-->
	<!--begin::Body-->
	<div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted">
                        <th class="w-25px">
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1"  data-kt-check="true" data-kt-check-target=".widget-9-check"/>
                            </div>
                        </th>
                        <th class="min-w-200px">Authors</th>
                        <th class="min-w-150px">Company</th>
                        <th class="min-w-150px">Progress</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                                            <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check" type="checkbox" value="1"/>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                        <img src="assets/media/avatars/300-14.jpg" alt=""/>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Ana Simmons</a>
                                        <span class="text-muted fw-semibold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block fs-6">Intertico</a>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">Web, UI/UX Design</span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex flex-stack mb-2">
                                        <span class="text-muted me-2 fs-7 fw-bold">
                                            50%
                                        </span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-switch fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check" type="checkbox" value="1"/>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                        <img src="assets/media/avatars/300-2.jpg" alt=""/>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Jessie Clarcson</a>
                                        <span class="text-muted fw-semibold text-muted d-block fs-7">C#, ASP.NET, MS SQL</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block fs-6">Agoda</a>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">Houses & Hotels</span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex flex-stack mb-2">
                                        <span class="text-muted me-2 fs-7 fw-bold">
                                            70%
                                        </span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-switch fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check" type="checkbox" value="1"/>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                        <img src="assets/media/avatars/300-5.jpg" alt=""/>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Lebron Wayde</a>
                                        <span class="text-muted fw-semibold text-muted d-block fs-7">PHP, Laravel, VueJS</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block fs-6">RoadGee</a>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">Transportation</span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex flex-stack mb-2">
                                        <span class="text-muted me-2 fs-7 fw-bold">
                                            60%
                                        </span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-switch fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check" type="checkbox" value="1"/>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                        <img src="assets/media/avatars/300-20.jpg" alt=""/>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Natali Goodwin</a>
                                        <span class="text-muted fw-semibold text-muted d-block fs-7">Python, PostgreSQL, ReactJS</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block fs-6">The Hill</a>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">Insurance</span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex flex-stack mb-2">
                                        <span class="text-muted me-2 fs-7 fw-bold">
                                            50%
                                        </span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-switch fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    </a>
                                </div>
                            </td>
                        </tr>
                                            <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check" type="checkbox" value="1"/>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-45px me-5">
                                        <img src="assets/media/avatars/300-23.jpg" alt=""/>
                                    </div>
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Kevin Leonard</a>
                                        <span class="text-muted fw-semibold text-muted d-block fs-7">HTML, JS, ReactJS</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="#" class="text-gray-900 fw-bold text-hover-primary d-block fs-6">RoadGee</a>
                                <span class="text-muted fw-semibold text-muted d-block fs-7">Art Director</span>
                            </td>
                            <td class="text-end">
                                <div class="d-flex flex-column w-100 me-2">
                                    <div class="d-flex flex-stack mb-2">
                                        <span class="text-muted me-2 fs-7 fw-bold">
                                            90%
                                        </span>
                                    </div>
                                    <div class="progress h-6px w-100">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end flex-shrink-0">
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-switch fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                        <i class="ki-duotone ki-pencil fs-2"><span class="path1"></span><span class="path2"></span></i>                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                        <i class="ki-duotone ki-trash fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>                                    </a>
                                </div>
                            </td>
                        </tr>
                                    </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
	</div>
	<!--begin::Body-->
</div>
<!--end::Tables Widget 9-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xxl-4">
<!--begin::Statistics Widget 4-->
<div class="card card-xxl-stretch-50 mb-5 mb-xl-8">
    <!--begin::Body-->
    <div class="card-body p-0">
        <div class="d-flex flex-stack card-p flex-grow-1">
            <span class="symbol symbol-circle symbol-50px me-2">
                <span class="symbol-label bg-light-danger">
                    <i class="ki-duotone ki-element-11 fs-2x text-danger"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>                </span>
            </span>
            <div class="d-flex flex-column text-end">
                <span class="text-gray-900 fw-bold fs-2">750$</span>
                <span class="text-muted fw-semibold mt-1">Weekly Income</span>
            </div>
        </div>
        <div class="statistics-widget-4-chart card-rounded-bottom" data-kt-chart-color="danger" style="height: 150px"></div>
    </div>
    <!--end::Body-->
</div>
<!--end::Statistics Widget 4-->
@include("back/partials/widgets-2/statistics/_widget-4")
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xxl-4">
@include("back/partials/widgets-2/lists/_widget-9")
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xxl-4">
<!--begin::List Widget 4-->
<div class="card card-xxl-stretch mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold text-gray-900">Trends</span>
			<span class="text-muted mt-1 fw-semibold fs-7">Latest tech trends</span>
		</h3>
        <div class="card-toolbar">
            <!--begin::Menu-->
            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-category fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>            </button>
<!--begin::Menu 3-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
    <!--begin::Heading-->
    <div class="menu-item px-3">
        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
            Payments
        </div>
    </div>
    <!--end::Heading-->
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3">
            Create Invoice
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link flex-stack px-3">
            Create Payment
            <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                <i class="ki-duotone ki-information fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>            </span>
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3">
            Generate Bill
        </a>
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
        <a href="#" class="menu-link px-3">
            <span class="menu-title">Subscription</span>
            <span class="menu-arrow"></span>
        </a>
        <!--begin::Menu sub-->
        <div class="menu-sub menu-sub-dropdown w-175px py-4">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3">
                    Plans
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3">
                    Billing
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3">
                    Statements
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content px-3">
                    <!--begin::Switch-->
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications"/>
                        <!--end::Input-->
                        <!--end::Label-->
                        <span class="form-check-label text-muted fs-6">
                            Recuring
                        </span>
                        <!--end::Label-->
                    </label>
                    <!--end::Switch-->
                </div>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu sub-->
    </div>
    <!--end::Menu item-->
    <!--begin::Menu item-->
    <div class="menu-item px-3 my-1">
        <a href="#" class="menu-link px-3">
            Settings
        </a>
    </div>
    <!--end::Menu item-->
</div>
<!--end::Menu 3-->
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-5">
            <!--begin::Item-->
            <div class="d-flex align-items-sm-center mb-7">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-5">
                    <span class="symbol-label">
                        <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt=""/>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Top Authors</a>
                        <span class="text-muted fw-semibold d-block fs-7">Mark, Rowling, Esther</span>
                    </div>
                    <span class="badge badge-light fw-bold my-2">+82$</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-sm-center mb-7">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-5">
                    <span class="symbol-label">
                        <img src="assets/media/svg/brand-logos/telegram.svg" class="h-50 align-self-center" alt=""/>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Popular Authors</a>
                        <span class="text-muted fw-semibold d-block fs-7">Randy, Steve, Mike</span>
                    </div>
                    <span class="badge badge-light fw-bold my-2">+280$</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-sm-center mb-7">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-5">
                    <span class="symbol-label">
                        <img src="assets/media/svg/brand-logos/vimeo.svg" class="h-50 align-self-center" alt=""/>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">New Users</a>
                        <span class="text-muted fw-semibold d-block fs-7">John, Pat, Jimmy</span>
                    </div>
                    <span class="badge badge-light fw-bold my-2">+4500$</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-sm-center mb-7">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-5">
                    <span class="symbol-label">
                        <img src="assets/media/svg/brand-logos/bebo.svg" class="h-50 align-self-center" alt=""/>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Active Customers</a>
                        <span class="text-muted fw-semibold d-block fs-7">Mark, Rowling, Esther</span>
                    </div>
                    <span class="badge badge-light fw-bold my-2">+686$</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-sm-center mb-7">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-5">
                    <span class="symbol-label">
                        <img src="assets/media/svg/brand-logos/kickstarter.svg" class="h-50 align-self-center" alt=""/>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Bestseller Theme</a>
                        <span class="text-muted fw-semibold d-block fs-7">Disco, Retro, Sports</span>
                    </div>
                    <span class="badge badge-light fw-bold my-2">+726$</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Item-->
            <!--begin::Item-->
            <div class="d-flex align-items-sm-center ">
                <!--begin::Symbol-->
                <div class="symbol symbol-50px me-5">
                    <span class="symbol-label">
                        <img src="assets/media/svg/brand-logos/fox-hub.svg" class="h-50 align-self-center" alt=""/>
                    </span>
                </div>
                <!--end::Symbol-->
                <!--begin::Section-->
                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Fox Broker App</a>
                        <span class="text-muted fw-semibold d-block fs-7">Finance, Corporate, Apps</span>
                    </div>
                    <span class="badge badge-light fw-bold my-2">+145$</span>
                </div>
                <!--end::Section-->
            </div>
            <!--end::Item-->
    </div>
    <!--end::Body-->
</div>
<!--end::List Widget 4-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xxl-4">
@include("back/partials/widgets-2/lists/_widget-3")
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xxl-8">
@include("back/partials/widgets-2/tables/_widget-9")
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row gy-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-4">
@include("back/partials/widgets-2/lists/_widget-2")
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-4">
@include("back/partials/widgets-2/lists/_widget-6")
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-4">
@include("back/partials/widgets-2/lists/_widget-4")
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row g-5 gx-xxl-8">
    <!--begin::Col-->
    <div class="col-xxl-4">
@include("back/partials/widgets-2/mixed/_widget-5")
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xxl-8">
@include("back/partials/widgets-2/tables/_widget-5")
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
</div>
<!--end::Container-->