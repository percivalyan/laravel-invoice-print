<!-- resources/views/print.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <script>
        function printPage() {
            // Buka jendela baru dengan rute Laravel
            var printWindow = window.open('{{ route('penawaran') }}', 'printWindow');
            printWindow.onload = function() {
                // Ketika halaman baru selesai dimuat, cetak halaman tersebut
                printWindow.print();
            };
        }
    </script>
</head>
<body>
    <button onclick="printPage()">Print Penawaran Page</button>
</body>
</html>
