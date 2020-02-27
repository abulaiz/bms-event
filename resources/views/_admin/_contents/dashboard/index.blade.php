@extends('_admin._templates.master')
@section('title', 'Dashboard | BMS')

@section('body')
<div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div class="card">
              <div class="card-header no-border-bottom">
                <h4 class="card-title">Visitors Overview</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-primary btn-round active">Hourly</button>
                    <button type="button" class="btn btn-outline-primary btn-round">Day</button>
                    <button type="button" class="btn btn-outline-primary btn-round">Month</button>
                  </div>
                </div>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <div class="row my-1">
                    <div class="col-lg-4 col-12 p-1 border-right-blue-grey border-right-lighten-5">
                      <div class="text-center">
                        <h3>15,678</h3>
                        <p class="text-muted">Total Visit
                          <span class="success darken-2"><i class="ft-arrow-up"></i> 4.27%</span>
                        </p>
                        <div id="sp-bar-total-cost"></div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-12 p-1 border-right-blue-grey border-right-lighten-5">
                      <div class="text-center">
                        <h3>8,630</h3>
                        <p class="text-muted">Unique Visitor
                          <span class="danger darken-2"><i class="ft-arrow-down"></i> 2.30%</span>
                        </p>
                        <div id="sp-stacked-bar-total-sales"></div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-12 p-1">
                      <div class="text-center">
                        <h3>32,454</h3>
                        <p class="text-muted">Page Views
                          <span class="success darken-2"><i class="ft-arrow-up"></i> 8.16%</span>
                        </p>
                        <div id="sp-tristate-bar-total-revenue"></div>
                      </div>
                    </div>
                  </div>
                  <ul class="list-inline text-center mt-3">
                    <li>
                      <h6><i class="ft-circle danger"></i> Page Views</h6>
                    </li>
                    <li>
                      <h6><i class="ft-circle success pl-1"></i> Total Visit</h6>
                    </li>
                    <li>
                      <h6><i class="ft-circle warning pl-1"></i> Unique Visitor</h6>
                    </li>
                  </ul>
                  <div class="chartjs">
                    <canvas id="visitors-graph" height="275"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row match-height">
          <div class="col-xl-8 col-lg-12">
            <div class="card">
              <div class="card-content">
                <ul class="list-inline text-center pt-2 m-0">
                  <li class="mr-1">
                    <h6><i class="ft-circle warning"></i>
                      <span class="grey darken-1">Remaining</span>
                    </h6>
                  </li>
                  <li class="mr-1">
                    <h6><i class="ft-circle success"></i>
                      <span class="grey darken-1">Completed</span>
                    </h6>
                  </li>
                </ul>
                <div class="chartjs height-250">
                  <canvas id="line-stacked-area" height="250"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-3 text-center">
                    <span class="text-muted">Total Projects</span>
                    <h2 class="block font-weight-normal">18</h2>
                    <div class="progress mt-2" style="height: 7px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 text-center">
                    <span class="text-muted">Total Task</span>
                    <h2 class="block font-weight-normal">125</h2>
                    <div class="progress mt-2" style="height: 7px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 text-center">
                    <span class="text-muted">Completed Task</span>
                    <h2 class="block font-weight-normal">242</h2>
                    <div class="progress mt-2" style="height: 7px;">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                  <div class="col-3 text-center">
                    <span class="text-muted">Total Revenue</span>
                    <h2 class="block font-weight-normal">$11,582</h2>
                    <div class="progress mt-2" style="height: 7px;">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-12">
            <div class="card  card-inverse bg-primary">
              <div class="card-content">
                <div class="card-body sales-growth-chart">
                  <div class="chart-title mb-1 text-center">
                    <span class="white">Total monthly Sales.</span>
                  </div>
                  <div id="monthly-sales" class="height-250"></div>
                </div>
              </div>
              <div class="card-footer text-center">
                <div class="chart-stats mt-1 white">
                  <a href="#" class="btn bg-primary bg-darken-3 mr-1 white">Statistics <i class="ft-bar-chart"></i></a>                  for the last year.
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection