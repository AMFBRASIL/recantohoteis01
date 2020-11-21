@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            <p>{{__('Você está recebendo este e-mail porque foi gerado um novo ajuste de estoque.')}}</p>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <td>Produto</td>
                        <td>Qtde Anterior</td>
                        <td>Qtde Atual</td>
                        <td>Preço Anterior</td>
                        <td>Preço Atual</td>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($stock_data))
                    @foreach($stock_data as $field)
                        <tr>
                        <td>{{$field['product']}} </td>
                        <td>{{$field['old_stock']}} </td>
                        <td>{{$field['new_stock']}} </td>
                        <td>{{$field['old_price']}} </td>
                        <td>{{$field['new_price']}} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            <p>{{__('Você pode verificar os detalhes aqui:')}} <a href="{{route('stock_adjustment.admin.edit', $id)}}">{{__('Verificar')}}</a></p>

            <br>
            <p>{{__('Atenciosamente')}},<br>{{env('APP_NAME')}}</p>
        </div>
    </div>
@endsection
