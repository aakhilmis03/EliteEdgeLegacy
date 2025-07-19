@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Create Meta Tag</h2>
      <a href="{{url('admin/metatag/listing')}}" class="btn mdi" >Back</a>
   </div>
   <div class="card-body">
      <form method="post" action="{{url('admin/metatag/store')}}" enctype="multipart/form-data">
         @csrf
         <div class="row">
         <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">URL</label>
                     <input type="text" class="form-control" placeholder="Enter URL" name="url" value="" required>
                     @error('url')
                           <span class="invalid-feedback">{{$errors->first('url')}}</span>
                     @enderror
                  </div>
               </div>

               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Meta Title</label>
                     <input type="text" class="form-control" placeholder="Enter Meta Title" name="title" value="" required>
                     @error('title')
                           <span class="invalid-feedback">{{$errors->first('title')}}</span>
                     @enderror
                  </div>
               </div>

               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Meta Keywords</label>
                     <input type="text" class="form-control" placeholder="Enter meta keywords" name="keyword" value="" required>
                     @error('keyword')
                           <span class="invalid-feedback">{{$errors->first('keyword')}}</span>
                     @enderror
                  </div>
               </div>

               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Meta Description</label>
                     <input type="text" class="form-control" placeholder="Enter meta description" name="description" value="" required>
                     @error('description')
                           <span class="invalid-feedback">{{$errors->first('description')}}</span>
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
         <!-- <div class="form-footer pt-5 border-topxxx">
            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
         </div> -->
      </form>
   </div>
</div>
@endsection