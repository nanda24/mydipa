<div class="w-[300px] h-screen bg-white px-4 py-6 flex flex-col">
    <a href="/" class="flex items-center mb-6">
        <img src="{{ asset('images/logo-dipa.png') }}" alt="Logo" class="h-10 w-auto object-contain">
    </a>

    <nav class="flex-1 overflow-y-auto">
        <ul class="space-y-2">
            @foreach ($sidebarMenus as $menu)

                <li x-data="{ open: {{ request()->is(ltrim($menu->url, '/')) || $menu->children->contains(fn($c) => request()->is(ltrim($c->url, '/'))) ? 'true' : 'false' }} }">
                    {{-- Parent menu --}}
                    <a href="{{ $menu->children->isEmpty() ? $menu->url : '#' }}"
                    @click.prevent="open = !open"
                    class="flex items-center justify-between px-3 py-2 rounded-lg transition 
                            {{ request()->is(ltrim($menu->url, '/')) ? 'bg-blue-100 text-blue-600 font-semibold' : 'text-gray-700 hover:bg-gray-100' }}">
                        <div class="flex items-center gap-3">
                            <i class="{{ $menu->icon ?? 'bi bi-circle' }} text-gray-800"></i>
                            <span>{{ $menu->name }}</span>
                        </div>
                        @if ($menu->children->isNotEmpty())
                            <i :class="open ? 'bi bi-chevron-up' : 'bi bi-chevron-down'" class="text-sm"></i>
                        @endif
                    </a>

                    {{-- Collapsible Child menus --}}
                    @if ($menu->children->isNotEmpty())
                        <ul x-show="open" x-transition class="pl-10 mt-1 space-y-1 text-sm text-gray-600">
                            @foreach ($menu->children as $child)
                                <li>
                                    <a href="{{ $child->url }}"
                                    class="block px-3 py-1.5 rounded 
                                            {{ request()->is(ltrim($child->url, '/')) ? 'bg-blue-50 text-blue-600 font-medium' : 'hover:bg-gray-100' }}">
                                        {{ $child->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>

                @if ($menu->name === 'My Transaction')
                    <hr class="my-2 border-t border-gray-200">
                @endif
            @endforeach
        </ul>
    </nav>

    {{-- Footer: Settings + Logout --}}
    <div class="mt-auto pt-4 border-t space-y-2">
        {{-- Settings --}}
        <a href="#" class="flex items-center gap-2 text-gray-600 hover:text-gray-800 px-3 py-2 rounded-lg hover:bg-gray-100 transition">
            <i class="bi bi-gear"></i>
            <span>Settings</span>
        </a>

        {{-- Logout --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 w-full text-left text-gray-600 hover:text-red-600 px-3 py-2 rounded-lg hover:bg-red-50 transition">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

</div>