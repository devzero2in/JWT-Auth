<x-guest-layout>
    <div style="margin: 0 auto; width: 50%;">
        <h3>Verify OTP</h3>

        <div>
            <label for="otp">OTP</label>
            <input type="text" name="otp" id="otp">
        </div><br>

        <div style="display: flex; justify-content: space-between;">
            <button type="submit" onclick="verifyOTP()" class="btn-submit">Verify</button>
            <a href="{{ route('login') }}">Already have an account?</a>
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