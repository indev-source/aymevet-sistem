<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de inventarios</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {

            width:100%;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid  #5D6975;
            border-bottom: 1px solid  #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {

        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {

        }

        table td {
            padding: 20px;

        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="clearfix">
        <div id="logo">
            <img src="https://aymevet.com/logo.jpeg">
        </div>
        <h1>Reporte realizado: {{$date}}</h1>
        <div id="project">
            <div><span>REPORTE</span> REPORTE DE INVENTARIO</div>
            <div><span>USUARIO</span> {{Auth::user()->name}}</div>
            <div><span>SUCURSAL</span> Reporte general por sucursales</div>
            <div><span style="color:green;">INVERSION TOTAL:</span>  {{number_format($inversion,2,'.',',')}}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Stock</th>
                    <th>Pre1</th>
                    <th>Pre2</th>
                    <th>Pre3</th>
                    <th>Costo</th>
                    <th>Sucursal</th>
                    <th>Inversión</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->nombre}}</td>
                        <td>{{$product->existencia}}</td>
                        <td>${{number_format($product->precio1,2,'.',',')}}</td>
                        <td>${{number_format($product->precio2,2,'.',',')}}</td>
                        <td>${{number_format($product->precio3,2,'.',',')}}</td>
                        <td>${{number_format($product->costo,2,'.',',')}}</td>
                        <td>{{$product->busine->nombre}}</td>
                        <td>${{number_format($product->inversion,2,'.',',')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>

{{--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte de inventarios</title>
</head>

<body>

<main>
    <table>
        <thead>
        <tr>
            <th style="text-align:center;">PRODUCTO</th>
            <th style="text-align:center;">CODIGO</th>
            <th style="text-align:center;">COSTO</th>
            <th style="text-align:center;">VENTA</th>
            <th style="text-align:center;">EXISTENCIA</th>
            <th style="text-align:center;">SUCURSAL</th>
        </tr>
        </thead>
        <tbody>
        ';
        foreach ($productos as $key) {
        $html .= '
        <tr>
            <td style="text-align:center;">'.$key->nombre.'</td>
            <td style="text-align:center;">'.$key->codigo.'</td>
            <td style="text-align:center;">$'.$key->costo.'</td>
            <td style="text-align:center;">'.$key->precio.'</td>
            <td style="text-align:center;">'.$key->stock.'</td>
            <td style="text-align:center;">'.$key->sucursal.'</td>
        </tr>
        ';
        }
        $html .='
        </tbody>
    </table>

</main>
</body>
</html>--}}
