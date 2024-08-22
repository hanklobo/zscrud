<div class="grid grid-cols-2 gap-4 md:grid-cols-4">
    @foreach($items ?? [] as $card)
        @if($card['url'] ?? false)
            <a href="{{$card['url']}}">
        @endif
        <div class="flex cursor-pointer flex-col items-stretch border justify-items-center rounded-lg bg-slate-50 py-5 px-6 text-center text-slate-800 shadow-slate-200 transition hover:bg-white hover:shadow-lg hover:shadow-slate-200 dark:bg-slate-800 dark:text-slate-200 dark:shadow-slate-700 dark:hover:shadow-slate-800">
            <i class="fas {{ $card['icon'] ?? 'fa-home' }} text-4xl"></i>
            <div class="mt-3 text-lg font-semibold">{{$card['title'] ?? 'card title'}}</div>
        </div>
        @if($card['url'] ?? false)
            </a>
        @endif
    @endforeach
</div>
