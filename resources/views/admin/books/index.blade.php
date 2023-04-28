<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div>
                        <a href="{{ route('books.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Добавить книгу
                        </a>
                    </div>

                    <div class="relative overflow-x-auto pt-10">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Название книги
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Категория
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Автор
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $book->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $book->category->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $book->author }}
                                    </td>
                                    <td>
                                        <div class="mt-4">
                                            <a href="{{ route('books.edit', $book) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4
                                            focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2
                                            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Изменить
                                            </a>
                                        </div>
                                        <form action="{{ route('books.destroy', $book) }}" method="post" class="mt-4">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4
                                        focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600
                                        dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
