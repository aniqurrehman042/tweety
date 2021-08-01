<x-app>
    <header class="mb-6">
        <div class="relative">
            <img class="rounded-lg mb-2" src="/images/laptop.jpg" alt="Profile Cover Image">
            <img class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" style="left: 50%"
                width="150" src="{{ $user->avatar }}" alt="Profile Image">
        </div>
        <div class="flex justify-between items-center mb-6 relative">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined at {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex">
                @can('edit', $user)
                    <a href="{{ $user->path('edit') }}"
                        class="rounded-full border border-gray-300 py-2 px-4 text-black text-sm mr-2">Edit
                        Profile</a>
                @endcan
                <x-follow-button :user="$user"></x-follow-button>
            </div>
        </div>
        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde perferendis quia possimus illo! Doloribus
            ipsum sint repellat asperiores reprehenderit nulla reiciendis accusantium veritatis quam autem omnis,
            necessitatibus in magnam error!
        </p>
    </header>
    @include('_timeline', [
    'tweets' => $user->tweets
    ])
</x-app>
