<x-frontend-layout title="Code IT News | Home" keywords="latest news, popular news, nepali news, rajniti bare"
    description="See latest news in codeit newsportal.">


    {{-- <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                <img src="https://codeit.com.np/storage/01KT34H8G2WT2F7E68B1MC3CCD.webp" alt="">
            </div>
        </div>
    </div> --}}



    <div class="flex gap-4 items-center shadow py-2">
        <span class="ml-6 text-(--primary) font-semibold text-lg">BreakingNews:</span>
        <marquee behavior="scrollable" direction="" onmouseover="this.stop()" onmouseout="this.start()">
            <div class="flex gap-6 items-center">
                @foreach ($breaking_news as $news)
                    <a href="{{ route('article', $news->slug) }}">
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
                    <a href="{{ route('article', $news->slug) }}">
                        <h1 class="text-lg md:text-3xl font-semibold">
                            {{ $news->title }}
                        </h1>
                        <img class="w-full" src="{{ asset(Storage::url($news->image)) }}" alt="{{ $news->title }}">
                    </a>
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

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($category->articles as $article)
                            <div class="shadow rounded-md overflow-hidden">
                                <a href="{{ route('article', $article->slug) }}">
                                    <img class="h-[200px] w-full object-cover"
                                        src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}">
                                    <div class="p-3">
                                        <h3 class="text-lg font-semibold line-clamp-1">{{ $article->title }}</h3>
                                        <div class="line-clamp-2 mb-3">
                                            {!! $article->content !!}
                                        </div>

                                        <span
                                            class="text-sm">{{ toNepaliDate($article->created_at->format('Y-m-d')) }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    @push("js")
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Wait a tiny bit for Flowbite to initialize
                setTimeout(() => {
                    const modalElement = document.getElementById('default-modal');

                    if (modalElement) {
                        // Create Flowbite Modal instance
                        const modal = new Modal(modalElement);
                        modal.show();
                    }
                }, 300);
            });
        </script>
    @endpush
</x-frontend-layout>
