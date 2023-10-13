@component('mail::message')

# Caro vendedor,&nbsp;
Segue seu relatório de vendas do dia: &nbsp;

 

@foreach ($sales as $sale)
    @if ($sale->sale_date == $dt)
        @php $cont++ @endphp    
        {{$cont}} - Valor da venda: R$ {{number_format($sale->amount, 2, ",", ".")}} 
        Sua comissão: R$ {{number_format(($sale->amount)*0.085, 2, ",", ".")}}
        @php $amountTotal += ($sale->amount)*0.085 @endphp 
    @endif
@endforeach

O valor total de sua comissão do dia é de: R$ {{number_format($amountTotal, 2, ",", ".")}} 
    
    
@endcomponent