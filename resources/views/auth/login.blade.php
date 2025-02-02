<x-guest-layout>
    <div style="margin: 0 auto; width: 50%;">
        <h3>User Login</h3>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div><br>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div><br>

        <div style="display: flex; justify-content: space-between;">
            <button type="submit" onclick="login()" class="btn-submit">Login</button>
            <a href="{{ route('forgot-password') }}">Forgot Password?</a>
            <a href="{{ route('register') }}">Don't have an account?</a>
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