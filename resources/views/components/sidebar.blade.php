<aside class="bg-white d-flex flex-column shadow-sm" style="min-height: 100vh; width: 250px;">
    <!-- Logo -->
    <div class="p-4 border-bottom text-center">
        <img src="/images/logo-dipa.png" alt="DIPA Logo" class="mb-2" style="max-width: 120px;">
    </div>

    <!-- Navigation -->
    <nav class="flex-grow-1 overflow-auto px-3 pt-3">
        @php
            $menus = \App\Models\DipaMenu::with('roles')
                ->where('is_active', 1)
                ->orderBy('order_index')
                ->get()
                ->filter(fn($menu) => auth()->user()->hasAnyRole($menu->roles->pluck('name')->toArray()));
        @endphp

        @foreach($menus->whereNull('parent_id') as $parent)
            @php
                $isActive = request()->is(ltrim($parent->url, '/'));
                $hasChildren = $menus->where('parent_id', $parent->id)->count();
            @endphp

            <div class="mb-1">
                <a href="{{ $hasChildren ? '#' : url($parent->url) }}"
                   class="d-flex align-items-center gap-2 px-3 py-2 rounded {{ $isActive ? 'bg-danger bg-opacity-10 text-danger fw-semibold' : 'text-dark' }}"
                   data-bs-toggle="{{ $hasChildren ? 'collapse' : '' }}"
                   data-bs-target="{{ $hasChildren ? '#submenu-'.$parent->id : '' }}"
                   aria-expanded="{{ $isActive ? 'true' : 'false' }}">
                    <i class="{{ $parent->icon ?? 'bi bi-circle' }}"></i> {{ $parent->name }}
                    @if($hasChildren)
                        <i class="ms-auto bi bi-chevron-down small"></i>
                    @endif
                </a>

                @if($hasChildren)
                    <div id="submenu-{{ $parent->id }}" class="collapse ps-4">
                        @foreach($menus->where('parent_id', $parent->id) as $child)
                            <a href="{{ url($child->url) }}"
                               class="d-block py-1 px-2 rounded small {{ request()->is(ltrim($child->url, '/')) ? 'text-danger fw-bold' : 'text-muted' }}">
                                {{ $child->name }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </nav>

    <!-- Footer -->
    <div class="border-top p-3 small">
        <a href="{{ route('logout') }}" class="text-decoration-none text-danger d-flex align-items-center"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-left me-2"></i> Log Out
        </a>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="d-none">
            @csrf
        </form>
    </div>
</aside>
