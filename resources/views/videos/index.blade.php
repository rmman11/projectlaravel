@extends('layouts.app')

@section('title', 'Videos')

@section('content')

 <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 bg-primary text-white">
       <h1>Upload Video</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('upload.videos') }}" method="POST" enctype="multipart/form-data">
        @csrf

         <div class="mb-4">
                <label class="block font-medium">Video Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
            </div>
        <label for="video">Select a video file:</label>
        <input type="file" name="video" accept="video/*" required>
        <button type="submit">Upload</button>
    </form>

      </div>
      <div class="col-sm-9 bg-dark text-white">
         <h1 class="text-2xl font-bold mb-6">Video List</h1>


    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr style="color:white">
                <th>#</th>
                <th>Title</th>
                <th>Videos</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
   @foreach ($videos as $video)
                <tr style="color:white">
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->title }}</td>
                    <td>    
                    <video controls class="w-full max-w-3xl mx-auto rounded">
              <source src="{{ asset('/storage/app/public/' . $video->path) }}" type="video/mp4">
         
            Your browser does not support the video tag.
        </video></td>

        <td>              
    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this timeline event?');"  style="float:right">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        Delete
    </button>
</form>
</td>
                </tr>
            @endforeach
        </tbody>
    </table>

      
{{ $videos->links('pagination::bootstrap-5') }}

      </div>
    </div>
  </div>



@endsection
