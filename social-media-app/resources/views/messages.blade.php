

@extends('index')

@php use Illuminate\Support\Str; @endphp

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">📥 Incoming Messages</h2>

    @if($messages->count() > 0)
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Sender</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $index => $message)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject }}</td>
                                <td>{{ Str::limit($message->message, 50) }}</td>
                                <td>{{ $message->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-info">
            No incoming messages found.
        </div>
    @endif
</div>

@endsection
