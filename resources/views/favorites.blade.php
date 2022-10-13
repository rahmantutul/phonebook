@extends('layouts.master')
@push('css')
    
@endpush
@section('content')
<div class="body-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-1 col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col col-sm-3 col-xs-12 d-flex add-button">
                                <h4 class="title"><strong>CONTACTS</strong></h4>
                                <a href="{{ route('contact.add') }}" class="btn btn-success btn-sm ml-5"> <i class="fa fa-plus"></i>
                                    ADD NUMBER</a>
                            </div>
                            <div class="col-sm-9 col-xs-12 text-right">
                                <div class="btn_group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" id="search_input">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive" id="search_contact">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Favorite</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Mobile No:</th>
                                    <th>email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('contact-ajax-data')
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                {!! $contacts->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
    <script>
        $(document).ready(function(){
            function fetch_data(search=""){
                $.ajax({
                type:'get',
                url:'/home?search='+search,
                success:function(resp){
                    $('#search_contact').html(resp);
                    }
                });
            }
            $(document).on('keyup','#search_input',function(){
                var search =$("#search_input").val();
                fetch_data(search);
            });
        });
    </script>
@endpush