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

                <section>
                    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                        <div class="mr-auto place-self-center lg:col-span-7">
                            <h1
                                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                                Buat Plan mu bersama Donezo!</h1>
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                Tambahkan Tugas
                                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="400" height="400"
                                viewBox="0 0 64 64">
                                <path fill="#fff200" d="m3.989 49.46l47.45 6.62L59.978 10l-43.08-5.819z" />
                                <path fill="#e8d807" d="m3.989 49.46l3.562 5.532l48.13 7.712l-4.245-6.624z" />
                                <path fill="#eddc0a"
                                    d="M14.408 2S4.862 46.37 2.844 47.68c-2.02 1.312 47.9 7.312 47.9 7.312s9.135-43.978 9.236-44.988s-45.572-8-45.572-8" />
                                <path fill="#ad9a28"
                                    d="M15.508 3.438S4.245 43.468 2.229 44.778c-2.02 1.312 48.772 8.773 48.772 8.773s8.427-42.4 8.526-43.4c.102-1.01-44.02-6.713-44.02-6.713" />
                                <path fill="#dbbf33" d="m59.979 10l3.871 3.798l-8.165 48.906l-4.245-6.624z" />
                                <path fill="#e8d807"
                                    d="M14.408 2S2.076 39.476.06 40.785c-2.02 1.312 47.696 13.184 50.22 10.728c2.521-2.458 9.601-40.498 9.702-41.508s-45.572-8-45.572-8" />
                                <path fill="#fff200"
                                    d="M14.408 2S3.569 35.04 1.551 36.35c-2.02 1.312 37.878 17.09 42.07 13.21c1.815-1.676 6.04-9.03 8.873-15.932c4.803-11.698 7.424-23 7.484-23.623c.101-1.01-45.572-8-45.572-8" />
                                <path fill="#be1e2d"
                                    d="M15.838 17.12c.143-.618.999-2.511 1.899-2.111c.451.204.275 1.085.306 1.478c.026.403.162.735.43 1.029c1.334 1.455 3.417-1.281 4.154-2.118c-.219-.026-.434-.057-.648-.083c.283.403.403.942.788 1.267c.467.384 1.036.053 1.443-.245c-.192-.049-.381-.102-.569-.151c.219.49.483.942 1.071.965c.192.007.399-.083.577-.14c.411-.128.826-.049 1.225.061c.614.166 1.232.083 1.681-.377c.309-.321.434-.042.769.079c.501.181.923-.241 1.485.038c.471.237.89-.475.418-.712c-.316-.158-.573-.241-.923-.256c-.339-.011-.69.237-.958-.049c-.313-.343-.829-.256-1.131.057c-.358.366-.569.547-1.12.422c-.309-.068-.592-.136-.912-.151a2.3 2.3 0 0 0-.75.094c-.471.125-.513.015-.72-.445c-.083-.192-.396-.271-.565-.147c-.347.256-.471.441-.683.03c-.136-.26-.245-.517-.415-.754c-.143-.204-.46-.302-.648-.087c-.674.773-1.319 1.636-2.235 2.123c-1.244.663-.83-1.689-1.236-2.277c-1.29-1.836-3.261 1.101-3.532 2.239c-.117.519.675.738.799.221m16.192.01c.072.034.136.079.208.113a.9.9 0 0 0 .396.102c.222.008.41-.192.41-.415a.417.417 0 0 0-.41-.411c-.099-.004.09.022.007.003c-.015-.007-.029-.007-.041-.015c.059.03.071.03.034.011c-.064-.03-.121-.068-.189-.102c-.204-.102-.448-.053-.569.147c-.104.186-.046.461.154.567m2.794.511c1.271.192 2.13-.599 2.768-1.617h-.713c.446.592.418 1.719 1.415 1.644c.413-.03.745-.339 1.021-.625c.282-.302.727-1.165 1.068-.521c.16.291.337.716.707.803c.712.17 1.164-.233 1.851-.301c1.726-.177 3.426.06 5.148.079c.539.004.539-.822 0-.826c-1.443-.015-2.882-.203-4.331-.154c-.629.019-1.217.102-1.794.335c-.739.301-.814-.426-1.202-.811c-.537-.531-1.195-.132-1.599.309c-.124.132-.833 1.131-1.06.788c-.229-.351-.256-.799-.512-1.135c-.186-.245-.532-.283-.713 0c-.407.645-.977 1.368-1.832 1.236c-.519-.078-.745.717-.222.796M13.196 22.13c.618-.682 1.839-2.152 2.91-1.666c1.025.467.946 2.05 1.519 2.879c.494.716 1.515.679 2.164.208c.826-.603 1.184-1.7 1.715-2.537c-.258-.034-.505-.064-.757-.098c.15.535.467.803.903 1.116c.435.316.846-.399.42-.708c-.256-.185-.433-.294-.524-.626c-.098-.358-.565-.396-.757-.102c-.501.795-.946 2.375-2.034 2.477c-.548.053-.692-.679-.809-1.074a6.3 6.3 0 0 0-.577-1.395c-1.297-2.247-3.602-.328-4.757.942c-.359.388.222.976.584.584m9.904.11c.394.102.669-.034 1.039-.155c.415-.136 1.05.332 1.398.509c.475.241.893-.471.415-.712c-.426-.219-.844-.475-1.315-.577a1.9 1.9 0 0 0-.611-.03c-.23.034-.475.226-.705.166c-.521-.132-.735.663-.221.799m4.733.316c.66-.143 1.374.283 2.02.411c.658.128 1.242-.068 1.657-.596c.324-.415-.256-1-.584-.584c-.463.592-1.048.358-1.662.162c-.546-.173-1.074-.312-1.64-.192c-.525.113-.303.909.214.799m8.684 1.614c.229-1.063.318-2.152.711-3.17l-.75.098c.738 1.12 1.648 1.847 3.049 1.711c.524-.053.53-.878 0-.826c-1.104.109-1.745-.411-2.337-1.304c-.207-.313-.622-.234-.754.098c-.396 1.021-.482 2.114-.712 3.17c-.113.521.679.744.793.223m5.15-.886c1.431.049 2.765-.422 4.186-.068c1.201.294 2.205.604 3.393.091c.486-.211.071-.92-.411-.712c-1.247.535-2.408-.234-3.648-.351c-1.184-.106-2.329.256-3.519.215c-.53-.02-.527.806-.001.825m-26.475 5.593c-.746.038-2.28-.038-2.096-1.168c.144-.867 1.063-1.319 1.858-1.304c.844.011 2.584.897 2.058 1.957c-.128.256-.464.539-.769.494c-.482-.072-.354-.916-.316-1.229q-.21.204-.415.415c1.09.09 1.794 1.048 2.978.844c.509-.09.991-.328 1.508-.377q-.225-.358-.117-.087c.03.09.056.181.094.268c.058.147.135.324.26.434c.611.562 1.462.147 2.164-.026c.306-.079.747.388 1.089.434c.445.06.75-.32 1.168-.396c.522-.094.302-.89-.218-.795c-.415.072-.743.498-1.139.249c-.297-.185-.49-.366-.855-.332c-.415.038-.822.196-1.221.294c-.482.117-.466-.158-.611-.532c-.279-.701-1.417-.166-1.9-.022c-1.213.362-2.046-.682-3.2-.784c-.241-.019-.386.208-.411.415c-.086.701-.03 1.557.664 1.93c.535.29 1.149.042 1.579-.309c1.549-1.24-.158-2.955-1.398-3.464c-1.398-.573-3.072.083-3.596 1.515c-.656 1.817 1.485 2.473 2.842 2.405c.535-.029.535-.855 0-.829m14.667-.637c-.671.042-1.244.302-1.414.999c-.143.581.222 1.21.708 1.5c1.289.761 3.174.218 4.587.388c.532.06.524-.765 0-.83c-.862-.102-1.752-.015-2.623-.03c-.464-.012-.927-.045-1.376-.174c-.689-.192-.61-.983.117-1.029c.533-.032.533-.858.001-.824m5.104 2c1.191-.226 2.266.973 3.37 1.312c1.391.434 2.891-.034 4.285-.188c.524-.053.532-.878 0-.821c-1.605.173-3.215.678-4.761-.045c-1.111-.52-1.798-1.304-3.117-1.052c-.516.101-.298.896.223.794M46.4 32.07c.211.072.417.166.637.237c.208.072.445-.083.504-.286c.062-.226-.079-.438-.289-.509c-.215-.076-.418-.166-.637-.238c-.215-.075-.448.083-.505.287c-.064.231.076.438.29.509m-13.69 6.386c.637-1.086.273-3.468-1.387-3.299c-.836.083-1.662.912-1.704 1.749c-.049.995 1.197 1.53 1.982 1.7c.521.113.735-.687.215-.799c-.439-.091-1.33-.328-1.372-.901c-.034-.407.66-.999 1.071-.931c.833.128.795 1.538.482 2.065c-.274.461.441.875.713.416m3.928-2.549c-.973-.143-2.171-.063-2.706.901c-.517.935.237 2.01.976 2.56c.792.588 1.777.637 2.394-.204c.611-.841.208-2.01-.377-2.725c-.335-.411-.916.177-.584.584c.365.456.584 1.097.298 1.644c-.306.584-.973.271-1.35-.046c-.396-.331-.897-.935-.596-1.478c.302-.546 1.21-.517 1.727-.444c.516.075.742-.72.218-.792M29.63 39.28c.66 2.902 5.24 5.359 7.02 2.069c.253-.472-.456-.886-.712-.419c-1.433 2.643-5.02.32-5.511-1.869c-.12-.516-.915-.297-.799.219M30 33.967v.637c0 .223.188.41.415.41a.42.42 0 0 0 .415-.41v-.637a.42.42 0 0 0-.415-.411a.42.42 0 0 0-.415.411m1.432.083c-.004.113.022-.082-.004.027a.5.5 0 0 1-.03.102c.03-.087-.015.026-.015.037c-.019.034-.034.068-.053.102c-.102.204-.057.445.147.566c.185.109.461.053.565-.147c.109-.223.203-.437.215-.687a.413.413 0 0 0-.825 0m2.186.27l-.057.026a.73.73 0 0 0-.343.196a.412.412 0 1 0 .581.584c.053-.049-.095.061-.012.012c.087-.049-.081.03-.012.004q.129-.05.261-.109c.199-.099.252-.381.146-.566c-.119-.203-.36-.244-.564-.147m1.522.73c.041.091-.031-.083 0 0c.011.026.015.053.026.079c.015.072-.012-.124-.01-.026v.057a.413.413 0 0 0 .827 0c0-.192-.053-.358-.132-.527c-.102-.2-.384-.257-.569-.147c-.205.12-.244.361-.142.564m1.486-.03c-.079.069.072-.044 0 0c-.045.026-.086.061-.132.095c-.105.087-.136.229-.146.357c-.022.223.199.411.41.411c.242 0 .393-.188.415-.411a.33.33 0 0 1-.146.271c.011-.011.026-.015.037-.026a.8.8 0 0 0 .147-.113c.166-.15.15-.43 0-.584a.424.424 0 0 0-.585 0m1.979.32c.049-.033.053-.037.022-.011a.4.4 0 0 0-.064.034a.7.7 0 0 0-.191.136c-.166.154-.155.43 0 .584c.16.166.414.154.584 0q-.074.052-.022.015a.3.3 0 0 1 .067-.033q.102-.059.192-.14c.162-.151.15-.43 0-.585a.43.43 0 0 0-.588 0" />
                            </svg>
                        </div>
                    </div>
                </section>
            @endforelse
        </div>
    </section>
</body>

</html>
