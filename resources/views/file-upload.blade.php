<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">File Upload</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                @if (session('filePath'))
                    <p>File Path: {{ session('filePath') }}</p>
                @endif
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('file.upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="file" class="form-label">Choose File</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>
