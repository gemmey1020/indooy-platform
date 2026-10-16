@extends('Web-site-Creation.master')

@section('content')
<table id="" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            	<th>ID</th>
                <th>products photo </th>
                <th>name</th>
                <th>updated_at </th>
                <th>tools</th>
            </tr>
        </thead>
        <tbody>
        	 @if(!empty($all_products))
                @foreach($all_products as $item)
                	@if($item->branch_phone !='x')
            <tr>
               <td>{{ $item->id }}</td>
               <td>
<img src="{{url('/')}}/public/photos/FullWebSite/companies/products/{{$item->product_photo}}" style=" max-height:75px;" />
               </td>
               <td>{{ $item->product_name_en }}</td>
               <td>{{ $item->updated_at }}</td>

               <td>
<a class="btn btn-secondary"
href="{{ url('/') }}/en/full_WebSite_Creation/edit_website_products/{{ $item->id }}">
                        edit
                    </a>
<a class="btn btn-secondary"
href="{{ url('/') }}/en/full_WebSite_Creation/delete_website_products/{{ $item->id }}">
                        delete
                    </a>
               </td>
            </tr>
        </tbody>
 {{--        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> --}}
        @endif
        @endforeach
        @endif
    </table>
@endsection
