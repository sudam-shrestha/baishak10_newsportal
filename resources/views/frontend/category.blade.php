<x-frontend-layout title="{{ $category->meta_title }}" keywords="{{ $category->meta_keywords }}"
    description="{{ $category->meta_description }}" image="{{ asset(Storage::url($category->articles[0]->image)) }}">
    <section>
        <div class="container py-10 grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2 space-y-6">
                <h1 class="text-3xl font-semibold mb-5">{{ $category->title }}</h1>
                @foreach ($category->articles as $article)
                    <div class="shadow rounded-md overflow-hidden">
                        <a href="{{ route('article', $article->slug) }}" class="grid grid-cols-3 items-center">
                            <div>
                                <img class="h-[240px] w-full object-cover"
                                    src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}">
                            </div>
                            <div class="p-3 col-span-2">
                                <h3 class="text-xl mb-2 font-semibold line-clamp-2">{{ $article->title }}</h3>
                                <div class="line-clamp-3 mb-3 text-lg">
                                    {!! $article->content !!}
                                </div>

                                <span class="text-sm">{{ toNepaliDate($article->created_at->format('Y-m-d')) }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="space-y-6">
                @foreach ($advertises as $ads)
                    <a href="{{ $ads->redirect_url }}" class="block">
                        <img class="w-full" src="{{ asset(Storage::url($ads->banner)) }}"
                            alt="{{ $ads->company_name }}">
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</x-frontend-layout>
