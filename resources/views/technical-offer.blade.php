<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<style>
    /* * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    } */
    /* .text-uppercase {
      text-transform: uppercase;
    } */

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
<body style="padding: 0 40px">
    <div style="
        overflow: hidden;
        max-width: 1000px;
        padding: 40px 80px;
        border: 1px solid #333;
        margin: 80px auto;
      ">
        <!-- head area  -->
        <div style="
          overflow: hidden;
          position: relative;
          border-bottom: 1px solid #333;
          padding-bottom: 10px;
        ">
            <div>
                <img src="./images/logo.jpeg" alt="logo" style="max-width: 300px" />
                <h3 class="text-uppercase" style="margin-top: 15px; margin-bottom: 10px">
                    low and medium voltage panels
                </h3>
                <h4 class="" style="color: #467481">TECHNICAL offer</h4>
            </div>

            <div style="
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
          ">
                {{-- <img src="./images/logo.jpeg" alt="logo" style="max-width: 200px" /> --}}
            </div>
        </div>

        <div style="
          padding: 15px 20px;
          text-align: center;
          background-color: #d6e3bc;
          margin-top: 40px;
        ">
            <h1 style="text-transform: capitalize; color: #ff0000; font-weight: bold">
                technical offer
            </h1>
        </div>

        <!-- first table  -->
        <table style="
          width: 100%;
          margin-top: 80px;
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
                <td>{{ $project->name  }}</td>
            </tr>
            <tr>
                <td>Client</td>
                <td>{{ $project->customer->name   }}</td>
            </tr>
        </table>

        <!-- second table  -->
        <table style="
          width: 100%;
          margin-top: 80px;
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
        <table class="table-noborder" style="
          width: 100%;
          margin-top: 80px;
          border: 1px solid #333;
          vertical-align: middle;
        ">

            @foreach ($project->panels as $key => $panel)
            <tr>
                <td colspan="2">Item no: {{ $key + 1 }}</td>
                <td colspan="2">Quantity: {{ $panel->panel_quantity }}</td>
            </tr>
          
            <tr>
                <td colspan="2">Panel name: {{ $panel->panel_name }}</td>


                <td colspan="2">
                    <img src="./images/logo.jpeg" style="max-width: 40px" />
                    {{ $panel->panelType?->type }}
                </td>
            </tr>
            <tr>
                <td colspan="2"> {{ $panel->panelType->Mounting }} </td>
                <td colspan="2">IP {{ $panel->panelType->ip }}</td>
            </tr>
            @foreach ($panel->tabs as $key => $tab)
            <tr>
                <td>QTY</td>
                <td width="80%" colspan="2">Description</td>
                <td>Notes</td>
            </tr>
            <tr>
                <td colspan="4" style="color: #ff0000; padding-bottom: 20px">
                    <h4>{{ $tab->name }}</h4>
                </td>
            </tr>
            @foreach ($tab->distripution_product as $product)
            <tr>
                <td> {{ $product->pivot->quantity }} </td>
                <td width="80%" colspan="2" style="text-align: left">
                    {{ $product->abb_description }}
                </td>
                @if($product->abb_id != null)

                <td>
                    <img src="./images/logo.jpeg" style="max-width: 40px" />
                </td>
                @endif
            </tr>

            @endforeach
            @endforeach
            @endforeach
        </table>
    </div>
</body>
</html>
