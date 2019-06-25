@extends('layouts.master')
@section('title')
    Escapism - Edit Post "{{{$item->Title}}}}
@stop

@section('content')
    <form method="post" action="{{url('edit_post')}}">
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" class="form-control" id="usr" name="title" value="{{$item->Title}}">

            <br>

            <label for="comment">Details:</label>
            <textarea class="form-control" rows="5" id="comment" name="detail"
                      placeholder="Write a new post.">{{$item->Text}}</textarea>
            <input type="hidden" name="id" value="{{{ $item->Id }}}">
        </div>
        <a href="/" class="btn btn-danger" role="button">Cancel</a>
        <div class="pull-right">
            <input type="submit" class="btn btn-success" value="Update">
        </div>
    </form>


@stop