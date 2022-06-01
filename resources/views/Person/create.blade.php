<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
	<div class="row">
	    <div class="col-lg-12">
	   
		<div class="card bg-default mb-3">
    <div class="card-header thin-card-header">
        <div class="card-title">
            <ul class="card-toolbar" style="list-style: none;">
                <li class="float-left">
                    <h4 style="font-family:Poppins, sans-serif"><i class="fa fa-user"></i> Person</h4>
                </li>
                <li class="float-right">
                    <a href="{{route('person.index')}}" class="btn btn-primary" id="btnAttachent"><span class="fa fa-arrow-left"></span> Back </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal" role="form" action="{{route("person.store")}}" method="POST">
            @csrf
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <span> {{ $error }}</span>
            </div>
            @endforeach
            @endif
   
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="textinput">Person Name</label>
                                <input type="text" name="name" placeholder="Person Name" class="form-control"  value="{{ old('name') }}" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <!-- Text input-->
                           <div class="form-group">
                             <label class="control-label" for="textinput">Birthday</label>
                             <input type="date" name="birthday" class="form-control" value="{{ old('birthdate')}}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Text input-->
                            <div class="form-group">
                             <label class="control-label" for="textinput">Address</label>
                             <input type="text" name="address" placeholder="Address Line" name="address" value="{{ old('address')}}" class="form-control" required>
                         </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="textinput">Post Code</label>
                                <input type="number" name="post_code" placeholder="Post Code" class="form-control" value="{{ old('post_code')}}" required>
                            </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="textinput">City Name</label>
                                <input type="text" name="city_name" placeholder="City Name" class="form-control" value="{{ old('city_name')}}"  required>
                            </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="textinput">Country Name</label>
                                <input type="text" name="country_name" placeholder="Country Name" class="form-control" value="{{ old('country_name')}}" required>
                            </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="textinput">Gender</label><br>
                                <div class="form-check form-check-inline ">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male"  @if(old('gender')) checked @endif />
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                  </div>
                                  <div class="form-check form-check-inline form-group">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" @if(old('gender')) checked @endif />
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
	</div>
	</div>
</div>