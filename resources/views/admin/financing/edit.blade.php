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
                        <h4 class="text-900 mb-0"> Edit Payment Method</h4>
                      </div>
                      <div class="col col-md-auto">
                       
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                  
                    <div class="p-4 code-to-copy">
                            <form class="row g-3" action="{{URL::to('updatefinancing')}}" method="POST">
                                @csrf
                             

                                    
										
                                        <div class="col-md-3 position-relative">
                                                <label class="form-label" for="userinput1">Title</label>
												<input type="hidden" value="{{$proposals->id}}" class="form-control" name="id">
                                                <input type="hidden" value="0" name="maxamount" >
												<input type="text" required id="userinput1" class="form-control" name="title" value="{{old('title',$proposals->name)}}" tabindex="1">
                                       </div>
									   
									 
									   
									    <div class="col-md-3 position-relative">
                                                <label class="form-label" for="userinput1">Interest Rate%</label>
												<input type="text" required id="userinput1" class="form-control" name="interest" value="{{old('interest',$proposals->interest)}}" tabindex="3">
                                       </div>
									   
									     <div class="col-md-3 position-relative">
                                                <label class="form-label" for="userinput1">Dealer Fee%</label>
												<input type="text" required id="userinput1" class="form-control" name="dealer" value="{{old('dealer',$proposals->dealer)}}" tabindex="3">
                                       </div>
									   
									     <div class="col-md-3 position-relative">
                                                <label class="form-label" for="userinput1">Months</label>
												<input type="text" required id="userinput1" class="form-control" name="months" value="{{old('months',$proposals->months)}}" tabindex="3">
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