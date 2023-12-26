@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Compose</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Compose</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-3">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Folders</h3>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                    <li class="nav-item active">
                        <a href="/admin/managementMessage" class="nav-link active">
                        <i class="fas fa-inbox"></i> All Messages
                        <span class="badge bg-danger float-right">{{$count}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/sendTemplate" class="nav-link">
                        <i class="far fa-envelope"></i> Sent Message
                        </a>
                    </li>
                    </ul>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                @foreach($messages as $message)
                <div class="card card-primary card-outline">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h6>From: {{$message['admin']->email}}
                            <span class="mailbox-read-time float-right">{{$message->created_at}}</span></h6>
                        </div>
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <p>{{$message->title}}</p>

                            <p>{!!$message->body!!}</p>
                        </div>
                    </div>
                    
                    <!-- /.card-footer -->
                </div>
                @endforeach
                <!-- /.card -->
            </div>
            
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@include('dashboard.layout.footer')
