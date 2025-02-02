<x-guest-layout>
<div style="margin: 0 auto; width: 50%;">
    <h3>Reset Password</h3>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div><br>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div><br>

    <div>
        <button type="submit" onclick="resetPassword()" class="btn-submit">Reset Password</button>
    </div>
</div>
</x-guest-layout>

<script>
    async function resetPassword() {
        const password = $('#password').val();
        const password_confirmation = $('#password_confirmation').val();

        if(password.length === 0){
            toastr.error('Password is required');
        }else if(password != password_confirmation){
            toastr.error('Password does not match');
        }else{
            showLoader('.btn-submit');

            let res = await axios.post('/reset-password', {
                password,
                // password_confirmation,
                email: sessionStorage.getItem('email')
            });

            hideLoader('.btn-submit');

            if(res.status === 200 && res.data['status'] === 'success'){
                toastr.success(res.data['message']);
                sessionStorage.clear();
                setTimeout(() => {
                    window.location.href = '{{ route("login") }}';
                }, 2000);
            }else{
                toastr.error(res.data['message']);
            }
        }
    }
</script>
