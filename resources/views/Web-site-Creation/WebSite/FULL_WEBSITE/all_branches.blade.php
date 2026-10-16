@extends('Web-site-Creation.master')

@section('content')
<table id="websiteBranches" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            	<th>ID</th>
                <th>website </th>
                <th>name</th>
                <th>business_phone </th>
                <th>tools</th>
            </tr>
        </thead>
        <tbody>
        	 @if(!empty($all_branches))
                @foreach($all_branches as $item)
                	@if($item->branch_phone !='x')
            <tr>
               <td>{{ $item->id }}</td>
               <td>
<img src="{{url('/')}}/public/photos/FullWebSite/companies/{{$FullWebSite->company_logo}}" style=" max-height:175px;" />
               </td>
               <td>{{ $item->branch_title_en }}</td>
               <td>{{ $item->branch_phone }}</td>

               <td>
<a class="btn btn-secondary"
href="{{ url('/') }}/en/full_WebSite_Creation/edit_website_branches/{{ $item->id }}">
                        edit
                    </a>
<a class="btn btn-secondary"
href="{{ url('/') }}/en/full_WebSite_Creation/delete_website_branches/{{ $item->id }}">
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
