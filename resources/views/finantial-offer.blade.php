<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <title>Commerical</title>
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
                <h6 class="" style="color: #467481; margin: 0;">COMMERICAL OFFER</h6>
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
                COMMERICAL OFFER
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
        <div class="row" style="
        overflow: hidden;
        position: relative;
        border-bottom: 1px solid #333;
        padding-bottom: 10px;
      ">
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
                 <h6 class="" style="color: #467481; margin: 0;">COMMERICAL OFFER</h6>
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
            @php
     $total = 0;
        foreach ($project->panels as $panel) {
            foreach ($panel->tabs as $tab) {
                foreach ($tab->distripution_product as $product) {
                    if($project_type == 'a'){
                        $total += ($product->pivot->quantity *
                        ($product->abb_price - ($product->abb_price * ($product->family->discount / 100))));

                        $total += $total * 0.14;
                    }else{
                        $total += ($product->pivot->quantity *
                        ($product->abb_price - ($product->abb_price * ($product->family->discount / 100))));
                        if($product->abb_id != null){
                            $total += $total * 0.14;
                        }
                    }
                   
                }
            }
        }
        $discount = 0;

        if($project->discount != 0){

            $discount = $total * ($project->discount / 100);
            $total -= $discount;
        }
            @endphp
            <tbody>
                <tr>
                    <td class="testing">{{ $key + 1 }}</td>
                    <td class="testing">{{ $panel->panelType?->type }}</td>
                    <td class="testing">{{ $panel->panel_quantity }}</td>
                    <td class="testing">{{ $total }}</td>
                    <td class="testing">{{ $total * ($panel->panel_quantity )}}</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: center">Total</td>
                    <td>{{ $total * ($panel->panel_quantity )}}</td>
                </tr>
                <tr>
                    @if($project_type == 'a')
                    <td colspan="4" style="text-align: center">‫‪14%‬‬ ‫‪TAXES‬‬</td>
                    @else
                    <td colspan="4" style="text-align: center">بدون ضريبة</td>

                    @endif
                    <td>{{ $total }}</td>

                </tr>

                @if($discount != 0)
                    
                
                <tr>
                    <td colspan="4" style="text-align: center">Discount</td>
                    <td>{{ $discount }}</td>
                </tr>
                @endif
            </tbody>



        </table>
        @endforeach

        <table dir="rtl" class="page-break" style="
          width: 100%;
          margin-top: 25px;
          margin-bottom: 0px;
          border: 1px solid #333;
          vertical-align: middle;
        ">
            <tr>
                <td class="borderTest" style="text-align: right;font-weight: bold;">شروط البيع :</td>
            </tr>
            <tr>
                <td class="borderTest" style="text-align: right;"> * العرض سار لمدة اسبوع من تاريخه او لحين تغيير الاسعار</td>
            </tr>
            <tr>
                <td class="borderTest" style="text-align: right;">* شروط الدفع 50 % من اجمالى السعر دفعة مقدمة & 50 % دفعه نهائيه عند الاستلام</td>
            </tr>
            <tr>
                <td class="borderTest" style="text-align: right;">* مدة التوريد : 2 يوم من تاريخ استلام الدفعه او الاعتماد ايهما لاحق</td>
            </tr>
        </table>
    </div>






</body>
</html>
