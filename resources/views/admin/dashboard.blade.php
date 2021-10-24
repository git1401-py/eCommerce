@extends('admin.layouts.admin')
@section('title')
    dashboard
@endsection

@section('content')
    <div class="container-fluid">
                <div class="row mb-4 align-items-center" style="max-height: 700px;">
                    <div class="col-lg-9">
                        <canvas id="myAreaChart" width="400" height="400" style="max-height: 300px;"></canvas>
                    </div>
                    <div class="col-lg-3">
                        <canvas id="myPieChart" width="400" height="400" style="max-height: 300px;"></canvas>
                    </div>
                </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- cards  -->
        {{-- <section>
            <div class="container-fluid bg-white" style="min-height:100vh;">
                <div class="row">
                    <div class="col-12">
                        <div class="row pt-md-5 mt-md-3 mb-5">

                            <div class="col-xl-3 col-sm-6 p-2">
                                <div class="card  card-common">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="text-right text-secondary">
                                                <h5>فروش ها</h5>
                                                <h5>12،000،000 ریال</h5>
                                            </div>
                                            <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer text-secondary">
                                        <i class="fas fa-sync ml-3"></i>
                                        <span>آپدیت</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 p-2">
                                <div class="card  card-common">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="text-right text-secondary">
                                                <h5>درآمد</h5>
                                                <h5>100،000،000 ریال</h5>
                                            </div>
                                            <i class="fas fa-money-bill-alt fa-3x text-success"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer text-secondary">
                                        <i class="fas fa-sync ml-3"></i>
                                        <span>آپدیت</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 p-2">
                                <div class="card  card-common">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="text-right text-secondary">
                                                <h5>تعداد کاربران</h5>
                                                <h5>10،000 </h5>
                                            </div>
                                            <i class="fas fa-users fa-3x text-warning"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer text-secondary">
                                        <i class="fas fa-sync ml-3"></i>
                                        <span>آپدیت</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 p-2">
                                <div class="card  card-common">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="text-right text-secondary">
                                                <h5>تعداد بازدیدکنندگان</h5>
                                                <h5>30،000 </h5>
                                            </div>
                                            <i class="fas fa-chart-line fa-3x text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="card-footer text-secondary">
                                        <i class="fas fa-sync ml-3"></i>
                                        <span>آپدیت</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    <!-- End of cards -->

    <!-- progress / task lisy -->
        {{-- <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
                        <div class="row mb-4 align-items-center">

                            <div class="col-xl-6 col-12 mb-4  mb-xl-0">
                                <div class="bg-dark text-white p-4 rounded">
                                    <h4 class="mb-5">نرخ تبدیل</h4>

                                    <h6 class="mb-3">Google Chrome</h6>
                                    <div class="progress mb-4" style="height: 20px;">
                                        <div class="progress-bar progress-bar-striped font-weight-bold" style="width: 91%;">91%
                                        </div>
                                    </div>
                                    <h6 class="mb-3">Mozilla Firefox </h6>
                                    <div class="progress mb-4" style="height: 20px;">
                                        <div class="progress-bar progress-bar-striped font-weight-bold bg-success"
                                            style="width: 82%;">82%</div>
                                    </div>
                                    <h6 class="mb-3">Safari</h6>
                                    <div class="progress mb-4" style="height: 20px;">
                                        <div class="progress-bar progress-bar-striped font-weight-bold bg-danger"
                                            style="width: 67%;">67%</div>
                                    </div>
                                    <h6 class="mb-3">IE</h6>
                                    <div class="progress mb-4" style="height: 20px;">
                                        <div class="progress-bar progress-bar-striped font-weight-bold bg-info"
                                            style="width: 10%;">10%</div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xl-6 col-12">
                                <h4 class="text-muted p-3 mb-3"> وظایف</h4>
                                <div class="container-fluid bg-white">
                                    <div class="row py-3 mb-4 task-border align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" checked>
                                        </div>
                                        <div class="col-sm-9 col-8">این یک متن ساختگی است</div>
                                        <div class="col-1">
                                            <a href="#" data-toggle="tooltip" title="<h6>ویرایش</h6>" data-html="true"
                                                data-placement="left">
                                                <i class="fas fa-edit fa-lg text-success ml-2"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="#" data-toggle="tooltip" title="<h6>حذف</h6>" data-html="true"
                                                data-placement="top">
                                                <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid bg-white">
                                    <div class="row py-3 mb-4 task-border align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" checked>
                                        </div>
                                        <div class="col-sm-9 col-8">این یک متن ساختگی است</div>
                                        <div class="col-1">
                                            <a href="#" data-toggle="tooltip" title="<h6>ویرایش</h6>" data-html="true"
                                                data-placement="left">
                                                <i class="fas fa-edit fa-lg text-success ml-2"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="#" data-toggle="tooltip" title="<h6>حذف</h6>" data-html="true"
                                                data-placement="top">
                                                <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid bg-white">
                                    <div class="row py-3 mb-4 task-border align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" checked>
                                        </div>
                                        <div class="col-sm-9 col-8">این یک متن ساختگی است</div>
                                        <div class="col-1">
                                            <a href="#" data-toggle="tooltip" title="<h6>ویرایش</h6>" data-html="true"
                                                data-placement="left">
                                                <i class="fas fa-edit fa-lg text-success ml-2"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="#" data-toggle="tooltip" title="<h6>حذف</h6>" data-html="true"
                                                data-placement="top">
                                                <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid bg-white">
                                    <div class="row py-3 mb-4 task-border align-items-center">
                                        <div class="col-1">
                                            <input type="checkbox" checked>
                                        </div>
                                        <div class="col-sm-9 col-8">این یک متن ساختگی است</div>
                                        <div class="col-1">
                                            <a href="#" data-toggle="tooltip" title="<h6>ویرایش</h6>" data-html="true"
                                                data-placement="left">
                                                <i class="fas fa-edit fa-lg text-success ml-2"></i>
                                            </a>
                                        </div>
                                        <div class="col-1">
                                            <a href="#" data-toggle="tooltip" title="<h6>حذف</h6>" data-html="true"
                                                data-placement="top">
                                                <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    <!-- End ofprogress / task list -->

    <!-- activities / quick post -->
        {{-- <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
                        <div class="row align-items-center">

                            <div class="col-xl-7">
                                <h4 class="text-muted mb-4"> مشتری های اخیر
                                </h4>
                                <div id="accordion">

                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-block bg-secondary text-light text-right"
                                                data-toggle="collapse" data-target="#myCommentOne">
                                                <img src="{{ asset('images/cust1.jpeg') }}" width="50" class="ml-3 rounded">
                                                علی یک نظر ارسال کرده
                                            </button>
                                        </div>
                                        <div class="collapse show" id="myCommentOne" data-parent="#accordion">
                                            <div class="card-body">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                کاربردی می باشد.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-block bg-secondary text-light text-right"
                                                data-toggle="collapse" data-target="#myCommentTwo">
                                                <img src="{{ asset('images/cust2.jpeg') }}" width="50" class="ml-3 rounded">
                                                مراد یک نظر ارسال کرده
                                            </button>
                                        </div>
                                        <div class="collapse" id="myCommentTwo" data-parent="#accordion">
                                            <div class="card-body">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                کاربردی می باشد.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-block bg-secondary text-light text-right"
                                                data-toggle="collapse" data-target="#myCommentThree">
                                                <img src="{{ asset('images/cust3.jpeg') }}" width="50" class="ml-3 rounded">
                                                آنی یک نظر ارسال کرده
                                            </button>
                                        </div>
                                        <div class="collapse" id="myCommentThree" data-parent="#accordion">
                                            <div class="card-body">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                کاربردی می باشد.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-block bg-secondary text-light text-right"
                                                data-toggle="collapse" data-target="#myCommentFour">
                                                <img src="{{ asset('images/cust4.jpeg') }}" width="50" class="ml-3 rounded">
                                                هلن یک نظر ارسال کرده
                                            </button>
                                        </div>
                                        <div class="collapse" id="myCommentFour" data-parent="#accordion">
                                            <div class="card-body">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                کاربردی می باشد.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-block bg-secondary text-light text-right"
                                                data-toggle="collapse" data-target="#myCommentFive">
                                                <img src="{{ asset('images/cust5.jpeg') }}" width="50" class="ml-3 rounded">
                                                جمشید یک نظر ارسال کرده
                                            </button>
                                        </div>
                                        <div class="collapse" id="myCommentFive" data-parent="#accordion">
                                            <div class="card-body">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                کاربردی می باشد.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-block bg-secondary text-light text-right"
                                                data-toggle="collapse" data-target="#myCommentSix">
                                                <img src="{{ asset('images/cust6.jpeg') }}" width="50" class="ml-3 rounded">
                                                نیکی یک نظر ارسال کرده
                                            </button>
                                        </div>
                                        <div class="collapse" id="myCommentSix" data-parent="#accordion">
                                            <div class="card-body">
                                                لورم ایپسوازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف
                                                بهبود ابزارهای کاربردی می باشد.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xl-5 mt-5">
                                <div class="card rounded">
                                    <div class="card-body">

                                        <h5 class="text-muted text-center mb-4">
                                            ارسال سریع نظر
                                        </h5>

                                        <ul class="list-inline text-center py-3">
                                            <li class="list-inline-item ml-4">
                                                <a href="#">
                                                    <i class="fas fa-pencil-alt text-success"></i>
                                                    <span class="h6 text-muted">نظر</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item ml-4">
                                                <a href="#">
                                                    <i class="fas fa-camera text-info"></i>
                                                    <span class="h6 text-muted">عکس</span>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fas fa-map-marker-alt text-primary"></i>
                                                    <span class="h6 text-muted">بررسی</span>
                                                </a>
                                            </li>
                                        </ul>

                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control py-2 mb-3" placeholder="نظر شما...">
                                                <button type="button"
                                                    class="btn btn-block btn-info font-weight-bold text-light py-2 mb5">ارسال
                                                    نظر</button>
                                            </div>
                                        </form>

                                        <div class="row">

                                            <div class="col-6">
                                                <div class="card bg-light">
                                                    <i class="far fa-calendar-alt fa-8x text-warning d-block m-auto py-3"></i>
                                                    <div class="card-body">
                                                        <p class="card-text text-center font-weight-bold"> دوشنبه ، 26 اردیبهشت
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="card bg-light">
                                                    <i class="far fa-clock fa-8x text-danger d-block m-auto py-3"></i>
                                                    <div class="card-body">
                                                        <p class="card-text text-center font-weight-bold">15:30 </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    <!-- end of activities / quick post -->


@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [
                    {
                    label: "تراکنش موفق",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 200, 103, 0.05)",
                    borderColor: "rgba(78, 200, 103, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 200, 103, 1)",
                    pointBorderColor: "rgba(78, 200, 103, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 200, 103, 1)",
                    pointHoverBorderColor: "rgba(78, 200, 103, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: @json($successTransactions),
                },
                    {
                    label: "تراکنش ناموفق",
                    lineTension: 0.3,
                    backgroundColor: "rgba(255, 11, 23, 0.05)",
                    borderColor: "rgba(255, 11, 23, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(255, 11, 23, 1)",
                    pointBorderColor: "rgba(255, 11, 23, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(255, 11, 23, 1)",
                    pointHoverBorderColor: "rgba(255, 11, 23, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: @json($unsuccessTransactions),
                },
            ],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            // maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return  number_format(value) + 'تومان';
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': تومان' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });

    </script>

    <script>
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["تعداد تراکنش موفق", "تعداد تراکنش ناموفق"],
                datasets: [{
                    data: @json($transactionsCount),
                    backgroundColor: ['#1cc88a', '#fe1311'],
                    hoverBackgroundColor: ['#17a673', '#fe1300'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });

    </script>




@endsection
