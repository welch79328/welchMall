@extends('layouts.frontend.frontend')

@section('title', 'Free AD Wifi Mall 購物車')

@section('content')
    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h2>訂單查詢({{count($cart)}})</h2>
            <div style="margin-top: 20px">
                <form action="{{url('')}}" method="post">
                {{csrf_field()}}
                <!-- Table -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th> 產品</th>
                            <th> 數量</th>
                            <th> 單價</th>
                            <th> 操作</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($cart as $v)
                            <tr>
                                <td>
                                    <p><strong> {{$v->name}} </strong></p>
                                </td>
                                <td>
                                    <input type="number" min="1" value="{{$v->qty}}"
                                           onchange="changeAmount(this, '{{$v->rowId}}')">
                                </td>
                                <td>${{$v->price}}</td>
                                <td>
                                    <a href="{{url('shopping/remove/'.$v->rowId)}}">删除</a>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>${{$total}}</td>
                            <td></td>
                        </tr>
                    </table>
                    <div style="text-align: right">
                        <input type="submit" class="btn btn-info" value="立即結帳">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
    @include("layouts.frontend.modal", ['id' => "changeAmountSuccessModal", 'title' => "提示", 'content' => "修改數量成功！", 'onclick' => "redirect()"])
    <!-- modal -->
    <script>
        function changeAmount(obj, rowId) {
            var amount = $(obj).val();
            if (amount <= 0) {
                alert("修改數量失敗：數量必須大於零");
                return;
            }
            $.post("{{url('shopping/update_amount')}}", {
                _token: "{{csrf_token()}}",
                amount: amount,
                rowId: rowId
            }, function (data) {
                if (!data.result) {
                    alert(data.msg);
                    location.reload();
                    return;
                }
                $("#changeAmountSuccessModal").modal("show");
                setTimeout(function () {
                    redirect();
                }, 1000);
            });
        }

        function redirect() {
            window.location.href = "{{url('shoppingcart/show')}}";
        }
    </script>
@endsection