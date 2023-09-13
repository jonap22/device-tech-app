<!-- resources/js/components/PeopleList.vue -->
<template>
    <div class="container">
        <h1>People</h1>
        <a :href="createRoute" class="btn btn-primary mb-3">Create Person</a>
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
            <tr v-for="person in people" :key="person.id">
                <td>{{ person.name }}</td>
                <td>{{ person.last_name }}</td>
                <td>{{ person.id_number }}</td>
                <td>{{ decryptEmail(person.email) }}</td>
                <!-- Add more columns as needed -->
                <td>
                    <router-link :to="`/people/${person.id}`" class="btn btn-info">View</router-link>
                    <router-link :to="`/people/${person.id}/edit`" class="btn btn-warning">Edit</router-link>
                    <!-- Add a delete button with a form for each record if needed -->
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        people: Array, // Array of people data
        createRoute: String, // Route for creating a new person
    },
    methods: {
        decryptEmail(email) {
            // Add your email decryption logic here
            return email;
        },
    },
};
</script>

