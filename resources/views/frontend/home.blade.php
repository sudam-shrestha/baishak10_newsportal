<x-frontend-layout>


    <div class="flex gap-4 items-center shadow py-2">
        <span class="ml-6 text-(--primary) font-semibold text-lg">BreakingNews:</span>
        <marquee behavior="scrollable" direction="" onmouseover="this.stop()" onmouseout="this.start()">
            <div class="flex gap-6 items-center">
                @foreach ($breaking_news as $news)
                    <a href="">
                        {{ $news->title }}
                    </a>
                @endforeach
            </div>
        </marquee>
    </div>

    <section>
        <div class="container py-10 space-y-6">
            @foreach ($latest_news as $news)
                <div class="p-4 shadow-lg rounded-md overflow-hidden">
                    <h1 class="text-3xl font-semibold">
                        {{ $news->title }}
                    </h1>
                    <img class="w-full" src="{{ asset(Storage::url($news->image)) }}" alt="{{ $news->title }}">
                </div>
            @endforeach
        </div>
    </section>


    <section>
        <div class="container py-10 space-y-10">
            @foreach ($categories as $category)
                <div>
                    <h2 class="mb-4 text-2xl font-semibold border-l-4 border-(--primary) pl-4">{{ $category->title }}
                    </h2>

                    <div class="grid grid-cols-3 gap-6">
                        @foreach ($category->articles as $article)
                            <div class="shadow rounded-md overflow-hidden">
                                <img class="h-[200px] w-full object-cover"
                                    src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}">
                                <div class="p-3">
                                    <h3 class="text-lg font-semibold line-clamp-1">{{ $article->title }}</h3>
                                    <div class="line-clamp-2 mb-3">
                                        {!! $article->content !!}
                                    </div>

                                    <span class="text-sm">{{ toNepaliDate($article->created_at->format('Y-m-d')) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-frontend-layout>
