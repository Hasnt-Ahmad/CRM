@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 side-bar">
                <br><br>
                <ul class="desktop-ui">
                    <li ><a href="/home"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
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
                    <li ><a href="/home"> <i style="padding: 5px;" class="bi bi-house-door"></i> Home </a></li>
                    <br>
                    <li class="active" ><a href="/contacts"> <i style="padding: 5px;" class="bi bi-person-check"></i> Contacts </a></li>
                    <br>
                    <li ><a href="/tags"> <i style="padding: 5px;" class="bi bi-tags"></i> Add Tag </a></li>
                    <br>
                    <li ><a href="/activity"> <i style="padding: 5px;" class="bi bi-activity"></i> Activity </a></li>
                    <br>
                    <li><a href="/activity-log"> <i style="padding: 5px;" class="bi bi-clock-history"></i>Activity Logs</a></li>
                </ul>
        </div>
        <div class="col-9" style="padding: 30px">
            <div class="search-bar">
                <span class="search-icon">&#128269;</span>
                <form action="/search" method="POST">
                    @csrf
                    <input class="search-input" type="text" placeholder="Search..." name="search">
                </form>
            </div>
            <br><br>
            <div style="width: 90%">
            <table class="contacts-table">
                <br>
                    <div class="row">
                        <div class="col-6">
                            <a class="btn-add" href="/add-contact">Add Contact</a>
                        </div>
                        <div class="col-6">
                            <a class="btn-export" href="/export-contact">Export Excel</a>
                        </div>
                    </div>
                <br><br><br>
                @if(count($contacts)>0)
                <tr class="table-heading">
                    <td>User</td>
                    <td>Phone number</td>
                    <td>Company</td>
                    <td></td>
                    <td></td>
                </tr>
                    @foreach($contacts as $contact)
                        <tr style="border-top:1px solid rgb(233, 233, 233); height:80px;">
                            <td>
                                <div class="contact-profile">
                                    <img src="/images/user_icon1.png" style="width:40px;height:40px;">
                                    <div style="display: block;padding:5px">
                                        <p style="height:5px;width:200px;font-weight:600">{{$contact->contact_name}}</p>
                                        <p style="font-size:12px;">{{$contact->contact_email}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$contact->phone_number}}</td>
                            <td>{{$contact->company}}</td>
                            <td><a class="btn-edit" href="/edit/{{$contact->id}}">Edit</a></td>
                            <td><a class="btn-delete" href="/delete/{{$contact->id}}">Delete</a></td>
                        </tr>
                    @endforeach
                @else
                        <p>No result found</p>
                @endif
            </table>
            </div>
            <br><br>


            


            <button style="display: none" type="button" id="btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              
              </button>
              
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">
                        @if(session("contact")=="added")
                            Added
                        @endif
                        @if(session("contact")=="updated")
                            Updated
                        @endif
                        @if(session("contact")=="deleted")
                            Deleted
                        @endif
                    </h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if(session("contact")=="added")
                            Added Contact Successfully
                        @endif
                        @if(session("contact")=="updated")
                            Updated Contact Successfully
                        @endif
                        @if(session("contact")=="deleted")
                            Deleted Contact Successfully
                        @endif
                    </div>
                  </div>
                </div>
              </div>

              @if(session("contact")=="added")

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
                  {{session()->forget("contact")}}
              @endif

              @if(session("contact")=="updated")

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
                  {{session()->forget("contact")}}
              @endif
  

        </div>
    </div>
</div>
@endsection
@push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
@endpush
