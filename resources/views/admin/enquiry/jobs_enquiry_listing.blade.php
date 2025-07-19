@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Manage Job Inquiry</h2>
      <!-- <a href="#" class="btn mdi" >Export Data</a> -->
   </div>
   <div class="card-body">
      <table id="productsTable" class="table table-bordered table-product" style="width:100%">
         <thead class="thead-light">
            <tr>
               <th width="4%">Sr. No.</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Department</th>
               <th>Experience</th>
               <th>Current CTC</th>
               <th>Resume</th>
               <th>Date</th>
            </tr>
         </thead>
         <tbody>
         @php $i=0; @endphp
         @foreach ($result as $val)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->phone}}</td>
                <td>{{$val->department}}</td>
                <td>{{$val->experience}}</td>
                <td>{{$val->ctc}}</td>
                @if(!empty($val->resume))
                <td><a href="{{url('uploads/resume/'.$val->resume)}}" target="_blank">View</a></td>
                @else
                <td>N/A</td>
                @endif
                <td>{{ \Carbon\Carbon::parse($val->created_at)->format('d/m/Y h:i:s a')}}</td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection