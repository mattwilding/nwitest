@extends('layouts.default')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>{{{ $submission->id }}}: {{{ $submission->name }}} - {{{ $submission->email_address }}}</h3>
    </div>
    <div class="card-body">
        <p class="card-text">{{{ nl2br($submission->message) }}}</p>
    </div>
    <div class="card-footer text-muted">
        {{{   $submission->created_at  }}}
    </div>
</div>
<p class="py-3"><a href="/"><- Back to list</a></p>

@endsection
