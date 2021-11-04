@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" width="60" height="60" class="rounded-xl">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
        @if ($comment->canDelete())
            <form method="POST" action="/comments/{{ $comment->id }}">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600" type="submit">Удалить</button>
            </form>
        @endif
    </article>
</x-panel>
