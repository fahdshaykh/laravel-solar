@extends('layouts.app')
@section('section')
@push('styles')
    <link href="{{asset('vendors/choices/choices.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet">
@endpush

   
        
	
        <div class="pb-6">
          <h2 class="mb-4">Deals</h2>
          <div id="lealsTable" data-list='{"valueNames":["name","email","phone","contact","company","date"],"page":10,"pagination":true}'>
            <div class="row g-3 justify-content-between mb-4">
              <div class="col-auto">
                <div class="d-md-flex justify-content-between">
                  <div>     <button class="btn btn-primary me-4" type="button" data-bs-toggle="modal" data-bs-target="#addDealModal" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-plus me-2"></span>Create Deal</button>
                  
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <div class="d-flex">
                  <div class="search-box me-2">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                      <input class="form-control search-input search" type="search" placeholder="Search by name" aria-label="Search" />
                      <span class="fas fa-search search-box-icon"></span>

                    </form>
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="table-responsive scrollbar mx-n1 px-1 border-top">
              <table class="table fs--1 mb-0 leads-table">
                <thead>
                  <tr>
                   
                    <th class="sort white-space-nowrap align-middle text-uppercase ps-0" scope="col" data-sort="name" style="width:25%;">Name</th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="email" style="width:15%;">
                      <div class="d-inline-flex flex-center">
                        <div class="d-flex align-items-center px-1 py-1 bg-success-100 rounded me-2"><span class="text-success-600 dark__text-success-300" data-feather="mail"></span></div><span>Email</span>
                      </div>
                    </th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="phone" style="width:15%; min-width: 180px;">
                      <div class="d-inline-flex flex-center">
                        <div class="d-flex align-items-center px-1 py-1 bg-primary-100 rounded me-2"><span class="text-primary-600 dark__text-primary-300" data-feather="phone"></span></div><span>Phone</span>
                      </div>
                    </th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="contact" style="width:15%;">
                      <div class="d-inline-flex flex-center">
                        <div class="d-flex align-items-center px-1 py-1 bg-info-100 rounded me-2"><span class="text-info-600 dark__text-info-300" data-feather="user"></span></div><span>Contact Person</span>
                      </div>
                    </th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase border-end" scope="col" data-sort="company" style="width:15%;">
                      <div class="d-inline-flex flex-center">
                        <div class="d-flex align-items-center px-1 py-1 bg-warning-100 rounded me-2"><span class="text-warning-600 dark__text-warning-300" data-feather="grid"></span></div><span>Stage</span>
                      </div>
                    </th>
                    <th class="sort align-middle ps-4 pe-5 text-uppercase" scope="col" data-sort="date" style="width:15%;">Create date</th>
                    <th class="sort text-end align-middle pe-0 ps-4" scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list" id="leal-tables-body">
                @foreach ($leads as $lead)
                  <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                   
                    <td class="name align-middle white-space-nowrap ps-0">
                      <div class="d-flex align-items-center">
                        <div><a class="fs-0 fw-bold" href="#!">{{$lead->name}}</a>
                          <div class="d-flex align-items-center">
                           <span class="badge badge-phoenix badge-phoenix-primary">{{$lead->status}}</span>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="email align-middle white-space-nowrap fw-semi-bold ps-4 border-end"><a class="text-1000" href="mailto:{{$lead->email}}">{{$lead->email}}</a></td>
                    <td class="phone align-middle white-space-nowrap fw-semi-bold ps-4 border-end"><a class="text-1000" href="tel:{{$lead->phone}}">{{$lead->phone}}</a></td>
                    <td class="contact align-middle white-space-nowrap ps-4 border-end fw-semi-bold text-1000">{{$lead->contact_name}}</td>
                    <td class="company align-middle white-space-nowrap text-600 ps-4 border-end fw-semi-bold text-1000">{{$lead->stage}}</td>
                    <td class="date align-middle white-space-nowrap text-600 ps-4 text-700">{{$lead->created_at}}</td>
                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4">
                      <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                          <a class="dropdown-item" href="{{URL::to('leadsdetails/'.$lead->id)}}">View</a>
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
            <div class="row align-items-center justify-content-end py-4 pe-0 fs--1">
              <div class="col-auto d-flex">
                <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
              </div>
              <div class="col-auto d-flex">
                <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                <ul class="mb-0 pagination"></ul>
                <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
              </div>
            </div>
          </div>
        </div>



    <div class="modal fade" id="addDealModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDealModal" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
      <form class="row g-3" method="post" action="{{route('adddeal')}}"  enctype="multipart/form-data">
                                @csrf

                                <div class="modal-content bg-100 p-6">
          <div class="modal-header border-0 p-0 mb-2">
            <h3 class="mb-0">Deal Informations</h3>
            <button class="btn btn-sm btn-phoenix-secondary" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times text-danger"></span></button>
          </div>
          <div class="modal-body px-0">
            <div class="row g-4">
              <div class="col-lg-6">
                <div class="mb-4">
                  <label class="text-1000 fw-bold mb-2">Deal Owner</label>
                  <select class="form-select" name="dealowner">
                    <option>Select</option>
                    <option value="Ally Aagaard">Ally Aagaard</option>
                    <option value="Aida Moen">Aida Moen</option>
                    <option value="Niko Koss">Niko Koss</option>
                    <option value="Alec Haag">Alec Haag</option>
                    <option value="Lonnie Kub">Lonnie Kub</option>
                    <option value="Ola Smith">Ola Smith</option>
                  </select>
                </div>
                <div class="mb-4">
                  <label class="text-1000 fw-bold mb-2">Deal Name</label>
                  <input class="form-control" type="text" placeholder="Enter deal name" name="name" />
                </div>
                <div class="mb-4">
                  <div class="row g-3">
                    <div class="col-sm-6 col-lg-12 col-xl-6">
                      <label class="text-1000 fw-bold mb-2">Deal Amount</label>
                      <div class="row g-2">
                        <div class="col-6">
                          <input class="form-control" type="number" name="amount" placeholder="$ Enter amount" />
                        </div>
                        <div class="col-6">
                          <select class="form-select" name="currency">
                            <option value="USD">USD</option>
                            <option value="GBP">GBP</option>
                            <option value="EUR">EUR</option>
                            <option value="JPY">JPY</option>
                            <option value="CAD">CAD</option>
                            <option value="AUD">AUD</option>
                            <option value="CNY">CNY</option>
                          </select>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              
              
                <div>
                  <div class="row g-3">
                    <div class="col-6">
                      <label class="text-1000 fw-bold mb-2">Stage</label>
                      <select class="form-select" name="stage">
                        <option>Select</option>
                        <option value="New">New</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Pending">Pending</option>
                        <option value="Canceled">Canceled</option>
                        <option value="Completed">Completed</option>
                      </select>
                    </div>
                    <div class="col-6">
                      <label class="text-1000 fw-bold mb-2">Priority</label>
                      <select class="form-select" name="priority">
                        <option value="Urgent">Urgent</option>
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-4">
                  <label class="text-1000 fw-bold mb-2">Contact Name</label>
                  <input class="form-control" type="text" name="contact_name" placeholder="Enter contact name" />
                </div>
                <div class="mb-4">
                  <div class="row g-3">
                    <div class="col-6">
                      <label class="text-1000 fw-bold mb-2">Phone Number</label>
                      <input class="form-control" type="text" name="phone" placeholder="Enter phone number" />
                    </div>
                    <div class="col-6">
                      <label class="text-1000 fw-bold mb-2">Email Address</label>
                      <input class="form-control" type="text" name="email" placeholder="Enter email address" />
                    </div>
                  </div>
                </div>
                <div class="mb-4">
                  <label class="text-1000 fw-bold mb-2">Lead Source
                   
                  </label>
                  <select class="form-select" name="lead_source">
                    <option>Select</option>
                    <option value="Referrals">Referrals</option>
                    <option value="Former Clients">Former Clients</option>
                    <option value="Competitors">Competitors</option>
                    <option value="Business & sales">Business & sales</option>
                    <option value="Google resources">Google resources</option>
                    <option value="Linkedin">Linkedin</option>
                    <option value="Marketing">Marketing</option>
                  </select>
                </div>
              
              
                <div class="mb-4">
                  <div class="row g-3">
                    <div class="col-6">
                      <label class="text-1000 fw-bold mb-2">Create Date</label>
                      <input class="form-control datetimepicker" name="create_date" type="text" placeholder="dd / mm / yyyy" data-options='{"disableMobile":true}' />
                    </div>
                    <div class="col-6">
                      <label class="text-1000 fw-bold mb-2">Start Time</label>
                      <input class="form-control datetimepicker" name="create_time" type="text" placeholder="H:i" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                    </div>
                  </div>
                </div>
                <div>
                  <div class="row g-3">
                    <div class="col-6">
                      <label class="text-1000 fw-bold mb-2">Closing Date</label>
                      <input class="form-control datetimepicker" name="close_date" type="text" placeholder="dd / mm / yyyy" data-options='{"disableMobile":true}' />
                    </div>
                    <div class="col-6">
                      <label class="text-1000 fw-bold mb-2">Closing Time</label>
                      <input class="form-control datetimepicker" name="close_time" type="text" placeholder="H:i" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 pt-6 px-0 pb-0">
            <button class="btn btn-link text-danger px-3 my-0" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            <button class="btn btn-primary my-0">Create Deal</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  

    @push('scripts') 
    <script src="{{asset('vendors/choices/choices.min.js')}}"></script>
    <script src="{{asset('vendors/sortablejs/sortable.min.js')}}"></script>
  
  @endpush
        @endsection
		
		