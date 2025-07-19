@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Create Jobs</h2>
      <a href="{{url('admin/jobs/listing')}}" class="btn mdi" >Back</a>
   </div>
   <div class="card-body">
      <form method="post" action="{{url('admin/jobs/store')}}" enctype="multipart/form-data">
         @csrf
         <div class="row">
         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Job Title</label>
                     <input type="text" class="form-control" placeholder="Enter Job Title" name="title" value="" required>
                     @error('title')
                           <span class="invalid-feedback">{{$errors->first('title')}}</span>
                     @enderror
                  </div>
               </div>

               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Job Description</label>
                     <textarea name="description" class="form-control TextEditor" placeholder="Enter description"></textarea>
                     @error('description')
                           <span class="invalid-feedback">{{$errors->first('description')}}</span>
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