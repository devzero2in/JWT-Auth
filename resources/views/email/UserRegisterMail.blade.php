<div>
    <div>
        <h1>New User Registration</h1>
        <p>Hello, {{ $user->username }}</p>
        <p>You have been registered with the following details</p>
        <ul>
            <li>Name: {{ $user->username }}</li>
            <li>Email: {{ $user->email }}</li>
        </ul>
        <p>Thank you</p>
        <p>Team JWTAUTH</p>
    </div>
</div>