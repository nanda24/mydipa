<!-- Top Navigation -->
<nav class="bg-white px-6 py-3 flex justify-between items-center">
    <!-- Mobile Toggle Button -->
    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-700 lg:hidden">
        <i class="bi bi-list text-2xl"></i>
    </button>

    <div class="text-xl font-semibold text-gray-800">
        Dashboard
    </div>

    <div class="flex items-center gap-6">
        <!-- Date & Time -->
        <div id="datetime" class="text-sm text-gray-600 font-medium"></div>

        <!-- Profile -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center text-gray-600 hover:text-gray-800 focus:outline-none">
                <i class="bi bi-person-circle text-2xl"></i>
            </button>

            <!-- Profile Dropdown -->
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border z-50">
                <div class="p-4">
                    <div class="flex items-start gap-3">
                        <i class="bi bi-person-circle text-3xl text-gray-500"></i>
                        <div>
                            <div class="font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-600">{{ Auth::user()->position_name ?? 'Unknown Role' }}</div>
                            <div class="text-sm text-gray-400">
                                IP Address: {{ request()->ip() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-t px-4 py-2">
                    <a href="{{ route('profile.edit') }}"
                    class="block w-full text-center text-sm text-gray-700 font-medium py-2 rounded hover:bg-gray-100 transition">
                        View Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Logout -->
        <!-- <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="text-sm bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded shadow">
                Logout
            </button>
        </form> -->
    </div>
</nav>
