<div>
    @if ($books->count() > 0)
    <h2 class="text-2xl font-bold underline mb-6">Book List</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($books as $book)
        <div class="bg-white rounded shadow-md">
            <img srcset="
            https://placehold.co/600 600w,
            https://placehold.co/800 800w" sizes="(max-width: 640px) 100vw,
           (max-width: 768px) 50vw,
           33.33vw" src="https://placehold.co/800" alt="book-cover" class="w-full object-cover rounded-t">
            <div class="book-ingo">
                <h2 class="text-lg font-semibold">{{ $book->title }}</h2>
                <p class="text-gray-600">{{ $book->author }}</p>
            </div>
        </div>
        @endforeach
    </div>
    {{ $books->links("pagination::tailwind") }}

    @else
    <p>No books available.</p>
    @endif
</div>