<html>
<head>
    <title>Invoice Number {{ $invoice->id }}</title>

    <style>
        @font-face { font-family: kitfont; src: url('1979 Dot Matrix Regular.TTF'); }

        #mainDiv.customFont td { /*  <div class="customFont" /> */
            font-style: kitfont;
            font-size:12px;
        }
        #mainDiv {
             /* height of receipt 4.5 inches*/
            max-width: 13in;  /* weight of receipt 8.6 inches*/
            position:relative; /* positioned relative to its normal position */
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

<div id="mainDiv" class="customFont"> <!--  invisible space -->
    <table>
        <tr>

            <td colspan="4" style="text-align: center"><h3 style="margin-bottom: 5px; font-size: 15px;">
			Chamber of Commerce & Industry - Chitwan
			</h3>
                <h4 style="margin-top: 2px; font-size: 13px">Narayani Marg 297, Narayangarh, Chitwan </h4>
            </td>

        </tr>
        <tr>

            <td style="text-align: left">PAN: 303901066</td>
            <td colspan="2"  style="text-align: center">
                <b>Cash Receipt</b>
                <br>
                <br>
            </td>
            <td  style="text-align: right">Phone: 056-520108</td>

        </tr>


        <tr>
            <td width="25%">No.: {{ $invoice->id }}</td>
            <td width="25%" style="text-align: left"></td>
            <td colspan="2"  style="text-align: right">Date: {{ $invoice->date }}</td>



        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="4"><br><b>Payment By:</b> <u> {{ $invoice->member->name }} ({{ $invoice->member->id }}) </u><br></td>
        </tr>
        <tr>
            <td colspan="4" align="center">
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
            <td colspan="3"></td>
            <td><br>_______________<br>
                Signature<br>
                {{ $invoice->paymentby }}
            </td>

        </tr>

    </table>

</div>
<div style=" font-size: large; font-weight: bold">

    <a href="/staff/members" class="no-print">go back to members list</a>
</div>

</body>
</html>