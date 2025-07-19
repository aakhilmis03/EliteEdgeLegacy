@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Create Blog</h2>
      <a href="{{url('admin/blog/listing')}}" class="btn mdi" >Back</a>
   </div>
   <div class="card-body">
      <form method="post" action="{{url('admin/blog/store')}}" enctype="multipart/form-data">
      @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
         @csrf
         <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="category">Category</label>
                     <select class="multiple-select form-control" name="category_id" required>
                        <option value="">-- select --</option>
                        @foreach ($category as $val)
                        <option value="{{$val->id}}">{{$val->title}}</option>
                        @endforeach
                     </select>
                     @error('category_id')
                           <span class="invalid-feedback">{{$errors->first('display_in')}}</span>
                     @enderror
                  </div>
               </div>
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
                     <label for="image">Image</label>
                     <input type="file" class="form-control" value="" name="image" required>
                     @error('image')
                        <span class="invalid-feedback">{{$errors->first('image')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="short_description">Short Description</label>
                     <textarea name="short_description" class="form-control" placeholder="Enter short description"></textarea>
                     @error('short_description')
                           <span class="invalid-feedback">{{$errors->first('short_description')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="description">Description</label>
                     <textarea name="description" class="form-control TextEditor" placeholder="Enter description"></textarea>
                     @error('description')
                           <span class="invalid-feedback">{{$errors->first('description')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="display_in">Display In</label>
                     <select class="multiple-select form-control" name="display_in[]" multiple="multiple" required>
                        <option value="Latest">Latest</option>
                        <option value="Top Story">Top Story</option>
                        <option value="Top Deals">Top Deals</option>
                        <option value="Market Insights">Market Insights</option>
                        <option value="Video Showcase">Video Showcase</option>
                        <option value="Featured Articles">Featured Articles</option>
                     </select>
                     @error('display_in')
                           <span class="invalid-feedback">{{$errors->first('display_in')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" class="form-control multiple-select"  required>
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