<!DOCTYPE html>
<html>
<head>
	<title>Title</title>
</head>
<body>
{!! Form::open(['url' => '/']) !!}
  	{!! Form::text('username') !!}
  	{!! Form::submit('submit') !!}
{!! Form::close() !!}
</body>
</html>