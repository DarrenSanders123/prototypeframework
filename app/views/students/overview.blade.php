<body>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Address</th>
        <th>Zip and City</th>
        <th>State</th>
        <th>Country</th>
        <th>Role</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
        <tr>
            <td>{{ $student->StudentId }}</td>
            <td>{{ $student->StudentName }}</td>
            <td>{{ $student->StudentEmail }}</td>
            <td>{{ $student->StudentMobile }}</td>
            <td>{{ $student->Street }} {{$student->HouseNr}}</td>
            <td>null {{ $student->City }}</td>
            <td>{{ $student->State }}</td>
            <td>{{ $student->Country }}</td>
            <td>{{ $student->RoleName }}</td>
            <td>{{ $student->UpdatedAt }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
</body>



