@extends('layout')
@section('title', 'Insurance Cover Note List')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        {{-- Content here --}}
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Insurance Cover Note List</h2>
                        <a href="{{ route('insurance-cover-note.create') }}" class="btn btn-sm btn-primary btn-addon pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Add New Insurance Cover Note</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-bordered">
                                <thead class="bg-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">LC No</th>
                                        <th scope="col">Icn No</th>
                                        <th scope="col">Icn Date</th>
                                        <th scope="col">Icn Agency Name</th>
                                        <th scope="col">Icn Bank Account No</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($insurance_cover_note_list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->letter_of_credit->letter_of_credit_no }}</td>
                                        <td>{{ $item->insurance_cover_note_no }}</td>
                                        <td>{{ $item->insurance_cover_note_date }}</td>
                                        <td>{{ $item->vendor->name }}</td>
                                        <td>{{ $item->vendor_bank->ac_no }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('insurance-cover-note.show', $item) }}" class="btn btn-block  btn-default btn-xs"><i class="fa fa-eye"></i>View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end table-->
                    </div>
                </div>
            </div>
        </div>

        {{--end content here--}}
    </div>
</div>
@endsection
