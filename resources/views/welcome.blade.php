<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Solar Cost Calculator</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/muli-font.css') }}">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/jquery-ui.min.css') }}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <style>
        div#input_1_3 span:nth-of-type(1n+2),
        #field_1_4,
        #input_1_5,
        #input_1_6 {
            opacity: 0;
            position: absolute;
            left: -10000px;
        }

        input#gform_submit_button_1 {
            font-family: "Poppins", Sans-serif;
            font-size: 1.2em;
            font-weight: 600;
            background-color: #f802bf;
            border-radius: 50px;
            padding: 1em 2em;
            color: white;
            width: 100%;
        }

        #input_1_3_1 {
            padding: 25px;
            font-size: 18px;
            border-radius: 10px;
        }

        @media (max-width:650px) {
            input#gform_submit_button_1 {
                font-family: "Poppins", Sans-serif;
                font-size: 1.2em;
                font-weight: 600;
                background-color: #f802bf;
                border-radius: 50px;
                padding: 7px 2em;
                color: white;
                width: 100%;
            }

            #input_1_3_1 {
                padding: 15px;
                font-size: 16px;
                border-radius: 10px;
            }
        }


        /* invoice page design */

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 100px;
        }

        h1 {
            font-size: 24px;
            margin-top: 10px;
        }

        .customer-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .customer-info .customer-note {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .order-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .address,
        .payment-details {
            width: 30%;
        }

        h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .order-summary {
            margin-bottom: 20px;
        }

        .order-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .order-item img {
            width: 50px;
            margin-right: 10px;
        }

        .order-item .price {
            font-weight: bold;
            color: red;
        }

        .order-totals {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>
<body>
	<div class="page-content" style="background-image: url('{{asset('frontend/images/wizard-v2-bg.jpg')}}')">
		<div class="wizard-v2-content">
			<!-- <div class="wizard-image">
			</div> -->
			<div class="wizard-form">
				<div class="wizard-header">
					<h3>Your Solar Cost</h3>
					<p>Lets find out in minutes</p>
				</div>
		        <form class="form-register" action="{{route('finance')}}" method="get">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->

                        @if(session('steps') === 'address')
                        <h4>Address</h4>

			            <section>
			                <div class="inner">
								<div class="row">
									<div class="form-holder">
                                        <input type="text" name="address" id="input_1_3_1" class="form-control" placeholder="Enter a valid address" value aria-required="true" autocomplete="address-line1" />
                                        <span id="addressSuggestions"></span>
									</div>
								</div>
							</div>
			            </section>
                        @elseif (session('steps') === 'payment')
                        <h4>Payment</h4>

                        <section>
			                <div class="inner">
								<div class="row">
									<div class="form-holder">
                                        <input type="hidden" name="address" value="{{ session('form_address') }}" class="form-control" id="first_name">
										<input type="number" name="payment" placeholder="Give Payment" class="form-control" id="first_name">
									</div>
								</div>
							</div>
			            </section>
                        @elseif (session('steps') === 'detail')
                        <h4>Personal Detail</h4>

                        <section>
                        <input type="hidden" name="address" value="{{ session('form_address') }}" class="form-control" id="first_name">
                        <input type="hidden" name="payment" value="{{ session('form_payment') }}" class="form-control" id="first_name">
			                <div class="inner">
								<div class="form-row">
									<div class="form-holder">
										<input type="text" name="firstname" placeholder="First Name" class="form-control" id="first_name">
									</div>
									<div class="form-holder">
										<input type="text" name="lastname" placeholder="Last Name" class="form-control" id="last_name">
									</div>
								</div>
                                
								<div class="form-row">
									<div class="form-holder">
										<input type="text" name="phone" placeholder="Phone Number" class="form-control" id="phone">
									</div>
									<div class="form-holder">
										<input type="email" name="email" placeholder="Email" class="form-control" id="email">
									</div>
								</div>
                                
                                <div class="form-row">
									<div class="form-holder">
										<input type="text" name="systemsize" placeholder="system size" class="form-control" id="systemsize">
									</div>
									<div class="form-holder">
										<input type="text" name="offset" placeholder="Offset" class="form-control" id="offset">
									</div>
								</div>

                                <div class="form-row">
									<div class="form-holder">
										<input type="text" name="monthlybill" placeholder="Monthly Bill" class="form-control" id="monthlybill">
									</div>
									<div class="form-holder">
										<input type="text" name="annualusage" placeholder="Annual Usage" class="form-control" id="annualusage">
									</div>
								</div>
							</div>
			            </section>

                        @elseif (session('steps') === 'proposal')
                        <h4>Check Out Your Free Solar Estimate!</h4>

                        @php
                            $details = Session::get('personal_detail');
                        @endphp

                        <!-- <section>
                            
                            @foreach ($details as $row)
                                <P> {{ $row }} </P>
                            @endforeach
			                
			            </section> -->

                        <div class="container">
                            <header>
                                <!-- <img src="logo.png" alt="Peak Logo" class="logo"> -->
                                <!-- <h1>ORDER CONFIRMATION</h1> -->
                            </header>

                            <section class="customer-info">
                                <p class="customer-note">Proposal Detail</p>
                                <p>Tailor made for you using a flat-rate to save you money!</p>
                            </section>

                            <section class="order-details">
                                <div class="address">
                                    <h3>User Detail</h3>
                                    <p>{{ $details['0'] }} {{ $details['1'] }}</p>
                                    <p>{{ $details['2'] }}</p>
                                    <p>{{ $details['3'] }}</p>
                                    <p>{{ $details['4'] }}</p>
                                </div>
                                <div class="address">
                                    <h3>DELIVERY ADDRESS</h3>
                                    <p>{{ $details['0'] }} {{ $details['1'] }}</p>
                                    <p>{{ session('form_address') }}</p>
                                </div>
                                <div class="payment-details">
                                    <h3>PAYMENT DETAILS</h3>
                                    <p>Invoice</p>
                                    <p class="price">${{ session('form_toal_payment') }}</p>
                                </div>
                            </section>

                            <section class="order-summary">
                                <p>Order number: 00000000 | Date: 05.06.2013</p>
                                <div class="order-item">
                                    <img src="jacket.png" alt="Down Jacket Lhotse II">
                                    <div>
                                        <p>DOWN JACKET LHOTSE II</p>
                                        <p class="price">${{ session('form_toal_payment') }}</p>
                                    </div>
                                </div>
                                <div class="order-totals">
                                    <p>TOTAL $000.00</p>
                                </div>
                            </section>
                        </div>

                        @endif
						
                        @if(session('steps') !== 'proposal')
                            <button type="submit" class="btn btn-primary mt-3">Continue</button>
                        @endif
			            
		        	</div>
		        </form>
			</div>
		</div>
	</div>
	<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
	<!-- <script src="{{ asset('frontend/js/jquery.steps.js') }}"></script> -->
	<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
       

<script>

		  let buildingInsights;
		   let solarPanels = [];
        function initMap() {
         
		  var autocomplete = new google.maps.places.Autocomplete(document.getElementById('input_1_3_1'));
		  autocomplete.addListener('place_changed', function() {
			  var place = autocomplete.getPlace();
			  if (place && place.formatted_address) {
				  //document.getElementById('addressSuggestions').innerHTML = "<p>Suggested address: " + place.formatted_address + "</p>";
				  //mapcont
				

            let location;
            const zoom = 20;
			let myinsights;
            let mapElement;
            let map;
            let geometryLibrary;
            let mapsLibrary;
            var geocodingUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent(place.formatted_address) + "&key=AIzaSyAz5z8de2mOowIGRREyHc3gT1GgmJ3whDg";

            // Make the geocoding API request
            fetch(geocodingUrl)
                .then(response => response.json())
                .then(data => {
                    const geocoderResult = data.results[0].geometry.location;
                    location = geocoderResult;

                    map = new google.maps.Map(document.getElementById("mymap"), {
                        center: location,
                        zoom: zoom,
                        tilt: 0,
                        mapTypeId: 'satellite',
                        mapTypeControl: false,
    fullscreenControl: false,
    rotateControl: false,
    streetViewControl: false,
    zoomControl: false,
    draggable: false, // Disable dragging
    scrollwheel: false, // Disable zooming with scroll
    disableDefaultUI: true, 
                    });
					var mapsLibrary =  google.maps;
					geometryLibrary = google.maps.geometry;
					 const houseCircle = new google.maps.Circle({
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 6,
                            fillColor: '#FF0000',
                            fillOpacity: 0,
                            map: map,
                            center: location,
                            radius: 12 // Adjust the radius as needed
                        });

                    // Call showSolarPotential after map is initialized
                    showSolarPotential(location);
                })
                .catch(error => {
                    console.error('Error loading Google Maps API: ', error);
                });

            // Function to find closest building
            async function findClosestBuilding(location, apiKey) {

                const args = {
                    'location.latitude': location.lat.toFixed(5),
                    'location.longitude': location.lng.toFixed(5),
                };
				console.log('location:', args)
                const params = new URLSearchParams({ ...args, key: apiKey });
                return fetch(`https://solar.googleapis.com/v1/buildingInsights:findClosest?${params}`).then(
                    async (response) => {
                        const content = await response.json();
                        if (response.status != 200) {
                            console.error('findClosestBuilding\n', content);
                            throw content;
                        }
                       // console.log('buildingInsightsResponse', content);
					   myinsights = content;
                        return content;
                    },
                );
            }

            // Function to create color palette
           

            async function showSolarPotential(location) {
                let requestSent = false;
                let requestError;
                let panelConfig;
                let panelCapacityWatts;
				let showPanels = true;
				
                // Call API to get building insights
                try {
                    requestSent = true;
                    buildingInsights = await findClosestBuilding(location, 'AIzaSyAz5z8de2mOowIGRREyHc3gT1GgmJ3whDg');
					
                } catch (e) {
                    requestError = e;
                    return;
                } finally {
                    requestSent = false;
                }

                const solarPotential = buildingInsights.solarPotential;
                const palette = '';
                const minEnergy = solarPotential.solarPanels.slice(-1)[0].yearlyEnergyDcKwh;
                const maxEnergy = solarPotential.solarPanels[0].yearlyEnergyDcKwh;
                solarPanels = solarPotential.solarPanels.map((panel) => {

                });
			
 updatePolygonVisibility(solarPanels);

 
            }
				
			function updatePolygonVisibility(polygons) {
			let monthlyAverageEnergyBillInput = 300;
	let panelCapacityWattsInput = 250;
	let energyCostPerKwhInput = 0.31;
	let dcToAcDerateInput = 0.85;
	let yearlyKwhEnergyConsumption = (monthlyAverageEnergyBillInput / energyCostPerKwhInput) * 12;
    const defaultPanelCapacity = buildingInsights.solarPotential.panelCapacityWatts;
    const panelCapacityRatio = panelCapacityWattsInput / defaultPanelCapacity;
    const haji = panelCapacityRatio * dcToAcDerateInput;
	const yearlymax = yearlyKwhEnergyConsumption / haji;
	let config;
	function findPanelsCount(buildingInsights, yearlymax) {
    const solarPanelConfigs = buildingInsights.solarPotential.solarPanelConfigs;
    for (let i = 0; i < solarPanelConfigs.length; i++) {
         config = solarPanelConfigs[i];
        if (config.yearlyEnergyDcKwh >= yearlymax) {  return config.panelsCount;  }
    }
    }
	
const panelsCount = findPanelsCount(buildingInsights, yearlymax);
document.getElementById('result_panelcount').value=panelsCount;
document.getElementById('result_yenergy').value=(config.yearlyEnergyDcKwh * panelCapacityRatio)+'KWh'; 
document.getElementById('result_maxpanel').value=buildingInsights.solarPotential.solarPanels.length; 
document.getElementById('result_roofarea').value=buildingInsights.solarPotential.wholeRoofStats.areaMeters2+'m²'; 
document.getElementById('result_co2').value=buildingInsights.solarPotential.carbonOffsetFactorKgPerMwh+'Kg/MWh'; 
document.getElementById('result_sunshine').value=buildingInsights.solarPotential.maxSunshineHoursPerYear; 
document.getElementById('sqrfeet').value=buildingInsights.solarPotential.wholeRoofStats.areaMeters2; 
document.getElementById('zip').value=buildingInsights.postalCode; 
document.getElementById('state').value=buildingInsights.administrativeArea; 
document.getElementById('country').value=buildingInsights.regionCode;
document.getElementById('city').value=buildingInsights.administrativeArea; 
document.getElementById('lat').value=buildingInsights.center.latitude; 
document.getElementById('long').value=buildingInsights.center.longitude; 
//console.log("building insights: -- "+buildingInsights);
//ye conditional panel count per ho.

if(buildingInsights.solarPotential.solarPanels.length > 0){
document.getElementById('gform_submit_button_1').disabled = false;
}else{
	alert('No insight available for this address, put your exact address');
}
}
			
      
	 
			  }
		  });
		  


    
}
		
		
		
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz5z8de2mOowIGRREyHc3gT1GgmJ3whDg&libraries=geometry,places&callback=initMap"></script>
</body>
</html>