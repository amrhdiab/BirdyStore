@extends('admin.layouts.app')
@section('title','Messages')
@section('styles')
    <!-- Toastr -->
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>All Messages
                        <small>Visitors messages</small>
                    </h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Inbox
                                <small>Website Mail</small>
                            </h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <table class="table table-responsive table-hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Subject</th>
                                        <th>Sender</th>
                                        <th>Email</th>
                                        <th>Sent at</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    @if(count($allMessages) > 0)
                                        <tbody>
                                        @foreach($allMessages as $message)
                                            <tr>
                                                <td>
                                                    @if($message['is_read']==1)
                                                        <i class="fa fa-check"></i>
                                                    @else
                                                        <i class="fa fa-circle"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('messages.single',$message['id'])}}">{{$message['subject']}}</a>
                                                </td>
                                                <td>{{$message['name']}}</td>
                                                <td>{{$message['email']}}</td>
                                                <td>{{$message['created_at']}}</td>
                                                <td>
                                                    <form action="{{route('messages.delete',$message['id'])}}"
                                                          method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-xs btn-danger"
                                                                name="submit">
                                                            <i class="fa fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <br>
                                                No Messages found.
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                                {{$allMessages->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendors')
    <!-- Toastr Notifications -->
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
@endsection

@section('scripts')
@endsection