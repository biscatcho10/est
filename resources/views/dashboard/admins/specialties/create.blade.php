@extends('dashboard.layouts.app')

@section('title', 'Create New Specialty')

@section('content')
    <div class="container">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home </a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.specialties.index')}}"> specialties </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.specialties.create')}}"> Create New Specialty </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <h3>Create New Specialty</h3>
        <div class="card">
            {{-- <div class="card-header">
                Add Specialty
            </div> --}}
            <div class="card-body">
                <form action="{{route('admin.specialties.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name_en">Name In English</label>
                      <input type="text" name="name:en" id="name_en" class="form-control" placeholder="Specialty Name .." >
                        @error('name:en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="name_ar">Name In Arbic</label>
                      <input type="text" name="name:ar" id="name_ar" class="form-control" placeholder="Specialty Name .." >
                        @error('name:ar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary float-right">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection
