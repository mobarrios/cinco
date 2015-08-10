<table id="example" class="display table table-striped" style="width: 100%; cellspacing: 0;">
    <thead>
    <tr>
        <th style="width: 1%;">#</th>
        @foreach($tableHeader['columns'] as $column => $data)
            <th>{{$column}}</th>
        @endforeach
        <th style="width: 10%;" class="no-sort"></th>
    </tr>
    </thead>
    {{--<tfoot>
    <tr>
        <th>Name</th>
        <th>Position</th>
        <th>Office</th>
        <th>Age</th>
        <th>Start date</th>
        <th>Salary</th>
    </tr>
    </tfoot>--}}
    <tbody>
    @foreach($models as $model)
        <tr>
            <td>{{$model->id}}</td>

                @foreach($tableHeader['columns'] as $column)

                    @if(!is_null($column['relation']))
                        <td>{{$model->$column['data']->$column['relation']}}</td>
                    @else
                        <td>{{$model->$column['data']}}</td>
                    @endif

                @endforeach

            <td class="">
                <a href="{{route($routeEdit,$model->id)}}" class="btn btn-xs btn-success">Edit</a>
                <a href="{{route($routeDel ,$model->id)}}" class="delete btn btn-xs btn-danger">Del</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>