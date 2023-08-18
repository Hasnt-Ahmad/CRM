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
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li class="active"><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i> Activity </a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li>
                </ul>
                <ul class="mobile-ul">
                    <li ><a href="#"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
                    <br>
                    <li ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i> Contacts </a></li>
                    <br>
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li class="active"><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i> Activity </a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li>
                </ul>
                
        </div>
        <div class="col-9" style="padding: 30px">
            <div style="text-align: center">
                <i style="margin-right:10px;font-size:25px;" class="bi bi-activity"></i><span style="font-size:25px;font-weight:700">Edit Activity</span>
            </div>
            <br><br>
            <div class="form" style="margin-left:10%;margin-right:20%">    
                <form action="/update-activity/{{$acitivity->id}}" method="POST" style="background-color: white;padding:70px;">
                    @csrf
                    <br><br>
                    <label style="font-weight:600;margin-bottom:5px;">Activity</label>
                    <br>
                    <input disabled type="text" name="activity_type" value="{{$acitivity->activity_type}}">
                    <Span style="color:red">
                        @error('activity_type')
                                <br>
                                {{$message}}
                        @enderror
                    </Span>
                    <br><br>
                    <label style="font-weight:600;margin-bottom:5px;">Description</label>
                    <br>
                    <input disabled type="text" name="description" value="{{$acitivity->description}}">
                    <Span style="color:red">
                        @error('description')
                            <br>
                            {{$message}}
                        @enderror
                    </Span>
                    <br><br>
                    <select name="status">
                        <option value="">Status</option>
                        <option value="1">Pending</option>
                        <option value="0">Done</option>
                    </select>
                    <Span style="color:red">
                        @error('status')
                                <br>
                                {{$message}}
                        @enderror
                    </Span>
                    <br><br><br>
                    <button>Update Activity</button>
                </form>
            </div>
            <br><br>
           
            

        </div>
    </div>
</div>
@endsection
