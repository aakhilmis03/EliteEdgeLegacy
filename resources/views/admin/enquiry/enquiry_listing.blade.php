@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Property Enquiry</h2>
      <!-- <a href="#" class="btn mdi" >Export Data</a> -->
   </div>
   <div class="card-body">
      <table id="productsTable" class="table table-bordered table-product" style="width:100%">
         <thead class="thead-light">
            <tr>
               <th width="5%">Sr. No.</th>
               <th>Title</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone No.</th>
               <th>Message</th>
               <th>Date</th>
            </tr>
         </thead>
         <tbody>
         @php $i=0; @endphp
         @foreach ($result as $val)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$val->title}}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->phone}}</td>
                <td>{{$val->message}}</td>
                <td>{{ \Carbon\Carbon::parse($val->created_at)->format('d/m/Y h:i:s a')}}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection