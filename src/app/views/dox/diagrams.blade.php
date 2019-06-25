@extends('layouts.master')
@section('title')
    Escapism - Relational Diagrams
@stop

@section('content')
    <h2>Relational Diagram 1</h2>
    <img src="{{asset("images/Relational Diagram 1.svg")}}">
    <h2>Relational Diagram 2</h2>
    <img src="{{{asset("images/Relational Diagram 2.svg")}}}">
@stop