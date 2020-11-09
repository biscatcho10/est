@extends('dashboard.layouts.app')

@section('title', 'Create New Country')

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
                                <a href="{{route('admin.countries.create')}}"> Create New Country </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <h3>Create New Country</h3>
        <div class="card">
            {{-- <div class="card-header">
                Add Country
            </div> --}}
            <div class="card-body">
                <form action="{{route('admin.countries.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="name_en">Name In English</label>
                      <input type="text" name="name:en" id="name_en" class="form-control" placeholder="Country Name .." >
                        @error('name:en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="name_ar">Name In Arbic</label>
                      <input type="text" name="name:ar" id="name_ar" class="form-control" placeholder="Country Name .." >
                        @error('name:ar')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="currency">Currency</label>
                      <input type="text" name="currency" id="currency" class="form-control" placeholder="currency .." >
                        @error('currency')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button class="btn btn-primary float-right">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection
