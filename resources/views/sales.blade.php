@extends('layout')

@section('content')

    <div class="table">
        {{--   <div class="card-header">

           </div>--}}

        <div class="table-body">

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>

                    <th scope="col">Agency Code</th>
                    <th scope="col">Agent Last name</th>
                    <th scope="col">Agent First Name</th>
                    <th scope="col">Agent Code</th>
                    <th scope="col">Product Type</th>
                    <th scope="col">Comp Type</th>
                    <th scope="col">Subscriber Last Name</th>
                    <th scope="col">Subscriber First Name</th>
                    <th scope="col">Subscriber Middle Name</th>
                    <th scope="col">App ID</th>
                    <th scope="col">Member Contract No</th>
                    <th scope="col">Original Effective Date</th>
                    <th scope="col">Benefit Effective Date</th>
                    <th scope="col">Accounting Date</th>
                    <th scope="col">Compensation Date</th>
                    <th scope="col">Cancel Date</th>
                    <th scope="col">Comp Year</th>
                    <th scope="col">Prior Carrier Ind</th>
                    <th scope="col">Prior Plan Type</th>
                    <th scope="col">Event Type</th>
                    <th scope="col">Flat Rate</th>
                    <th scope="col">Comm Amount</th>
                    <th scope="col">County Name</th>
                    <th scope="col">Cms Date</th>
                    <th scope="col">Cycle Year</th>
                    <th scope="col">Admin Fee</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                @foreach($sales as $sale)
                    <tr>

                        <td> {{ $sale->agency_code }}

                        </td>
                        <td> {{ $sale->agent_last_name }}

                        </td>
                        <td> {{ $sale->agent_first_name }}

                        </td>
                        <td> {{ $sale->agent_code }}

                        </td>
                        <td> {{ $sale->product_type }}

                        </td>
                        <td> {{ $sale->comp_type }}

                        </td>
                        <td> {{ $sale->subscriber_last_name }}

                        </td>
                        <td> {{ $sale->subscriber_first_name }}

                        </td>
                        <td> {{ $sale->subscriber_middle_name }}

                        </td>
                        <td> {{ $sale->app_id }}

                        </td>
                        <td> {{ $sale->member_contract_no }}

                        </td>
                        <td> {{ $sale->original_effective_date }}

                        </td>
                        <td> {{ $sale->benefit_effective_date }}

                        </td>
                        <td> {{ $sale->accounting_date }}

                        </td>
                        <td> {{ $sale->compensation_date }}

                        </td>
                        <td> {{ $sale->cancel_date }}

                        </td>
                        <td> {{ $sale->comp_year }}

                        </td>
                        <td> {{ $sale->prior_carrier_ind }}

                        </td>
                        <td> {{ $sale->prior_plan_type }}

                        </td>
                        <td> {{ $sale->event_type }}

                        </td>
                        <td> {{ $sale->flat_rate }}

                        </td>
                        <td> {{ $sale->comm_amount }}

                        </td>
                        <td> {{ $sale->county_name }}

                        </td>
                        <td> {{ $sale->cms_date }}

                        </td>
                        <td> {{ $sale->cycle_year }}

                        </td>
                        <td> {{ $sale->admin_fee }}

                        </td>

                    </tr>
                @endforeach


                </tbody>
            </table>

        </div>


    </div>