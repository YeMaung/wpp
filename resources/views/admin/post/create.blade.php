@extends('admin.layout.app')

@section('css')
	<link rel="stylesheet" type="text/css" href="app.css">
@endsection

@section('content')
	<h2>Create Post</h2>
	
	<div class="row">
		@if (count($errors) > 0)
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<form method="POST" action="/admin/post">
		    {{ csrf_field() }}

		    <div class="form-group">
				<label class="control-label col-md-3" for="title">Title
					 <input class="col-md-12" id="body" type="text" class="form-control" name="title">
				</label>
			</div>

			<div class="form-group">
				<label class="control-label col-md-3" for="Body">Body
					 <input class="col-md-12" id="body" type="text" class="form-control" name="body">
				</label>
			</div>

			<div class="form-group">
				<button>Submit</button>
			</div>
		</form>
	</div>

@endsection

@section('script')
	<script src="app.js"></script>
@endsection

