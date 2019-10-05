<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{url('search')}}" method="post">
    @csrf
    <label for="search">Search:</label>
    <input type="text" name="search" autocomplete="off">
    <input type="submit" style="display:none"/>
</form>

@if(!empty($users))
    @foreach($users as $user)
     {{--   <a href="@if($user->user_type=="Student"){{url('student/show/'.$user->students->id)}}
        @else
        {{url('staff/show/'.$user->staffs->id)}}
        @endif">  </a>--}}
            {{$user}}
    @endforeach
@endif
<script>

</script>
</body>
</html>