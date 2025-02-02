<x-app-layout>
    <h3>User Dashboard</h3>

    <p>User Name: <span id="username"></span></p>
    <p>User Email: <span id="email"></span></p>

    <div>
        <button onclick="logout()">Logout</button>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
       if('{{ Session::has("toast_warning") }}') {
            toastr.warning('{{ Session::get("toast_warning") }}');
       }
    });
    
    async function logout() {
        const res = await axios.post('/logout');
        if(res.status === 200 && res.data['status'] === 'success'){
            toastr.success(res.data['message']);
            setTimeout(() => {
                window.location.href = '{{ route("login") }}';
            }, 2000);
        }else{
            toastr.error(res.data['message']);
        }
    }
</script>