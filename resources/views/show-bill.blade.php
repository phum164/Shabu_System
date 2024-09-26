<!DOCTYPE html>
<html>
<head>
    <title>รายละเอียดบิล</title>
</head>
<body>
    <h1>รายละเอียดบิล</h1>
    <p>Bill ID: {{ $bill->id }}</p>
    <p>Customer ID: {{ $bill->customer_id }}</p>
    <p>Total Amount: {{ $bill->total_amount }}</p>
    <p>Status: {{ $bill->status }}</p>
</body>
</html>
