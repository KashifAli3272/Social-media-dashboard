<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universal Search</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h1 class="mb-4">Search Everything</h1>

    <!-- Search Form -->
    <form action="{{ route('search') }}" method="GET" class="mb-5">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Type to search..." value="{{ request('query') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Search Results -->
    @if(isset($term))
        <h4 class="mb-3">Results for "{{ $term }}"</h4>

        @forelse($results as $model => $items)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    {{ $model }}
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($items as $item)
                        <li class="list-group-item">
                            {{ $item->name ?? $item->title ?? 'Item' }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @empty
            <div class="alert alert-warning">
                No results found.
            </div>
        @endforelse
    @endif
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
