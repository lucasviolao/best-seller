@component('mail::message')

# Caro Administrador,&nbsp;
Segue Relatório de Vendas do dia: &nbsp;

 

@foreach ($sales as $sale)
    @if ($sale->sale_date == $dt)
        @php $cont++ @endphp    
        {{$cont}} - Valor da venda: R$ {{number_format($sale->amount, 2, ",", ".")}} 
        Vendedor: {{$sale->seller->name}}
        Comissão: R$ {{number_format(($sale->amount)*0.085, 2, ",", ".")}}
        @php $amountComissionTotal += ($sale->amount)*0.085 @endphp 
        @php $amountTotal += $sale->amount @endphp 
    @endif
@endforeach

O valor total de vendas do dia é de: R$ {{number_format($amountTotal, 2, ",", ".")}}
 
O valor total de comissões do dia é de: R$ {{number_format($amountComissionTotal, 2, ",", ".")}} 
    
    
@endcomponent