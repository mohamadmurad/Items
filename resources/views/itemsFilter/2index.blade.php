@extends('layout.layout')

@section('content')


    <form action="{{ route('itemsSearch') }}" method="POST">
        @csrf
        <div class="row">
            {{--                 computerNo--}}
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>رقم الكمبيوتر :</strong>
                    <input type="text" class="form-control" name="ComputerNo" value="{{isset($join) ? $join[0]->ComputerNo :'' }}">
                </div>
            </div>
            {{--                 BarCode--}}
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>رقم الباركود :</strong>
                    <input type="text" class="form-control" name="BarCode" value="{{isset($join) ? $join[0]->BarCode : ''  }}">
                </div>
            </div>
            {{--                 ModeNo--}}
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>رقم الموديل :</strong>
                    <input type="text" class="form-control" name="ModelNo" value="{{isset($join) ? $join[0]->ModelNo : ''  }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>القسم:</strong>
                    <select class="form-control" name="DeptID">
                        <option value="0">الكل</option>
                        @foreach($depts as $dept)
                            <option value="{{ $dept->DeptID }}" {{ isset($join) ? $join[0]->DeptID == $dept->DeptID ? 'selected' : '' : '' }} >{{$dept->DeptName}}</option>

                        @endforeach
                    </select>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>الصنف:</strong>
                    <select class="form-control" name="ItemID">
                        <option value="0">الكل</option>
                        @foreach($items as $item)
                            <option value="{{ $item->ItemID }}" {{ isset($join) ?  $join[0]->ItemID === $item->ItemID ? 'selected' : '' : '' }}>{{$item->ItemName}}</option>
                        @endforeach
                    </select>


                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>النقشة :</strong>
                    <select class="form-control" name="TypeID">
                        <option value="0">الكل</option>
                        @foreach($types as $type)
                            <option value="{{ $type->TypeID }}" {{ isset($join) ? $join[0]->TypeID == $type->TypeID ? 'selected' : '' : '' }}>{{$type->TypeName}}</option>
                        @endforeach
                    </select>


                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>الموسم :</strong>
                    <select class="form-control" name="SeasonID">
                        <option value="0">الكل</option>
                        @foreach($seasons as $season)
                            <option value="{{ $season->SeasonID }}" {{ isset($join) ? $join[0]->SeasonID == $season->SeasonID ? 'selected' : '' :'' }}>{{$season->SeasonName}}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>القماش :</strong>
                    <select class="form-control" name="FabricID">
                        <option value="0">الكل</option>
                        @foreach($fabrics as $fabric)
                            <option value="{{ $fabric->FabricID }}" {{ isset($join) ? $join[0]->FabricID == $fabric->FabricID ? 'selected' : '':'' }}>{{$fabric->FabricName }}</option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>البلد :</strong>
                    <select class="form-control" name="CountryID">
                        <option value="0">الكل</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->CountryID }}" {{ isset($join) ? $join[0]->CountryID == $country->CountryID ? 'selected' : '':'' }}>{{$country->CountryName}}</option>
                        @endforeach
                    </select>

                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>الشركة المصنعة :</strong>
                    <select class="form-control" name="BrandID">
                        <option value="0">الكل</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->BrandID }}" {{ isset($join) ? $join[0]->BrandID == $brand->BrandID ? 'selected' : '' :''}}>{{$brand->BrandName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>رقم الرف :</strong>
                    <input type="text" class="form-control" name="StandNo" value="{{isset($join) ? $join[0]->StandNo : ''  }}">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>السنة :</strong>
                    <select class="form-control" name="ItemYear">
                        <option value="0">الكل</option>
                        @foreach($years as $year)
                            <option value="{{ $year->ItemYear }}" {{ isset($join) ? $join[0]->ItemYear == $year->ItemYear ? 'selected' : '':'' }}>{{$year->ItemYear }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


{{--            <div class="col-xs-12 col-sm-12 col-md-6">--}}
{{--                <div class="form-group">--}}
{{--                    <strong>القياس :</strong>--}}
{{--                    <select class="form-control" name="SizeID">--}}
{{--                        <option value="0">الكل</option>--}}
{{--                        @foreach($sizes as $size)--}}
{{--                            <option value="{{ $size->SizeID }}" {{ isset($MTI) ? $MTI->SizeID == $size->SizeID ? 'selected' : '':'' }}>{{$size->SizeName }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>الوصف :</strong>
                    <input class="form-control form-control-lg" type="text" name="Des" value="{{isset($join) ? $join[0]->Des : ''  }}">

                </div>
            </div>



            <label class="col-form-label">الاسعار</label>
            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>سعر البيع :</strong>
                    <input class="form-control " type="text" name="EndUser" value="{{isset($join) ? $join[0]->EndUser : ''  }}">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>سعر التنزيلات :</strong>
                    <input class="form-control" type="text" name="Sale" value="{{isset($join) ? $join[0]->Sale : ''  }}">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>العرض الخاص :</strong>
                    <input class="form-control " type="text" name="Special" value="{{isset($join) ? $join[0]->Special : ''  }}">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>سعر التصفية :</strong>
                    <input class="form-control " type="text" name="Clearance" value="{{isset($join) ? $join[0]->Clearance : ''  }}">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>اقل سعر بيع :</strong>
                    <input class="form-control" type="text" name="MinPrice" value="{{isset($join) ? $join[0]->MinPrice : ''  }}">

                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <button type="reset" class="btn btn-primary" onclick="return resetForm(this.form);"><i class="fa fa-new"></i> جديد </button>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> بحث</button>
            </div>
        </div>
    </form>


    @if(isset($report))
        <br>
        <table class="table table-bordered">
            <tr>

                <th>رقم الباركود</th>
                <th>اللون</th>
                <th>القياس</th>
                @foreach ($join as $j)
                    <th width="280px">{{ $j->BranchName }}</th>
                @endforeach

                <th>الاجمالي</th>

            </tr>

            <?php $Alltotal = 0; ?>
            @foreach ($join as $j)
                <tr>
                    <td>{{ $j->BarCode }}</td>
                    <td>{{ $j->ColorName }}</td>
                    <td>{{ $j->SizeName }}</td>
{{--                    <?php $total = 0; ?>--}}
{{--                    @foreach ($join as $j)--}}
{{--                    <?php $total = $total + $j->Qty;  ?>--}}
{{--                        <td>{{ $j->Qty }}</td>--}}
{{--                    @endforeach--}}
{{--                    <td>{{$total}}</td>--}}
{{--                    <?php $Alltotal = $total + $Alltotal; ?>--}}
                </tr>
            @endforeach
            <tr>
                <td>الاجمالي</td>
                <td></td>
                <td></td>
                @foreach ($join as $j)
                    <td>{{ $j->total }}</td>
                @endforeach
                <td>{{ $Alltotal }}</td>
            </tr>


        </table>

    @endif




@endsection
