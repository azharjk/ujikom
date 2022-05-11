<div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
    <h3 class="font-semibold">{{ $headline ?? 'Kesalahan kredensial' }}</h3>
    <ul class="list-disc ml-5 mt-2">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
