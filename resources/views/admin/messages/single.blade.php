@extends('admin.layouts.app')
@section('title','View Message')
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
                    <h3>View Message</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Inbox</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!-- CONTENT MAIL -->
                            <div>
                                <div class="inbox-body">
                                    <div class="mail_heading row">
                                        <div class="col-md-8">
                                            <div class="btn-group">
                                                <a class="btn btn-sm btn-primary" type="button" href="{{route('messages.index')}}"><i class="fa fa-reply"></i> Back</a>
                                                <form action="{{route('messages.delete',$message['id'])}}"
                                                      method="post" style="float: left">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}

                                                    <button class="btn btn-sm btn-default" type="submit" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-right">
                                            <p class="date"> {{$message->created_at}}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <h4>{{$message->subject}}</h4>
                                        </div>
                                    </div>
                                    <div class="sender-info">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <strong>{{$message->name}}</strong>
                                                <span>({{$message->email}})</span> to
                                                <strong>{{$settings['website_name']}}</strong>
                                                <a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="view-mail">
                                        <p>{{$message->body}} </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>
                            <!-- /CONTENT MAIL -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection