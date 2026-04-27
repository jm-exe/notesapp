<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- dashboard css --}}
    @vite(['resources/css/dashboard.css'])
</head>
<body>

<div class="glass">

    <!-- Header -->
    <div class="header">
        <h6>
            <i class="fa-solid fa-user-circle me-1"></i>
           @php
                $user = Auth::user();
           @endphp

           @if ($user->role == 1)
            Hello {{ $user->name }} (Admin), these are all the notes and their authors.
           @else
            Hello {{ $user->name }}.
           @endif
        </h6>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-power-off"></i>
            </button>
        </form>
    </div>

    

    <!-- Notes -->
    @if(isset($notes) && count($notes) > 0)
        @foreach($notes as $note)
            <div class="note-card">
                <div class="note-title">
                    
                    <small><strong>Title: </strong></small> {{ $note->title }}
                </div>
                <div class="note-content"><small><strong>Description: </strong></small>{{ $note->content }}</div>

                @if (auth()->user()->role == 1)
                    <small><strong>Author:</strong> {{ $note->user->name }}</small>
                
                @endif

                <div class="d-flex gap-2 mt-2">
                
              

            </div>
            </div>
        @endforeach
    @else
        <div class="empty-message">
            <i class="fa-regular fa-face-smile me-1"></i>
            No notes found.
        </div>
    @endif

</div>

</body>
</html>