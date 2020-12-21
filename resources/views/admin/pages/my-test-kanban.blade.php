@extends('layouts.admin')
@section('pagePluginStyle')

    <link rel="stylesheet"
          href="{{asset('backend/libs/@fortawesome/fontawesome-free/css/all.min.css')}}"><!-- Purpose CSS -->
    {{--<link rel="stylesheet" href="../../assets/css/purpose.css" id="stylesheet">--}}
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css"
          integrity="sha512-49xW99xceMN8dDoWaoCaXvuVMjnUctHv/jOlZxzFSMJYhqDZmSF/UnM6pLJjQu0YEBLSdO1DP0er6rUdm8/VqA=="
          crossorigin="anonymous"/>
@endsection
@section('pageLevelStyle')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <style>

        .kanban_avatar img{
            margin-top: 0;
        }
    </style>

@endsection

@section('content')


    <div class="modal fade" id="add_blacklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Blacklist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_holiday_form" id="add_holiday_form">
                                        @csrf
                                        <fieldset>

                                            <div class="form-group">
                                                <label for="company_name">Blacklist Label</label>
                                                <input id="blLabelId" class="form-control" name="blLabel"
                                                       type="text"
                                                       placeholder="Enter Blacklist Label" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="company_name">Blacklist Title</label>
                                                <input id="blTitleId" class="form-control" name="blTitle"
                                                       type="text"
                                                       placeholder="Enter Blacklist Title" required>
                                            </div>
                                            <input type="hidden" name="blackList" id="blackListId">

                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="add_todo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" data-backdrop="false">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New ToDo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div style="border: none" class="card">
                        <div class="card-title">
                            <div class="preview"><i class="" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- create / add submit form -->
                                    <form method="post" name="add_todo_form" id="add_todo_form">
                                        @csrf
                                        <fieldset>

                                            <div class="form-group">
                                                <label for="company_name">ToDo Label</label>
                                                <input id="blLabelId" class="form-control" name="blLabel"
                                                       type="text"
                                                       placeholder="Enter Blacklist Label" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="company_name">ToDo Title</label>
                                                <input id="blTitleId" class="form-control" name="blTitle"
                                                       type="text"
                                                       placeholder="Enter Blacklist Title" required>
                                            </div>
                                            <input type="hidden" name="toDoList" id="toDoListId">

                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="card overflow-hidden">
        <div class="container-kanban">
            <div id="drag-elements" class="kanban-board" data-toggle="dragula"
                 data-containers='["kanban-blacklist", "kanban-to-do", "kanban-in-progress", "kanban-testing", "kanban-done"]'>

                <div class="kanban-col px-0">
                    <div class="card-list card-list-flush">
                        <div class="card-list-title row align-items-center mb-3">
                            <div class="col">
                                <h6 class="mb-0">Blacklist</h6>
                            </div>
                            <div class="col text-right">
                                <div class="actions">
                                    <a class="action-item mr-2" href="#add_blacklist" data-toggle="modal"><i
                                                class="fas fa-plus"></i></a>
                                    <div class="dropdown" data-toggle="dropdown">
                                        <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Refresh</a>
                                            <a href="#" class="dropdown-item">Manage Widgets</a>
                                            <a href="#" class="dropdown-item">Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-list-body" id="kanban-blacklist">

                            @foreach($lists as $list)
                                <div id="{{$list->id}}" class="card card-progress draggable-item border shadow-none">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-2">
                                            <div class="col-6">
                                                <span class="badge badge-pill badge-xs badge-success">{{$list->label}}</span>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span class="text-sm">70%</span>
                                            </div>
                                        </div>
                                        <a class="h6" href="#modal-task-view" data-toggle="modal">{{$list->title}}</a>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <div class="actions d-inline-block">
                                                    <div class="action-item mr-2">
                                                        <i class="fas fa-paperclip mr-2"></i>4
                                                    </div>
                                                    <div class="action-item mr-3">
                                                        <i class="fas fa-comment-alt mr-2"></i>6
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 text-right">
                                                <a href="#" class="avatar avatar-sm rounded-circle m-0 kanban_avatar">
                                                    {{--<img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg">--}}
                                                    <img alt="Image placeholder" src="https://i.pravatar.cc/800*800">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="kanban-col px-0">
                    <div class="card-list card-list-flush">
                        <div class="card-list-title row align-items-center mb-3">
                            <div class="col">
                                <h6 class="mb-0">To do</h6>
                            </div>
                            <div class="col text-right">
                                <div class="actions">
                                    <a class="action-item mr-2" href="#add_todo" data-toggle="modal"><i
                                                class="fas fa-plus"></i></a>
                                    <div class="dropdown" data-toggle="dropdown">
                                        <a href="#" class="action-item" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Refresh</a>
                                            <a href="#" class="dropdown-item">Manage Widgets</a>
                                            <a href="#" class="dropdown-item">Settings</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-list-body" id="kanban-to-do">

                            @foreach($todos as $todo)

                                <div id="{{$todo->id}}" class="card card-progress draggable-item border shadow-none">
                                    <div class="card-body">
                                        <div class="row align-items-center mb-2">
                                            <div class="col-6">
                                                <span class="badge badge-pill badge-xs badge-success">{{$todo->label}}</span>
                                            </div>
                                            <div class="col-6 text-right">
                                                <span class="text-sm">70%</span>
                                            </div>
                                        </div>
                                        <a class="h6" href="#modal-task-view" data-toggle="modal">{{$todo->title}}</a>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <div class="actions d-inline-block">
                                                    <div class="action-item mr-2">
                                                        <i class="fas fa-paperclip mr-2"></i>4
                                                    </div>
                                                    <div class="action-item mr-3">
                                                        <i class="fas fa-comment-alt mr-2"></i>6
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 text-right">
                                                <a href="#" class="avatar avatar-sm rounded-circle m-0 kanban_avatar">
                                                    {{--<img alt="Image placeholder" src="../../assets/img/theme/light/team-1-800x800.jpg">--}}
                                                    <img style="" alt="Image placeholder" src="https://i.pravatar.cc/800*800">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


<!-- Start of js plugin -->
@section('pagePluginScript')

    {{--    <script src="{{asset('backend/js/main_purpose_core.core.js')}}"></script>--}}
    <!-- Page JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"
            integrity="sha512-T1BAtwCRE7TI7k5m9Pd8El1ARLK06yBaFEHsiIX8JXTtS8wQ5fBknAeLsDrYD3I0UJEwhUgIlugLUOc1nRXUVA=="
            crossorigin="anonymous"></script>
    {{--    <script src="{{asset('backend/libs/dragula/dist/dragula.min.js')}}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('backend/libs/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('backend/libs/autosize/dist/autosize.min.js')}}"></script>
    {{--<script src="{{asset('backend/libs/dropzone/dist/min/dropzone.min.js')}}"></script>--}}
    <!-- Purpose JS -->
    {{--    <script src="{{asset('backend/js/main_prupose.js')}}"></script>--}}

@endsection
<!-- End plugin js for this page -->

<!-- Custom js for this page-->
@section('pageLevelScript')
    <script type="text/javascript">

        // $(document).ready(function (e) {
        //     // e.preventDefault();
        //
        //     blackListItem();
        //
        // });


        var config = {
            routes: {

                my_test: "{!! route('demo-kanban.load') !!}",
                update_test: "{!! route('demo-kanban.update') !!}",
                demo_store: "{!! route('demo-kanban.post') !!}",



            }
        };

        // $(function () {
        //     blackListItem();
        //     // $('fc-row fc-week fc-widget-content').css('height',"69px");
        //
        //
        // });
        $(document).on('submit', '#add_holiday_form', function (event) {
            event.preventDefault();

            // alert('I am here');
            $.ajax({
                url: config.routes.demo_store,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.id != "") {
                        // toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
                        console.log(data);
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 2000,
                            "timeOut": 2000,
                            "extendedTimeOut": 2000
                        };
                        blackListItem();
                        toastr.success('Information was Created successfully');

                        setTimeout(function () {
                            $('#add_blacklist').modal('hide');
                        }, 1500);
                        $('#add_holiday_form').trigger('reset');

                    } else {
                        alert("Failed to store");
                    }
                }
            })
        });



        $(document).on('submit', '#add_todo_form', function (event) {
            event.preventDefault();

            // alert('I am here');
            $.ajax({
                url: config.routes.demo_store,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.id != "") {
                        // toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
                        console.log(data);
                        toastr.options = {
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "fadeIn": 300,
                            "fadeOut": 2000,
                            "timeOut": 2000,
                            "extendedTimeOut": 2000
                        };
                        blackListItem();
                        toastr.success('Information was Created successfully');

                        setTimeout(function () {
                            $('#add_todo').modal('hide');
                        }, 1500);
                        $('#add_todo_form').trigger('reset');

                    } else {
                        alert("Failed to store");
                    }
                }
            })
        });
        function blackListItem() {
            // $(document).ready(function () {
                // put Ajax here.
                $.ajax({
                    url: config.routes.my_test,
                    type: "get",
                    // data: {
                    //     id: id,
                    //     type: type,
                    // },

                    success: function (data) {

                        $('#kanban-blacklist').html(data.items);
                        $('#kanban-to-do').html(data.toDoItems);


                    }
                });


            // });
        }

        // var drake = Dragula();
        // var drake = dragula();
        $(document).ready(function (el) {

            var drake = dragula({
                containers: [document.querySelector('#kanban-blacklist'), document.querySelector('#kanban-to-do')],
                dragging: true
            });
            //
            // console.log(drake);
            drake.on('drop', function (el,target,source) {
                // var parentElId = $(el).parent().attr('id');
                const targetID = $(target).attr("id");
                const sourceId = $(source).attr("id");

                // var droppedElIndex = $(el).index();

                // console.log(sourceId,targetID);
                // var droppedElId = $(el).attr('id');

                if(sourceId === targetID){
                  var droppedElId = null;
                }else {
                    droppedElId = $(el).attr('id');
                    $.ajax({
                        url: config.routes.update_test,
                        method: 'GET',
                        data: {ids: droppedElId},
                        success: function () {
                            alert("updated");

                            // $('#kanban-blacklist').append(data.items);
                        }
                    })
                }

                // $.ajax({
                //     url: config.routes.update_test,
                //     method: 'GET',
                //     data: {ids: droppedElId},
                //     success: function () {
                //         alert("updated");
                //
                //         // $('#kanban-blacklist').append(data.items);
                //     }
                // })
            });

        });




    </script>
@endsection
<!-- End custom js for this page-->
