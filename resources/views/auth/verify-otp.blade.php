<x-guest-layout>
    <!-- <div style="margin: 0 auto; width: 50%;">
        <h3>Verify OTP</h3>

        <div>
            <label for="otp">OTP</label>
            <input type="text" name="otp" id="otp">
        </div><br>

        <div style="display: flex; justify-content: space-between;">
            <button type="submit" onclick="verifyOTP()" class="btn-submit">Verify</button>
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </div> -->

    <div class="flex flex-col items-center justify-between px-6 py-2 mx-auto md:h-screen ">
        <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4 text-center">Verify OTP</h3>

            <div class="relative mb-6">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <!-- OTP [one time password] SVG icon -->
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <input type="text" id="otp" name="otp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter OTP" maxlength="6">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" onclick="verifyOTP()" class="btn-submit btn-primary">Verify OTP</button>
            </div>
        </div>
    </div>
</x-guest-layout>

<script>
    async function verifyOTP() {
        const otp = $('#otp').val();

        if(otp.length === 0){
            toastr.error('OTP is required');
        }else{
            showLoader('.btn-submit');

            let res = await axios.post('/verify-otp', {
                otp,
                email: sessionStorage.getItem('email')
            });

            hideLoader('.btn-submit');

            if(res.status === 200 && res.data['status'] === 'success'){
                toastr.success(res.data['message']);
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = '{{ route("reset-password") }}';
                }, 2000);
            }else{
                toastr.error(res.data['message']);
            }
        }
    }
</script>