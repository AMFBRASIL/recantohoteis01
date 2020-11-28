@extends('Base::admin.index')
@section('admin-content')
<thead>
<tr>
    <th width="60px"><input type="checkbox" class="check-all"></th>
    <th width="100px"> {{ __('Nome')}}</th>
    <th width="130px"> {{ __('Contato')}}</th>
    <th width="130px"> {{ __('Email')}}</th>
    <th width="130px"> {{ __('Tipo')}}</th>
    <th width="130px"> {{ __('CPF/CNPJ')}}</th>
    <th width="100px"> {{ __('Status')}}</th>
    <th width="100px"> {{ __('Principal')}}</th>
    <th width="100px"> {{ __('NFe')}}</th>
    <th width="100px"> {{ __('NFCe')}}</th>
    <th width="100px"> {{ __('SAT')}}</th>
    <th width="100px"> {{ __('Contador')}}</th>
    <th width="100px"> {{ __('C.D')}}</th>
    <th width="100px"> {{ __('Cadastro')}}</th>
    <th width="100px"></th>
</tr>
</thead>
<tbody>
@if($rows->total() > 0)
    @foreach($rows as $row)
        <tr class="{{$row->status}}">
            <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}"></td>
            <td class="title"> <a href="{{route('company.admin.edit',['id'=>$row->id])}}">{{$row->title}}</a></td>
            <td>{{$row->contact ?? ''}}</td>
            <td>{{$row->email ?? ''}}</td>
            <td>{{$row->person_type_formatted}}</td>
            <td>{{$row->document}}</td>
            <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td>
            <td><span class="badge badge-{{ $row->is_main ? 'publish' : 'draft'}}">{{\Modules\Company\Models\Company::getConditionalFormattedAttribute($row->is_main)}}</span></td>
            <td><span class="badge badge-{{ $row->issues_nfe ? 'publish' : 'draft'}}">{{\Modules\Company\Models\Company::getConditionalFormattedAttribute($row->issues_nfe)}}</span></td>
            <td><span class="badge badge-{{ $row->issues_nfce ? 'publish' : 'draft'}}">{{\Modules\Company\Models\Company::getConditionalFormattedAttribute($row->issues_nfce)}}</span></td>
            <td><span class="badge badge-{{ $row->issues_sat ? 'publish' : 'draft'}}">{{\Modules\Company\Models\Company::getConditionalFormattedAttribute($row->issues_sat)}}</span></td>
            <td><span class="badge badge-{{ $row->has_digital_counter ? 'publish' : 'draft'}}">{{\Modules\Company\Models\Company::getConditionalFormattedAttribute($row->has_digital_counter)}}</span></td>
            <td><span class="badge badge-{{ $row->has_digital_certificate ? 'publish' : 'draft'}}">{{\Modules\Company\Models\Company::getConditionalFormattedAttribute($row->has_digital_certificate)}}</span></td>
            <td>{{ display_date($row->updated_at)}}</td>
            <td>
                <a href="{{route('company.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Editar')}}
                </a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="15">{{__("Nenhuma empresa encontrada.")}}</td>
    </tr>
@endif
</tbody>
@endsection
