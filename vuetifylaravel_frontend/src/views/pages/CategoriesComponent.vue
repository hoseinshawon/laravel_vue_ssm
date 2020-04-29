<template>
    <div class="container">
        <div class="mb-5 d-flex justify-content-between">
            <h1>Category Management System</h1>
            <button class="btn btn-danger" data-toggle="modal" data-target="#addNew">Add New Category</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Parent Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="category in categories" :key="category.id">
                    <th scope="row">{{ category.id }}</th>
                    <td>{{ category.parent_id }}</td>
                    <td>{{ category.name }}</td>
                    <td>{{ category.banner }}</td>
                    <td>{{ category.created_at }}</td>
                    <td>{{ category.updated_at }}</td>
                    <td>
                        <v-icon small class="mr-2">mdi-pencil</v-icon>
                        <v-icon small>mdi-delete</v-icon>
                    </td>
                </tr>

            </tbody>
        </table>



        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Add New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="category.name" type="text" name="name" class="form-control" placeholder="Category">
                                </div>

                                <div class="form-group">
                                    <select class="custom-select my-1 mr-sm-2" v-model="category.parent_category" name="parent_category" id="inlineFormCustomSelectPref">
                                        <option value="" selected>Select Parent Category</option>
                                        <option v-for="category in categories" :key="category.id" v-bind:value="category.id">{{ category.name }}</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" @click="createCategory">Create</button>
                        </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>

import axios from '../../axios';

export default {
    data(){
        return {
            categories: {},
            category: {
                name: '',
                parent_category: ''
            }
        }
    },


    methods: {
        loadCategories(){
            axios.get('categories', {})
            .then(res => {
                this.categories = res.data.categories
            })
            .catch(err => {
                if(err.response.status == 401){
                    localStorage.removeItem('token');
                    this.$router.push('/login');
                }
            })
        },

        createCategory(){
            axios.post('categories', this.category)
            .then((res) => {
                console.log(res);
            })
            .catch((error) => {
                console.log(error);
            })
        }
    },

    mounted(){
        this.loadCategories();
    }
}
</script>


<style scoped>

</style>