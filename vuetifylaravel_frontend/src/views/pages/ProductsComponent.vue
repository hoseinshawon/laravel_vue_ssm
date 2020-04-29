<template>
    <div class="container">
        <div class="mb-5 d-flex justify-content-between">
            <h1>Product Management System</h1>
            <button class="btn btn-danger" data-toggle="modal" data-target="#addNew">Add New Product</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sale Price</th>
                    <th scope="col">In Stock</th>
                    <th scope="col">Active</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="product in products" :key="product.id">
                    <th scope="row">{{ product.id }}</th>
                    <td>{{ product.title | upText }}</td>
                    <td>{{ product.description }}</td>
                    <td></td>
                    <td>{{ product.category }}</td>
                    <td>{{ product.price }}</td>
                    <td>{{ product.sale_price }}</td>
                    <td v-if="product.in_stock == 1">Yes</td><td v-else>No</td>
                    <td v-if="product.active == 1">Yes</td><td v-else>No</td>
                    <td>{{ product.created_at | myDate }}</td>
                    <td>{{ product.updated_at | myDate }}</td>
                    <td>
                        <v-icon small class="mr-2" data-toggle="modal" data-target="#update" @click="editModal(product)">mdi-pencil</v-icon>
                        <v-icon small @click="deleteProduct(product.id)">mdi-delete</v-icon>
                    </td>
                </tr>

            </tbody>
        </table>



        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNewLabel">Add New</h5>
                        <!--<h5 class="modal-title" id="addNewLabel">Update Product</h5>-->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="product.title" type="text" name="title" class="form-control" placeholder="Title">
                                </div>

                                <div class="form-group">
                                    <textarea v-model="product.description" type="text" name="description" class="form-control" placeholder="Description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="custom-select my-1 mr-sm-2" v-model="product.category" name="category" id="category">
                                        <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <input v-model="product.price" type="text" name="price" class="form-control" placeholder="Price">
                                </div>

                                <div class="form-group">
                                    <input v-model="product.sale_price" type="text" name="sale_price" class="form-control" placeholder="Sale Price">
                                </div>

                                <div class="form-group">
                                    <select name="in_stock" id="in_stock" v-model="product.in_stock" class="form-control">
                                        <option value="" selected>In Stock</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="active" id="active" v-model="product.active" class="form-control">
                                        <option value="" selected>Active</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" @click="createProduct">Create</button>
                        </div>
                </div>
            </div>
        </div>








        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateLabel">Update Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input v-model="product.title" type="text" name="title" class="form-control" placeholder="Title">
                                </div>

                                <div class="form-group">
                                    <textarea v-model="product.description" type="text" name="description" class="form-control" placeholder="Description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="custom-select my-1 mr-sm-2" v-model="product.category" name="category" id="category">
                                        <option v-for="category in categories" :key="category.id">{{ category.name }}</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <input v-model="product.price" type="text" name="price" class="form-control" placeholder="Price">
                                </div>

                                <div class="form-group">
                                    <input v-model="product.sale_price" type="text" name="sale_price" class="form-control" placeholder="Sale Price">
                                </div>

                                <div class="form-group">
                                    <select name="in_stock" id="in_stock" v-model="product.in_stock" class="form-control">
                                        <option value="" selected>In Stock</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select name="active" id="active" v-model="product.active" class="form-control">
                                        <option value="" selected>Active</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" @click="updateProduct">Update</button>
                        </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>


import axios from '../../axios';
import Swal from 'sweetalert2';
import $ from 'jquery';
import Vue from "vue"

window.Swal = Swal;


const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});


window.Toast = Toast;

const Fire = new Vue();



export default {
    data(){
        return {
            //editmode: false,
            selected: '',
            products: {},
            categories: {},
            product: {
                id: '',
                title: '',
                description: '',
                category: '',
                price: '',
                sale_price: '',
                in_stock: '',
                active: ''
            }
        }
    },


    methods: {
        updateProduct(){
            this.$Progress.start();

            axios.put('products/'+this.product.id)
            .then(() => {
                //$('#update').modal('hide');
                Swal.fire(
                    'Updated!',
                    'Product has been updated.',
                    'success'
                    )
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
            })
            .catch((err) => {
                console.log(err);
                this.$Progress.fail();
            })
        },











        //newModal(){
            //this.editmode = false;
            //$('#addNew').modal('show');
        //},

        editModal(product){
            $('#update').modal('show');
            this.product = product;
        },

        deleteProduct(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if(result.value){
                    axios.delete('products/'+id)
                    .then(() => {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                            Fire.$emit('AfterCreate');
                    })
                    .catch(() => {
                        Swal("Failed!", "There was something wrong.", "warning");
                    });
                }
            })
        },

        loadProducts(){
            axios.get('products', {})
            .then(res => {
                this.products = res.data.products
                this.categories = res.data.categories
            })
            .catch(err => {
                if(err.response.status == 401){
                    localStorage.removeItem('token');
                    this.$router.push('/login');
                }
            })
        },

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

        createProduct(){
            this.$Progress.start();
            axios.post('products', this.product)
            .then(() => {
                Fire.$emit('AfterCreate');
                $('#addNew').modal('hide')

                Toast.fire({
                    icon: 'success',
                    title: 'Product Uploaded successfully'
                })
                this.$Progress.finish();
            })
        }
    },

    mounted(){
        this.loadProducts();
        this.loadCategories();
        Fire.$on('AfterCreate', () => {
            this.loadProducts();
        });
    }
}
</script>


<style scoped>

</style>