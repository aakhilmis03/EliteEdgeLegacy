@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Create Blog Category</h2>
      <a href="{{url('admin/blog_category/listing')}}" class="btn mdi" >Back</a>
   </div>
   <div class="card-body">
      <form method="post" action="{{url('admin/blog_category/store')}}" enctype="multipart/form-data">
         @csrf
         <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Title</label>
                     <input type="text" class="form-control" placeholder="Enter Title" name="title" value="" required>
                     @error('title')
                           <span class="invalid-feedback">{{$errors->first('title')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" class="form-control"  required>
                        <option value="">-- select --</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                     </select>
                     @error('status')
                        <span class="invalid-feedback">{{$errors->first('status')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group mt-1">
                     <label for="lname"></label><br>
                     <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                  </div>
               </div>
         </div>
        
      </form>
   </div>
</div>
@endsection