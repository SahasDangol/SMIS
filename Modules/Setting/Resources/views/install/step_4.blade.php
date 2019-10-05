@extends('setting::install.layout')

@section('content')
<div class="card card-default">
  <div class="card-header text-center">System Settings</div>
	<div class="card-body">

		<form action="{{ url('install/finish') }}" method="post" autocomplete="off">
			{{ csrf_field() }}
					
			<div class="col-md-12">
			  <div class="form-group">
				<label class="control-label">School Name</label>
				<input type="text" class="form-control" name="school_name" required>
			  </div>
			</div>

			<div class="col-md-12">
			  <div class="form-group">
				<label class="control-label">Site Title</label>
				<input type="text" class="form-control" name="site_title" required>
			  </div>
			</div>

			<div class="col-md-12">
			  <div class="form-group">
				<label class="control-label">Phone</label>
				<input type="text" class="form-control" name="school_phone" required>
			  </div>
			</div>

			<div class="col-md-12">
			  <div class="form-group">
				<label class="control-label">Email</label>
				<input type="text" class="form-control" name="school_email" required>
			  </div>
			</div>

			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">Pan No.</label>
					<input type="text" class="form-control" name="pan_no" required>
				</div>
			</div>
			<div class="col-md-12">
			  <div class="form-group">
				<label class="control-label">Currency Symbol</label>
				<input type="text" class="form-control" name="currency_symbol" required>
			  </div>
			</div>
						<div class="col-md-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sidebar Active Color</label>
                    </div>
                    <select class="custom-select" name="data_color" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="black" style="background-color: #000">Black</option>
                        <option value="purple" style="background-color: #9368e9">Purple</option>
                        <option value="azure" style="background-color: #2ca8ff">Azure</option>
                        <option value="orange" style="background-color: #f96332">Orange</option>
                        <option value="rose" style="background-color: #e91e63">Rose</option>
                        <option value="green" style="background-color: #18ce0f">Green</option>
                    </select>
                </div>
			</div>
            <br>
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Sidebar Background Color</label>
                    </div>
                    <select class="custom-select" name="data_background_color" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="black" style="background-color: #000">Black</option>
                        <option value="white" >White</option>
                        <option value="red" style="background-color: #f44336">Red</option>
                    </select>
                </div>
            </div>
			<div class="col-md-12">
				<button type="submit" id="next-button" class="btn btn-install">Finish</button>
		    </div>
		</form>

	</div>
</div>
@endsection

