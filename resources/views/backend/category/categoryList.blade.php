@extends('backend.layouts.master')
@section('dashboard_content')
    <div class="container-fluid" id="categoryBlock">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">Category List</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <button @click="openModal(null)" class="btn btn-primary">Add Category</button>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        {{--                        @foreach($categories as $key => $value)--}}
                        <tr v-for="(data, index) in dataList">
                            <th>@{{index+1}}</th>
                            <th>@{{data.category_name}}</th>
                            <th>@{{data.details}}</th>
                            <th>

                                <button type="button" class="btn btn-primary" @click="openModal(data)">
                                    Edit
                                </button>

                                <!-- The Modal -->
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Modal Heading</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form @submit.prevent="submitForm">
                                                    <div class="form-group">
                                                        <label>Category name</label>
                                                        <input v-model="formData.category_name" type="name"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Details</label>
                                                        <textarea v-model="formData.details"
                                                                  class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                        @click="showHideModal('myModal', 'hide')">Close
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <button @click="catDelete(data.id)" class="btn btn-danger">Delete</button>

                            </th>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script src="{{asset('backend/js/vue/vue.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var app = new Vue({
            el: '#categoryBlock',
            data: {
                message: 'Hello Vue!',
                dataList: {},
                formData: {},

            },

            props: {},

            watch: {},

            mounted() {
                this.getDataList();
                console.log(baseUrl);

            },

            created() {

            },

            methods: {
                getDataList() {
                    const _this = this;
                    axios.get(`${baseUrl}/api/categories_data`)
                        .then(function (response) {
                            console.log(response.data.result); // Log the data structure
                            _this.dataList = response.data.result;
                        })
                        .catch(function (error) {
                            console.error('Error fetching comments data:', error);
                        });
                },
                catDelete(catID) {
                    const _this = this;
                    axios.post(`${baseUrl}/api/categories_data/`+catID)
                        .then(function (response) {
                            _this.getDataList();
                        })
                        .catch(function (error) {
                            console.error('Error deleting comment:', error);
                        });
                },
                submitForm() {
                    const _this = this;
                    if (_this.formData.id) {
                        axios.put(`${baseUrl}/api/categories_data/`, _this.formData)
                            .then(function (response) {
                                _this.getDataList();
                                _this.showHideModal('myModal', 'hide');
                            })
                            .catch(function (error) {
                                console.error('Error deleting comment:', error);
                            });
                    } else {
                        axios.post(`${baseUrl}/api/categories_data/`, _this.formData)
                            .then(function (response) {
                                _this.getDataList();
                                _this.showHideModal('myModal', 'hide');
                            })
                            .catch(function (error) {
                                console.error('Error deleting comment:', error);
                            });
                    }

                },
                openModal(category) {
                    this.showHideModal('myModal', 'show')
                    if (category) this.formData = Object.assign({}, category);

                },
                showHideModal(id, status) {
                    $('#' + id).modal(status);
                    this.formData = {};
                },

            }

        })
    </script>

@endsection
