@extends('layouts.master')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Validation</h1>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="{{route('employee.update',$employees->id)}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <h5>Update Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $employees->name }}">@if($errors->has('name'))
                                        <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="ph" class="form-control" name="phone" value="{{ $employees->phone }}">@if($errors->has('phone'))
                                        <div class="text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $employees->email }}">@if($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group ">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $employees->address }}">
                                </div>
                                <div class="form-group ">
                                    <label>Salary</label>
                                    <input type="number" class="form-control" name="salary" value="{{ $employees->salary }}">@if($errors->has('salary'))
                                        <div class="text-danger">{{ $errors->first('salary') }}</div>
                                    @endif
                                </div>
                                <div class="form-group ">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image" value="{{ $employees->image }}"><img src="{{ asset($employees->image) }}" alt="{{$employees->name}}" height="100" width="100">@if($errors->has('image'))
                                        <div class="text-danger">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


