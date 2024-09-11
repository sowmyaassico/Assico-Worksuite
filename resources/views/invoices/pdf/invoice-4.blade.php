<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html
xmlns="http://www.w3.org/1999/xhtml"
xmlns:v="urn:schemas-microsoft-com:vml"
xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<!--[if gte mso 9]>
<xml>
<o:OfficeDocumentSettings>
<o:AllowPNG/>
<o:PixelsPerInch>96</o:PixelsPerInch>
</o:OfficeDocumentSettings>
</xml>
<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">
<!--[if !mso]>
    <!-->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--


<![endif]-->
<title>@lang('app.invoice')</title>
<!--[if !mso]>
    <!--- -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<!--


<![endif]-->
<style type="text/css" id="media-query">
body {
margin: 0;
padding: 0; }

table, tr, td {
vertical-align: top;
border-collapse: collapse; }
#items {
            margin-top: 10px;
        }

        #items .first-cell,
        #items table th:first-child,
        #items table td:first-child {
            width: 18px;
            text-align: right;
        }

        #items table {
            border-collapse: separate;
            width: 100%;
        }

        #items table th {
            font-size: 12px;
            padding: 5px 3px;
            text-align: center;
            background: #b0b4b3;
            color: white;
        }

        #items table th:nth-child(2) {
            width: 30%;
            text-align: left;
        }

        #items table th:last-child {
            /*text-align: right;*/
        }

        #items table td {
            padding: 10px 3px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        #items table td:first-child {
            text-align: left;
        }

        #items table td:nth-child(2) {
            text-align: left;
        }

        #sums {
            margin: 25px 30px 0 0;
            width: 100%;
        }

        #sums table {
            width: 70%;
            float: right;
        }

        #sums table tr th,
        #sums table tr td {
            min-width: 100px;
            padding: 9px 8px;
            text-align: right;
        }

        #sums table tr th {
            width: 70%;
            font-weight: bold;
        }

        #sums table tr td.last {
            min-width: 0 !important;
            max-width: 0 !important;
            width: 0 !important;
            padding: 0 !important;
            border: none !important;
        }

        #sums table tr.amount-total td,
        #sums table tr.amount-total th {
            font-size: 20px !important;
        }

        #sums table tr.due-amount th,
        #sums table tr.due-amount td {
            font-weight: bold;
        }

        #sums:after {
            content: '';
            display: block;
            clear: both;
        }
</style>
</head>
<body class="clean-body" style="margin: -55px;-webkit-text-size-adjust: 100%;background-color: #FFFFFF">
<style type="text/css" id="media-query-bodytag">

</style>
<!--[if IE]>
<div class="ie-browser">
<![endif]-->
<!--[if mso]>
<div class="mso-container">
<![endif]-->
<table style="background-image: url('{{ asset("img/inv_bg.jpg") }}');height: 100%;background-position: center;background-repeat: no-repeat;background-size: contain;width:792px;margin: 0 auto; padding: 0px;">
    <tr>
        <th style="vertical-align: bottom; text-align: center;font-size: 30px;color: #24AAE1;height: 180px;" colspan="2">
            BUSINESS INVOICE
        </th>
    </tr>
    <tr>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <th colspan=""></th>
        <th style="padding: 5px;vertical-align: bottom; text-align: left;">
            
        </th>
    </tr>
    <tr>
        <th colspan="" style="width:65%;color: grey;">
            
        </th>
        <th style="padding: 5px;vertical-align: middle; text-align: left;width:35%;color: #687073;">
            Prepared For<br>
            {{ $invoice->project->client->clientDetails->company_name }}<br>
            {!! nl2br($invoice->project->client->clientDetails->address) !!}<br>
            Date:{{ $invoice->issue_date->translatedFormat($company->date_format) }}<br>

        </th>
    </tr>
</table>
<table style="width:750px;margin: 0 auto; padding-top: 50px;">
    <tr>
        <td style="height:100px;font-size: 50px;">INVOICE<br><img src="{{ asset('img/Picture2.png') }}" width="320"></td>
        <td></td>
    </tr>
    <tr>
        <td><b>Invoice Number</b>: {{ $invoice->invoice_number }}<br>
        <b>Date</b>: {{ $invoice->issue_date->translatedFormat($company->date_format) }} <br>
        <b>Sales Person</b>: Sahad KM <br>
        <b>Contact</b>: 055-4769007<br><br></td>
        <td></td>
    </tr>
    <tr>
        <td style="width:75%;"><b>Billed to</b><br>
            <b>{{ $invoice->project->client->clientDetails->company_name }}</b><br>
            {!! nl2br($invoice->project->client->clientDetails->address) !!}<br>
</td>
        <td style="width:25%;">
            <b>Billed From</b> <br>
            ASSICO Technologies <br>
            Abu Dhabi, UAE<br>
            TRN: 100330541200003<br>
        </td>
    </tr>
</table>
<hr style="height:3px; background: yellow; width:95%;border:none;">
<br><br><br>

<table style="width: 750px;margin: 0 auto;line-height: 34px;border: 1px solid black;border-collapse: collapse;vertical-align: middle;" border="1">
    <tr>
        <td style="width:8%;text-align: center;"><b>S/N</b></td>
        <td colspan="2" style="width:78%;"><b>Description</b></td>
        <td style="width:14%;text-align: right;padding: 2px;"><b>ETA</b></td>
    </tr>
    <?php $count = 0; ?>
                    @foreach ($invoice->items as $item)
                        @if ($item->type == 'item')
                            <tr data-iterate="item">
                                <td style="text-align: center;">{{ ++$count }}</td>
                                <!-- Don't remove this column as it's needed for the row commands -->
                                <td class="" colspan="2">
                                    {{ $item->item_name }}<br>
                                    @if (!is_null($item->item_summary))
                                        {!! nl2br(pdfStripTags($item->item_summary)) !!}
                                    @endif
                                    
                                </td>
                                <td style="text-align:right;padding: 2px;">{{ currency_format($item->amount, $invoice->currency_id, false) }}</td>
                            </tr>
                        @endif
                    @endforeach
</table>


<div style="right: 200px;">
                <table style="width: 250px;line-height: 24px;border: 1px solid black;border-collapse: collapse; margin-right: 32px;text-align: right;" align="right" border="1">
                    <tr>
                        
                        <th>@lang('modules.invoices.subTotal'):</th>
                        <td>{{ currency_format($invoice->sub_total, $invoice->currency_id, false) }}</td>
                    </tr>
                    @if ($discount != 0 && $discount != '')
                        <tr data-iterate="tax">
                            <th>@lang('modules.invoices.discount'):</th>
                            <td>{{ currency_format($discount, $invoice->currency_id, false) }}</td>
                        </tr>
                    @endif
                    @foreach ($taxes as $key => $tax)
                        <tr data-iterate="tax">
                            <th>{{ $key }}:</th>
                            <td>{{ currency_format($tax, $invoice->currency_id, false) }}</td>
                        </tr>
                    @endforeach
                    <tr class="amount-total">
                        <th>@lang('modules.invoices.total'):</th>
                        <td>{{ currency_format($invoice->total, $invoice->currency_id, false) }}</td>
                    </tr>
                    @if ($invoice->creditNotes()->count() > 0)
                        <tr>
                            <th>
                                @lang('modules.invoices.appliedCredits'):</th>
                            <td>
                                {{ currency_format($invoice->appliedCredits(), $invoice->currency_id, false) }}
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th>@lang('app.totalPaid') :</th>
                        <td> {{ currency_format($invoice->getPaidAmount(), $invoice->currency_id, false) }}</td>
                    </tr>
                    @if ($invoice->amountDue())
                    <tr>
                        <th>@lang('app.totalDue'):</th>
                        <td> {{ currency_format($invoice->amountDue(), $invoice->currency_id, false) }}</td>
                    </tr>
                    @endif
                    @if ($invoiceSetting->authorised_signatory && $invoiceSetting->authorised_signatory_signature && $invoice->status == 'paid')
                    <tr>
                        <td id="signatory" colspan="2" style="font-size:15px" align="right">
                            <img src="{{ $invoiceSetting->authorised_signatory_signature_url }}" alt="{{ $company->company_name }}"/><br>
                            @lang('modules.invoiceSettings.authorisedSignatory')
                        </td>
                    </tr>
                    @endif
                </table>
</div>
           
<br><br>
<table style="min-width:750px;margin: 0 auto;" border="0">
    <tr>
        <td><b>Terms & Conditions</b><br>
            Payment Method: Cash <br>
            Currency: AED <br>
        </td>
        <td></td>
    </tr>
</table>
<div style="position: fixed;bottom: 0;width: 803px; margin: 0; padding: 0px;">
    <img src='{{ asset("img/footer.jpg") }}' class="img-responsive" style="width: 803px; margin-bottom:-50px; padding: 0px;">
</div>
</body>
</html>
