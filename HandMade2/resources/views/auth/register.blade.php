@extends('master')
@section('content')

<head>
    <title>Register</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="{{ asset('css/register.css') }}"/>

<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>You are 30 seconds away from earning your own money!</p>
                        <a   name=""  href="login">
                            <button id="login">Login</button>
                        </a>
                        <br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Employee</h3>

                            <form class="form-horizontal row register-form" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                <div class="col-md-6">
                                     <div class="form-group{{ $errors->has('userType') ? ' has-error' : '' }}">
                                        
                                        <select name="userType" class="form-control">
                                        <option>user</option>
                                        <option>Seller</option>
                                        </select>
                                    </div>
                                        
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                
                                    <input id="name" type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color:red">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        

                                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                             
                                <input id="email" type="email" class="form-control" placeholder="Email " name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                       
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            
                           
                                <input id="phone" type="number" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>          
                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

                             
                                <input id="area" type="text" class="form-control" placeholder="Area" name="area" value="{{ old('area') }}" required autofocus>

                                @if ($errors->has('area'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                             
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                           
                        </div>
                        <div class="form-group">
                              <input type="submit" class="btnRegister"  value="Register"/>
                        </div>
                         </div>
                    </div>
                           
                </div>
                </div>

            </div>
@endsection
               

