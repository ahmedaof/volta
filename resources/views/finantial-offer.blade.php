<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>Document</title>
    <style>
        @page {
            margin: 180px 50px;
        }

        #header {
            position: fixed;
            left: 0px;
            top: -180px;
            right: 0px;
            height: 150px;
            text-align: center;
        }

        .page-break {
            page-break-after: always;
        }

        body {
            font-family: DejaVu Sans, sans-serif, Arial, Helvetica;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .borderTest {
            border: 1px solid #333;
            height: 35px;
            padding: 0 20px;
            text-align: center;
            color: #000;
            font-size: 1.2rem;
        }

        .table-noborder tr td {
            border: none;
        }

        .table-noborder tr:not(:first-child) td {
            border-top: 1px solid #333;
        }

        .table-noborder tr td:not(:last-child) {
            border-right: 1px solid #333;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent
        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6
        }

        .table .table {
            background-color: #fff
        }

        .table-sm td,
        .table-sm th {
            padding: .3rem
        }

        .table-bordered {
            border: 1px solid #dee2e6
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6
        }

        .table-bordered thead td,
        .table-bordered thead th {
            border-bottom-width: 2px
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05)
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, .075)
        }

        .table-primary,
        .table-primary>td,
        .table-primary>th {
            background-color: #b8daff
        }

        .table-hover .table-primary:hover {
            background-color: #9fcdff
        }

        .table-hover .table-primary:hover>td,
        .table-hover .table-primary:hover>th {
            background-color: #9fcdff
        }

        .table-secondary,
        .table-secondary>td,
        .table-secondary>th {
            background-color: #d6d8db
        }

        .table-hover .table-secondary:hover {
            background-color: #c8cbcf
        }

        .table-hover .table-secondary:hover>td,
        .table-hover .table-secondary:hover>th {
            background-color: #c8cbcf
        }

        .table-success,
        .table-success>td,
        .table-success>th {
            background-color: #c3e6cb
        }

        .table-hover .table-success:hover {
            background-color: #b1dfbb
        }

        .table-hover .table-success:hover>td,
        .table-hover .table-success:hover>th {
            background-color: #b1dfbb
        }

        .table-info,
        .table-info>td,
        .table-info>th {
            background-color: #bee5eb
        }

        .table-hover .table-info:hover {
            background-color: #abdde5
        }

        .table-hover .table-info:hover>td,
        .table-hover .table-info:hover>th {
            background-color: #abdde5
        }

        .table-warning,
        .table-warning>td,
        .table-warning>th {
            background-color: #ffeeba
        }

        .table-hover .table-warning:hover {
            background-color: #ffe8a1
        }

        .table-hover .table-warning:hover>td,
        .table-hover .table-warning:hover>th {
            background-color: #ffe8a1
        }

        .table-danger,
        .table-danger>td,
        .table-danger>th {
            background-color: #f5c6cb
        }

        .table-hover .table-danger:hover {
            background-color: #f1b0b7
        }

        .table-hover .table-danger:hover>td,
        .table-hover .table-danger:hover>th {
            background-color: #f1b0b7
        }

        .table-light,
        .table-light>td,
        .table-light>th {
            background-color: #fdfdfe
        }

        .table-hover .table-light:hover {
            background-color: #ececf6
        }

        .table-hover .table-light:hover>td,
        .table-hover .table-light:hover>th {
            background-color: #ececf6
        }

        .table-dark,
        .table-dark>td,
        .table-dark>th {
            background-color: #c6c8ca
        }

        .table-hover .table-dark:hover {
            background-color: #b9bbbe
        }

        .table-hover .table-dark:hover>td,
        .table-hover .table-dark:hover>th {
            background-color: #b9bbbe
        }

        .table-active,
        .table-active>td,
        .table-active>th {
            background-color: rgba(0, 0, 0, .075)
        }

        .table-hover .table-active:hover {
            background-color: rgba(0, 0, 0, .075)
        }

        .table-hover .table-active:hover>td,
        .table-hover .table-active:hover>th {
            background-color: rgba(0, 0, 0, .075)
        }

        .table .thead-dark th {
            color: #fff;
            background-color: #212529;
            border-color: #32383e
        }

        .table .thead-light th {
            color: #495057;
            background-color: #e9ecef;
            border-color: #dee2e6
        }

        .table-dark {
            color: #fff;
            background-color: #212529
        }

        .table-dark td,
        .table-dark th,
        .table-dark thead th {
            border-color: #32383e
        }

        .table-dark.table-bordered {
            border: 0
        }

        .table-dark.table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, .05)
        }

        .table-dark.table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, .075)
        }

        @media (max-width:575.98px) {
            .table-responsive-sm {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive-sm>.table-bordered {
                border: 0
            }
        }

        @media (max-width:767.98px) {
            .table-responsive-md {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive-md>.table-bordered {
                border: 0
            }
        }

        @media (max-width:991.98px) {
            .table-responsive-lg {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive-lg>.table-bordered {
                border: 0
            }
        }

        @media (max-width:1199.98px) {
            .table-responsive-xl {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: -ms-autohiding-scrollbar
            }

            .table-responsive-xl>.table-bordered {
                border: 0
            }
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar
        }

        .table-responsive>.table-bordered {
            border: 0
        }

        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out
        }

        .form-control::-ms-expand {
            background-color: transparent;
            border: 0
        }

    </style>
</head>

<body style="padding: 0 40px">
    <div style="
        overflow: hidden;
        max-width: 1000px;
        padding: 40px 80px;
        border: 1px solid #333;
        margin: 80px auto;
      ">
        <!-- head area  -->
        <div id="header" class="row" style="
          overflow: hidden;
          position: relative;
          border-bottom: 1px solid #333;
         
         ">
            <div style="width: 70%; float: left">
                <img src="./images/logo.jpeg" alt="logo" style="max-width: 300px" />
                <p class="text-uppercase" style="margin-top: 15px; margin-bottom: 10px">
                    low and medium voltage panels
                </p>
                <h4 class="" style="color: #467481">COMMERCIAL offer</h4>
            </div>

            <div class="col-md-2" style="
            width: 30%;
            float: right;
          ">
                <img src="./images/abb.png" alt="logo" style="max-width: 150px" />
            </div>
        </div>

        <div style="
          padding: 15px 20px;
          text-align: center;
          background-color: #d6e3bc;
          margin-top: 10px;
        ">
            <h1 class="" style="color: #467481">COMMERCIAL offer</h1>
        </div>
        <!-- first table  -->
        <table style="
          width: 100%;
          margin-top: 25px;
          border: 1px solid #333;
          vertical-align: middle;
        ">
            <tr>
                <td class="borderTest">offer NO.</td>
                <td class="borderTest">{{ $project->offer_number }}</td>
            </tr>
            <tr>
                <td class="borderTest">DATE</td>
                <td class="borderTest">{{ $project->created_at  }}</td>
            </tr>
            <tr>
                <td class="borderTest">Project Name</td>
                <td class="borderTest">{{$project->name}}</td>
            </tr>
            <tr>
                <td class="borderTest">Client</td>
                <td class="borderTest">{{ $project->customer?->name   }}</td>
            </tr>
        </table>

        <!-- second table  -->
        <table class="page-break" style="
          width: 100%;
          margin-top: 25px;
          margin-bottom: 0px;
          border: 1px solid #333;
          vertical-align: middle;
        ">
            <tr>
                <td class="borderTest">Technical Support</td>
            </tr>
            <tr>
                <td class="borderTest">{{ $user->name }}</td>
            </tr>
            <tr>
                <td class="borderTest">{{ $user->phone }}</td>
            </tr>
            <tr>
                <td class="borderTest">{{ $user->email }}</td>
            </tr>
        </table>

        <!-- third table  -->

        @foreach ($project->panels as $key => $panel)
        <div class="row" style="
        overflow: hidden;
        position: relative;
        border-bottom: 1px solid #333;
        padding-bottom: 10px;
      ">
            <div style="width: 70%; float: left">
                <img src="./images/logo.jpeg" alt="logo" style="max-width: 300px" />
                <p class="text-uppercase" style="margin-top: 15px; margin-bottom: 10px">
                    low and medium voltage panels
                </p>
                <h4 class="" style="color: #467481">COMMERCIAL offer</h4>
            </div>

            <div class="col-md-2" style="
          width: 30%;
          float: right;
        ">
                <img src="./images/abb.png" alt="logo" style="max-width: 150px" />
            </div>
        </div>
        <table class="page-break table table-bordered" style="
          width: 100%;
          margin-top: 80px;
          border: 1px solid #333;
          vertical-align: middle;
        ">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="testing">{{ $key + 1 }}</td>
                    <td class="testing">{{ $panel->panelType?->type }}</td>
                    <td class="testing">{{ $panel->panel_quantity }}</td>
                    <td class="testing">{{ $total }}</td>
                    <td class="testing">{{ $total * ($panel->panel_quantity )}}</td>
                </tr>
            </tbody>



        </table>
        @endforeach
    </div>






</body>
</html>
