@extends('layouts.app')

@section('title', $ticket->title)

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="card card-body">
                <div class="card-header">
                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                </div>

                <div class="card-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                        <p>{{ $ticket->message }}</p>
                        <p>Categry: {{ $category->name }}</p>
                        <p>
                        @if ($ticket->status === 'Open')
                            Status: <span class=" badge-success">{{ $ticket->status }}</span>
                        @else
                            Status: <span class="badge-danger">{{ $ticket->status }}</span>
                        @endif
                        </p>
                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>

                    <hr>
                    <div class="comments">
    @foreach ($comments as $comment)
        <div class="panel panel-@if($ticket->user->id === $comment->user_id) {{"default"}}@else{{"success"}}@endif">
            <div class="panel panel-heading">
                {{ $comment->user->name }}
                <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
            </div>

            <div class="card card-body">
                {{ $comment->comment }}        
            </div>
        </div>
    @endforeach
</div>



                    <div class="comment-form">
                        <form action="{{ url('comment') }}" method="POST" class="form">
                            {!! csrf_field() !!}

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection