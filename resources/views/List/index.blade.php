<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    {{-- font --}}
    <link rel="stylesheet" href="font.css">

    <title>To-do List</title>
</head>

<body>
    <section class="bg-gray-800 p-4 h-screen">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between gap-3">
                <div class="flex items-center justify-start my-10">
                    <svg class="w-20 h-20 mb-3 text-gray-800 dark:text-blue-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="#A1E3F9" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                    </svg>
                    <div>
                        <h1
                            class="text-3xl font-bold galindo-regular pt-1 text-center tracking-wider text-blue-200 bg-blue-500 rounded-lg">
                            Donezo
                        </h1>
                        <p class="text-sm px-1 pb-1 mt-1 font-thin text-center text-gray-200 tracking-wider">
                            make your plan better
                        </p>
                    </div>
                </div>

                <!-- Container untuk Search dan Tombol Modal -->
                <div class="flex items-center space-x-2">
                    <!-- Searching -->
                    <form class="relative" action="{{ route('Task.index') }}" method="GET">
                        <label for="default-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" name="search"
                                class="block w-64 pl-10 text-sm shadow-md text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Temukan List..." />
                        </div>
                    </form>

                    <!-- Modal Button -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="p-2 text-white bg-blue-700 hover:bg-blue-800 shadow-md focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm dark:bg-gray-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Create modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-p right-0 left-0 z-50 justify-center items-start mt-20 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-600">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Tambahkan List
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" action="{{ route('Task.store') }}" method="POST">
                            @csrf
                            <div class="grid gap-4 mb-4 grid-cols-2">
                                <div class="col-span-2">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" name="Task" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                                      dark:bg-gray-500 dark:border-gray-400 dark:placeholder-gray-300 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Tulis Nama Tugas...">
                                </div>
                            </div>

                            <!-- Grid untuk Tanggal dan Prioritas -->
                            <div class="grid gap-4 grid-cols-2 mb-7">
                                <div>
                                    <label for="datetime-local"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Set Waktu
                                    </label>
                                    <div class="relative">
                                        <input id="datetime-local" name="Tanggal" type="datetime-local"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                          dark:bg-gray-500 dark:border-gray-400 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Pilih Tanggal">
                                    </div>
                                </div>

                                {{-- <div class="grid gap-4 grid-cols-2 mb-7">
                                    <div>
                                        <label for="datetime-local"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Set Waktu
                                        </label>
                                        <div class="relative">
                                            <div class="absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                </svg>
                                            </div>

                                            <input id="datetime-local" name="Tanggal" type="datetime-local"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5
                                                dark:bg-gray-500 dark:border-gray-400 dark:placeholder-gray-300 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        </div>
                                    </div>
                                </div> --}}

                                <div>
                                    <label for="priority"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Set Prioritas
                                    </label>
                                    <select name="Prioritas" id="priority"
                                        class="block w-full border bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5
                                        dark:bg-gray-500 dark:border-gray-400 dark:text-gray-300 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value=""selected disabled>Pilih Prioritas</option>
                                        <option value="Penting">Penting</option>
                                        <option value="Sangat Penting">Sangat Penting</option>
                                    </select>
                                </div>

                            </div>

                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tambah Tugas
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Edit modal --}}
            @foreach ($Tasks as $Task)
                <div id="edit-task-modal{{ $Task->id }}" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-start mt-20 w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-600">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Edit Tugas
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="edit-task-modal{{ $Task->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" action="{{ route('Task.update', $Task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="edit-name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                        <input type="text" name="Task" id="edit-name"
                                            value="{{ $Task->Task }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-400 dark:placeholder-gray-300 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Tulis Nama Tugas...">
                                    </div>
                                </div>

                                <!-- Grid untuk Tanggal dan Prioritas -->
                                <div class="grid gap-4 grid-cols-2 mb-7">
                                    <div>
                                        <label for="datetime-local"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Set Waktu
                                        </label>
                                        <div class="relative">
                                            <input id="datetime-local" name="Tanggal" type="datetime-local"
                                                value="{{ $Task->Tanggal }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
                                              dark:bg-gray-500 dark:border-gray-400 dark:placeholder-gray-300 dark:text-gray-200 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Pilih Tanggal">
                                        </div>
                                    </div>
                                    {{-- <div>
                                        <label for="edit-datepicker"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Set Waktu
                                        </label>
                                        <div class="relative">
                                            <input id="edit-datepicker" name="Tanggal" type="text"
                                                value="{{ $Task->Tanggal }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-400 dark:placeholder-gray-300 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Pilih Tanggal">
                                        </div>
                                    </div> --}}

                                    <div>
                                        <label for="edit-priority"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Set Prioritas
                                        </label>
                                        <select name="Prioritas" id="edit-priority"
                                            class="block w-full border bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-500 dark:border-gray-400 dark:placeholder-gray-300 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="Penting"
                                                {{ $Task->Prioritas == 'Penting' ? 'selected' : '' }}>
                                                Penting</option>
                                            <option value="Sangat Penting"
                                                {{ $Task->Prioritas == 'Sangat Penting' ? 'selected' : '' }}>
                                                Sangat Penting
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- List --}}
            @forelse ($Tasks as $Task)
                <div class="bg-gray-700 p-4 rounded-lg shadow-md my-5 flex items-center justify-between">
                    <div class="flex items-center">
                        <form action="{{ route('status', $Task->id) }}" method="POST">
                            @csrf
                            <input type="checkbox"
                                class="form-checkbox h-5 w-5 text-blue-600 rounded-full bg-gray-200" name="status"
                                value="completed" onchange="this.form.submit()"
                                {{ $Task->status === 'completed' ? 'checked' : '' }}>
                        </form>
                        <div class="grid pl-5">
                            @if ($Task->status === 'pending')
                            <span class="text-xl poppins-semibold text-gray-200 mb-5">
                                {{ $Task->Task }}
                            </span>
                            @else
                            <span class="text-xl poppins-semibold text-gray-200 mb-5 line-through text-gray-400">
                                {{ $Task->Task }}
                            </span>
                            @endif

                            <div class="flex gap-3">
                                <span class="text-sm font-thin text-gray-200">
                                    {{ \Carbon\Carbon::parse($Task->Tanggal)->translatedFormat('H:i, d F Y') }}
                                </span>
                                @if ($Task->Prioritas === 'Penting')
                                    <span class="text-sm poppins-semibold px-5 rounded-xl bg-blue-300 text-blue-800 ">
                                        Penting
                                    </span>
                                @else
                                    <span class="text-sm poppins-semibold px-5 rounded-xl bg-red-300 text-red-800">
                                        Sangat Penting
                                    </span>
                                @endif

                                @if ($Task->status === 'pending')
                                    <span
                                        class="text-sm text-yellow-800 bg-yellow-300 poppins-semibold px-5 rounded-xl">Pending
                                    </span>
                                @else
                                    <span
                                        class="text-sm text-green-800 bg-green-300 poppins-semibold px-5 rounded-xl">Selesai
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @if ($Task->status === 'pending')
                            <button data-modal-target="edit-task-modal{{ $Task->id }}"
                                data-modal-toggle="edit-task-modal{{ $Task->id }}"
                                class="text-white bg-gray-500 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 mr-2">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                </svg>
                            </button>
                            <form action="{{ route('Task.destroy', $Task->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="text-white bg-gray-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-2"
                                    type="submit">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('Task.destroy', $Task->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?');">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="text-white bg-gray-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 mr-2"
                                    type="submit">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                    </svg>
                                </button>
                            </form>
                        @endif

                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>
</body>

</html>
