@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2>Update Amenity</h2>
        <a href="{{url('admin/amenities/listing')}}" class="btn mdi">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{url('admin/amenities/update/'.$result->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input">Title</label>

                        <input type="text" name="title" class="form-control" value="{{ $result->title }}"
                            autocomplete="off">
                        @error('title')
                        <span class="help-block">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input">Image</label>

                        <input type="file" name="image" class="form-control" autocomplete="off">
                        <input type="hidden" name="old_img" value="{{ $result->image }}">
                        <img src="{{ url('uploads/amenities/'.$result->image) }}" width="100">
                    </div>
                </div>
               
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-url-input">Status</label>

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