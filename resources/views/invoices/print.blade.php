<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta charset="utf-8">
    <title>Invoice Number {{ $invoice->id }}</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="{{ asset('css/paper.css') }}">
    <style>
        #wrapper{
            position: relative;
            width:95%;
            /*padding: 20px auto;*/
            margin: 10px auto;

        }
        @page {
            /* dimensions for the whole page */
            size: A5;

            margin: 0;
        }

        html {
            /* off-white, so body edge is visible in browser */
            background: #eee;
        }

        body {
            /* A5 dimensions */
            height: 210mm;
            width: 148.5mm;

            margin: 0;
        }

       .itemtable td, .itemtable  th {
            border: 1px solid black;
        }
        .hft{
            background-color: #0c0c0c;
            color: #fff;
        }



        @media print
        {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }




    </style>




</head>
<body>
    <div id="wrapper">


        <table width="100%">
            <tr>
                <td><img src="/cci-logo.jpg" height="70"></td>
                <td colspan="2" style="text-align: center"><h2 style="margin-bottom: 5px; font-size: 22px;">उद्योग वाणिज्य संघ-चितवन </h2>
                    <h4 style="margin-top: 2px; font-size: 15px">नारायणी मार्ग २९७, नारायणगढ, चितवन </h4>
                </td>
                <td style="text-align: right"><img src="/bm-trada.png" height="58px"></td>
            </tr>
            <tr>

                <td style="text-align: left">PAN: 303901066</td>
                <td colspan="2"  style="text-align: center">
                    <b>नगदी रसिद/Cash Receipt</b>
                    <br>
                    <br>
                </td>
                <td  style="text-align: right">Phone: 056-520108</td>

            </tr>


            <tr>
                <td width="25%">नम्बर / No.: {{ $invoice->id }}</td>
                <td width="25%" style="text-align: left"></td>
                <td colspan="2"  style="text-align: right">मिति / Date: {{ $invoice->date }}</td>



            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4"><br><b>Payment By:</b> <u>श्री {{ $invoice->member->name }} ({{ $invoice->member->id }}) </u><br></td>
            </tr>
            <tr>
                <td colspan="4">
                    <table class="itemtable" cellpadding="3">

                        <tr id="#heading-for-table">
                            <td width="10%"  class="hft">#</td>
                            <td width="55%" class="hft">Title</td>
                            <td width="20%" class="hft">For Fiscal Year</td>
                            <td width="15%" style="text-align: right" class="hft">Total</td>
                        </tr>
                        @foreach($invoice->invoiceitem as $index => $invoiceitem )
                        <tr>
                            <td > {{ $index+1 }}</td>
                            <td>{{ $invoiceitem->invoiceable->title }}</td>
                            <td>{{ $invoiceitem->fiscal->title }}</td>
                            <td style="text-align: right">{{ $invoiceitem->amount }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Total:</td>

                            <td style="text-align: right">{{ $invoice->total }}</td>
                        </tr>

                    </table>


                </td>

            </tr>
            <tr>
                <td colspan="3"><br>Payment By__________________</td>
                <td><br>_______________<br>
                Signature<br>
                    {{ $invoice->paymentby }}
                </td>

            </tr>

        </table>
    </div>
    <div style="text-align: center; font-size: large; font-weight: bold">

    <a href="/staff/members" class="no-print">go back to members list</a>
    </div>
</body>
</html>
