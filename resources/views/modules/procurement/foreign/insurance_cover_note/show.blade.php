@extends('layout')
@section('title', 'Bill of Lading')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Procurement</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>LC No:</th>
                    <tr>{{ $insuranceCoverNote->letter_of_credit->letter_of_credit_no }}</tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
