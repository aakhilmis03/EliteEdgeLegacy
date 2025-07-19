@extends('admin.layouts.template')
@section('content')
<div class="card card-default">
   <div class="card-header">
      <h2>News & Updates</h2>
      <a href="{{url('admin/news_update/create')}}" class="btn mdi" >Add New</a>
   </div>
   <div class="card-body">
      <table id="productsTable" class="table table-bordered table-product" style="width:100%">
      <thead class="thead-light">
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $i=0; @endphp
                                @foreach ($result as $key)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td><img src="{{ url('uploads/news_update/'.$key->image) }}" width="100"></td>
                                        <td>{{ $key->title }}</td>
                                        <td>{{ $key->status=='1' ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                                <a href="{{ url('admin/news_update/edit/'.$key->id) }}">
                                                    <button type="button" class="badge badge-outline-success"><i class="mdi mdi-square-edit-outline"></i>Edit</button>
                                                </a>
                                               <a href="{{ url('admin/news_update/destroy/'.$key->id) }}" onclick="return confirm('Are You Sure Want to Delete This')" class="badge badge-outline-danger"><i class="mdi mdi-trash-can"></i> Delete</a>

                                        </td>
                                    </tr>
                                @endforeach

</tbody>
      </table>
   </div>
</div>
@endsection