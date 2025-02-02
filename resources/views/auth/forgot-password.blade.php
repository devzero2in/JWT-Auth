<x-guest-layout>
    <div style="margin: 0 auto; width: 50%;">
        <h3>Forgot Password</h3>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div><br>

        <div style="display: flex; justify-content: space-between;">
            <button type="submit" onclick="sendOTP()" class="btn-submit">Send OTP</button>
            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </div>
</x-guest-layout>

<script>
    async function sendOTP() {
        const email = $('#email').val();

        if(email.length === 0){
            toastr.error('Email is required');
        }else{
            showLoader('.btn-submit');

            let res = await axios.post('/forgot-password', {
                email
            });

            hideLoader('.btn-submit');

            if(res.status === 200 && res.data['status'] === 'success'){
                toastr.success(res.data['message']);
                sessionStorage.setItem('email', email);
                setTimeout(() => {
                    window.location.href = '{{ route("verify-otp") }}';
                }, 2000);
            }else{
                toastr.error(res.data['message']);
            }
        }
    }
</script>