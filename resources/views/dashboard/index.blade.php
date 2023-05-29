@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add new measure name</h1>
@stop

@section('content')
<form>
    <div class="card-body">
    <div class="form-group">
    <label for="exampleInputEmail1">Measure Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Measure Name">
    <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

