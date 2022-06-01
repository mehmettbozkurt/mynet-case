<link href="//netdna.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!------ Include the above in your HEAD tag ---------->

<div class="container">
        @if ($message = Session::get('success'))
        <div class="col-md-12 pt-5">
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
            </div>
        </div>
        @endif
    <div class="row col-md-12 pt-5">
       
    <table class="table table-striped custab ">
    <thead>
    <a href="{{route('person.create')}}" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new person</a>
        <tr>
            <th>Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Post Code</th>
            <th>City Name</th>
            <th>Country Name</th>
            <th></th>
        </tr>
    </thead>
    @foreach($persons as $person)
            <tr>
                <td>{{$person->name}}</td>
                <td>{{$person->birthday}}</td>
                <td>{{$person->gender}}</td>
                <td>{{$person->address->address}}</td>
                <td>{{$person->address->post_code}}</td>
                <td>{{$person->address->city_name}}</td>
                <td>{{$person->address->country_name}}</td>
                <td class="text-center">
                    <a class='btn btn-info btn-xs' href="{{route('person.edit', $person->id)}}"><span class="fa fa-pencil"></span> </a> 
                   
                    {!! Form::open(['route' => ['person.destroy', $person->id], 'method' => 'delete']) !!}
                    <button type="submit" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </button>
                    {!! Form::close() !!}
                </td>
            </tr>
    @endforeach
           
    </table>
    </div>
</div>