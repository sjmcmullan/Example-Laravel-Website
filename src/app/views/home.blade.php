@extends('layouts.master')
@section('title')
    Escapism
@stop

@section('content')
    <a href="new" class="btn btn-primary btn-lg btn-block" role="button">
        <span class="glyphicon glyphicon-comment"></span> New Post </a>

    <br>

    <div class="panel panel-primary">
        <div class="panel-body">
            <h4><span class="glyphicon glyphicon-list-alt"></span> Latest Posts:</h4>
        </div>
    </div>

    @if ($posts)
        @foreach($posts as $post)
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
                            <li><a href="{{url("edit_post/$post->Id")}}"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
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
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            @if($post->Comment_Count == 1)
                                <span class="glyphicon glyphicon-tag"></span> {{{$post->Comment_Count}}} comment.
                            @else
                                <span class="glyphicon glyphicon-tags"></span> {{{$post->Comment_Count}}} comments.
                            @endif
                                <a href="{{url("post/$post->Id")}}" class="btn btn-info pull-right" role="button">View</a>
                        </div>
                    </div>
                </div>

                {{--panel footer--}}
                <div class="panel-footer">
                    <img src="images\1337.png" height="50" width="65"> {{{$post->Author}}}
                </div>
            </div>
        @endforeach
    @else
        <div class="col-md-offset-4">
            <img src="images\spooky.gif" class="text-center">
            <br>
            <br>
            <p>Looks like there's nothing here!</p>
            <p>Be the first to post!</p>
        </div>
    @endif
@stop