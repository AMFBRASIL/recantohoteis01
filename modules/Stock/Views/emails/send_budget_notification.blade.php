@extends('Email::layout')
@section('content')
    <div class="b-container">
        <div class="b-panel">
            <p>{{__('Você está recebendo este e-mail porque foi gerada uma nova cotação.')}}</p>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <td>Produto</td>
                        <td>Qtde</td>
                        <td>Unidade</td>
                        <td>Preço Estimado</td>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($budget_data))
                    @foreach($budget_data as $field)
                        <tr>
                        <td>{{$field['product']}} </td>
                        <td>{{$field['quantity']}} </td>
                        <td>{{$field['unity']}} </td>
                        <td>{{$field['price']}} </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            <p>{{__('Você pode verificar os detalhes aqui:')}} <a href="{{route('budget.admin.edit', $id)}}">{{__('Verificar')}}</a></p>

            <br>
            <p>{{__('Atenciosamente')}},<br>{{env('APP_NAME')}}</p>
        </div>
    </div>
@endsection
