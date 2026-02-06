<!-- Top Navigation -->
<nav class="bg-white shadow-sm border-b border-gray-200 px-4 py-3  z-100">
    <div class="flex justify-between items-center  gap-4">
        <div class="flex items-center">
            <button id="sidebarToggle" class="text-gray-500 focus:outline-none md:hidden">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800 ml-4 capitalize">
                {{ str_replace('_', ' ', Request::segment(2) ?? 'Dashboard') }}
            </h1>
        </div>
        <div class="flex items-center space-x-4">
            <div class="relative hidden sm:flex items-center space-x-2 bg-rose-50 px-3 py-1.5 rounded-lg border border-rose-100" title="Session Timeout">
                <i class="fas fa-hourglass-half text-rose-500"></i>
                <span class="text-xs text-rose-600 font-medium mr-1">Session expires in:</span>
                <span id="session-timer" class="font-mono text-rose-700 font-bold">--:--:--</span>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Session lifetime in minutes to seconds
                    let timeLeft = {{ config('session.lifetime') }} * 60; 
                    
                    const timerDisplay = document.getElementById('session-timer');
                    const logoutForm = document.getElementById('logoutForm'); // Ensure this ID exists in your logout form

                    function formatTime(seconds) {
                        const h = Math.floor(seconds / 3600);
                        const m = Math.floor((seconds % 3600) / 60);
                        const s = seconds % 60;
                        return `${h.toString().padStart(2, '0')}:${m.toString().padStart(2, '0')}:${s.toString().padStart(2, '0')}`;
                    }

                    function updateTimer() {
                        if (timeLeft <= 0) {
                            timerDisplay.textContent = "00:00:00";
                            
                            // Perform logout via fetch to handle 419 (CSRF token mismatch) nicely
                            if (logoutForm) {
                                const formData = new FormData(logoutForm);
                                fetch(logoutForm.action, {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    }
                                })
                                .then(response => {
                                    // Whether success (200) or error (419/500), we redirect to login
                                    window.location.href = "{{ route('admin.login') }}";
                                })
                                .catch(error => {
                                    // Network error or other issue, still force redirect
                                    window.location.href = "{{ route('admin.login') }}";
                                });
                            } else {
                                window.location.href = "{{ route('admin.login') }}";
                            }
                            return;
                        }

                        timerDisplay.textContent = formatTime(timeLeft);
                        timeLeft--;
                    }

                    // Run immediately and then every second
                    updateTimer();
                    setInterval(updateTimer, 1000);
                });
            </script>
            <!-- <div class="relative block">
                <a href="{{ route('admin.notifications.index') }}"
                    class="text-gray-500 hover:text-gray-700 relative">
                    <i class="fas fa-bell text-xl"></i>
                    <span
                        class="absolute -top-1 -right-1 bg-rose-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">3</span>
                </a>
            </div> -->
            <div class="relative block">
                <div class="relative group">
                    <button
                        class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 admin-menu-toggle">
                        <div
                            class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                            {{ strtoupper(substr(Auth::guard('admin')->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <span>{{ Auth::guard('admin')->user()->name ?? 'Admin' }}</span>
                        <i class="fas fa-chevron-down text-sm"></i>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 py-2 z-50 hidden admin-menu">
                        <a href="{{ route('admin.settings.index') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <a href="{{ route('admin.settings.index') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                        <div class="border-t border-gray-200 my-2"></div>
                        <form method="POST" action="{{ route('admin.logout') }}" id="logoutForm">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-rose-600 hover:bg-rose-50">
                                <i class="fas fa-sign-out-alt mr-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
