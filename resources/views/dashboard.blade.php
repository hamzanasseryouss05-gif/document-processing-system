<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<x-app-layout>


    <div class="p-6">

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('upload.create') }}" class="btn btn-info mb-3">
            Ajouter un fichier
        </a>

        @foreach($uploads as $upload)
            <div>
                {{ $upload->file_name }} - {{ $upload->status }}

                <form action="{{ route('upload.destroy', $upload->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn">
                        Delete
                    </button>
                </form>
            </div>
        @endforeach

    </div>

</x-app-layout>