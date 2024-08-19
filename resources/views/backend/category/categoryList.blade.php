@extends('backend.layouts.master')
@section('dashboard_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-left">
                <h1 class="h5 mb-2 text-gray-800">News List</h1>
            </div>
            <div class="col-md-6 text-right mb-2">
                <a href="{{route('category.create')}}" class="btn btn-primary">Add Category</a>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="categoryBlock" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            <tr v-for="data in dataList">
                                <th>{{0}}</th>
                                <th>@{{data.category_name}}</th>
                                <th>@{{data.details}}</th>
                                <th>
{{--                                    <a href="{{ route('category.edit', $value->id) }}"--}}
{{--                                       class="btn btn-primary me-3">edit</a>--}}

{{--                                    <form action="{{ route('category.destroy', $value->id) }}" method="POST" style="display:inline;">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>--}}
{{--                                    </form>--}}
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

            },

            props : {

            },

            watch: {

            },

            mounted() {
                this.getDataList()
            },

            created(){

            },

            methods: {
                getDataList(){
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
            }

        })
    </script>

@endsection
