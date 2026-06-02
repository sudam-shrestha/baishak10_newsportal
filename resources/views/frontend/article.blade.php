<x-frontend-layout title="{{ $article->meta_title }}" keywords="{{ $article->meta_keywords }}"
    description="{{ $article->meta_description }}" image="{{ asset(Storage::url($article->image)) }}">
    <section>
        <div class="container py-10 grid grid-cols-3 gap-8">
            <div class="col-span-2 space-y-6">
                <div class="flex items-center gap-2">
                    <span>Author:{{ $article->writer }}</span>,
                    <span>{{ toNepaliDate($article->created_at->format('Y-m-d')) }}</span>
                </div>
                <h1 class="text-3xl font-semibold">{{ $article->title }}</h1>

                <img src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}">

                <div class="text-lg mb-3">
                    {!! $article->content !!}
                </div>
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
