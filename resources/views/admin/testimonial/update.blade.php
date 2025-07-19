@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Testimonial Update</h2>
      <a href="{{url('admin/testimonial/listing')}}" class="btn mdi" >Back</a>
   </div>
   <div class="card-body">
      <form method="post" action="{{url('admin/testimonial/update/'.$result->id)}}" enctype="multipart/form-data">
         @csrf
         <div class="row">
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Client Name</label>
                     <input type="text" class="form-control" placeholder="Enter name" name="title" value="{{ $result->title }}" required>
                     @error('title')
                           <span class="invalid-feedback">{{$errors->first('title')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Sub Title</label>
                     <input type="text" class="form-control" placeholder="Enter sub title" name="sub_title" value="{{ $result->sub_title }}" required>
                     @error('sub_title')
                           <span class="invalid-feedback">{{$errors->first('sub_title')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="image">Image</label>
                     <img src="{{url('uploads/testimonial/'.$result->image)}}" style="max-width: 80px;">
                     <input type="file" class="form-control" value="" name="image" >
                     <input type="hidden" name="old_img" value="{{ $result->image }}" >
                     @error('image')
                        <span class="invalid-feedback">{{$errors->first('image')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="title">Description</label>
                     <textarea class="form-control" placeholder="Enter description" name="description" >{{ $result->description }}</textarea>
                     @error('description')
                           <span class="invalid-feedback">{{$errors->first('description')}}</span>
                     @enderror
                  </div>
               </div>
               <div class="col-sm-12">
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" class="form-control"  required>
                        <option value="">-- select --</option>
                        <option value="Active" {{ $result->status=='Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $result->status=='Inactive' ? 'selected' : '' }}>Inactive</option>
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
         <!-- <div class="form-footer pt-5 border-topxxx">
            <button type="submit" class="btn btn-primary btn-pill">Submit</button>
         </div> -->
      </form>
   </div>
</div>
@endsection