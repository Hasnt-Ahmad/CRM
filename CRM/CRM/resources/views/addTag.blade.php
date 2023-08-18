@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 side-bar">
                <br><br>
                <ul class="desktop-ui">
                    <li ><a href="#"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
                    <br>
                    <li ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i> Contacts </a></li>
                    <br>
                    <li class="active"><a href="#"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i> Activity </a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li>
                </ul>
                <ul class="mobile-ul">
                    <li ><a href="#"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
                    <br>
                    <li ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i> Contacts </a></li>
                    <br>
                    <li class="active"><a href="#"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i> Activity </a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li
                </ul>
                
        </div>
        <div class="col-9" style="padding: 30px">
            <div style="text-align: center">
                <i style="margin-right:10px;font-size:25px;" class="bi bi-tags"></i><span style="font-size:25px;font-weight:700">Add Tag</span>
            </div>
            <br><br>
            <div class="form" style="margin-left:10%;margin-right:20%">    
                <form action="/add-tag" method="POST" style="background-color: white;padding:70px;">
                    @csrf
                    <label style="font-weight:600;margin-bottom:5px;">Contact Name</label>
                    <br>
                    <select name="contact_name">
                        <option value="">Select</option>
                        @foreach($contacts as $contact)
                            <option value="{{$contact->id}}">{{$contact->contact_name}}</option>
                        @endforeach
                    </select>
                    <Span style="color:red">
                        @error('contact_name')
                                <br>
                                {{$message}}
                        @enderror
                    </Span>
                    <br><br>
                    <label style="font-weight:600;margin-bottom:5px;">Tag</label>
                    <br>
                    <input type="text" name="tag_name">
                    <Span style="color:red">
                        @error('tag_name')
                                <br>
                                {{$message}}
                        @enderror
                    </Span>
                    <br><br><br>
                    <button>Add Tag</button>
                </form>
            </div>
            <br><br>
           
            

        </div>
    </div>
</div>
@endsection
