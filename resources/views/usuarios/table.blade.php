<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaes 4 - gosport</title>
    <style>
        body { font-family: sans-serif; }
        .container { max-width: 960px; margin: 20px auto; padding: 0 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
</head>
<body>
    <div class="container">
        <h1>Gaes 4 - gosport</h1>
        <table id="usuarios" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>rol</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nicolás Felipe Preciado Rodríguez</td>
                    <td>nicolas10@gmailcom</td>
                    <td>300 456 7890</td>
                    <th>admin_cancha</th>
                    </tr>
                    <tr>
                        <td>Johan Sebastián Talero Ovalle</td>
                        <td>johan40@gmailcom</td>
                        <td>310 987 6543</td>
                        <th>admin_app</th>
                    </tr>
                    <tr>
                        <td>Manuel Alejandro Alejo Poveda</td>
                        <td>manuelale@gmailcom</td>
                        <td>312 345 6789</td>
                        <th>admin_cancha</th>
                    </tr>
                    <tr>
                        <td>Daniel Santiago Cortes Gil</td>
                        <td>daniel20@gmailcom</td>
                        <td>315 876 5432</td>
                        <th>jugador</th>
                    </tr>
                    <tr>
                        <td>David Felipe Garzón Gutiérrez</td>
                        <td>david30@gmailcom</td>
                        <td>320 123 4567</td>
                        <th>admin_app</th>
                    </tr>
                    <tr>
                        <td>Juan Esteban Vargas Vargas</td>
                        <td>juanE13@gmailcom</td>
                        <td>310 987 6543</td>
                        <th>jugador</th>
                    </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#usuarios').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>
</html>