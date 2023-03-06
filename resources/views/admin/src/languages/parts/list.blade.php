<table class="table table-striped myDatatable" id="myTable">
    <thead>
    <tr>
        <th>@lang('website.variable')</th>
        <th>EN</th>
        <th>MK</th>
        <th>DE</th>
        <th>AL</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($languages as $item)
        <tr class="odd gradeX">
            <td style="width: 30%">
                {{$item->variable}}
                <input type="hidden" name="langVar{{$item->id}}"
                       id="langVar{{$item->id}}"
                       value="{{ $item->variable }}" class="form-control"
                       disabled/></td>
            <td><input type="text" name="en{{$item->id}}"
                       id="en{{$item->id}}"
                       value="{{ $item->en }}" class="form-control"/></td>
            <td><input type="text" name="mk{{$item->id}}"
                       id="mk{{$item->id}}"
                       value="{{ $item->mk }}" class="form-control"/></td>
            <td><input type="text" name="de{{$item->id}}"
                       id="de{{$item->id}}"
                       value="{{ $item->de }}" class="form-control"/></td>
            <td><input type="text" name="al{{$item->id}}"
                       id="al{{$item->id}}"
                       value="{{ $item->al }}" class="form-control"/></td>
            <td class="center">
                <button type="button"
                        onclick="changeVariable({{$item->id}})"
                        class="btn btn-outline-info"><i
                        class="fa fa-refresh"></i></button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
