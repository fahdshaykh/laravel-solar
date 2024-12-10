@extends('layouts.app')
@section('section')
@push('styles')

    <link href="{{asset('vendors/choices/choices.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet">
	
@endpush

   
        <div class="pb-6">
          <h2 class="mb-4">Leads</h2>
          <div id="lealsTable" >
            <div class="row g-3 justify-content-between mb-4">
              <div class="col-auto">
               <div class="search-box">
    <form class="position-relative" style="display:flex" data-bs-toggle="search" data-bs-display="static" method="GET" action="{{ route('crm.myleads') }}">
       <div> <input class="form-control search-input search" type="search" name="search" placeholder="Search " aria-label="Search" value="{{ request()->get('search') }}" />
        <span class="fas fa-search search-box-icon"></span></div>
        <div>
       <?php
        $sby = 'no one';
        ?>
        @if (request()->has('sby'))
    @php
        $sby = request()->input('sby');
    @endphp

@endif
        <select class="form-control" name="sby">
        <option value="first_name" @if($sby =='first_name') selected @endif >First Name</option>
        <option value="last_name" @if($sby =='last_name') selected @endif >Last Name</option>
        <option value="inputaddress" @if($sby =='inputaddress') selected @endif> Address</option>
        <option value="state" @if($sby =='state') selected @endif> State</option>
        <option value="zip" @if($sby =='zip') selected @endif> Zip</option>
        <option value="phone" @if($sby =='phone') selected @endif> Phone</option>
        <option value="email" @if($sby =='email') selected @endif> Email</option>
        </select>
        </div>
    </form>
        </div>
              </div>
              <div class="col-auto">
                <form method="GET" action="{{ route('crm.myleads') }}">
            <div class="input-group">
                <input type="date" name="from_date" class="form-control" placeholder="From Date" value="{{ request()->get('from_date') }}">
                <input type="date" name="to_date" class="form-control" placeholder="To Date" value="{{ request()->get('to_date') }}">
                <button class="btn btn-primary" type="submit">Filter</button>
                @if(request()->has('search') || request()->has('from_date') || request()->has('to_date'))
                    <a href="{{ route('crm.myleads') }}" class="btn btn-secondary">Reset</a>
                @endif
            </div>
        </form>
              </div>
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1" data-list='{"valueNames":["status","name","email","phone", "address", "system","date"]}'>
        <div class="table-responsive scrollbar ms-n1 ps-1">
            <table class="table table-sm fs--1 mb-0">
                <thead>
                  <tr>
                   
                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="status">Status</th>
                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name">Name</th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="email">Email</th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="phone">Phone</th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="address">Address</th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="system">System</th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase" scope="col" data-sort="date">Create date</th>
                    <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                  </tr>
                </thead>
               <tbody class="list" id="members-table-body">
                @foreach ($leads as $lead)
                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                   
                    <td class="status align-middle white-space-nowrap">{{$lead->final_status}}</td>
                    <td class="name align-middle white-space-nowrap">{{$lead->first_name}} {{$lead->last_name}}</td>
                    <td class="email align-middle white-space-nowrap">{{$lead->email}}</td>
                    <td class="phone align-middle white-space-nowrap">{{$lead->phone}}</td>
                    <td class="address align-middle white-space-nowrap">{{$lead->inputaddress}}</td>
                    <td class="system align-middle white-space-nowrap">{{$lead->system_size}}</td>
                    <td class="date align-middle white-space-nowrap">{{$lead->created_at}}</td>
                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4">
                      <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                          <a class="dropdown-item" href="{{URL::to('leadsdetails/'.$lead->id)}}">Detail</a>
                          <a class="dropdown-item" target="_blank" href="{{URL::to('results/'.$lead->id)}}">Quote</a>
						
                          <form id="destroy-data{{ $lead->id }}"
                                                action="{{ route('deletelead', $lead->id)}}"
                                                method="post">
                                                @csrf
                                              
												 <button class="dropdown-item text-danger" type="submit" >Remove</button>
                                            </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach 
                </tbody>
              </table>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
            <div class="col-auto d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900">Showing {{ $leads->firstItem() }} - {{ $leads->lastItem() }} of {{ $leads->total() }} Leads</p>
            </div>
            <div class="col-auto d-flex">
                @if ($leads->onFirstPage())
                <button class="page-link" disabled><span class="fas fa-chevron-left"></span></button>
                @else
                <a href="{{ $leads->previousPageUrl() }}" class="page-link"><span class="fas fa-chevron-left"></span></a>
                @endif
                <ul class="mb-0 pagination">
                    @for ($i = 1; $i <= $leads->lastPage(); $i++)
                    <li class="page-item {{ ($leads->currentPage() == $i) ? 'active' : '' }}">
                        <a href="{{ $leads->url($i) }}" class="page-link">{{ $i }}</a>
                    </li>
                    @endfor
                </ul>
                @if ($leads->hasMorePages())
                <a href="{{ $leads->nextPageUrl() }}" class="page-link pe-0"><span class="fas fa-chevron-right"></span></a>
                @else
                <button class="page-link pe-0" disabled><span class="fas fa-chevron-right"></span></button>
                @endif
            </div>
        </div>
            </div>
            
          </div>
        </div>
        
       
   

    @push('scripts') 
	
    <script src="{{asset('vendors/choices/choices.min.js')}}"></script>
    
  @endpush
        @endsection