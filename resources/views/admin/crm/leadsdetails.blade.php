@extends('layouts.app')
@section('section')
@push('styles')
<link href="{{asset('vendors/dropzone/dropzone.min.css')}}" rel="stylesheet">
@endpush


<div class="pb-9">
  <div class="row">
    <div class="col-12">
      <div class="row align-items-center justify-content-between g-3 mb-3">
        <div class="col-12 col-md-auto">
          <h2 class="mb-0">Lead details</h2>
        </div>
        <div class="col-12 col-md-auto">
          <div class="d-flex">
            <div class="flex-1 d-md-none">
              <button class="btn px-3 btn-phoenix-secondary text-700 me-2" data-phoenix-toggle="offcanvas" data-phoenix-target="#productFilterColumn"><span class="fa-solid fa-bars"></span></button>
            </div>
          
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row g-0 g-md-4 g-xl-6">
    <div class="col-md-5 col-lg-5 col-xl-4">
      <div class="sticky-leads-sidebar">
        <div class="lead-details-offcanvas bg-soft scrollbar phoenix-offcanvas phoenix-offcanvas-fixed" id="productFilterColumn">
          <div class="d-flex justify-content-between align-items-center mb-2 d-md-none">
            <h3 class="mb-0">Lead Details</h3>
            <button class="btn p-0" data-phoenix-dismiss="offcanvas"><span class="uil uil-times fs-1"></span></button>
          </div>
          <div class="card mb-3">
            <div class="card-body">
              <div class="row align-items-center g-3 text-center text-xxl-start">

                <div class="col-12 col-sm-auto flex-1">
                  <h3 class="fw-bolder mb-2">{{$lead->first_name}} {{$lead->last_name}}</h3>
                  <p class="mb-0">{{$lead->inputaddress}},</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">

              <div class="mb-4">
                <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-envelope-alt"> </span>
                  <h5 class="text-1000 mb-0">Email</h5>
                </div><a href="mailto:shatinon@jeemail.com:">{{$lead->email}}</a>
              </div>
              <div class="mb-4">
                <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-phone"> </span>
                  <h5 class="text-1000 mb-0">Phone</h5>
                </div><a href="tel:+1234567890">{{$lead->phone}}</a>
              </div>
              <div>
                <div class="d-flex align-items-center mb-1"><span class="me-2 uil uil-check-circle"></span>
                  <h5 class="text-1000 mb-0">Lead status</h5>
                </div><span class="badge badge-phoenix badge-phoenix-primary">{{$lead->finl_status}}</span>
              </div>
            
             
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-body">
  <form class="row g-3 mb-9" method="post" action="{{route('updatemyleadsts')}}"  enctype="multipart/form-data">
             @csrf         
              <div class="col-sm-6 col-md-6">
                <div class="form-floating">
                  <select class="form-select" name="status" id="floatingSelectStatus">
                    <option selected="selected" value="New" @if($lead->final_status=='New') selected @endif>New</option>
                    <option value="suspended" @if($lead->final_status=='suspended') selected @endif>suspended</option>
                    <option value="ongoing" @if($lead->final_status=='ongoing') selected @endif>ongoing</option>
                    <option value="Current" @if($lead->final_status=='Current') selected @endif>Current</option>
                  </select>
                  <label for="floatingSelectStatus">Lead status </label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
              <input name="id" type="hidden" value="{{$lead->id}}" />
              
                <button class="btn btn-primary">Update Status</button>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        <div class="phoenix-offcanvas-backdrop d-lg-none top-0" data-phoenix-backdrop="data-phoenix-backdrop"></div>
      </div>
    </div>
    <div class="col-md-7 col-lg-7 col-xl-8">
      <div class="lead-details-container">
        <nav class="navbar pb-4 px-0 sticky-top bg-soft nav-underline-scrollspy" id="navbar-deals-detail">
          <ul class="nav nav-underline">
            <li class="nav-item"><a class="nav-link pe-3" href="#scrollspyTask">Activities</a></li>
            
          </ul>
        </nav>
        <div class="scrollspy-example bg-body-tertiary rounded-2" data-bs-spy="scroll" data-bs-offset="0" data-bs-target="#navbar-deals-detail" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
         
          <div class="mb-8">
            <div class="d-flex justify-content-between align-items-center mb-4" id="scrollspyTask">
              <h2 class="mb-0">Activity</h2>
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kanbanAddTask"><span class="fa-solid fa-plus me-2"></span>Add Activity</button>
            </div>
            <div class="border-top border-bottom border-200" id="leadDetailsTable" data-list='{"valueNames":["dealName","amount","stage","probability","date","type"],"page":5,"pagination":true}'>
              <div class="table-responsive scrollbar mx-n1 px-1">
                <table class="table fs--1 mb-0">
                  <thead>
                    <tr>

                      <th class="sort text-uppercase" style="width:15%; min-width:200px">Title</th>
                      <th class="sort align-middle pe-6 text-uppercase " scope="col" data-sort="amount">Description</th>

                    </tr>
                  </thead>
                  <tbody class="list" id="lead-details-table-body">
                    @foreach($lactivity as $lactivit)
                    <tr class="hover-actions-trigger btn-reveal-trigger position-static">

                      <td class="dealName text-uppercase fw-semi-bold">{{$lactivit->title}}</td>
                      <td class="amount align-middle white-space-nowrap text-start fw-bold text-700">{{$lactivit->description}}</td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
              <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
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
          
          <!-- Attachments -->
          
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="kanbanAddTask" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down modal-xl modal-dialog-centered">
    <div class="modal-content">
      <form method="post" action="{{route('addleadactivity')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row gx-3 gy-4">
            <div class="col-sm-6 col-md-12">
              <div class="form-floating">
                <input class="form-control" id="kanbanTaskTitle" type="text" placeholder="title" name="title" value="{{old('title')}}" />
                <input class="form-control" id="leadid" type="hidden" name="leadid" value="{{$lead->id}}" />
                <label for="kanbanTaskTitle">Title</label>
              </div>
            </div>
            <div class="col-12 gy-4">
              <div class="form-floating">
                <textarea class="form-control" id="floatingProjectDescription" placeholder="Leave a comment here" name="description" style="height: 128px">{{old('description')}}</textarea>
                <label for="floatingProjectDescription">ADD A DESCRIPTION</label>
              </div>
            </div>



          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--2 me-1" data-fa-transform="up-1"></span>Close</button>
          <button class="btn btn-primary px-6" type="submit" data-bs-dismiss="modal">Done</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="sendEmailModel" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-sm-down modal-xl modal-dialog-centered">
    <div class="modal-content">
      <form method="post" action="{{route('leads.sendemail')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row gx-3 gy-4">
            <div class="col-sm-6 col-md-12">
              <div class="form-floating">
                <input class="form-control" id="kanbanTaskTitle" type="text" placeholder="Email Subject" name="subject"  />
                <input class="form-control"  type="hidden" name="email" value="{{$lead->email}}"  />
                <label for="kanbanTaskTitle">Subject</label>
              </div>
            </div>
            <div class="col-12 gy-4">
              <div class="form-floating">
                <textarea class="form-control" id="floatingProjectDescription" placeholder="Leave a comment here" name="content" style="height: 128px">{{old('description')}}</textarea>
                <label for="floatingProjectDescription">ADD A Message</label>
              </div>
            </div>



          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--2 me-1" data-fa-transform="up-1"></span>Close</button>
          <button class="btn btn-primary px-6" type="submit" data-bs-dismiss="modal">Done</button>
        </div>
      </form>
    </div>
  </div>
</div>
@push('scripts')
<script src="{{asset('vendors/dropzone/dropzone.min.js')}}"></script>

@endpush
@endsection