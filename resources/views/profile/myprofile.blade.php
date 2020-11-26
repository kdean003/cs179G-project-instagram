@extends('layouts.app', ['activePage' => 'my-profile', 'titlePage' => __('My Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row" style="padding-left:15px; padding-right:15px;">
        <div class="card card-stats">
          <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
              <i class="material-icons">supervisor_account</i>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6" style="max-width: 100%; flex: 0 0 40%">
                <div class="card card-stats">
                  <p class="card-category" style="text-align: left; padding-left:15px; padding-top: 15px;">Name</p>
                  <h3 class="card-title" style="text-align: left; padding-left:15px; padding-bottom: 15px; padding-right: 15px;">{{ $myInfo['name'] }}</h3>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6" style="max-width: 100%; flex: 0 0 40%">
                <div class="card card-stats">
                  <p class="card-category" style="text-align: left; padding-left:15px; padding-top: 15px;">Email</p>
                  <h3 class="card-title" style="text-align: left; padding-left:15px; padding-bottom: 15px; padding-right: 15px;">{{ $myInfo['email'] }}</h3>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">amp_stories</i>
              </div>
              <p class="card-category">Total Posts</p>
              <h3 class="card-title">{{count($myPosts ?? '')}}
                @if(count($myPosts ?? '') == 0 || count($myPosts ?? '') > 1)
                  <small>Post(s)</small>
                @else
                  <small>Post</small>
                @endif
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger"></i>
                <a href="#pablo"></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">supervisor_account</i>
              </div>
              <p class="card-category">Followers</p>
              <h3 class="card-title">{{count($myFollowers)}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-icon">
              <div class="card-icon" style="background-color: rgb(204, 0, 255)">
                <i class="material-icons">redo</i>
              </div>
              <p class="card-category">Following</p>
              <h3 class="card-title">{{count($myFollowings)}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-icon">
              <div class="card-icon" style="background-color: rgb(255, 187, 0)">
                <i class="material-icons">grade</i>
              </div>
              <p class="card-category">H.C.A.Y</p>
              <h3 class="card-title">{{$mySocialScore}}
                <small>: {{$myRating}}</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger"></i>
                <a href="#pablo"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if (session('status'))
          <div style="text-align: center; font-size:24px;" class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif
      <div class="row">
        @foreach($myPosts ?? '' as $post)
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header card-header-warning">
                <a href="#" data-toggle="modal" data-target="#post{{ $post['post']['id'] }}">
                  <img style="width: 100%; " src="{{ url($post['post']['img_url']) }}">
                </a>
              </div>
              <div class="card-body">
                <h4 class="card-title">{{ $post['post']['description'] }}</h4>
              <p class="card-category">Posted By: {{ $post['user_info']['name'] }}<br>Date: {{date('m-d-Y', strtotime($post['post']['created_at']))}}</p>
              </div>
              <div class="card-footer">
                <div class="stats" style="width: 100%; ">
                  <div class="stats-left stats-section">
                    Views ({{$post['post']['views']}})
                  </div>
                  <div class="stats-middle stats-section">
                    Comments ({{count($post['comments'])}})
                  </div>
                  <div class="stats-right stats-section">
                    {{ $post['likes'] }} <i class="material-icons">thumb_up</i>  <i class="material-icons">thumb_down</i> {{ $post['dislikes'] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="post{{ $post['post']['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="width:120%;">
                <div class="modal-header">
                  <h5 class="modal-title" style="font-size:25px;" id="post{{ $post['post']['id'] }}lLabel">{{ $post['post']['description'] }}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div style="width:70%; text-align:center; margin:auto;">
                    <img style="width: 100%; " src="{{ url($post['post']['img_url']) }}">
                  </div>
                  <br>
                  <div style="width:100%; display:flex;">
                    <div class="stats" style="width: 100%; display:flex;">
                      <div class="stats-left stats-section">
                        Views ({{$post['post']['views']}})
                      </div>
                      <div class="stats-middle stats-section">
                        <a href="#" id="post{{ $post['post']['id'] }}commentsToggle" >Comments ({{count($post['comments'])}})</a>
                      </div>
                      <br>
                      <div class="stats-right stats-section">
                        {{ $post['likes'] }} <i style="vertical-align: text-bottom;" class="material-icons">thumb_up</i>  <i style="vertical-align: text-bottom;" class="material-icons">thumb_down</i> {{ $post['dislikes'] }}
                      </div>
                    </div>
                  </div>
                  <div style="display:none;" id="post{{ $post['post']['id'] }}commentsBox">
                    @foreach($post['comments'] ?? '' as $comment)
                    <br>
                    <p style="float:left;">
                      <bold style="font-weight:bold;">{{ $comment['userName'] }}:</bold> {{ $comment['comment'] }}
                    </p>
                    <p style="float:right;">
                      Date: {{date('m-d-Y', strtotime($comment['postDate']))}}
                    </p>
                    <br>
                    @endforeach
                  </div>
                  <script>
                    $("#post{{ $post['post']['id'] }}commentsToggle").click(function(){
                      if ($("#post{{ $post['post']['id'] }}commentsBox").is(':visible')) {
                        $("#post{{ $post['post']['id'] }}commentsBox").slideUp();
                      } else {
                        $("#post{{ $post['post']['id'] }}commentsBox").slideDown();
                      }
                    })
                  </script>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
