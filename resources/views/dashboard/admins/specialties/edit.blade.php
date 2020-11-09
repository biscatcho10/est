@extends('dashboard.layouts.app')

@section('title', 'Edit Specialty')

@section('content')
    <div class="container">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home </a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.specialties.index')}}"> Specialties </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.specialties.edit',$specialty->id)}}"> Edit Specialty </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <h3>Edit Specialty</h3>
        <div class="card">
            {{-- <div class="card-header">
                Edit Specialty
            </div> --}}
            <div class="card-body">
                <form action="{{route('admin.specialties.update', $specialty->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" value=" {{$specialty->id}} ">

                    <div class="form-group">
                      <label for="name_en">Name In English</label>
                      <input type="text" name="name:en" id="name_en" class="form-control" value="{{$specialty->translate('en')->name}}" >
                        @error('name:en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="name_ar">Name In Arbic</label>
                      <input type="text" name="name:ar" id="name_ar" class="form-control" value="{{$specialty->translate('ar')->name}}" >
                        @error('name:ar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary float-right">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection
