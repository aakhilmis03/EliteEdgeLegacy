@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2>Update Location</h2>
        <a href="{{url('admin/location/listing')}}" class="btn mdi">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{url('admin/location/update/'.$result->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="example-url-input">Status</label>
                    <div class="form-group">
                        <select class="form-control" name="city_id" required>
                            <option value="1">Select City</option>
                            @foreach ($city as $key)
                            <option value="{{$key->id}}" {{ $result->city_id==$key->id ? 'selected' : '' }}>
                                {{$key->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Title</label>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" value="{{ $result->title }}"
                            autocomplete="off">
                        @error('title')
                        <span class="help-block">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Sequence</label>
                    <div class="form-group">
                        <input type="number" name="sequence" class="form-control" value="{{ $result->sequence }}"
                            autocomplete="off">
                        @error('sequence')
                        <span class="help-block">{{$errors->first('sequence')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-text-input">Overview</label>
                    <div class="form-group">
                        <textarea name="description" class="form-control myTextEditor">{{ $result->description }}</textarea>
                        @error('description')
                        <span class="help-block">{{$errors->first('description')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Status</label>
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option value="1" {{ $result->status=='1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $result->status=='0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group mt-1">
                        <label for="lname"></label><br>
                        <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                    </div>
                </div>
            </div>
            <!-- <div class="form-footer pt-5 border-topxxx">
            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
         </div> -->
        </form>
    </div>
</div>
@endsection