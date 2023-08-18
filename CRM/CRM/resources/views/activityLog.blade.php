@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 side-bar">
                <br><br>
                <ul class="desktop-ui">
                    <li ><a href="/home"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
                    <br>
                    <li  ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i> Contacts </a></li>
                    <br>
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i>Activity </a></li>
                    <br>
                    <li class="active"><a href="#"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li>
                    
                </ul>
                <ul class="mobile-ul">
                    <li ><a href="/home"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
                    <br>
                    <li  ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i> Contacts </a></li>
                    <br>
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i>Activity </a></li>
                    <br>
                    <li class="active"><a href="#"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li>
                </ul>
        </div>
        <div class="col-9" style="padding: 30px">
            
            <br><br>
            <div style="width: 90%">
            <table class="contacts-table">
                @if(count($activities) > 0)
                <tr class="table-heading">
                    <td>Name</td>
                    <td>Activity</td>
                    <td>Description</td>
                    <td>Status</td>
                    
                </tr>
                    @foreach($activities as $activity)
                        <tr style="border-top:1px solid rgb(233, 233, 233); height:80px;">
                            <td style="font-weight:600;">{{$activity->contact_name}}</p></td>
                            <td>{{$activity->activity_type}}</td>
                            <td>{{$activity->description}}</td>
                            <td style="font-weight:600;color:green">
                                @if($activity->status==1)
                                   Pending
                                @else
                                    Done
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                        <p>No result found</p>
                @endif
            </table>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endsection
@push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endpush
