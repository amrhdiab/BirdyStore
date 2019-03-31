@extends('admin.layouts.app')
@section('title','Messages')
@section('styles')
    <!-- Toastr -->
    <link href="{{asset('vendors/toastr/toastr.min.css')}}" rel="stylesheet">
    <style>
        .active_message{
            background-color: lightgrey;
        }
    </style>
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
                                <div class="col-sm-3 mail_list_column">
                                    @if(count($messages) > 0)
                                        @foreach($messages as $message)
                                            <a href="{{route('messages.index',$message['id']),app('request')->input('page')}}">
                                                <div class="mail_list @if($message['id']==$active['id']) active_message @endif ">
                                                    @if($message['is_read']==0)
                                                    <div class="left">
                                                        <i class="fa fa-circle"></i>
                                                    </div>
                                                    @else
                                                    <div class="left">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                    @endif
                                                    <div class="right">
                                                        <h3>{{$message['name']}}
                                                            <small>{{$message->created_at->diffForHumans()}}</small>
                                                        </h3>
                                                        <p>{{substr($message['body'],0,100)}}...</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                        {{$messages->links()}}
                                    @else
                                        <div class="mail_list">
                                            <div>
                                                <h3>Inbox Empty</h3>
                                                <p>There are no messages to show..</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!-- /MAIL LIST -->

                                <!-- CONTENT MAIL -->
                                <div class="col-sm-9 mail_view">
                                    <div class="inbox-body">
                                        <div class="mail_heading row">
                                            <div class="col-md-8">
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-primary" type="button"><i
                                                                class="fa fa-trash-o"></i> Reply
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <p class="date"> {{$active['created_at']}}</p>
                                            </div>
                                            <div class="col-md-12">
                                                <h4>{{$active['subject']}}</h4>
                                            </div>
                                        </div>
                                        <div class="sender-info">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>{{$active['name']}}</strong>
                                                    <span>({{$active['email']}})</span> to
                                                    <strong>{{$settings['website_name']}}</strong>
                                                    <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="view-mail">
                                            <p>{{$active['body']}}</p>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-primary" type="button"><i
                                                        class="fa fa-reply"></i> Reply
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                <!-- /CONTENT MAIL -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection

@section('vendors')
    <!-- Toastr Notifications -->
    <script src="{{asset('vendors/toastr/toastr.min.js')}}"></script>
@endsection

@section('scripts')
@endsection