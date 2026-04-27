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

    <style>
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #f8f9fa; 
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 40px;
        }

        .glass {
            width: 100%;
            max-width: 420px;
            margin: 16px;
            padding: 22px;
            border-radius: 18px;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .header h6 {
            margin: 0;
            font-weight: 600;
            color: #212529;
        }

        .note-card {
            background: #f8f9fa;
            border-radius: 14px;
            padding: 14px;
            margin-bottom: 12px;
            border: 1px solid #e9ecef;
        }

        .note-title {
            font-size: 1rem;
            font-weight: 600;
            color: #212529;
        }

        .note-content {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .empty-message {
            text-align: center;
            color: #6c757d;
            margin-top: 20px;
        }

        .add-note-card {
            background: #f8f9fa;
            border-radius: 14px;
            padding: 14px;
            margin-bottom: 16px;
            border: 1px solid #e9ecef;
        }

        .add-note-card input,
        .add-note-card textarea {
            border-radius: 10px;
        }

        .logout-btn {
            border: none;
            background: transparent;
            color: #6c757d;
        }

        .logout-btn:hover {
            color: #dc3545;
        }
    </style>
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
            Hello user {{ $user->name }} (Admin), these are all the notes and their authors.
           @else
            Hello user {{ $user->name }}.
           @endif
        </h6>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-power-off"></i>
            </button>
        </form>
    </div>

    <!-- Add Note -->
    <div class="add-note-card">
        <form method="POST" action="/notes">
            @csrf
            <div class="mb-2">
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="mb-2">
                <textarea name="content" class="form-control" rows="7" placeholder="Content" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">
                <i class="fa-solid fa-plus me-1"></i> Add Note
            </button>
        </form>
    </div> 

    <!-- Notes -->
    @if(isset($notes) && count($notes) > 0)
        @foreach($notes as $note)
            <div class="note-card">
                <div class="note-title">
                    
                    {{ $note->title }}
                </div>
                <div class="note-content">{{ $note->content }}</div>

                @if (auth()->user()->role == 1)
                    <small><strong>Author:</strong> {{ $note->user->name }}</small>
                
                @endif

                <div class="d-flex gap-2 mt-2">
                
                <!-- EDIT -->
                <a href="/notes/{{ $note->id }}/edit" class="btn btn-sm btn-warning w-50">
                    <i class="fa-solid fa-pen me-1"></i> Edit
                </a>

                <!-- DELETE -->
                <form method="POST" action="/notes/{{ $note->id }}" class="w-50">
                    @csrf
                    @method('DELETE')
                    <button 
                        class="btn btn-sm btn-danger w-100"
                        onclick="return confirm('Are you sure you want to delete this note?')">
                        <i class="fa-solid fa-trash me-1"></i> Delete
                    </button>
                </form>

            </div>
            </div>
        @endforeach
    @else
        <div class="empty-message">
            <i class="fa-regular fa-face-smile me-1"></i>
            No notes yet. Add one above!
        </div>
    @endif

</div>

</body>
</html>