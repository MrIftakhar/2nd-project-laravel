<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
    @layer utilities {
      .container{
        @apply px-10 mx-auto;
      }
    }
  </style>
    <title>2nd_project</title>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class= "text-red-500 text-xl">Create</h2>
    
            <a href="/" class="bg-green-600 text-white rounded py-2 px-4"> Back to Home</a>
        </div>
        <form method="POST" action="{{ route('store')}}" enctype="multipart/form-data">
          @csrf
           <div class="flex flex-col gap-5">
            <label for="">Name</label>
           <input type="text" name="name" value="{{ old('name') }}">
           @error('name')
           <p class="text-red-600">{{ $message }}</p>
           @enderror
           <label for="">Discription</label>
            <input type="text" name="discription" value="{{ old('discription') }}">
            @error('discription')
           <p class="text-red-600">{{ $message }}</p>
           @enderror
            <label for="">Select image</label>
            <input type="file" name="image" id="">
            @error('image')
           <p class="text-red-600">{{ $message }}</p>
           @enderror
            <input type="submit" class="bg-green-500 text-white py-2 px-4 rounded">
           </div>
        </form>
    </div>
</body>
</html>