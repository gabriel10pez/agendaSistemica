@extends('layoutsApp.app')

@section('content')
<!--begin::List Widget 3-->
<div class="card card-xxl-stretch mb-xl-3">
    <!--begin::Header-->
    <div class="card-header border-0">
        <h3 class="card-title fw-bolder text-dark">Todo</h3>
        <div class="card-toolbar">
            <!--begin::Menu-->
            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                <!--begin::Svg Icon | path: icons/stockholm/Layout/Layout-4-blocks-2.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
                            <rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                            <rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                            <rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 3-->
            {{-- <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                <!--begin::Heading-->
                <div class="menu-item px-3">
                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                </div>
                <!--end::Heading-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Create Invoice</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Generate Bill</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                    <a href="#" class="menu-link px-3">
                        <span class="menu-title">Subscription</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <!--begin::Menu sub-->
                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Plans</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Billing</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3">Statements</a>
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
                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                    <!--end::Input-->
                                    <!--end::Label-->
                                    <span class="form-check-label text-muted fs-6">Recuring</span>
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
                    <a href="#" class="menu-link px-3">Settings</a>
                </div>
                <!--end::Menu item-->
            </div> --}}
            <!--end::Menu 3-->
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-2">
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-8">
            <!--begin::Bullet-->
            <span class="bullet bullet-vertical h-40px bg-success"></span>
            <!--end::Bullet-->
            <!--begin::Checkbox-->
            <div class="form-check form-check-custom form-check-solid mx-5">
                <input class="form-check-input" type="checkbox" value="" />
            </div>
            <!--end::Checkbox-->
            <!--begin::Description-->
            <div class="flex-grow-1">
                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Create FireStone Logo</a>
                <span class="text-muted fw-bold d-block">Due in 2 Days</span>
            </div>
            <!--end::Description-->
            <span class="badge badge-light-success fs-8 fw-bolder">New</span>
        </div>
        <!--end:Item-->
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-8">
            <!--begin::Bullet-->
            <span class="bullet bullet-vertical h-40px bg-primary"></span>
            <!--end::Bullet-->
            <!--begin::Checkbox-->
            <div class="form-check form-check-custom form-check-solid mx-5">
                <input class="form-check-input" type="checkbox" value="" />
            </div>
            <!--end::Checkbox-->
            <!--begin::Description-->
            <div class="flex-grow-1">
                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Stakeholder Meeting</a>
                <span class="text-muted fw-bold d-block">Due in 3 Days</span>
            </div>
            <!--end::Description-->
            <span class="badge badge-light-primary fs-8 fw-bolder">New</span>
        </div>
        <!--end:Item-->
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-8">
            <!--begin::Bullet-->
            <span class="bullet bullet-vertical h-40px bg-warning"></span>
            <!--end::Bullet-->
            <!--begin::Checkbox-->
            <div class="form-check form-check-custom form-check-solid mx-5">
                <input class="form-check-input" type="checkbox" value="" />
            </div>
            <!--end::Checkbox-->
            <!--begin::Description-->
            <div class="flex-grow-1">
                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Scoping &amp; Estimations</a>
                <span class="text-muted fw-bold d-block">Due in 5 Days</span>
            </div>
            <!--end::Description-->
            <span class="badge badge-light-warning fs-8 fw-bolder">New</span>
        </div>
        <!--end:Item-->
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-8">
            <!--begin::Bullet-->
            <span class="bullet bullet-vertical h-40px bg-primary"></span>
            <!--end::Bullet-->
            <!--begin::Checkbox-->
            <div class="form-check form-check-custom form-check-solid mx-5">
                <input class="form-check-input" type="checkbox" value="" />
            </div>
            <!--end::Checkbox-->
            <!--begin::Description-->
            <div class="flex-grow-1">
                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">KPI App Showcase</a>
                <span class="text-muted fw-bold d-block">Due in 2 Days</span>
            </div>
            <!--end::Description-->
            <span class="badge badge-light-primary fs-8 fw-bolder">New</span>
        </div>
        <!--end:Item-->
        <!--begin::Item-->
        <div class="d-flex align-items-center mb-8">
            <!--begin::Bullet-->
            <span class="bullet bullet-vertical h-40px bg-danger"></span>
            <!--end::Bullet-->
            <!--begin::Checkbox-->
            <div class="form-check form-check-custom form-check-solid mx-5">
                <input class="form-check-input" type="checkbox" value="" />
            </div>
            <!--end::Checkbox-->
            <!--begin::Description-->
            <div class="flex-grow-1">
                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Project Meeting</a>
                <span class="text-muted fw-bold d-block">Due in 12 Days</span>
            </div>
            <!--end::Description-->
            <span class="badge badge-light-danger fs-8 fw-bolder">New</span>
        </div>
        <!--end:Item-->
        <!--begin::Item-->
        <div class="d-flex align-items-center">
            <!--begin::Bullet-->
            <span class="bullet bullet-vertical h-40px bg-success"></span>
            <!--end::Bullet-->
            <!--begin::Checkbox-->
            <div class="form-check form-check-custom form-check-solid mx-5">
                <input class="form-check-input" type="checkbox" value="" />
            </div>
            <!--end::Checkbox-->
            <!--begin::Description-->
            <div class="flex-grow-1">
                <a href="#" class="text-gray-800 text-hover-primary fw-bolder fs-6">Customers Update</a>
                <span class="text-muted fw-bold d-block">Due in 1 week</span>
            </div>
            <!--end::Description-->
            <span class="badge badge-light-success fs-8 fw-bolder">New</span>
        </div>
        <!--end:Item-->
    </div>
    <!--end::Body-->
</div>
<!--end:List Widget 3-->
@endsection
