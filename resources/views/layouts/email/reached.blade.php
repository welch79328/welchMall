<html>
<body>
<div>
    <p>親愛的會員您好：</p>
    <p>
        訂單編號：{{$data->order_number}}<br>
        預購商品 {{$data->commodity_title}} 組數達成!<br>
        下方為捷 U 購匯款相關資訊:<br>
        <br>
        戶 名:全林實業股份有限公司<br>
        銀行代碼:103<br>
        收款銀行:臺灣新光商業銀行大直分行<br>
        帳 號:0578100080187<br>
        <br>
        請於三日內匯款完成,客服人員將主動與您聯繫並確認匯款資訊（匯款時間、帳號後五碼等）。我們將於確認完成後，發送確認信件!<br>
        詳情可至「會員專區」<a href="{{url('member_order')}}">訂單查詢</a> 查詢相關明細。 <br>
    </p>
    <p>
        ★此信件為系統自動傳送，請勿直接回覆。<br>
    </p>
</div>
@include('layouts.email.footer')
</body>
</html>
