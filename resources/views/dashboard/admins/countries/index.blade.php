@extends('dashboard.layouts.app')

@section('title', 'Countries')

@section('content')

@include('dashboard.layouts.includes.alerts.success')
@include('dashboard.layouts.includes.alerts.errors')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home </a></li>
                        <li class="breadcrumb-item active">
                            <a href="{{route('admin.countries.index')}}"> Countries </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <!-- <div class="card-header">All Countries</div> -->
        <div class="card-body">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-line-chart"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">All Countries</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <a href=" {{route('admin.home')}} " class="btn btn-clean btn-icon-sm">
                                <i class="la la-long-arrow-left"></i>
                                Back
                            </a>
                            &nbsp;
                            <div class="dropdown dropdown-inline">
                                {{-- Add New --}}
                                <a href=" {{route('admin.countries.create')}} " class="btn btn-brand btn-icon-sm" ><i class="flaticon2-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Search Form -->
                    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="row align-items-center">
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-input-icon kt-input-icon--left">
                                            <input type="text" class="form-control" placeholder="Search..."
                                                id="generalSearch" />
                                            <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                                <span><i class="la la-search"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-form__group kt-form__group--inline">
                                            <div class="kt-form__label">
                                                <label>Status:</label>
                                            </div>
                                            <div class="kt-form__control">
                                                <div class="dropdown bootstrap-select form-control">
                                                    <select class="form-control bootstrap-select" id="kt_form_status"
                                                        tabindex="-98">
                                                        <option value="">
                                                            All
                                                        </option>
                                                        <option value="1">
                                                            Pending
                                                        </option>
                                                        <option value="2">
                                                            Delivered
                                                        </option>
                                                        <option value="3">
                                                            Canceled
                                                        </option>
                                                        <option value="4">
                                                            Success
                                                        </option>
                                                        <option value="5">
                                                            Info
                                                        </option>
                                                        <option value="6">
                                                            Danger
                                                        </option>
                                                    </select><button type="button" class="btn dropdown-toggle btn-light"
                                                        data-toggle="dropdown" role="combobox" aria-owns="bs-select-1"
                                                        aria-haspopup="listbox" aria-expanded="false"
                                                        data-id="kt_form_status" title="All">
                                                        <div class="filter-option">
                                                            <div class="filter-option-inner">
                                                                <div class="filter-option-inner-inner">
                                                                    All
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <div class="inner show" role="listbox" id="bs-select-1"
                                                            tabindex="-1">
                                                            <ul class="dropdown-menu inner show" role="presentation">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                        <div class="kt-form__group kt-form__group--inline">
                                            <div class="kt-form__label">
                                                <label>Type:</label>
                                            </div>
                                            <div class="kt-form__control">
                                                <div class="dropdown bootstrap-select form-control">
                                                    <select class="form-control bootstrap-select" id="kt_form_type"
                                                        tabindex="-98">
                                                        <option value="">
                                                            All
                                                        </option>
                                                        <option value="1">
                                                            Online
                                                        </option>
                                                        <option value="2">
                                                            Retail
                                                        </option>
                                                        <option value="3">
                                                            Direct
                                                        </option>
                                                    </select><button type="button" class="btn dropdown-toggle btn-light"
                                                        data-toggle="dropdown" role="combobox" aria-owns="bs-select-2"
                                                        aria-haspopup="listbox" aria-expanded="false"
                                                        data-id="kt_form_type" title="All">
                                                        <div class="filter-option">
                                                            <div class="filter-option-inner">
                                                                <div class="filter-option-inner-inner">
                                                                    All
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <div class="inner show" role="listbox" id="bs-select-2"
                                                            tabindex="-1">
                                                            <ul class="dropdown-menu inner show" role="presentation">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 kt-align-right">
                                <a href="#" class="btn btn-default kt-hidden">
                                    <i class="la la-cart-plus"></i> New Order
                                </a>
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg d-xl-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end: Search Form -->
                </div>
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <!--begin: Datatable -->
                    <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded"
                        id="local_data" style="">
                        <table class="kt-datatable__table" style="display: block">
                            <thead class="kt-datatable__head">
                                <tr class="kt-datatable__row" style="left: 0px">
                                    <th class="kt-datatable__cell kt-datatable__toggle-detail">
                                        <span></span>
                                    </th>
                                    <th data-field="RecordID"
                                        class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">
                                        <span style="width: 20px"><label
                                                class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid"><input
                                                    type="checkbox" />&nbsp;<span></span></label></span>
                                    </th>
                                    <th data-field="OrderID" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 110px">Country Name</span>
                                    </th>
                                    <th data-field="Country" class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 110px">Currency</span>
                                    </th>
                                    <th data-field="Actions" data-autohide-disabled="false"
                                        class="kt-datatable__cell kt-datatable__cell--sort">
                                        <span style="width: 110px">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="kt-datatable__body" style="">
                                @isset($countries)
                                    @foreach ($countries as $country)
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px">
                                        <td class="kt-datatable__cell kt-datatable__toggle-detail">
                                            <a class="kt-datatable__toggle-detail" href=""><i
                                                    class="fa fa-caret-right"></i></a>
                                        </td>
                                        <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check"
                                            data-field="RecordID">
                                            <span style="width: 20px"><label
                                                    class="kt-checkbox kt-checkbox--single kt-checkbox--solid"><input
                                                        type="checkbox" value="1" />&nbsp;<span></span></label></span>
                                        </td>
                                        <td data-field="OrderID" class="kt-datatable__cell">
                                            <span style="width: 110px">{{$country->name}}</span>
                                        </td>
                                        <td data-field="Country" class="kt-datatable__cell">
                                            <span style="width: 110px">{{$country->currency}}</span>
                                        </td>
                                        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell">
                                            <span style="
                                                    overflow: visible;
                                                    position: relative;
                                                    width: 110px;
                                                ">
                                                <a href="{{route('admin.countries.edit',$country->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md"
                                                    title="Edit details">
                                                    <i class="la la-cog"></i>
                                                </a>
                                                <form action=" {{route('admin.countries.destroy', $country->id)}} " method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-clean btn-icon btn-icon-md d-inline-block clearfix"><i class="la la-trash"></i></button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endisset

                            </tbody>
                        </table>
                        <div class="kt-datatable__pager kt-datatable--paging-loaded">
                            <ul class="kt-datatable__pager-nav">
                                <li>
                                    <a title="First"
                                        class="kt-datatable__pager-link kt-datatable__pager-link--first kt-datatable__pager-link--disabled"
                                        data-page="1" disabled="disabled"><i class="flaticon2-fast-back"></i></a>
                                </li>
                                <li>
                                    <a title="Previous"
                                        class="kt-datatable__pager-link kt-datatable__pager-link--prev kt-datatable__pager-link--disabled"
                                        data-page="1" disabled="disabled"><i class="flaticon2-back"></i></a>
                                </li>
                                <li style=""></li>
                                <li style="display: none">
                                    <input type="text" class="kt-pager-input form-control" title="Page number" />
                                </li>
                                <li>
                                    <a class="kt-datatable__pager-link kt-datatable__pager-link-number kt-datatable__pager-link--active"
                                        data-page="1" title="1">1</a>
                                </li>
                                <li>
                                    <a class="kt-datatable__pager-link kt-datatable__pager-link-number" data-page="2"
                                        title="2">2</a>
                                </li>
                                <li>
                                    <a class="kt-datatable__pager-link kt-datatable__pager-link-number" data-page="3"
                                        title="3">3</a>
                                </li>
                                <li>
                                    <a class="kt-datatable__pager-link kt-datatable__pager-link-number" data-page="4"
                                        title="4">4</a>
                                </li>
                                <li>
                                    <a class="kt-datatable__pager-link kt-datatable__pager-link-number" data-page="5"
                                        title="5">5</a>
                                </li>
                                <li></li>
                                <li>
                                    <a title="Next" class="kt-datatable__pager-link kt-datatable__pager-link--next"
                                        data-page="2"><i class="flaticon2-next"></i></a>
                                </li>
                                <li>
                                    <a title="Last" class="kt-datatable__pager-link kt-datatable__pager-link--last"
                                        data-page="10"><i class="flaticon2-fast-next"></i></a>
                                </li>
                            </ul>
                            <div class="kt-datatable__pager-info">
                                <div class="dropdown bootstrap-select kt-datatable__pager-size" style="width: 60px">
                                    <select class="selectpicker kt-datatable__pager-size" title="Select page size"
                                        data-width="60px" data-container="body" data-selected="10" tabindex="-98">
                                        <option class="bs-title-option" value=""></option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                    <button type="button" class="btn dropdown-toggle btn-light"
                                        data-toggle="dropdown" role="combobox" aria-owns="bs-select-3"
                                        aria-haspopup="listbox" aria-expanded="false" title="Select page size">
                                        <div class="filter-option">
                                            <div class="filter-option-inner">
                                                <div class="filter-option-inner-inner">
                                                    10
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="inner show" role="listbox" id="bs-select-3" tabindex="-1">
                                            <ul class="dropdown-menu inner show" role="presentation"></ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- <span class="kt-datatable__pager-detail">Showing 1 - 10 of 100</span> --}}
                            </div>
                        </div>
                    </div>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>
    </div>
@endsection
