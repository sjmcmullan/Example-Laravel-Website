@extends('layouts.master')
@section('title')
    Escapism - New Post
@stop

@section('content')
    <form method="post" action="{{url('add_post')}}">
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" class="form-control" id="usr" name="title" placeholder="Your posts title.">

            <br>

            <label for="author">Author Name:</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="Enter your name.">

            <br>

            <label for="comment">Details:</label>
            <textarea class="form-control" rows="5" id="comment" name="detail"
                      placeholder="Write a new post."></textarea>
        </div>
        <a href="/" class="btn btn-danger" role="button">Cancel</a>
        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="Submit">
        </div>
    </form>


@stop