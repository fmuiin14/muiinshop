@extends('user.layouts.master')


@section('title')
    Dashbord User
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-statistic-2">
              <div class="card-chart">
                <canvas id="balance-chart" height="80"></canvas>
              </div>
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Pesanan</h4>
                </div>
                <div class="card-body">
                  #
                </div>
              </div>
            </div>
          </div>
      <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-chart">
            <canvas id="balance-chart" height="80"></canvas>
          </div>
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Point</h4>
            </div>
            <div class="card-body">
              #
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>
@endsection
