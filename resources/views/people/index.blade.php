<div class="container">
    <h1>People</h1>
    <a href="{{ route('people.create') }}" class="btn btn-primary mb-3">Create Person</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>ID Number</th>
            <th>Email</th>
            <!-- Add more columns as needed -->
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($people as $person)
            <tr>
                <td>{{ $person->name }}</td>
                <td>{{ $person->last_name }}</td>
                <td>{{ $person->id_number }}</td>
                <td>{{ Crypt::decryptString($person->email) }}</td>
                <!-- Add more columns as needed -->
                <td>
                    <a href="{{ route('people.show', ['person' => $person->id]) }}" class="btn btn-info">View</a>
                    <a href="{{ route('people.edit', ['person' => $person->id]) }}" class="btn btn-warning">Edit</a>
                    <!-- Add a delete button with a form for each record if needed -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


