@extends('layout.layout')

@section('content')


    <form action="{{ route('itemsSearch') }}" method="POST" style="margin: 0px 0px 20px 0px;">
        @csrf
        <div class="row">
            {{--                 computerNo--}}
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>رقم الكمبيوتر :</strong>
                    <input type="text" class="form-control" name="ComputerNo"
                           value="{{isset($mti) ? $mti->ComputerNo :'' }}">
                </div>
            </div>
            {{--                 BarCode--}}
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>رقم الباركود :</strong>
                    <input type="text" class="form-control" name="BarCode"
                           value="{{isset($mti) ? $mti->BarCode : ''  }}">
                </div>
            </div>
            {{--                 ModeNo--}}
            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="form-group">
                    <strong>رقم الموديل :</strong>
                    <input type="text" class="form-control" name="ModelNo"
                           value="{{isset($mti) ? $mti->ModelNo : ''  }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>القسم:</strong>
                    <select class="form-control" name="DeptID">
                        <option value="0">الكل</option>
                        @foreach($depts as $dept)
                            <option
                                value="{{ $dept->DeptID }}" {{ isset($mti) ? $mti->DeptID == $dept->DeptID ? 'selected' : '' : '' }} >{{$dept->DeptName}}</option>

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
                            <option
                                value="{{ $item->ItemID }}" {{ isset($mti) ?  $mti->ItemID === $item->ItemID ? 'selected' : '' : '' }}>{{$item->ItemName}}</option>
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
                            <option
                                value="{{ $type->TypeID }}" {{ isset($mti) ? $mti->TypeID == $type->TypeID ? 'selected' : '' : '' }}>{{$type->TypeName}}</option>
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
                            <option
                                value="{{ $season->SeasonID }}" {{ isset($mti) ? $mti->SeasonID == $season->SeasonID ? 'selected' : '' :'' }}>{{$season->SeasonName}}</option>
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
                            <option
                                value="{{ $fabric->FabricID }}" {{ isset($mti) ? $mti->FabricID == $fabric->FabricID ? 'selected' : '':'' }}>{{$fabric->FabricName }}</option>
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
                            <option
                                value="{{ $country->CountryID }}" {{ isset($mti) ? $mti->CountryID == $country->CountryID ? 'selected' : '':'' }}>{{$country->CountryName}}</option>
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
                            <option
                                value="{{ $brand->BrandID }}" {{ isset($mti) ? $mti->BrandID == $brand->BrandID ? 'selected' : '' :''}}>{{$brand->BrandName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>رقم الرف :</strong>
                    <input type="text" class="form-control" name="StandNo"
                           value="{{isset($mti) ? $mti->StandNo : ''  }}" disabled>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>السنة :</strong>
                    <select class="form-control" name="ItemYear">
                        <option value="0">الكل</option>
                        @foreach($years as $year)
                            <option
                                value="{{ $year->ItemYear }}" {{ isset($mti) ? $mti->ItemYear == $year->ItemYear ? 'selected' : '':'' }}>{{$year->ItemYear }}</option>
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
                    <input class="form-control form-control-lg" type="text" name="Des"
                           value="{{isset($mti) ? $mti->Des : ''  }}" disabled>

                </div>
            </div>


            <label class="col-form-label">الاسعار</label>
            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>سعر البيع :</strong>
                    <input class="form-control " type="text" name="EndUser"
                           value="{{isset($mti) ? $mti->EndUser : ''  }}" disabled>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>سعر التنزيلات :</strong>
                    <input class="form-control" type="text" name="Sale" value="{{isset($mti) ? $mti->Sale : ''  }}" disabled>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>العرض الخاص :</strong>
                    <input class="form-control " type="text" name="Special"
                           value="{{isset($mti) ? $mti->Special : ''  }}" disabled>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>سعر التصفية :</strong>
                    <input class="form-control " type="text" name="Clearance"
                           value="{{isset($mti) ? $mti->Clearance : ''  }}" disabled>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-2">
                <div class="form-group">
                    <strong>اقل سعر بيع :</strong>
                    <input class="form-control" type="text" name="MinPrice"
                           value="{{isset($mti) ? $mti->MinPrice : ''  }}" disabled>

                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <button type="reset" class="btn btn-primary" onclick="return resetForm(this.form);"><i
                        class="fa fa-new"></i> جديد
                </button>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> بحث</button>
            </div>
        </div>
    </form>

    @if(isset($notFound))
        <div class="alert alert-danger text-center" role="alert">
            لا يوجد نتيجة
        </div>
    @endif
    @if(isset($report))
        <br>
        <img src="{{$img}}" alt="..." class="rounded mx-auto d-block" width="200px">
        <table class="table table-bordered" id="info">
            <tr>

                <th>رقم الباركود</th>
                <th>اللون</th>
                <th>القياس</th>
                @foreach ($branches as $branch)
                    <th width="280px">{{ $branch->BranchName }}</th>
                @endforeach

                <th>الاجمالي</th>

            </tr>

            <?php
            $Alltotal = 0;
            $barcodes = array();
            $count = count($branches);
            $tr = 0;
            ?>
            @foreach ($join as $barcode => $j)
                <tr>
                    <?php $total = 0; ?>
                    <td>{{$barcode}}</td>
                    <td>{{ $j[0]->ColorName }}</td>
                    <td>{{ $j[0]->SizeName }}</td>

                    {{--                    @foreach ($j as $jj)--}}
                    @foreach ($branches as $branch)
                        <?php $x = 1; ?>
                        <?php
                            $c = $j->where('BranchName','=', $branch->BranchName)->first();
                           // echo $c;
                            ?>
                        @if($c != null)
                                <td>{{ $c->Qty }}</td>
                                <?php  $total += $c->Qty;  $x++;?>
                            @else
                                <td>0</td>
                            @endif
{{--                        @if($jj->BranchName == $branch->BranchName)--}}
{{--                            <td>qty{{ $jj->Qty }}</td>--}}
{{--                        @else--}}
{{--                            <td>0</td>--}}
{{--                        @endif--}}

                        {{--                        @endforeach--}}
                        {{----}}
                    @endforeach

                    <td>{{$total}}</td>
                    <?php $Alltotal = $total + $Alltotal; ?>
                </tr>
            @endforeach
            <tr>
                <td>الاجمالي</td>
                <td></td>
                <td></td>
                @foreach ($branches as $branch)
                    <?php
                        $t= $tot->get($branch->BranchName);
                    ?>

                            <td>{{ $t }}</td>

                    @endforeach

{{--                @foreach ($tot as $tt)--}}
{{--                    <td>{{ $tt }}</td>--}}
{{--                @endforeach--}}
                <td>{{ $Alltotal }}</td>
            </tr>


        </table>

    @endif




@endsection
