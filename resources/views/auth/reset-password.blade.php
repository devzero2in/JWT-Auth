<x-guest-layout>
    <div class="flex flex-col items-center justify-between px-6 py-2 mx-auto md:h-screen">
        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 text-center">Reset Password</h3>

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
            <div class="relative z-0 w-full mb-6 group">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <!-- svg for key -->
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <!-- svg key path for password -->
                        <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirm Password">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" onclick="resetPassword()" class="btn-submit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reset Password</button>
            </div>
        </div>
    </div>
</x-guest-layout>

<script>
    async function resetPassword() {
        const password = $('#password').val();
        const password_confirmation = $('#password_confirmation').val();

        if (password.length === 0) {
            toastr.error('Password is required');
        } else if (password != password_confirmation) {
            toastr.error('Password does not match');
        } else {
            showLoader('.btn-submit');

            let res = await axios.post('/reset-password', {
                password,
                // password_confirmation,
                email: sessionStorage.getItem('email')
            });

            hideLoader('.btn-submit');

            if (res.status === 200 && res.data['status'] === 'success') {
                toastr.success(res.data['message']);
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = '{{ route("login") }}';
                }, 2000);
            } else {
                toastr.error(res.data['message']);
            }
        }
    }
</script>