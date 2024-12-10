@extends('layouts.app')
@section('section')

 <div class="mt-4">
          <div class="row g-4">
            <div class="col-12 col-xl-12 order-1 order-xl-0">
              <div class="mb-9">
                <div class="card shadow-none border border-300 my-4" data-component-card="data-component-card">
                  <div class="card-header p-4 border-bottom border-300 bg-soft">
                    <div class="row g-3 justify-content-between align-items-center">
                      <div class="col-12 col-md">
                        <h4 class="text-900 mb-0"> Update Solar Values</h4>
                      </div>
                      <div class="col col-md-auto">
                       
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                  
                    <div class="p-4 code-to-copy">
                            <form class="row g-3" action="{{URL::to('updatequote')}}" method="POST">
                                @csrf

  <div class="col-md-3 position-relative">
          <label class="form-label" for="userinput1">Panel Capacity</label>
          <input type="hidden" value="{{$proposals->id}}" class="form-control" name="id">
          <input type="text" required id="userinput1" class="form-control" name="panelcapacity" value="{{old('panelcapacity',$proposals->panelcapacity)}}" >
 </div>
 
  <div class="col-md-3 position-relative">
          <label class="form-label" for="userinput1">Panel Output</label>
          <input type="text" required id="userinput1" class="form-control" name="paneloutput" value="{{old('paneloutput',$proposals->paneloutput)}}">
 </div>
 
   <div class="col-md-3 position-relative">
          <label class="form-label" for="userinput1">DC To AC%</label>
          <input type="text" required id="userinput1" class="form-control" name="dctoac" value="{{old('dctoac',$proposals->dctoac)}}" >
 </div>
 
 <div class="col-md-3 position-relative">
          <label class="form-label" for="userinput1">Panel Price</label>
          <input type="text" required id="userinput1" class="form-control" name="costperpanel" value="{{old('costperpanel',$proposals->costperpanel)}}" >
 </div>
 
 <div class="col-md-3 position-relative">
          <label class="form-label" for="userinput1">Tax Incentive %</label>
          <input type="text" required id="userinput1" class="form-control" name="taxincentive" value="{{old('taxincentive',$proposals->taxincentive)}}" >
 </div>
 
 <div class="col-md-3 position-relative">
          <label class="form-label" for="userinput1">Utility Cost/KWH</label>
          <input type="text" required id="userinput1" class="form-control" name="kwhrate" value="{{old('kwhrate',$proposals->kwhrate)}}" >
 </div>
 
 <div class="col-md-3 position-relative">
          <label class="form-label" for="userinput1">Home Value Factor</label>
          <input type="text" required id="userinput1" class="form-control" name="homevaluefactor" value="{{old('homevaluefactor',$proposals->homevaluefactor)}}" >
 </div>
 
 


 



 

 
</div>



                                  

                                   

                                </div>

                               <div class="col-12" align="center">
                                  
                                    <button type="submit" class="btn btn-primary">Save</button>
									

                                </div>
								<br />
                            </form>

        </div>
                  </div>
                </div>  

</div>
            </div>
            
          </div>
        </div>                

@endsection