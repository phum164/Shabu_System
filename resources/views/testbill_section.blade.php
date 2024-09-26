<!DOCTYPE html>
<html>
<head>
    <title>สร้างบิลสำเร็จ</title>
</head>
<body>
    <h1>บิลถูกสร้างสำเร็จ!</h1>
    <p>บิล ID: {{ $billId }}</p>

    <script>
        // เปิดแท็บใหม่พร้อมส่งค่า Bill ID ไปยัง URL ของแท็บใหม่
        window.onload = function() {
            var billId = "{{ $billId }}";
            var newTabUrl = "{{ url('/show-bill') }}/" + billId; // URL ของแท็บใหม่
            window.open(newTabUrl, '_blank'); // เปิดแท็บใหม่
        }
    </script>
</body>
</html>