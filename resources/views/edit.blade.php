<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Note</title>
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
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
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
        Edit Note
      </h6>

      <a href="{{ route('dashboard') }}" class="logout-btn">
        <i class="fa-solid fa-arrow-left"></i>
      </a>
    </div>

    <!-- Edit Note -->
    <div class="add-note-card">
      <form method="POST" action="/notes/{{ $note->id }}">
        @csrf
        @method('PUT')

        <div class="mb-2">
          <input type="text" name="title" class="form-control" value="{{ $note->title }}" required>
        </div>

        <div class="mb-2">
          <textarea name="content" class="form-control" rows="7" required>{{ $note->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-success w-100">
          <i class="fa-solid fa-check me-1"></i> Update Note
        </button>
      </form>
    </div>

  </div>

</body>

</html>