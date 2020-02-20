<table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applicants as $user)
            <tr>
                <td>{{ $user->firstname." ".$user->lastname }}</td>
                <td>{{ $user->lastname }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>