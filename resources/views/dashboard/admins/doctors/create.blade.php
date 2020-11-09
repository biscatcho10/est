@extends('dashboard.layouts.app')

@section('title', 'Create Doctor')

@section('content')
    <div class="container">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home </a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.doctors.index')}}"> Doctors </a>
                            </li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.doctors.create')}}"> Create Doctor </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <h3>Create Doctor</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.doctors.store')}}" method="post" enctype="multipart/form-data">
                    @include('dashboard.layouts.includes.alerts.errors')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            {{-- first_name --}}
                            <div class="form-group">
                                <label for="first_name">Frist Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name .." value="{{old('first_name')}}" >
                                  @error('first_name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>

                        <div class="col-md-6">
                            {{-- last_name --}}
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name .." value="{{old('last_name')}}">
                                  @error('last_name')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            {{-- email --}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email .." value="{{old('email')}}" >
                                  @error('email')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- password --}}
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" >
                                  @error('password')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {{-- phone --}}
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
                                  @error('phone')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- Fees --}}
                            <div class="form-group">
                                <label for="fees">Fees</label>
                                <input type="number" name="fees" id="fees" class="form-control" value="{{old('fees')}}">
                                  @error('fees')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- national_id --}}
                            <div class="form-group">
                                <label for="national_id">National ID</label>
                                <input type="number" name="national_id" id="national_id" class="form-control" value="{{old('national_id')}}">
                                  @error('national_id')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            {{-- gender --}}
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select name="gender" id="gender" class="form-control" >
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                  @error('gender')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            {{-- Country --}}
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country_id" class="form-control">
                                    <optgroup>
                                        @if($countries && $countries -> count() > 0)
                                            @foreach($countries as $country)
                                                <option value="{{$country->id }}" class="form-control">{{$country->name}}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                  @error('country')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>

                        <div class="col-4">
                            {{-- Specialty --}}
                            <div class="form-group">
                                <label for="specialty">Specialty</label>
                                <select name="specialty_id" class="form-control">
                                    <optgroup>
                                        @if($specialties && $specialties -> count() > 0)
                                            @foreach($specialties as $specialty)
                                                <option value="{{$specialty->id }}" class="form-control">{{$specialty->name}}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                                  @error('specialty')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{-- bio in Arbic --}}
                            <div class="form-group">
                                <textarea name="bio:ar"  rows="3" placeholder="سيرتك .." class="form-control"></textarea>
                                @error('bio:ar')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            {{-- bio in English --}}
                            <div class="form-group">
                                <textarea name="bio:en"  rows="3" placeholder="Your Bio .." class="form-control"></textarea>
                                @error('bio:en')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             {{-- Image --}}
                             <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" >
                                  @error('image')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>

                        <div class="col-md-6">
                             {{-- Documents --}}
                             <div class="form-group">
                                <label for="documents">documents</label>
                                <input type="file" name="documents[]" id="documents" class="form-control" multiple >
                                  @error('documents')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {{-- doctor status --}}
                            <div class="form-group">
                                <label>Doctor Status</label>
                                <select name="doctor_status" class="form-control">
                                    <optgroup>
                                        <option value="online">Online</option>
                                        <option value="offline">offline</option>
                                        <option value="busy">Busy</option>
                                    </optgroup>
                                </select>
                                  @error('doctor_status')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{--  Status --}}
                            <div class="form-group">
                                <label>Status</label>
                                <select name="is_active" class="form-control">
                                    <optgroup>
                                        <option value="waiting_for_review">Waitinf For Review</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="rejected">Rejected</option>
                                    </optgroup>
                                </select>
                                  @error('doctor_status')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{-- ex_type --}}
                            <div class="form-group">
                                <label>Examination Type</label>
                                <select name="ex_type[]" class="form-control" multiple>
                                    <option value="chat" class="form-control">Chat</option>
                                    <option value="image" class="form-control">Image</option>
                                    <option value="voice" class="form-control">Voice</option>
                                    <option value="vedio" class="form-control">Video</option>
                                </select>
                                  @error('ex_type')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary float-right">Save</button>

                </form>
            </div>
        </div>
    </div>
@endsection
