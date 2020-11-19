{!! Form::model($contractor, ['route' => ['contractors.update', $contractor], 'method' => 'PUT']) !!}
@include('contractors.form')
{!! Form::close() !!}

@include('includes.delete_btn', ['url' => route('contractors.destroy', $contractor)])
