@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">チーム作成</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('team.store') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label for="name" class="col-md-4 control-label">Team ID</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('display') ? ' has-error' : '' }}">
							<label for="display" class="col-md-4 control-label">Name</label>

							<div class="col-md-6">
								<input id="display" type="text" class="form-control" name="display" value="{{ old('display') }}" required>

								@if ($errors->has('display'))
									<span class="help-block">
										<strong>{{ $errors->first('display') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<md-button type="submit" class="md-raised md-primary">作成</md-button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
