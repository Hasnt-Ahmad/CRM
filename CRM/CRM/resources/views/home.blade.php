@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 side-bar">
                <br><br>
                <ul class="desktop-ui">
                    <li class="active"><a href="#"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
                    <br>
                    <li ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i> Contacts </a></li>
                    <br>
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i> Activity </a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li>
                </ul>
                <ul class="mobile-ul">
                    <li class="active"><a href="#"> <i style="padding: 5px;" class="bi bi-house-door"></i></a></li>
                    <br>
                    <li ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i></a></li>
                    <br>
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i></a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i></a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i></a></li>
                </ul>
        </div>
        <div class="col-9" style="padding: 30px">
            <div class="profile-section">
                <img src="/images/user_icon1.png" style="width: 70px;height:70px;">
                <h4>Good Evening! {{Auth::user()->name}}</h4>
            </div>
            <br><br>
            <div class="row">
                <div style="margin-bottom: 40px;" class="col-md-6">
                    <div class="dash-section">
                        <h5>Total Contacts</h5>
                        <p>{{$contact}}</p>
                    </div>
                </div>
                <div style="margin-bottom: 40px;" class="col-md-6">
                    <div class="dash-section">
                        <h5>Total Activities</h5>
                        <p>{{$activity}}</p>
                    </div>
                </div>
                <div style="margin-bottom: 40px;" class="col-md-6">
                    <div class="dash-section">
                        <h5>Total Activity Logs</h5>
                        <p>{{$activityLog}}</p>
                    </div>
                </div>
                <div style="margin-bottom: 40px;" class="col-md-6">
                    <div class="dash-section">
                        <h5>Total Tags</h5>
                        <p>{{$tag}}</p>
                    </div>
                </div>
            </div>



            <button style="display: none" type="button" id="btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                      @if(session("tag")=="added")
                          Added
                      @endif
                  </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      @if(session("tag")=="added")
                          Added Tag Successfully
                      @endif
                  </div>
                </div>
              </div>
            </div>

            @if(session("tag")=="added")

            @php
                echo('<script>

                    document.addEventListener("DOMContentLoaded", function() {
                        // Get the button element
                        var btn = document.getElementById("btn");
                        // Check if the button element exists
                        if (btn) {
                          // Programmatically trigger a click event on the button
                          btn.click();
                        }
                      });  
                </script>');
            @endphp
                {{session()->forget("tag")}}
            @endif

            


        </div>
    </div>
</div>
@endsection
