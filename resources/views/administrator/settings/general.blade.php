@extends('administrator.layouts.admin')

@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ route('admin-save-env') }}" enctype="multipart/form-data">
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
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contact" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Writing Settings</span></a> </li>

					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabcontent-border">
						<div class="tab-pane active" id="general" role="tabpanel">
							<div class="p-20">
								<h4 class="card-title mt-3"> General Settings </h4>
								<div class="row">
									<div class="col-md-7" >
										<div class="form-group row">
											<label for="APP_NAME" class="col-sm-3 text-right control-label col-form-label">
												Site Title</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="APP_NAME" id="APP_NAME" value="{{ (isset($envSettings['APP_NAME']))?$envSettings['APP_NAME']:'' }}" >    
												</div>
										</div>

										<div class="form-group row">
											<label for="APP_TAGLINE" class="col-sm-3 text-right control-label col-form-label">
												Site Tagline</label>
												<div class="col-sm-9">
													<input type="text" class="form-control" name="APP_TAGLINE" id="APP_TAGLINE" value="{{ (isset($envSettings['APP_TAGLINE']))?$envSettings['APP_TAGLINE']:'' }}" >    
												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane  p-20" id="contact" role="tabpanel">
							<div class="p-20">
								<h4 class="card-title mt-3"> Mail Setting </h4>
								<div class="row">
									<div class="col-md-7" >
										<div class="form-group row">
											<label for="MAIL_MAILER" class="col-sm-3 text-right control-label col-form-label">Mail Mailer</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_MAILER" id="MAIL_MAILER" value="{{ (isset($envSettings['MAIL_MAILER']))?$envSettings['MAIL_MAILER']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="MAIL_DRIVER" class="col-sm-3 text-right control-label col-form-label">Mail Mailer</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_DRIVER" id="MAIL_DRIVER" value="{{ (isset($envSettings['MAIL_DRIVER']))?$envSettings['MAIL_DRIVER']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="MAIL_HOST" class="col-sm-3 text-right control-label col-form-label">Mail Driver</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_HOST" id="MAIL_HOST" value="{{ (isset($envSettings['MAIL_HOST']))?$envSettings['MAIL_HOST']:'' }}" >    
											</div>
										</div>
										<div class="form-group row">
											<label for="MAIL_HOST" class="col-sm-3 text-right control-label col-form-label">Mail host</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_HOST" id="MAIL_HOST" value="{{ (isset($envSettings['MAIL_HOST']))?$envSettings['MAIL_HOST']:'' }}" >    
											</div>
										</div>
										
										<div class="form-group row">
											<label for="MAIL_PORT" class="col-sm-3 text-right control-label col-form-label">Mail Port</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_PORT" id="MAIL_PORT" value="{{ (isset($envSettings['MAIL_PORT']))?$envSettings['MAIL_PORT']:'' }}" >    
											</div>
										</div>

										<div class="form-group row">
											<label for="MAIL_USERNAME" class="col-sm-3 text-right control-label col-form-label">Mail Username</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_USERNAME" id="MAIL_USERNAME" value="{{ (isset($envSettings['MAIL_USERNAME']))?$envSettings['MAIL_USERNAME']:'' }}" >    
											</div>
										</div>

										<div class="form-group row">
											<label for="MAIL_PASSWORD" class="col-sm-3 text-right control-label col-form-label">Mail Password</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_PASSWORD" id="MAIL_PASSWORD" value="{{ (isset($envSettings['MAIL_PASSWORD']))?$envSettings['MAIL_PASSWORD']:'' }}" >    
											</div>
										</div>

										<div class="form-group row">
											<label for="MAIL_ENCRYPTION" class="col-sm-3 text-right control-label col-form-label">Mail encryption</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_ENCRYPTION" id="MAIL_ENCRYPTION" value="{{ (isset($envSettings['MAIL_ENCRYPTION']))?$envSettings['MAIL_ENCRYPTION']:'' }}" >    
											</div>
										</div>

										<div class="form-group row">
											<label for="MAIL_FROM_ADDRESS" class="col-sm-3 text-right control-label col-form-label">Mail From</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_FROM_ADDRESS" id="MAIL_FROM_ADDRESS" value="{{ (isset($envSettings['MAIL_FROM_ADDRESS']))?$envSettings['MAIL_FROM_ADDRESS']:'' }}" >    
											</div>
										</div>

										<div class="form-group row">
											<label for="MAIL_FROM_NAME" class="col-sm-3 text-right control-label col-form-label">Mail Name</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="MAIL_FROM_NAME" id="MAIL_FROM_NAME" value="{{ (isset($envSettings['MAIL_FROM_NAME']))?$envSettings['MAIL_FROM_NAME']:'' }}" >    
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

