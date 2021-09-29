<!doctype html>
<html lang="fa">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <title>Admin - @yield('title')</title>
  </head>
  <body >


    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light">
      <button class="navbar-toggler mr-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNavbar">
        <div class="container-fluid">
          <div class="row">
            <!--  sidebar  -->
           @include('admin.sections.sidebar')
            <!--  End of sidebar  -->

            <!--  top-nav  -->
            <div class="col-xl-10 col-lg-9 col-md-8 mr-auto bg-dark fixed-top py-2 top-navbar">

              <div class="row align-items-center">
                <div class="col-md-4 ">
                  <h4 class="text-light mb-0 ">مدیریت</h4>
                </div>
                <div class="col-md-5">
                  <form>
                    <div class="input-group">
                      <input type="text" placeholder="جستجو..." class="form-control search-input">
                      <button type="button" class="btn btn-white search-button"><i class="fas fa-search text-danger"></i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="col-md-3">
                  <ul class="navbar-nav">
                    <li class="nav-item icon-parent"><a href="#" class="nave-link icon-bullet"><i class="fas fa-comments text-muted fa-lg"></i></a></li>
                    <li class="nav-item icon-parent"><a href="#" class="nave-link icon-bullet"><i class="fas fa-bell text-muted fa-lg"></i></a></li>
                    <li class="nav-item mr-md-auto"><a href="#" class="nave-link"><i class="fas fa-sign-out-alt  text-danger fa-lg" data-toggle="modal" data-target="#sign-out"></i></a></li>
                  </ul>
                </div>
              </div>

            </div>
            <!--  End of top-nav  -->

          </div>
        </div>
      </div>
    </nav>
    <!-- End of navbar -->

    <!--  modal -->
    <div class="modal fade" id="sign-out">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">میخواهید خارج شوید؟</h4>
            <button type="button" class="close mr-auto ml-0" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">برای خارج شدن کلیک کن</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success m-1" data-dismiss="modal">در همین صفحه باقی می مانم</button>
            <button type="button" class="btn btn-danger m-1" data-dismiss="modal">خارج می شوم</button>
          </div>
        </div>
      </div>
    </div>
    <!--  End of modal -->

    <!-- cards  -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
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
    </section>
    <!-- End of cards -->

    <!-- table -->
    <section>
      <div class="container-fluid">
        <div class="row mb-5">
          <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
            <div class="row align-items-center">

              <div class="col-xl-6 col-12 mb-4 mb-xl-0">
                <h3 class="text-muted text-center mb-3">حقوق کارمندان</h3>
                <table class="table table-striped bg-light text-center">
                  <thead>
                    <tr class="text-muter">
                      <th>#</th>
                      <th>نام</th>
                      <th>حقوق</th>
                      <th>تاریخ</th>
                      <th> ارسال پیام</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>1</th>
                      <th>علی</th>
                      <th>2،000،000 ریال</th>
                      <th>25/5/1399</th>
                      <th><button class="btn btn-info btn-small">ارسال</button></th>
                    </tr>
                    <tr>
                      <th>2</th>
                      <th>قاسم</th>
                      <th>21،000،000 ریال</th>
                      <th>25/3/1399</th>
                      <th><button class="btn btn-info btn-small">ارسال</button></th>
                    </tr>
                    <tr>
                      <th>3</th>
                      <th>محمد</th>
                      <th>5،000،000 ریال</th>
                      <th>1/1/1399</th>
                      <th><button class="btn btn-info btn-small">ارسال</button></th>
                    </tr>
                    <tr>
                      <th>4</th>
                      <th>اکبر</th>
                      <th>7،000،000 ریال</th>
                      <th>7/7/1397</th>
                      <th><button class="btn btn-info btn-small">ارسال</button></th>
                    </tr>
                    <tr>
                      <th>5</th>
                      <th>نوری</th>
                      <th>9،000،000 ریال</th>
                      <th>13/12/1397</th>
                      <th><button class="btn btn-info btn-small">ارسال</button></th>
                    </tr>
                  </tbody>
                </table>

                <!-- pagination -->
                <nav>
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        <span>&laquo</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a href="#" class="page-link py-2 px-3">
                        1
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        2
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        3
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        <span>&raquo</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- End of pagination -->
              </div>
              <div class="col-xl-6 col-12">
                <h3 class="text-muted text-center mb-3">پرداختیهای اخیر </h3>
                <table class="table table-dark table-hover text-center">
                  <thead>
                    <tr class="text-muter">
                      <th>#</th>
                      <th>نام</th>
                      <th>پرداختی</th>
                      <th>تاریخ</th>
                      <th> وضعیت </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>1</th>
                      <th>رسول</th>
                      <th>2،000،000 ریال</th>
                      <th>12/7/1399</th>
                      <th><span class="badge badge-success py-2 w-75">تایید شده</span></th>
                    </tr>
                    <tr>
                      <th>2</th>
                      <th>مراد</th>
                      <th>4،000،000 ریال</th>
                      <th>11/1/1399</th>
                      <th><span class="badge badge-success py-2 w-75">تایید شده</span></th>
                    </tr>
                    <tr>
                      <th>3</th>
                      <th>قاسم</th>
                      <th>2،000،000 ریال</th>
                      <th>10/7/1399</th>
                      <th><span class="badge badge-danger py-2 w-75">در انتظار...</span></th>
                    </tr>
                    <tr>
                      <th>4</th>
                      <th>کریم</th>
                      <th>6،000،000 ریال</th>
                      <th>2/9/1399</th>
                      <th><span class="badge badge-danger py-2 w-75"> در انتظار...</span></th>
                    </tr>
                    <tr>
                      <th>5</th>
                      <th>حمید</th>
                      <th>6،000،000 ریال</th>
                      <th>9/3/1399</th>
                      <th><span class="badge badge-success py-2 w-75">تایید شده</span></th>
                    </tr>
                    <tr>
                      <th>6</th>
                      <th>کریم</th>
                      <th>6،000،000 ریال</th>
                      <th>2/5/1399</th>
                      <th><span class="badge badge-danger py-2 w-75"> در انتظار...</span></th>
                    </tr>
                  </tbody>
                </table>

                <!-- pagination -->
                <nav>
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        <span>قبلی</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a href="#" class="page-link py-2 px-3">
                        1
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        2
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        3
                      </a>
                    </li>
                    <li class="page-item">
                      <a href="#" class="page-link py-2 px-3">
                        <span>بعدی</span>
                      </a>
                    </li>
                  </ul>
                </nav>
                <!-- End of pagination -->
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End of table -->

    <!-- progress / task lisy -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
            <div class="row mb-4 align-items-center">

              <div class="col-xl-6 col-12 mb-4  mb-xl-0">
                <div class="bg-dark text-white p-4 rounded">
                  <h4 class="mb-5">نرخ تبدیل</h4>

                  <h6 class="mb-3">Google Chrome</h6>
                  <div class="progress mb-4" style="height: 20px;">
                    <div class="progress-bar progress-bar-striped font-weight-bold" style="width: 91%;">91%</div>
                  </div>
                  <h6 class="mb-3">Mozilla Firefox </h6>
                  <div class="progress mb-4" style="height: 20px;">
                    <div class="progress-bar progress-bar-striped font-weight-bold bg-success" style="width: 82%;">82%</div>
                  </div>
                  <h6 class="mb-3">Safari</h6>
                  <div class="progress mb-4" style="height: 20px;">
                    <div class="progress-bar progress-bar-striped font-weight-bold bg-danger" style="width: 67%;">67%</div>
                  </div>
                  <h6 class="mb-3">IE</h6>
                  <div class="progress mb-4" style="height: 20px;">
                    <div class="progress-bar progress-bar-striped font-weight-bold bg-info" style="width: 10%;">10%</div>
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
                      <a href="#" data-toggle="tooltip" title="<h6>ویرایش</h6>" data-html="true" data-placement="left">
                        <i class="fas fa-edit fa-lg text-success ml-2"></i>
                      </a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>حذف</h6>" data-html="true" data-placement="top">
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
                      <a href="#" data-toggle="tooltip" title="<h6>ویرایش</h6>" data-html="true" data-placement="left">
                        <i class="fas fa-edit fa-lg text-success ml-2"></i>
                      </a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>حذف</h6>" data-html="true" data-placement="top">
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
                      <a href="#" data-toggle="tooltip" title="<h6>ویرایش</h6>" data-html="true" data-placement="left">
                        <i class="fas fa-edit fa-lg text-success ml-2"></i>
                      </a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>حذف</h6>" data-html="true" data-placement="top">
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
                      <a href="#" data-toggle="tooltip" title="<h6>ویرایش</h6>" data-html="true" data-placement="left">
                        <i class="fas fa-edit fa-lg text-success ml-2"></i>
                      </a>
                    </div>
                    <div class="col-1">
                      <a href="#" data-toggle="tooltip" title="<h6>حذف</h6>" data-html="true" data-placement="top">
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
    </section>
    <!-- End ofprogress / task list -->

    <!-- activities / quick post -->
    <section>
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
                      <button class="btn btn-block bg-secondary text-light text-right" data-toggle="collapse" data-target="#myCommentOne">
                        <img src="{{ asset('images/cust1.jpeg') }}" width="50" class="ml-3 rounded">
                        علی یک نظر ارسال کرده
                      </button>
                    </div>
                    <div class="collapse show" id="myCommentOne" data-parent="#accordion">
                      <div class="card-body">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-right" data-toggle="collapse" data-target="#myCommentTwo">
                        <img src="{{ asset('images/cust2.jpeg') }}" width="50" class="ml-3 rounded">
                        مراد یک نظر ارسال کرده
                      </button>
                    </div>
                    <div class="collapse" id="myCommentTwo" data-parent="#accordion">
                      <div class="card-body">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-right" data-toggle="collapse" data-target="#myCommentThree">
                        <img src="{{ asset('images/cust3.jpeg') }}" width="50" class="ml-3 rounded">
                        آنی یک نظر ارسال کرده
                      </button>
                    </div>
                    <div class="collapse" id="myCommentThree" data-parent="#accordion">
                      <div class="card-body">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-right" data-toggle="collapse" data-target="#myCommentFour">
                        <img src="{{ asset('images/cust4.jpeg') }}" width="50" class="ml-3 rounded">
                        هلن یک نظر ارسال کرده
                      </button>
                    </div>
                    <div class="collapse" id="myCommentFour" data-parent="#accordion">
                      <div class="card-body">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-right" data-toggle="collapse" data-target="#myCommentFive">
                        <img src="{{ asset('images/cust5.jpeg') }}" width="50" class="ml-3 rounded">
                        جمشید یک نظر ارسال کرده
                      </button>
                    </div>
                    <div class="collapse" id="myCommentFive" data-parent="#accordion">
                      <div class="card-body">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <button class="btn btn-block bg-secondary text-light text-right" data-toggle="collapse" data-target="#myCommentSix">
                        <img src="{{ asset('images/cust6.jpeg') }}" width="50" class="ml-3 rounded">
                        نیکی یک نظر ارسال کرده
                      </button>
                    </div>
                    <div class="collapse" id="myCommentSix" data-parent="#accordion">
                      <div class="card-body">
                        لورم ایپسوازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
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
                        <button type="button" class="btn btn-block btn-info font-weight-bold text-light py-2 mb5">ارسال نظر</button>
                      </div>
                    </form>

                    <div class="row">

                      <div class="col-6">
                        <div class="card bg-light">
                          <i class="far fa-calendar-alt fa-8x text-warning d-block m-auto py-3"></i>
                          <div class="card-body">
                            <p class="card-text text-center font-weight-bold"> دوشنبه ، 26 اردیبهشت </p>
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
    </section>
    <!-- end of activities / quick post -->

    <!-- footer -->
    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-10 col-lg-9 col-md-8 mr-auto ml-0">
            <div class="row border-top pt-3">

              <div class="col-lg-6 text-center">
                <ul class="list-inline">
                  <li class="list-inline-item ml-2">
                    <a href="#" class="text-dark">خانه</a>
                  </li>
                  <li class="list-inline-item ml-2">
                    <a href="#" class="text-dark">درباره</a>
                  </li>
                  <li class="list-inline-item ml-2">
                    <a href="#" class="text-dark">حمایتها</a>
                  </li>
                  <li class="list-inline-item ml-2">
                    <a href="#" class="text-dark">وبلاگ</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-6 text-center">
                <p>&copy;  ساخته شده در سال 1400 .  با همکاری  <i class="fas fa-heart text-danger"></i> شرکت <span class="text-success"> خودم </span></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end of footer -->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin/script.js') }}"></script>
  </body>
</html>






