@extends('layouts.default')

@section('content')

<h1>All contacts</h1>

<ul>
@foreach($submissions as $submission)

<li>{!! $submission->id !!}: {!! $submission->name !!} - {!! $submission->email_address !!} [submitted on: {!! $submission->created_at !!}] <a href="{!! url('/submission/'.$submission->id) !!}">View</a></li>

@endforeach

</ul>

@endsection
