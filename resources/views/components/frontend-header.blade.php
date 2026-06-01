{{-- @props(['categories']) --}}

{{-- @php
    $categories = App\Models\Category::all();
@endphp --}}

<header class="sticky top-0 bg-white z-20">

    <div class="flex justify-between items-center container py-4">
        <img class="h-[50px]" src="https://codeit.com.np/storage/01KK0WD02GQYECHKK844MYEHN3.png" alt="Company Logo">


        {{-- <span class="text-xl">आइतबार, १७ जेठ २०८३</span> --}}
        <span class="text-xl">{{ toNepaliDate(now()->format('Y-m-d')) }}</span>
        {{-- <span class="text-xl">{{ now()->format('Y-m-d') }}</span> --}}
    </div>

    <nav class="bg-(--primary) text-white py-2">
        <div class="container flex justify-between items-center">
            <div class="flex gap-8 text-lg">
                <a href="">गृहपृष्ठ</a>
                @foreach ($categories as $category)
                    <a href="">{{ $category->title }}</a>
                @endforeach
            </div>
            <div>

                <form action="" method="GET" class="min-w-sm max-w-lg mx-auto">
                    <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="search" id="search" name="q"
                            class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-(--primary) focus:border-(--primary) shadow-xs placeholder:text-body"
                            placeholder="Search" required />
                        <button type="button"
                            class="absolute end-1.5 bottom-1.5 text-white bg-(--primary)/92 hover:bg-(--primary) box-border border border-transparent focus:ring-4 focus:ring-(--primary)/80 shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">Search</button>
                    </div>
                </form>

            </div>
        </div>
    </nav>

</header>
