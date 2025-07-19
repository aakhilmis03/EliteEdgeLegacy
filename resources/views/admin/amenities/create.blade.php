@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2>Create Amenity</h2>
        <a href="{{url('admin/amenities/listing')}}" class="btn mdi">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{url('admin/amenities/store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input">Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}"     autocomplete="off">
                        @error('title')
                        <span class="help-block">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input">Image</label>
                        <input type="file" name="image" class="form-control" autocomplete="off">
                        @error('image')
                        <span class="help-block">{{$errors->first('image')}}</span>
                        @enderror
                    </div>
                </div>
              
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-url-input">Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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