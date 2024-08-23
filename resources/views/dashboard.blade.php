<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="/create"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">create</a>
        </div>
    </x-slot>


    <div class="flex px-2 flex-col gap-5 items-center h-[38.5rem] overflow-y-scroll">
        @if ($posts)
            @foreach ($posts as $post)
            <div class="mt-8">
                <div
                    class="max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="px-5 py-3 items-center gap-2 text-white flex">
                        <div class="px-5 py-3 text-md font-semibold rounded-full bg-blue-500 ">
                            {{ substr($post->user_name, 0, 1) }}</div>
                        <div>
                            <h2>{{ $post->user_name }}</h2>
                            <p class="text-xs text-gray-500">{{ $post->updated_at }}</p>
                        </div>
                        @if (Auth::user()->id == $post->user_id)
                            <button class="ml-auto"><i class="material-icons" style="color:gray">edit</i></button>
                            <button class="ml-2"><i class="material-icons" style="color:gray">delete</i></button>
                        @endif
                    </div>
                    <div class="h-96">
                        <img class="rounded-t-lg object-cover h-full w-full" src="{{ $post->image_url }}"
                            alt="" />
                    </div>

                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->description }}</p>
                        <p class="mb-3 font-normal pt-3 text-gray-700 dark:text-gray-200 text-xs">
                            {{ $post->total_likes }} likes</p>
                        <div class="w-full h-[1px] bg-slate-600"></div>
                        <div class="flex mt-3">
                            <div class="flex items-center gap-2">
                                <a href={{ url('/like/store', $post->id) }} class="ml-2"><svg
                                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#e8eaed">
                                        <path
                                            d="M720-120H280v-520l280-280 50 50q7 7 11.5 19t4.5 23v14l-44 174h258q32 0 56 24t24 56v80q0 7-2 15t-4 15L794-168q-9 20-30 34t-44 14Zm-360-80h360l120-280v-80H480l54-220-174 174v406Zm0-406v406-406Zm-80-34v80H160v360h120v80H80v-520h200Z" />
                                    </svg></a>
                                {{-- <i class="material-icons" style=" color: blue">thumb_up</i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>


</x-app-layout>
