@extends('index')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <!-- Welcome Card -->
    <div class="mb-4">
        <div class="p-4 bg-primary text-white rounded shadow-sm">
            <h2 class="mb-2">Welcome back, {{ auth()->user()->name ?? 'User' }}!</h2>
            <p class="mb-0">Here’s an overview of your social media activity.</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-6">1,245</p>
                    <i class="bi bi-people fs-2 text-primary"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Messages</h5>
                    <p class="card-text display-6">532</p>
                    <i class="bi bi-chat-dots fs-2 text-success"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Notifications</h5>
                    <p class="card-text display-6">124</p>
                    <i class="bi bi-bell fs-2 text-warning"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Recent Activity</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Jane Doe</td>
                            <td>Posted a new update</td>
                            <td>2026-02-11</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>John Smith</td>
                            <td>Sent a message</td>
                            <td>2026-02-10</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Mary Johnson</td>
                            <td>Updated profile</td>
                            <td>2026-02-09</td>
                            <td><span class="badge bg-primary">Completed</span></td>
                        </tr>
                        <tr>
                            <td>Robert Brown</td>
                            <td>Liked a post</td>
                            <td>2026-02-08</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
