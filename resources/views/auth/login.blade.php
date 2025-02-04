<x-guest-layout>
    <div class="flex flex-col items-center justify-between px-6 py-2 mx-auto md:h-screen">
        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 text-center">User Login</h3>

            <div class="relative z-0 w-full mb-6 group">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email Address">
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <!-- svg for key -->
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <!-- svg key path for password -->
                        <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" onclick="login()" class="btn-submit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                <a href="{{ route('forgot-password') }}" class="text-gray-300 text-sm hover:underline">Forgot Password?</a>
            </div>
        </div>
    </div>
</x-guest-layout>

<script>
    async function login() {
        const email = $('#email').val();
        const password = $('#password').val();

        if (email.length === 0) {
            toastr.error('Email is required');
        } else if (password.length === 0) {
            toastr.error('Password is required');
        } else {
            showLoader('.btn-submit')

            let res = await axios.post('/login', {
                email,
                password
            });

            hideLoader('.btn-submit');

            if (res.status === 200 && res.data['status'] === 'success') {
                toastr.success(res.data['message']);
                if (res.data['user']['role'] === 'admin') {
                    setTimeout(() => {
                        window.location.href = '{{ route("admin.dashboard") }}';
                    }, 2000);
                } else {
                    setTimeout(() => {
                        window.location.href = '{{ route("user.dashboard") }}';
                    }, 2000);
                }
            } else {
                toastr.error(res.data['message']);
            }
        }
    };
</script>