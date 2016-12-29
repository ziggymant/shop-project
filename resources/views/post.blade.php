@extends('layouts.blog-home')

@section('content')

  <!-- Blog Post -->

  <!-- Title -->
  <h1>{{$post->title}}</h1>

  @if (Session::has('message'))
    <p class="text-success">{{Session('message')}}</p>
  @endif

  <!-- Author -->
  <p class="lead">
      by <a href="#">{{$post->user->name}}</a>
  </p>

  <hr>

  <!-- Date/Time -->
  <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>

  <hr>

  <!-- Preview Image -->
  <img class="img-responsive" src="{{$post->photo->path}}" alt="">

  <hr>

  <!-- Post Content -->
  {{$post->body}}

  <hr>

  <!-- Blog Comments -->
@if(Auth::check())
  <!-- Comments Form -->
  <div class="well">
      <h4>Leave a Comment:</h4>


      {!!Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store'])!!}

        <input type="hidden" name="post_id" value="{{$post->id}}">
        <div class="form-group">
          {!!Form::label('body', 'Comment')!!}
          {!!Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3])!!}
        </div>

        <div class="form-group">
          {!!Form::submit('Post comment', ['class'=>'btn btn-primary'])!!}
        </div>

      {!!Form::close()!!}


  </div>
@endif

  <hr>

  <!-- Posted Comments -->
@if(count($comments)>0)
  <!-- Comment -->
  @foreach($comments as $comment)
  <div class="media">
      <a class="pull-left" href="#">
          <img height="64" class="media-object" src="{{$comment->authorPhoto($comment->author)}}" alt="">
      </a>
      <button class="toggle-reply btn btn-primary pull-right">Reply</button>
      <div class="media-body">
          <h4 class="media-heading">{{$comment->author}}
              <small>{{$comment->created_at->diffForHumans()}}</small>
          </h4>
          {{$comment->body}}

          <div class="comment-reply-container">
              <div class="comment-reply">
                  {!!Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply'])!!}
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    <div class="form-group">
                      {!!Form::label('body', 'Reply')!!}
                      {!!Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1])!!}
                    </div>

                    <div class="form-group">
                      {!!Form::submit('Reply', ['class'=>'btn btn-primary'])!!}
                    </div>
                  {!!Form::close()!!}
              </div> <!-- End comment-reply col-->
          </div> <!-- End comment-reply container-->

          @if(count($comment->replies)>0)
            @foreach($comment->replies as $reply)

              @if($reply->is_active == 1)
                <!-- Nested Comment -->
                <div id="nested-comment" class="media">
                    <a class="pull-left" href="#">
                        <img height="64" class="media-object" src="{{$reply->authorPhoto($reply->author)}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$reply->author}}
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$reply->body}}
                    </div>
                </div> <!-- End Nested Comment -->
              @endif

        @endforeach
        @endif

      </div>
  </div>
  @endforeach

@endif

@endsection

@section('scripts')
  <script type="text/javascript">
    $(".toggle-reply").click(function(){
      $(".comment-reply").slideToggle('slow');

    });
  </script>

@endsection
