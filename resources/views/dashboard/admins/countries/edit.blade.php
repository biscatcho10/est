@extends('dashboard.layouts.app')

@section('title', 'Edit Country')

@section('content')
    <div class="container">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home </a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.countries.index')}}"> Countries </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.countries.edit',$country->id)}}"> Edit Country </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <h3>Edit Country</h3>
        <div class="card">
            {{-- <div class="card-header">
                Edit Country
            </div> --}}
            <div class="card-body">
                <form action="{{route('admin.countries.update', $country->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value=" {{$country->id}} ">

                    <div class="form-group">
                      <label for="name_en">Name In English</label>
                      <input type="text" name="name:en" id="name_en" class="form-control" value="{{$country->translate('en')->name}}" >
                        @error('name:en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="name_ar">Name In Arbic</label>
                      <input type="text" name="name:ar" id="name_ar" class="form-control" value="{{$country->translate('ar')->name}}" >
                        @error('name:ar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="currency">Currency</label>
                      <input type="text" name="currency" id="currency" class="form-control" value="{{$country->currency}}" >
                        @error('currency')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary float-right">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
