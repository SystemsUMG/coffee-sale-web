<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: sans-serif;
            padding: 30px;
        }
        .main-container h2 {
            text-transform: uppercase;
            text-align: center;
        }
        .header-container {
            margin-top: 50px;
            display: block;
        }
        .header-container .information {
            display: inline-block;
            text-align: left;
            width: 60%;
        }
        .header-container .logo {
            display: inline-block;
            text-align: right;
        }
        .details-container {
            margin-top: 30px;
            display: block;
        }
        .details-container .details-client {
            display: inline-block;
            text-align: left;
            width: 45%;
        }
        .details-container .details-sale {
            margin-left: 5%;
            width: 49%;
            display: inline-block;
            text-align: right;
        }
        .details-container p {
            text-align: left;
            font-weight: bold;
        }
        .details-container span {
            font-weight: normal;
        }
        .sales-table {
            width: 100%;
            border-collapse: collapse;
        }
        .sales-table thead {
            background-color: #333;
            color: white;
            text-transform: uppercase;
            padding: 10px;
        }
        .sales-table th, td {
            padding: 10px;
        }
        .sales-table > thead > tr > th:nth-child(n+3) {
            text-align: right;
        }
        .sales-table > tbody > tr > td:nth-child(n+3) {
            text-align: right;
        }
        .sales-table > tfoot > tr > th, .factura > tfoot > tr > th:nth-child(n+3) {
            font-size: 20px;
            text-align: right;
        }
        .footer-container {
            text-align: center;
            margin-top: 5em;
        }


    </style>
</head>
<body>
<div class="main-container">
    <h2>Factura</h2>
    <div class="header-container">
        <div class="information">
            <h1>Cafetenango</h1>
            <p>Nit: 2465794</p>
            <p>Colonia el Tanque, Acatenango</p>
            <p>Local 312</p>
        </div>
        <div class="logo">
            <img src="{{ public_path('assets/img/logo.png') }}" height="200px"/>
        </div>
    </div>
    <hr />
    <div class="details-container">
        <div class="details-client">
            <p>Nombre: <span>Yandy José Lima Pérez</span></p>
            <p>NIT: <span>21349979</span></p>
            <p>Dirección: <span>32719 Maryse Freeway Suite 820 West Davidhaven, CA 00125-1673</span></p>
        </div>
        <div class="details-sale">
            <p>N° de factura: <span>2343</span></p>
            <p>N° de Autorización: <span>2FWFLAJSDLKQJR3</span></p>
            <p>Serie: <span>D</span></p>
            <p>Fecha de Emisión: <span>2023-05-08 04:27:37</span></p>
        </div>
    </div>
    <div class="sales-container">
        <table class="sales-table">
            <thead>
            <tr>
                <th>Cantidad</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>10</td>
                <td>Libra Café Molido</td>
                <td>40.00</td>
                <td>400.00</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Libra Café Tostado</td>
                <td>45.00</td>
                <td>225.00</td>
            </tr>
            <tr>
                <td>1</td>
                <td>Libra Café Tostado Molido</td>
                <td>100.00</td>
                <td>100.00</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th>Total Factura</th>
                <th>Q1,250.00</th>
            </tr>
            </tfoot>
        </table>
    </div>

    <div class="footer-container">
        <h4>Desarrollado por Grupo 6</h4>
    </div>
</div>

</body>
</html>

