@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-5"">
            <div class="d-flex justify-content-between">
                <div>
                    <h2>Add an Apartment</h2>
                </div>
                <div class="">
                    <a href="{{ route('admin.apartments.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message')}}
            </div>
            @endif
            <div>
                <form action="{{ route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label class="control-label">Title</label>
                        <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group my-2">
                        <label class="control-label">Cover Image</label>
                        <input type="file" name="cover_img" id="cover_img" class="form-control">
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-group my-2">
                        <label class="control-label">Address</label>
                        <input type="text" class="form-control" placeholder="Address" id="address" name="address" value="{{ old('address') }}">
                    </div>
                    <div class="form-group my-2">
                        <label class="control-label">Description</label>
                        <textarea name="description" id="content" cols="30" rows="10" placeholder="Describe your Apartment" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="d-flex gap-5">
                        <div class="form-group my-2">
                            <label class="control-label">Rooms</label>
                            <input type="number" class="form-control" placeholder="Rooms" id="room_n" name="room_n" value="{{ old('room_n') }}" min="0">
                        </div>
                        <div class="form-group my-2">
                            <label class="control-label">Bathrooms</label>
                            <input type="number" class="form-control" placeholder="Bathrooms" id="bath_n" name="bath_n" value="{{ old('bath_n') }}" min="0">
                        </div>
                        <div class="form-group my-2">
                            <label class="control-label">Beds</label>
                            <input type="number" class="form-control" placeholder="Beds" id="bed_n" name="bed_n" value="{{ old('bed_n') }}" min="0">
                        </div>
                        <div class="form-group my-2">
                            <label class="control-label">Square Meters</label>
                            <input type="number" class="form-control" placeholder="Square Meters" id="square_meters" name="square_meters" value="{{ old('square_meters') }}" min="0">
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <label class="control-label">Do you want to show this Apartment?</label>
                        <select class="form-comntrol" name="visible" id="visible">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group my-2 d-flex justify-content-around">
                        <div class="control-label">Select Optionals: </div>
                        @foreach ($optionals as $optional)
                        <div class="form-check">
                            <input type="checkbox" value="{{ $optional->id }}" name='optionals[]' class="mx-1">
                            <label class="form-check-label"><i class="{{ $optional->icon}}"></i> {{ $optional->name }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group my-2">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection