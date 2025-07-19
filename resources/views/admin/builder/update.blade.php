@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2>Builder Update</h2>
        <a href="{{url('admin/builder/listing')}}" class="btn mdi">Back</a>
    </div>
    <div class="card-body">
        <form method="post" action="{{url('admin/builder/update/'.$result->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >Title</label>

                        <input type="text" name="title" class="form-control" value="{{ $result->title }}"
                            autocomplete="off">
                        @error('title')
                        <span class="help-block">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >Logo</label>

                        <input type="file" name="image" class="form-control" autocomplete="off">
                        <input type="hidden" name="old_img" value="{{ $result->image }}">
                        <img src="{{ url('uploads/builder/'.$result->image) }}" width="100">
                        @error('image')
                        <span class="help-block">{{$errors->first('image')}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >About Dealer</label>
                        <textarea name="description" class="form-control TextEditor">{{ $result->description }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >Location</label>

                        <input type="text" name="location" class="form-control" value="{{ $result->location }}"
                            autocomplete="off" required>
                        @error('location')
                        <span class="help-block">{{$errors->first('location')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >Mobile</label>

                        <input type="text" name="mobile" class="form-control" value="{{ $result->mobile }}"
                            autocomplete="off" required>
                        @error('mobile')
                        <span class="help-block">{{$errors->first('mobile')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >Office</label>

                        <input type="text" name="office" class="form-control" value="{{ $result->office }}"
                            autocomplete="off" required>
                        @error('office')
                        <span class="help-block">{{$errors->first('office')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >Email</label>

                        <input type="text" name="email" class="form-control" value="{{ $result->email }}"
                            autocomplete="off" required>
                        @error('email')
                        <span class="help-block">{{$errors->first('email')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >Skype</label>

                        <input type="text" name="skype" class="form-control" value="{{ $result->skype }}"
                            autocomplete="off" required>
                        @error('skype')
                        <span class="help-block">{{$errors->first('skype')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-text-input" >License</label>

                        <input type="text" name="license" class="form-control" value="{{ $result->license }}"
                            autocomplete="off" required>
                        @error('license')
                        <span class="help-block">{{$errors->first('license')}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="example-url-input">Display Home</label>
                    <div class="form-group">
                        <select class="form-control multiple-select" name="display_home" required>
                            <option value="no" {{ $result->display_home=='no' ? 'selected' : '' }}>No</option>
                            <option value="yes" {{ $result->display_home=='yes' ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="example-url-input" >Status</label>

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