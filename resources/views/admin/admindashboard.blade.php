<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class=" flex justify-center mt-8">
        @if ($users)
            <div class="w-4/5 overflow-x-auto shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                User Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Change User Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->user_type }}
                                </td>
                                <td class="px-6 py-4">
                                    <form method="POST" action="/admin/dashboard/{{$user->id}}">
                                        @csrf
                                        @method('PUT')
                                    @if ($user->user_type == 'user')
                                        <button type="submit"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Make
                                            Admin</button>
                                    @else
                                        <button type="submit"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Make
                                            User</button>
                                    @endif
                                </form>
                                </td>
                                <td class="px-6 py-4">
                                    <form method="POST" action="/admin/dashboard/{{$user->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>

        @endif
    </div>

</x-app-layout>
