@extends('layouts.app')
@section('section')


        <div class="border-bottom mb-7 mx-n3 px-2 mx-lg-n6 px-lg-6">
          <div class="row">
            <div class="col-xl-9">
              <div class="d-sm-flex justify-content-between">
                <h2 class="mb-4">Create new lead</h2>
                <div class="d-flex mb-3">
              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-9">
          <form class="row g-3 mb-9" method="post" action="{{route('createlead')}}"  enctype="multipart/form-data">
             @csrf          
           
            <h4 class="mb-3">Lead Information </h4>
           
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <select class="form-select" name="assigned_to" id="floatingSelectOwner">
				  @foreach($users as $user)
                    <option value="{{$user->id}}"> {{$user->first_name}} - {{$user->last_name}}</option>
                   @endforeach   
                  </select>
                  <label for="floatingSelectOwner">Assigned To</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <input class="form-control" name="first_name" id="floatingInputFirstname" type="text" placeholder="First name" />
                  <label for="floatingInputFirstname">First name</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <input class="form-control" name="last_name" id="floatingInputLastname" type="text" placeholder="Last name" />
                  <label for="floatingInputLastname">Last name</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <input class="form-control" name="company" id="floatingInputCompany" type="text" placeholder="Company" />
                  <label for="floatingInputCompany">Company</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <input class="form-control" name="title" id="floatingInputTitle" type="text" placeholder="title" />
                  <label for="floatingInputTitle">Title</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <input class="form-control" name="email" id="floatingInputEmail" type="text" placeholder="email" />
                  <label for="floatingInputEmail">Email</label>
                </div>
              </div>
            
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <input class="form-control" name="phone" id="floatingInputPhone" type="text" placeholder="phone" />
                  <label for="floatingInputPhone">Phone</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <input class="form-control" name="website" id="floatingInputWebsite" type="text" placeholder="website" />
                  <label for="floatingInputWebsite">Website</label>
                </div>
              </div>
            
            
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <select class="form-select" name="status" id="floatingSelectStatus">
                    <option selected="selected" value="New">New</option>
                    <option value="suspended">suspended</option>
                    <option value="ongoing">ongoing</option>
                    <option value="Current">Current</option>
                  </select>
                  <label for="floatingSelectStatus">Lead status </label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <select class="form-select" name="source" id="floatingSelectLeadSource">
                    <option selected="selected" value="Advertisement">Advertisement</option>
                    <option value="Advertisement One">Advertisement One</option>
                    <option value="Advertisement Two">Advertisement Two</option>
                    <option value="Consulting">Consulting</option>
                  </select>
                  <label for="floatingSelectLeadSource">lead source</label>
                </div>
              </div>
             
              <h4 class="mt-6">Address Information</h4>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <input class="form-control" name="street" id="floatingInputStreet" type="text" placeholder="street" />
                  <label for="floatingInputStreet">Street</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <select class="form-select" name="city" id="floatingSelectCity">
                    <option selected="selected" value="Neo centrola"> Neo centrola</option>
                    <option value="London">London</option>
                    <option value="New York">New York </option>
                  </select>
                  <label for="floatingSelectCity">City</label>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="form-floating">
                  <select class="form-select" name="state" id="floatingSelectState">
                    <option selected="selected" value="Qualimando"> Qualimando</option>
                    <option value="Sovereign">Sovereign</option>
                    <option value="Northeastern United States">Northeastern United States</option>
                  </select>
                  <label for="floatingSelectState">State</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <select class="form-select" name="country" id="floatingSelectCountry">
                    <option value="Pakistan"> Pakistan</option>
                    <option value="UK">UK</option>
					<option value="INDIA">INDIA</option>
					<option value="CANADA">CANADA</option>
					<option value="UK">UK</option>
                    <option value="USA" selected="selected">USA</option>
                  </select>
                  <label for="floatingSelectCountry">Country</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input class="form-control" name="zipcode" id="floatingInputZipcode" type="text" placeholder="zip code" />
                  <label for="floatingInputZipcode">zip code</label>
                </div>
              </div>
              <h4 class="mt-6">Description</h4>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" name="description" id="floatingProjectOverview" placeholder="Leave a comment here" style="height: 128px"></textarea>
                  <label for="floatingProjectOverview">Lead description</label>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-end mt-6">
                <button class="btn btn-primary">Create lead</button>
              </div>
            </form>
          </div>
        </div>
        
        @endsection