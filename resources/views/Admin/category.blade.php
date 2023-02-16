@extends('Admin/layout')

@section('main_section')
<div class="mb-5">
    <h2>Categories</h2>
   <a href="{{url('admin/manage_category')}}"><button class="btn btn-success my-2">+Add categroy</button></a> 
    <div class="row my-2">
    <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-30">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>date</th>
                        <th>order ID</th>
                        <th>name</th>
                        <th class="text-right">price</th>
                        <th class="text-right">quantity</th>
                        <th class="text-right">total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2018-09-29 05:57</td>
                        <td>100398</td>
                        <td>iPhone X 64Gb Grey</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-28 01:22</td>
                        <td>100397</td>
                        <td>Samsung S8 Black</td>
                        <td class="text-right">$756.00</td>
                        <td class="text-right">1</td>
                        <td class="text-right">$756.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-27 02:12</td>
                        <td>100396</td>
                        <td>Game Console Controller</td>
                        <td class="text-right">$22.00</td>
                        <td class="text-right">2</td>
                        <td class="text-right">$44.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-26 23:06</td>
                        <td>100395</td>
                        <td>iPhone X 256Gb Black</td>
                        <td class="text-right">$1199.00</td>
                        <td class="text-right">1</td>
                        <td class="text-right">$1199.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-25 19:03</td>
                        <td>100393</td>
                        <td>USB 3.0 Cable</td>
                        <td class="text-right">$10.00</td>
                        <td class="text-right">3</td>
                        <td class="text-right">$30.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-29 05:57</td>
                        <td>100392</td>
                        <td>Smartwatch 4.0 LTE Wifi</td>
                        <td class="text-right">$199.00</td>
                        <td class="text-right">6</td>
                        <td class="text-right">$1494.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-24 19:10</td>
                        <td>100391</td>
                        <td>Camera C430W 4k</td>
                        <td class="text-right">$699.00</td>
                        <td class="text-right">1</td>
                        <td class="text-right">$699.00</td>
                    </tr>
                    <tr>
                        <td>2018-09-22 00:43</td>
                        <td>100393</td>
                        <td>USB 3.0 Cable</td>
                        <td class="text-right">$10.00</td>
                        <td class="text-right">3</td>
                        <td class="text-right">$30.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    @endsection