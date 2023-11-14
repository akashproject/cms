@extends('administrator.layouts.admin')

@section('content')
<div class="col-12">
	<div class="card">
		<form class="form-horizontal" method="post" action="{{ url('administrator/save-blog') }}" enctype="multipart/form-data">
			@csrf
			<div class="card-body">
				<h4 class="card-title"> General Options </h4>
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
				<div class="row">
					<div class="col-md-8" >
						<div class="form-group row">
							<label for="name" class="col-sm-3 text-right control-label col-form-label">Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" id="name" placeholder="Name Here"  value="{{ $blog->name }}" >
							</div>
						</div>
						<div class="form-group row">
							<label for="slug" class="col-sm-3 text-right control-label col-form-label">Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="slug" id="slug" placeholder="Slug Here"  value="{{ $blog->slug }}" >
							</div>
						</div>
						<div class="form-group row">
							<label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
							<div class="col-sm-9">
								<textarea class="form-control editor" name="description" id="description" placeholder="Enter description Here" >{{ $blog->description }}</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="author_id" class="col-sm-3 text-right control-label col-form-label">Author</label>
							<div class="col-sm-9">
								<select name="author_id" id="author_id" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="" >  Select Author </option>
									@foreach ($authors as $value)
									<option value="{{  $value->id }}" {{ ( $value->id ==  $blog->author_id )? 'selected' : '' }} > {{  $value->name }} </option>
									@endforeach
								<select>
							</div>
						</div>
						
					</div>
					<div class="col-md-4">
						<div class="form-group row">
							<label for="category_id" class="col-sm-12 text-left control-label col-form-label">Cateogry</label>
							<div class="col-sm-12">
								<select multiple name="category_id[]" id="category_id" class="select2 form-control custom-select" style="width: 100%; height:160px;">	
									<option value="" > Uncategorized </option>
									@foreach ($category as $value)
									<option value="{{  $value->id }}" {{ (in_array($value->id,  $blog->category_id))?'selected' : '' }} > {{  $value->name }} </option>
									@endforeach
								<select>
							</div>
						</div>
						<div class="form-group row">
							<label for="tags" class="col-md-12 text-left control-label col-form-label">Tags</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="tags" placeholder="Enter Tags Here" ></input>
							</div>
							<div class="col-sm-12">
								<div class="tag-values">
									@if(isset($blog->tags))
									@foreach($blog->tags as $value)
										<a href="javascript:void(0)"><input type="hidden" name="tags[]" value="{{$value->id}}"><span class="mdi mdi-tag-remove"></span>{{$value->name}}</a>
									@endforeach
									@endif
								</div>
							</div>
							<div class="col-sm-12">
								<div class="tag-content" >

								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="state" class="col-md-12 text-left control-label col-form-label">Enable OTP</label>
							<div class="col-sm-12">
								<select name="enable_otp" id="enable_otp" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Enable Otp</option>
									<option value="1" {{ ( $blog->enable_otp ==  '1' )? 'selected' : '' }}> Yes</option>
									<option value="0" {{ ( $blog->enable_otp ==  '0' )? 'selected' : '' }}> No </option>
								<select>
							</div>
						</div>
						<div class="form-group row">
							<label for="state" class="col-md-12 text-left control-label col-form-label">Status</label>
							<div class="col-sm-12">
								<select name="status" id="status" class="select2 form-control custom-select" style="width: 100%; height:36px;">	
									<option value="">Update Status</option>
									<option value="1" {{ ( $blog->status ==  '1' )? 'selected' : '' }} > Publish</option>
									<option value="0" {{ ( $blog->status ==  '0' )? 'selected' : '' }}> Private </option>
								<select>
							</div>
						</div>
						<div class="form-group row">
							<label for="featured_image" class="col-md-6 text-left control-label col-form-label">Featured Image</label>
							<div class="col-sm-6 text-center">
								<a href="#imageBox" class="image-profile open-popup-link">
									<img src="{{ (isset($blog->featured_image))?getSizedImage('thumb',$blog->featured_image):'https://dummyimage.com/150x150?text=Add%20Image' }}" alt="">
									<input type="hidden" name="featured_image" id="featured_image" value="{{ $blog->featured_image }}" >	
								</a>	
								@if(isset($blog->featured_image))
									<a href="javascript:void(0)" class="removeImage" style="color: #c90f0f;font-weight: 600;"> Remove Image </a>	
								@endif					
							</div>
						</div>
						
					</div>
				</div>
				<h4 class="card-title"> Search Engine Options </h4>
				<div class="row">
					<div class="col-md-8" >
						<div class="form-group row">
							<label for="title" class="col-sm-3 text-right control-label col-form-label">Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" id="title" placeholder="Title Here" value="{{ $blog->title }}" >
							</div>
						</div>
						<div class="form-group row">
							<label for="meta_description" class="col-sm-3 text-right control-label col-form-label">Meta Description</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description Here" >{{ $blog->meta_description }}</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="schema" class="col-sm-3 text-right control-label col-form-label">Schema Code</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="schema" id="schema" placeholder="Enter Schema Code" >{{ $blog->schema }}</textarea>
							</div>
						</div>
						<div class="form-group row">
							<label for="utm_campaign" class="col-sm-3 text-right control-label col-form-label">Campaign</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_campaign" id="utm_campaign" placeholder="Enter Utm Campaign Here" value="{{ $blog->utm_campaign }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="utm_source" class="col-sm-3 text-right control-label col-form-label">Source</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="utm_source" id="utm_source" placeholder="Enter Utm Source Here"  value="{{ $blog->utm_source }}">
							</div>
						</div>

						<div class="form-group row">
							<label for="robots" class="col-sm-3 text-right control-label col-form-label">Robots Content</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="robots" id="robots" placeholder="Enter Center Pincode Here" value="{{ $blog->robots }}" >
							</div>
						</div>
						<div class="form-group row">
							<label for="canonical" class="col-sm-3 text-right control-label col-form-label">Cronical Url</label>
							<div class="col-sm-9">
							<input type="text" class="form-control" name="canonical" id="canonical" placeholder="Enter Center Pincode Here" value="{{ $blog->canonical }}">
							</div>
						</div>
					</div>
					
				</div>
			</div>

			<div class="border-top">
				<div class="card-body">
					<button type="submit" class="btn btn-primary">Submit</button>
					<input type="hidden" name="blog_id" id="blog_id" value="{{ $blog->id }}" >
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