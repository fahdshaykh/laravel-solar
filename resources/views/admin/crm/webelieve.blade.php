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
                        <h4 class="text-900 mb-0"> Website Setting</h4>
                      </div>
                      <div class="col col-md-auto">
                       
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                  
                    <div class="p-4 code-to-copy">
                            <form class="row g-3" action="{{URL::to('updatewebelieve')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                             

                                     <div class="col-md-12 position-relative">
                                                <label class="form-label" for="userinput1">Website Name</label>
        <input id="userinput1" class="form-control" required name="details" value="{{$about->details}}" />
												 <input type="hidden" value="{{$about->id}}" name="id" />   
                                        </div>
									
		
                                      
									 <div class="col-md-4 position-relative">
            <label class="form-label" for="file">Logo</label>
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="profile_photo"   >
            </div>
                                     <div class="col-lg-8">
            <img id="imageProfilePreview" src="@if($about->photo) {{asset('template/'.$about->photo)}}  @else {{asset('profile/avatar.png')}} @endif" width="200" alt="image preview">
                                        </div>
                                        
                                        
                                     <div class="col-md-4 position-relative">
            <label class="form-label" for="file">Banner</label>
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="profile_photo2"   >
            </div>
                                     <div class="col-lg-8">
            <img id="imageProfilePreview" src="@if($about->photo2) {{asset('template/'.$about->photo2)}}  @else {{asset('profile/avatar.png')}} @endif" width="200" alt="image preview">
                                        </div>
                                  
                                      
                                       
                                      
                                       
                                    </div>
                                    
                                 
                                    
                                  

                                   

                                </div>

                               <div class="col-12" align="center">
                                  
                                    <button type="submit" class="btn btn-primary">Update</button>
									

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
<script src="{{asset('vendors/tinymce/tinymce.min.js')}}"></script>
@endsection