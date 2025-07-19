@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2>News & Updates</h2>
        <a href="{{url('admin/news_update/listing')}}" class="btn mdi">Back</a>
    </div>
    <div class="card-body">
    <form name="permissions" action="{{ url('admin/news_update/update/'.$result->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" name="title" class="form-control" value="{{$result->title}}" autocomplete="off" >
                                @error('title')
                                <span class="help-block">{{$errors->first('title')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Image <small>(size - 1080 * 1080)</small></label>
                            <div class="col-sm-12">
                                <input type="file" name="image" class="form-control" autocomplete="off">
                                <input type="hidden" name="old_img" value="{{ $result->image }}">
                                <img src="{{ url('uploads/news_update/'.$result->image) }}" width="100">
                            </div>
                        </div>
                         
                        <div class="form-group">
                        <label for="example-url-input" class="col-sm-2 col-form-label">URL</label>
                                <div class="col-sm-12">
                                    <input type="text" name="description" class="form-control" value="{{$result->description}}" autocomplete="off" required>
                                    @error('description')
                                    <span class="help-block">{{$errors->first('description')}}</span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="example-url-input" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-12">
                                <select  class="form-control" name="status">
                                    <option value="1" {{ $result->status=='1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $result->status=='0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                        </div>
                    </form>
    </div>
</div>
@endsection