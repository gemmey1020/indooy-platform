@extends('Web-site-Creation.master')

@section('content')
<table id="websiteBranches" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            	 <th style="width: 216px;text-align: -webkit-center;">
            	     ID
            	     </th>
                 <th style="width: 216px;text-align: -webkit-center;">
                     website
                     </th>
                 <th style="width: 216px;text-align: -webkit-center;">
                     name
                     </th>
                  <th style="width: 216px;text-align: -webkit-center;">
                      business email
                      </th>
                 <th style="width: 216px;text-align: -webkit-center;">
                     business phone
                     </th>
                <th style="width: 216px;text-align: -webkit-center;">
                    tools [ edit / delete ]
                    </th>
            </tr>
        </thead>
        <tbody>
        	 @if(!empty($items))
                @foreach($items as $item)
                	@if($item->branch_phone !='x')
            <tr>
               <td>{{ $item->id }}</td>
               <td>
<img src="{{url('/')}}/public/photos/LandingPages/companies/{{$item->company_logo}}" style=" max-height:175px;" />
               </td>
                <td style="width: 216px;text-align: -webkit-center;">{{ $item->company_name_en }}</td>
               <td style="width: 216px;text-align: -webkit-center;">{{ $item->business_email }}</td>
                <td style="width: 216px;text-align: -webkit-center;">{{ $item->business_phone }}</td>

                <td style="width: 216px;text-align: -webkit-center;">
<a class="btn btn-secondary"
href="{{ url('/') }}/en/WebSite_Creation/edit_landing/{{ $item->id }}">
                       full edit
                    </a>
                    <br>

<a class="btn btn-secondary"
href="{{ url('/') }}/en/WebSite_Creation/delete_landing/{{ $item->id }}">
                        delete
                    </a>
               </td>
            </tr>
        </tbody>
        @endif
        @endforeach
        @endif
    </table>
@endsection
