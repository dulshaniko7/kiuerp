@extends('slo::layouts.master')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ route('register.index')}}""><div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$count}}</h3>

                        <p>Reg Students</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ route('register.create')}}"> <div class="small-box bg-success">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Quick Req</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href=""><div class="small-box bg-warning">
                    <div class="inner">
                        <h3>45</h3>

                        <p>Batch Transfers </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href=""><div class="small-box bg-danger">
                    <div class="inner">
                        <h3>65</h3>

                        <p>Student Inactive/Drop</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href=""><div class="small-box bg-info">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Finance Reports</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href=""><div class="small-box bg-success">
                    <div class="inner">
                        <h3>0</h3>

                        <p>Student Messages</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href=""><div class="small-box bg-warning">
                    <div class="inner">
                        <h3>2</h3>

                        <p>Student Groups</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href=""><div class="small-box bg-danger">
                    <div class="inner">
                        <h3>2</h3>

                        <p>Payment Plan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href=""><div class="small-box bg-info">
                    <div class="inner">
                        <h4>Student Group</h4>


                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href=""><div class="small-box bg-success">
                    <div class="inner">
                        <h4>Time Table</h4>


                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div></a>
            </div>
            <!-- ./col -->

            <!-- ./col -->

            <!-- ./col -->
        </div>

        <!-- /.row -->

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<div id="app"></div>

<script>
    let app = new Vue({
        el: '#app',
        router,
        template: '<MainApp/>',
        components: {MainApp},
    });

    /*
    You can use either above or below
    */

    /*let app = new Vue({
        el: "#app",
        router,
        render:h => h(MainApp)
    });*/
</script>
@endsection

