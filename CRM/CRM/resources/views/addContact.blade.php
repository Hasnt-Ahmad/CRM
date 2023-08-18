@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 side-bar">
                <br><br>
                <ul class="desktop-ui">
                    <li ><a href="#"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
                    <br>
                    <li class="active" ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i> Contacts </a></li>
                    <br>
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i> Activity </a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li>
                </ul>
                <ul class="mobile-ul">
                    <li ><a href="#"> <i style="padding: 5px;" class="bi bi-house-door"></i></a></li>
                    <br>
                    <li  class="active"><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i></a></li>
                    <br>
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i></a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i></a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i></a></li>
                </ul>
                
        </div>
        <div class="col-9" style="padding: 30px">
            <div style="text-align: center">
                <i style="margin-right:10px;font-size:25px;" class="bi bi-person-lines-fill"></i><span style="font-size:25px;font-weight:700">Add Contact</span>
            </div>
            <br><br>
            <div class="form" style="margin-left:10%;margin-right:20%">    
                <form action="/add-contact" method="POST" style="background-color: white;padding:70px;">
                    @csrf
                    <label style="font-weight:600;margin-bottom:5px;">Name</label>
                    <br>
                    <input type="text" name="user_name" autocomplete="off">
                    <br><br>
                    <Span style="color:red">
                        @error('user_name')
                            {{$message}}
                            <br><br>
                        @enderror
                    </Span>
                    <label style="font-weight:600;margin-bottom:5px;">Email</label>
                    <br>
                    <input type="email" name="user_email">
                    <Span style="color:red">
                        @error('user_email')
                                <br>
                                {{$message}}
                        @enderror
                    </Span>
                    <br><br>
                    <label style="font-weight:600;margin-bottom:5px;">phone Number</label>
                    <br>
                    <input type="text" name="user_number">
                    <Span style="color:red">
                        @error('user_number')
                            <br>
                            {{$message}}
                        @enderror
                    </Span>
                    <br><br>
                    <label style="font-weight:600;margin-bottom:5px;">Company</label>
                    <br>
                    <input type="text" name="user_company">
                    <Span style="color:red">
                        @error('user_company')
                            <br>
                            {{$message}}
                        @enderror
                    </Span>
                    <br><br><br>
                    <button>Add Contact</button>
                </form>
            </div>
            <br><br>
           
            

        </div>
    </div>
</div>
@endsection
