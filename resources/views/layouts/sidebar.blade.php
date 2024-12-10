<nav class="navbar navbar-vertical navbar-expand-lg">
        <script>
          var navbarStyle = window.config.config.phoenixNavbarStyle;
          if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
          }
        </script>
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <!-- scrollbar removed-->
          <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">
              <li class="nav-item">
                <!-- parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="{{route('dashboard')}}">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"></div><span class="nav-link-icon"><span data-feather="pie-chart"></span></span><span class="nav-link-text">Dashboard</span>
                    </div>
                  </a>
                  
                </div>
              </li>
              
              
              <li class="nav-item">
               
                <hr class="navbar-vertical-line" />
              
                
                <!-- parent pages-->
               
               

                <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-CRM" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-CRM">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="phone"></span></span><span class="nav-link-text">CRM</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-CRM">
                      <li class="collapsed-nav-item-title d-none">CRM
                      </li>
                    
                      </li>
                      <li class="nav-item"><a class="nav-link" href="{{route('crm.myleads')}}" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Leads</span>
                          </div>
                        </a>
                       
                      </li>
					
                   
                    </ul>
                  </div>
                </div>

             
                
               <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-temp" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-temp">
                    <div class="d-flex align-items-center">
                      <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="inbox"></span></span><span class="nav-link-text">Settings</span>
                    </div>
                  </a>
                  <div class="parent-wrapper label-1">
                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-temp">

            
                           
						
							
			<li class="nav-item"><a class="nav-link" href="{{URL::to('financingEdit/1')}}" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Finance Methods</span>
                          </div>
						  </a>
			</li>
			
			<li class="nav-item"><a class="nav-link" href="{{URL::to('quoteEdit/1')}}" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Quote Values Setting</span>
                          </div>
						  </a>
			</li>
			<li class="nav-item"><a class="nav-link" href="{{URL::to('websetting')}}" data-bs-toggle="" aria-expanded="false">
                          <div class="d-flex align-items-center"><span class="nav-link-text">Website Settings</span>
                          </div>
						  </a>
			</li>

                    
							
                            
                         
						
                          </ul>
                      
                    






                    </ul>
                  </div>
                </div>
               
            
               
              </li>
              
            </ul>
          </div>
        </div>
        <div class="navbar-vertical-footer">
          <button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button>
        </div>
      </nav>
      