@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>Manage Locations</h2>
      <a href="{{url('admin/location/create')}}" class="btn mdi" >Add New</a>
   </div>
   <div class="card-body">
      <table id="productsTable" class="table table-bordered table-product" style="width:100%">
         <thead class="thead-light">
            <tr>
               <th>Sr. No.</th>
               <th>City</th>
               <th>Location</th>
               <th>Seq. No.</th>
               <th>Status</th>
               <th width="15%"></th>
            </tr>
         </thead>
         <tbody>
         @php $i=0; @endphp
         @foreach ($result as $val)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $val->city }}</td>
                <td>{{$val->title}}</td>
                <td>{{ $val->sequence }}</td>
                <td>{{ $val->status=='1' ? 'Active' : 'Inactive' }}</td>
                <td align="right">
                    <a href="{{url('admin/location/edit/'.$val->id)}}" class="badge badge-outline-success"><i class="mdi mdi-square-edit-outline"></i> Edit</a>
                    <a href="{{url('admin/location/delete/'.$val->id)}}" onclick="return confirm('Are you sure you want to delete this record?');" class="badge badge-outline-danger"><i class="mdi mdi-trash-can"></i> Delete</a>
                </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection