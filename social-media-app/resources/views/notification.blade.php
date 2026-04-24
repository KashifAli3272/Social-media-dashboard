@extends('index')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">🔔 Notifications</h2>

    @if($notifications->count() > 0)
        <div class="card shadow-sm">
            <div class="list-group list-group-flush">

                @foreach($notifications as $notification)
                    <div class="list-group-item d-flex justify-content-between align-items-start 
                        {{ !$notification->is_read ? 'bg-light fw-bold' : '' }}">

                        <div>
                            <div class="mb-1">
                                {{ $notification->message }}
                            </div>
                            <small class="text-muted">
                                {{ $notification->created_at->format('d M Y, h:i A') }}
                            </small>
                        </div>

                        <div>
                            @if(!$notification->is_read)
                                <form action="{{ route('notifications.read', $notification->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-sm btn-success">
                                        Mark as Read
                                    </button>
                                </form>
                            @endif

                            <form action="{{ route('notifications.destroy', $notification->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this notification?')">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    @else
        <div class="alert alert-info">
            No notifications available.
        </div>
    @endif
</div>

@endsection
