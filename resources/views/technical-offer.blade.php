<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Technical</title>
    <style>
        @page {
            margin: 20px
        }

        #header {
            position: fixed;
            left: 0px;
            top: -180px;
            right: 0px;
            /* height: 150px; */
            text-align: center;
            padding-bottom: 5px;
            margin-bottom: 20px
        }

        .page-break {
            page-break-after: always;
        }

        /* 
        body {
            font-family: DejaVu Sans, sans-serif, Arial, Helvetica;
        } */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        td {
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
          border-bottom: 1px solid #467481;
         
         ">
            <div style="width: 70%; float: left; text-align: left;">
                <img src="./images/logo.jpeg" alt="logo" style="max-width: 200px" />
                <h5 class="text-uppercase" style="margin-top: 15px; margin-bottom: 3px">
                    low and medium voltage panels
                </h5>
                <h6 class="" style="color: #467481; margin: 0;">TECHNICAL OFFER</h6>
            </div>

            <div class="col-md-2" style="
            width: 30%;
            float: right;
          ">
                <img src="./images/abb.png" alt="logo" style="max-width: 150px" />
            </div>
        </div>

        <div style="
          padding: 8px 20px;
          text-align: center;
          background-color: #d6e3bc;
          margin: 80px 0;
        ">
            <h1 style="text-transform: capitalize; color: #ff0000; font-weight: bold; margin: 0">
                technical offer
            </h1>
        </div>
        <!-- first table  -->
        <table style="
          width: 100%;
          border: 1px solid #333;
          vertical-align: middle;
        ">
            <tr>
                <td>offer NO.</td>
                <td>{{ $project->offer_number }}</td>
            </tr>
            <tr>
                <td>DATE</td>
                <td>{{ $project->created_at  }}</td>
            </tr>
            <tr>
                <td>Project Name</td>
                <td>{{$project->name}}</td>
            </tr>
            <tr>
                <td>Client</td>
                <td>{{ $project->customer?->name   }}</td>
            </tr>
        </table>

        <!-- second table  -->
        <table class="page-break" style="
          width: 100%;
          margin-top: 100px;
          margin-bottom: 0px;
          border: 1px solid #333;
          vertical-align: middle;
        ">
            <tr>
                <td>Technical Support</td>
            </tr>
            <tr>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>{{ $user->phone }}</td>
            </tr>
            <tr>
                <td>{{ $user->email }}</td>
            </tr>
        </table>

        <!-- third table  -->

        @foreach ($project->panels as $key => $panel)
        <div id="header" class="row" style="
          overflow: hidden;
          position: relative;
          border-bottom: 1px solid #467481;
         
         ">
            <div style="width: 70%; float: left; text-align: left;">
                <img src="./images/logo.jpeg" alt="logo" style="max-width: 200px" />
                <h5 class="text-uppercase" style="margin-top: 15px; margin-bottom: 3px">
                    low and medium voltage panels
                </h5>
                <h6 class="" style="color: #467481; margin: 0;">TECHNICAL OFFER</h6>
            </div>

            <div class="col-md-2" style="
            width: 30%;
            float: right;
          ">
                <img src="./images/abb.png" alt="logo" style="max-width: 150px" />
            </div>
        </div>
        <table class="page-break" style="
          width: 100%;
          margin-top: 20px;
          vertical-align: middle;
        ">
            <tr style="border: 1px solid #333">
                <td colspan="2">Item no: {{ $key + 1 }}</td>
                <td colspan="2">Quantity: {{ $panel->panel_quantity }}</td>
            </tr>

            <tr>
                <td style="border: 1px solid #333" colspan="2">Panel name: {{ $panel->panel_name }}</td>


                <td style="border: 1px solid #333" colspan="2">
                    <img src="./images/abb.jpg" style="max-width: 40px" />
                    {{ $panel->panelType?->type }}
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #333" colspan="2"> {{ $panel->panelType->Mounting }} </td>
                <td style="border: 1px solid #333" colspan="2">IP {{ $panel->panelType->ip }}</td>
            </tr>
            @foreach ($panel->tabs as $key => $tab)
            @if($tab->name != 'additionals' || $tab->name != 'Sheet metal')
            <tr>
                <td style="border: 1px solid #333">QTY</td>
                <td style="border: 1px solid #333" width="80%" colspan="2">Description</td>
                <td style="border: 1px solid #333">Notes</td>
            </tr>
            <tr>
                <td colspan="4" style="color: #ff0000; padding-bottom: 20px ;border: 1px solid #333">
                    <h4>{{ $tab->name }}</h4>
                </td>
            </tr>
            @foreach ($tab->distripution_product as $product)
            <tr>
                <td style="border: 1px solid #333"> {{ $product->pivot->quantity }} </td>
                <td width="80%" colspan="2" style="text-align: left ; border: 1px solid #333">
                    {{ $product->abb_description }}
                </td>
                @if($product->abb_id != null)

                <td style="border: 1px solid #333">
                    <img src="./images/abb.jpg" style="max-width: 40px" />
                </td>
                @endif
            </tr>

            @endforeach
            @endif
            @endforeach
        </table>
        @endforeach
    </div>
</body>
</html>
