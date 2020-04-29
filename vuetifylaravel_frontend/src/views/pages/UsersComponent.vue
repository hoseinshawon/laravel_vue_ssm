<template>
    <div class="container">
        <div class="mb-5 d-flex justify-content-between">
            <h1>User Management System</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <!--<th scope="col">Role</th>
                    <th scope="col">Email Verified At</th>-->
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="user in users" :key="user.id">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <!--<td>{{ user.role.name }}</td>
                    <td>{{ user.email_verified_at }}</td>-->
                    <td>{{ user.created_at }}</td>
                    <td>{{ user.updated_at }}</td>
                    <td>
                        <v-icon small class="mr-2">mdi-pencil</v-icon>
                        <v-icon small>mdi-delete</v-icon>
                    </td>
                </tr>

            </tbody>
        </table>


    </div>
</template>

<script>

import axios from '../../axios';

export default {
    data(){
        return {
            users: {}
        }
    },


    methods: {
        loadUsers(){
            axios.get('users', {})
            .then(res => {
                this.users = res.data.users
            })
            .catch(err => {
                if(err.response.status == 401){
                    localStorage.removeItem('token');
                    this.$router.push('/login');
                }
            })
        },

        createUser(){
            axios.post('users', this.users);
        }
    },

    mounted(){
        this.loadUsers();
    }
}
</script>


<style scoped>

</style>