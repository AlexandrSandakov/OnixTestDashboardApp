<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookList extends Component
{
    use WithPagination;

    public function render()
    {
        $books = Book::paginate(5); // Adjust the per page value as needed

        return view('livewire.book-list', ['books' => $books]);
    }
}
