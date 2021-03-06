@extends('layouts.dashboard') 
@section('content')
<div class="mt-2">
    <div class="pt-2">

        <h4 class="">Reports</h4>
        <hr>

    </div>

    <div class="row m-2">
        <div class="card m-2" style="width: 18rem;">
            <form action="{{action('ReportsController@monthly_report')}}" method="get">
                <div class="card-body">
                    <h5 class="card-title">Montly Report</h5>
                    <p class="card-text">Montly report constit of specific month submited compliants</p>

                    <div class="form-group">

                        <select name="month" id="" class="form-control">
                        <option value="">Month</option>
                        @foreach ($Months_Avaliable as $month)
                        <option value="{{$month['month']}}">{{date('F', mktime(0, 0, 0, $month['month'], 10))}}</option>
                        @endforeach
                            
                    </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" value="xlsx" name="type" class="btn btn-success btn-block">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        Download (xlsx)</button>
                    <button type="submit" value="csv" name="type" class="btn btn-info btn-block">
                        <i class="fas fa-file-csv fa-sm  "></i>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Download (csv)</button>
                </div>
            </form>

        </div>

        <div class="card m-2" style="width: 18rem;">
            <form action="{{action('ReportsController@yearly_report')}}" method="get">

                <div class="card-body">
                    <h5 class="card-title">Yearly Report</h5>
                    <p class="card-text">Yearly Report constit of specific year submited compliants where each moth is seperated</p>

                    <div class="form-group">

                        <select name="year" id="" class="form-control">
                            
                            <option value="">Year</option>
                            @foreach ($Year_Avaliable as $year)
                            <option value="{{$year['year']}}">{{ $year['year']}}</option>
                            @endforeach
                                
                        </select>
                    </div>
                </div>
                <div class="card-footer ">
                    <button type="submit" value="xlsx" name="type" class="btn btn-success btn-block">
                                <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                Download (xlsx)</button>
                    <button type="submit" value="csv" name="type" class="btn btn-info btn-block ">
                                <i class="fas fa-file-csv fa-sm  "></i>
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Download (csv)</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection