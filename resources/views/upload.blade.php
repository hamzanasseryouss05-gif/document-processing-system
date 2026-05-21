<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<x-app-layout>

    <div class="p-6">

        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="file" name="file" required>

            <button type="submit" class="btn btn-primary">
                Upload
            </button>

        </form>

    </div>

</x-app-layout>