<!DOCTYPE html>
<html lang="english">
<head>
    <meta charset="utf-8" />
    <title>@yield('page_title') | Dashboard V1</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content name="description" />
    <meta content name="author" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom_css.css') }}" rel="stylesheet" />
    {{-- https://www.bootdey.com/snippets/view/new-customer-list --}}
    <style>
        body {
            background: rgb(131, 58, 180);
            background: linear-gradient(90deg, rgba(131, 58, 180, 1) 0%, rgba(245, 46, 46, 1) 78%, rgba(252, 176, 69, 1) 100%);
        }
        a.btn {
            margin-bottom: 22px;
        }
    </style>
</head>

<body>
    <div class="container border-5">
        <div class="row">

            <div class="col-12 mb-3 mb-lg-5" style="background-color: white">
                <div class="overflow-hidden card table-nowrap table-card">
                    <a href="{{ url('/mod_form') }}" class="btn btn-primary ml-auto mb-3">Add User</a>
                    <a class="btn btn-success ml-auto mb-3" data-toggle="modal" data-target="#exampleModal">Calculate
                        Distance</a>
                    <a class="btn btn-warning ml-auto mb-3" data-toggle="modal" data-target="#AudioModal">Audio
                        Length</a>
                    <div class="card-header d-flex justify-content-between align-items-center">

                    </div>
                    <?php
                    // print_r($errors->all());
                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";
                    // $user = array();
                    ?>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile no</th>
                                    <th>Created Date</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $val)
                                    <tr class="align-middle">
                                        <td class="order_id_btn">
                                            <div class="d-flex align-items-center {{ $val->profile_photo_path }}">
                                                {{-- <img width="100px" src="{{asset('storage/media/banner/'.$list->image)}}"/> --}}
                                                <img src="{{ asset('storage/image/' . $val->profile_photo_path) }}"
                                                    class="avatar sm rounded-pill me-3 flex-shrink-0" alt="Customer">
                                                <div>
                                                    <div class="h6 mb-0 lh-1">{{ $val->name }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $val->email }}</td>
                                        <td>{{ $val->mobile }}</td>
                                        <td>{{ $val->created_at }}</td>
                                        <td>
                                            <a href="<?= url('/moduser/' . $val->id) ?>"
                                                class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?= url('/delete/' . $val->id) ?>"
                                                onclick="return confirm('Are you sure want to Delete')"
                                                class="btn btn-primary btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>

</html>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Find Distance by Latitude and Longitude</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  
            </div>
            <div class="modal-body">
                <div class="">
                    <label for="validation">From Distance</label>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Latitude</label>
                            <input type="text" id="from_lat" class="form-control" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Longitude</label>
                            <input type="email" id="from_long" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <label for="validation">To Distance</label>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer02">Latitude</label>
                        <input type="text" id="to_lat" class="form-control" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationServer02">Longitude</label>
                        <input type="text" id="to_long" class="form-control" value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="validationServer02">Total distance</label>
                        <input type="text" id="distance" readonly class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="calc_distance(this)">Calculate</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="AudioModal" tabindex="-1" role="dialog" aria-labelledby="AudioModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AudioModalLabel">Find Audio Length</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    {{-- <label for="validation">Find Audio Length</label> --}}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Upload Audio</label>
                            <input type="file" id="audioInput" accept="audio/*" class="form-control"
                                value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationServer02">Total Length</label>
                            <input type="text" id="audioLength" readonly class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                        onclick="get_audio_length(this)">Calculate</button>
                </div>
            </div>
        </div>
    </div>
