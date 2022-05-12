<head>
    <title>Students</title>
    <link rel="stylesheet" href="/public/assets/css/loading.css">
</head>


<body>
<div class="container">
    <table class="table">
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
        <tbody class="student-table-body position-relative"></tbody>
    </table>
</div>

</body>

<script src="/public/assets/js/loader.js"></script>
<script>
    TableLoader('student-table-body'); // Load the loader animation
    $(`.student-table-body`).load('/api/v1/students'); // Load the data
</script>


