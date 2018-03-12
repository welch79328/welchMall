@extends('layouts.backstage.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首頁</a> &raquo; 商品管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>修改商品</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $erroe)
                            <p>{{$erroe}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/commdity/create')}}"><i class="fa fa-plus"></i>添加商品</a>
                <a href="{{url('admin/commodity')}}"><i class="fa fa-recycle"></i>全部商品</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/commodity'.$commodity->commodity_id)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120">分類：</th>
                        <td>
                            <select name="cate_id">
                                @foreach($data as $v)
                                <option value="{{$v->cate_id}}">{{$v->_cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>標題：</th>
                        <td>
                            <input type="text" class="lg" name="commodity_title" value="{{$commodity->commodity_title}}">
                        </td>
                    </tr>

                    <tr>
                        <th>副標題：</th>
                        <td>
                            <input type="text" class="sm" name="commodity_subtitle" value="{{$commodity->commodity_subtitle}}">
                        </td>
                    </tr>


                    <tr>
                        <th>大圖：</th>
                        <td>
                            <img src="" alt="" id="comm_cover_img" style="max-height: 200px; max-width: 350px;" value="{{$commodity->commodity_image}}">
                            <input type="text" id="commodity_image" size="50" name="commodity_image">
                            <input id="file_upload" name="file_upload" type="file">
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                            <script src="{{asset('org/uploadifive/jquery.uploadifive.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('org/uploadifive/uploadifive.css')}}">
                            <script type="text/javascript">
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload').uploadifive({
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'uploadScript' : '{{url('admin/upload')}}',
                                        'onUploadComplete' : function(file, data) {
//                                            data = data.slice(0,29);
                                            $('input[name = commodity_image]').val(data);
                                            $('#comm_cover_img').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadifive{display:inline-block;}
                                .uploadifive-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadifive-button-text{color: #FFFFFF; margin: 0;}
                            </style>
                        </td>
                    </tr>

                    <tr>
                        <th>縮略圖：</th>
                        <td>
                            <img src="" alt="" id="art_thumb_img" style="max-height: 200px; max-width: 350px;" value="">
                            <input type="text" id="image" size="50" name="image">
                            <input id="file_upload1" name="file_upload1" type="file">
                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                            <script src="{{asset('org/uploadifive/jquery.uploadifive.js')}}" type="text/javascript"></script>
                            <link rel="stylesheet" type="text/css" href="{{asset('org/uploadifive/uploadifive.css')}}">
                            <script type="text/javascript">
                                var x = [];
                                <?php $timestamp = time();?>
                                $(function() {
                                    $('#file_upload1').uploadifive({
                                        'formData'     : {
                                            'timestamp' : '<?php echo $timestamp;?>',
                                            '_token'     : '{{csrf_token()}}'
                                        },
                                        'uploadScript' : '{{url('admin/upload')}}',
                                        'onUploadComplete' : function(file, data) {
                                            x.push(data);
                                            $('#image').val(x);
                                            $('#art_thumb_img').attr('src','/'+data);
                                        }
                                    });
                                });
                            </script>
                            <style>
                                .uploadifive{display:inline-block;}
                                .uploadifive-button{border:none; border-radius:5px; margin-top:8px;}
                                table.add_tab tr td span.uploadifive-button-text{color: #FFFFFF; margin: 0;}
                            </style>
                        </td>
                    </tr>

                    <tr>
                        <th>定價：</th>
                        <td>
                            <input type="text" class="lg" name="commodity_price" value="{{$commodity->commodity_price}}">
                        </td>
                    </tr>

                    <tr>
                        <th>狀態：</th>
                        <td>
                            <input type="radio" name="commodity_status" value="上架" checked >上架
                            <input type="radio" name="commodity_status" value="下架" >下架
                        </td>
                    </tr>

                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="commodity_description">{{$commodity->commodity_description}}</textarea>
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection