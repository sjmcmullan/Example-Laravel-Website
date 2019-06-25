@extends('layouts.master')

@section('title')
    Escapism - {{{$post->Title}}}
@stop

@section('content')
    {{--Panel heading with dropdown menu to edit and delete--}}
    <div class="panel panel-primary">
        <div class="panel-heading">
            {{{$post->Title}}}
            <div class="dropdown pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="glyphicon glyphicon-align-justify"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{url("edit_post/$post->Id")}}"><span class="glyphicon glyphicon-pencil"></span>
                            Edit</a></li>
                    <li><a href="{{url("delete_post/$post->Id")}}"><span
                                    class="glyphicon glyphicon-trash"></span> Delete</a></li>
                </ul>
            </div>
        </div>

        {{--Panel/post body--}}
        <div class="panel-body">
            {{{$post->Text}}}

            <br>
            <br>

            {{--From here, comments on the main post--}}
            @foreach($comments as $comment)
                <div class="panel panel-primary">
                    <div class="panel-body">
                        {{{$comment->Text}}}
                    </div>
                    <div class="panel-footer">
                        <img src="{{asset("images/1337.png")}}" height="50" width="65"> {{{$comment->Author}}}
                        <a href="{{url("remove_comment/$comment->Id")}}" class="btn btn-danger pull-right" role="button">Delete</a>

                    </div>
                </div>
            @endforeach
        </div>

        {{--panel footer--}}
        <div class="panel-footer">
            <img src="{{asset("images/1337.png")}}" height="50" width="65"> {{{$post->Author}}}
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-body">
            <h4><span class="glyphicon glyphicon-comment"></span> Contribute to the discussuon:</h4>
        </div>
    </div>

    {{--new comment section--}}
    <form method="post" action="{{url('add_comment')}}">
        <div class="form-group">
            <label for="author">Author Name:</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Enter your name.">

            <br>

            <label for="comment">Details:</label>
            <textarea class="form-control" rows="5" id="comment" name="detail"
                      placeholder="Write a new comment."></textarea>
            <input type="hidden" name="post_id" value="{{{ $post->Id }}}">
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="Submit">
        </div>
    </form>

    <br>
    <br>
    <br>

    {{--button to return home--}}
    <a href="/" class="btn btn-info btn-lg btn-block" role="button">
        <span class="glyphicon glyphicon-home"></span> Return Home</a>
@stop