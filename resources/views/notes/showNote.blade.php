@extends('layouts.app')

@section('content')

  <div class="max-w-2xl mx-auto mt-10 p-4">
    
    <!-- back button -->
    <a href="{{ route('notes.index') }}"
       class="inline-block mb-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
      ← Back
    </a>

    <h1 class="text-2xl font-bold mb-4">Student Profile</h1>

    <!-- student info card -->
    <div class="bg-white p-6 rounded-lg shadow space-y-2">
      <p><span class="font-semibold">Student ID:</span> 2310074-1</p>
      <p><span class="font-semibold">Full Name:</span> JM Samante</p>
      <p><span class="font-semibold">Course:</span> BS Information Technology</p>
      <p><span class="font-semibold">Year Level:</span> 3rd Year</p>
      <p><span class="font-semibold">Email:</span> jmsamante13@gmail.com</p>
      <p><span class="font-semibold">Contact Number:</span> +63 912 345 6789</p>
    </div>

  </div>
@endsection
