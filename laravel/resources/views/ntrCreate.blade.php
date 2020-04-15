@extends('ntr')

@section('nameHead')
<form method="POST" action="/api/name">
    <input name="name" type="text" placeholder="Name">
    <input type="submit" value="Make Name">
</form>
@stop()

@section('tagHead')
<form method="POST" action="/api/tag">
    <input name="tag" type="text" placeholder="Tag">
    <input type="submit" value="Make Tag">
</form>
@stop()

@section('resumeHead')
<form method="POST" action="/api/resume">
    <input name="name_id" type="text" placeholder="Name_id">
    <input name="resume" type="text" placeholder="Resume">
    <input type="submit" value="Make Resume">
</form>
@stop()

@section('ntrHead')
<form method="POST" action="/api/resumetag">
    <input name="resume_id" type="text" placeholder="Resume_id">
    <input name="tag_id" type="text" placeholder="Tag_id">
    <input type="submit" value="Make Connect">
</form>
@stop