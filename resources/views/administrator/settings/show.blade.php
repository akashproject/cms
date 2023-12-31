@extends('administrator.layouts.admin')

@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ url('administrator/save-settings') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<h4 class="card-title"> Save Settings </h4>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				@if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif
				<!-- Tabs -->
				<div class="card">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#general" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">General Settings</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contact" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Contact Settings</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#social" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Social Settings</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#utm" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">UTM Settings</span></a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#schema" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Default Schema</span></a> </li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active" id="general" role="tabpanel">
							<div class="p-20">
								<h4 class="card-title mt-3"> General Settings </h4>
								<div class="row">
									<div class="col-md-7" >
										<div class="form-group row">
											<label for="header_logo" class="col-sm-3 text-right control-label col-form-label">Header Logo</label>
											<div class="col-sm-9">
												<input type="file" class="form-control" name="header_logo" id="header_logo" >
											</div>
										</div>

										<div class="form-group row">
											<label for="footer_logo" class="col-sm-3 text-right control-label col-form-label">Footer Logo</label>
											<div class="col-sm-9">
												<input type="file" class="form-control" name="footer_logo" id="footer_logo" >
											</div>
										</div>

										<div class="form-group row">
											<label for="date_format" class="col-sm-3 text-right control-label col-form-label">
												Date Format</label>
											<div class="col-sm-9">
												<select name="date_format" id="date_format" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
													<option value="Y-m-d"> {{ date("Y-m-d") }} </option>
													<option value="F d, Y" {{ (isset($envSettings["date_format"]) && ($envSettings["date_format"] == 'F d, Y'))?"selected":"" }}> {{ date("F d, Y") }} </option>
													<option value="d/m/Y" {{ (isset($envSettings["date_format"]) && ($envSettings["date_format"] == 'd/m/y'))?"selected":"" }}> {{ date("d/m/Y") }}</option>
													<option value="M d, Y" {{ (isset($envSettings["date_format"]) && ($envSettings["date_format"] == 'M d, Y'))?"selected":"" }}> {{ date("M d, Y") }} </option>
												<select>
											</div>
										</div>

										<div class="form-group row">
											<label for="time_format" class="col-sm-3 text-right control-label col-form-label">
												Time Format</label>
											<div class="col-sm-9">
												<select name="time_format" id="time_format" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
													<option value="h:i:s" > {{ date("h:i:s") }} </option>
													<option value="g:i a" {{ (isset($envSettings["time_format"]) && ($envSettings["time_format"] == 'g:i a'))?"selected":"" }}> {{ date("g:i a") }} </option>
													<option value="g:i A" {{ (isset($envSettings["time_format"]) && ($envSettings["time_format"] == 'g:i A'))?"selected":"" }}> {{ date("g:i A") }}</option>
													<option value="H:i" {{ (isset($envSettings["time_format"]) && ($envSettings["time_format"] == 'H:i'))?"selected":"" }}> {{ date("H:i") }}</option>
												<select>
											</div>
										</div>

										<div class="form-group row">
											<label for="pagination" class="col-sm-3 text-right control-label col-form-label">
												Pagination Count</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="pagination" id="pagination" value="{{ (isset($envSettings['pagination']))?$envSettings['pagination']:'10' }}" >    
												</div>
										</div>

										<div class="form-group row">
											<label for="enable_otp" class="col-md-3 text-right control-label col-form-label">Enable OTP</label>
											<div class="col-sm-9">
												<select name="enable_otp" id="enable_otp" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
													<option value="">Enable Otp</option>
													<option value="1" {{ (isset($envSettings["enable_otp"]) && ($envSettings["enable_otp"] == '1'))?"selected":"" }}> Yes</option>
													<option value="0" {{ (isset($envSettings["enable_otp"]) && ($envSettings["enable_otp"] == '0'))?"selected":"" }}> No </option>
												<select>
											</div>
										</div>
										
										<div class="form-group row">
											<label for="footer_about" class="col-sm-3 text-right control-label col-form-label">Footer About</label>
											<div class="col-sm-9">
												<textarea class="form-control" name="footer_about" id="footer_about" placeholder="Enter footer about Here" >{{ (isset($settings['footer_about']))?$settings['footer_about']:'10' }}</textarea>
											</div>
										</div>

										<div class="form-group row">
											<label for="footer_description" class="col-sm-3 text-right control-label col-form-label">Footer Description</label>
											<div class="col-sm-9">
												<textarea class="form-control editor" name="footer_description" id="footer_description" placeholder="Enter footer about Here" >{{ (isset($settings['footer_description']))?$settings['footer_description']:'' }}</textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane  p-20" id="contact" role="tabpanel">
							<div class="p-20">
								<h4 class="card-title mt-3"> Contact Information </h4>
								<div class="row">
									<div class="col-md-7" >
										<div class="form-group row">
											<label for="mobile" class="col-sm-3 text-right control-label col-form-label">Mobile Number</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="mobile" id="mobile" value="{{ (isset($settings['mobile']))?$settings['mobile']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="whatsapp" class="col-sm-3 text-right control-label col-form-label">Whatsapp Number</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ (isset($settings['whatsapp']))?$settings['whatsapp']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="email" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="email" id="email" value="{{ (isset($settings['email']))?$settings['email']:'' }}" >
											</div>
										</div>
										<div class="form-group row">
											<label for="franchise_mobile" class="col-sm-3 text-right control-label col-form-label">Franchise Number</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="franchise_mobile" id="franchise_mobile" value="{{ (isset($settings['franchise_mobile']))?$settings['franchise_mobile']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="university_email" class="col-sm-3 text-right control-label col-form-label">University Email Address</label>
											<div class="col-sm-9">
												<input type="email" class="form-control" name="university_email" id="university_email" value="{{ (isset($settings['university_email']))?$settings['university_email']:'' }}" >
											</div>
										</div>
										<div class="form-group row">
											<label for="university_mobile" class="col-sm-3 text-right control-label col-form-label">University Mobile</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="university_mobile" id="university_mobile" value="{{ (isset($settings['university_mobile']))?$settings['university_mobile']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="address" class="col-sm-3 text-right control-label col-form-label">HO Address</label>
											<div class="col-sm-9">
											<textarea class="form-control" name="address" id="address" placeholder="Enter HO Address Here" >{{ (isset($settings['address']))?$settings['address']:'' }}</textarea>
											</div>
										</div>
										<div class="form-group row">
											<label for="gmap" class="col-sm-3 text-right control-label col-form-label">Google Map</label>
											<div class="col-sm-9">
											<textarea class="form-control" name="gmap" id="gmap" placeholder="Google Map Code Here" >{{ (isset($settings['gmap']))?$settings['gmap']:'' }}</textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="social" role="tabpanel">
							<div class="p-20">
								<h4 class="card-title mt-3"> Social Information </h4>
								<div class="row">
									<div class="col-md-7" >
										<div class="form-group row">
											<label for="facebook" class="col-sm-3 text-right control-label col-form-label">Facebook Link</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="facebook" id="facebook" placeholder="Enter Facebook Link Here" value="{{ (isset($settings['facebook']))?$settings['facebook']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="twitter" class="col-sm-3 text-right control-label col-form-label">Twitter Link</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="twitter" id="twitter" placeholder="Enter Twitter Link Here" value="{{ (isset($settings['twitter']))?$settings['twitter']:'' }}" >
											</div>
										</div>
										<div class="form-group row">
											<label for="linkedin" class="col-sm-3 text-right control-label col-form-label">Linkedin Link</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="linkedin" id="linkedin" placeholder="Enter Linkedin Link Here" value="{{ (isset($settings['linkedin']))?$settings['linkedin']:'' }}" >
											</div>
										</div>
										<div class="form-group row">
											<label for="youtube" class="col-sm-3 text-right control-label col-form-label">YouTube Link</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="youtube" id="youtube" placeholder="Enter YouTube Link Here" value="{{ (isset($settings['youtube']))?$settings['youtube']:'' }}" >
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="utm" role="tabpanel">
							<div class="p-20">
								<h4 class="card-title mt-3"> Social Information </h4>
								<div class="row">
									<div class="col-md-7" >
										<div class="form-group row">
											<label for="utm_campaign" class="col-sm-3 text-right control-label col-form-label">UTM Campaign</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="utm_campaign" id="utm_campaign" placeholder="Enter Default UTM Campaign" value="{{ (isset($settings['utm_campaign']))?$settings['utm_campaign']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="utm_source" class="col-sm-3 text-right control-label col-form-label">UTM Source.</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="utm_source" id="utm_source" placeholder="Enter Default UTM Source" value="{{ (isset($settings['utm_source']))?$settings['utm_source']:'' }}" >
											</div>
										</div>	
										<div class="form-group row">
											<label for="lead_type" class="col-sm-3 text-right control-label col-form-label">Communication Medium.</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="lead_type" id="lead_type" placeholder="Enter Default UTM Source" value="{{ (isset($settings['lead_type']))?$settings['lead_type']:'' }}" >
											</div>
										</div>										
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane p-20" id="schema" role="tabpanel">
							<div class="p-20">
								<h4 class="card-title mt-3"> SEO Information </h4>
								<div class="row">
									<div class="col-md-7" >
										<div class="form-group row">
											<label for="schema" class="col-sm-3 text-right control-label col-form-label">Schema Code</label>
											<div class="col-sm-9">
												<textarea class="form-control" name="schema" id="schema" placeholder="Enter Schema Code" >{{ (isset($settings['schema']))?$settings['schema']:'' }}</textarea>
											</div>
										</div>								
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="border-top">

				<div class="card-body">

					<button type="submit" class="btn btn-primary">Submit</button>
				</div>

			</div>

		</form>

	</div>

</div>              

@endsection

@section('script')

<!-- ============================================================== -->

<!-- CHARTS -->

@endsection

