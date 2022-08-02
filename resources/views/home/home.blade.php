@extends('base')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card mt-5">
                <div class="card-header">
                    Order
                </div>
                <div class="card-body row">
                    <form method="POST" action="{{ route('app_get_checkout') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="fullName" class="col-md-4 col-form-label">Name</label>
                            <div class="col-md-8">
                            <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your fullname">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="country" class="col-md-4 col-form-label">Payment country</label>
                            <div class="col-md-8">
                                <select class="form-select" id="country" name="country" aria-label="country select">
                                    <option selected>Select the country where you pay</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country['iso_alpha2'] }}">{{ $country['name'] }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="currency" class="col-md-4 col-form-label">Currency</label>
                            <div class="col-md-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input currency" type="radio" name="currency" id="currency1" value="GBP" checked>
                                    <label class="form-check-label" for="currency1">GBP</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input currency" type="radio" name="currency" id="currency2" value="EUR">
                                    <label class="form-check-label" for="currency2">EUR</label>
                                </div>


                                <div class="form-check form-check-inline">
                                    <input class="form-check-input currency" type="radio" name="currency" id="currency3" value="USD">
                                    <label class="form-check-label" for="currency3">USD</label>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="amount" class="col-md-4 col-form-label">Amount</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="0.00" aria-label="" aria-describedby="basic-addon2">
                                    <span class="input-group-text" id="currency-selected">GBP</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Pay</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
