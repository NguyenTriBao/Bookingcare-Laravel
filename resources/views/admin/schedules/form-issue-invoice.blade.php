<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoá đơn khám bệnh</title>
</head>

<body>
    <h2>Kính gửi ông bà: {{$dataEmail['fullName']}}</h2>
    <h4>Bạn đã đăng ký khám bệnh vào lúc {{$dataEmail['time']}}</h4>
    <p>Chi tiết:</p>
    <ul>
        <li>Địa chỉ: {{$dataEmail['address']}}</li>
        <li>Số điện thoại: {{$dataEmail['phoneNumber']}}</li>
        <li>Lý do: {{$dataEmail['note']}}</li>
    </ul>
    <h4>Chuẩn đoán của bác sĩ: {{$dataEmail['result']}}</h4>
    <h5>Chi phí khám bệnh: 150.000đ</h5>
    <p>Nếu có vấn đề gì thắc mắc bạn vui lòng liên hệ theo số HOTLINE: 19001010</p>
    <p>Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi. </p>
</body>

</html>