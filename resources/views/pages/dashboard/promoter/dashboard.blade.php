@extends('pages.dashboard.promoter.base1')
@section("cont")
<script>
    document.getElementById('dash').setAttribute('class','nav-link active')
</script>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total_events }}</h3>

                    <p>Nombre Total des Evenements</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
                                
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $total_reservation }}<sup style="font-size: 20px"></sup></h3>
                    <p>Nombre Total de Reservation</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
                                                        
        <!-- ./col -->
        
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3> {{ $revenu }} </h3>

                    <p>Revenue</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
            
                <!-- /.row -->
        <div class="row"  style="width: 100%;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Evenements</h3>
                        <div class="card-tools">
                            <form action="{{ route('promoter.search') }}" method="get">
                                <div class="input-group input-group-sm" style="width: 200px;">
                                    <input type="text" name="name" id="search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Descrition</th>
                                    <th>Lieux</th>
                                    <th>Categorie</th>
                                    <th>Date de début</th>
                                    <th>Date de fin</th>
                                </tr>
                            </thead>
                            <tbody id="content" class="alldata">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($events as $event)
                                    @if ($event->promoter_id == Auth::user()->id)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->description }}</td>
                                            <td>{{ $event->place }}</td>
                                            <td>{{ $event->category->name }}</td>
                                            <td>{{ date('d/m/Y H:i', $event->start_date) }}</td>
                                            <td>{{ date('d/m/Y H:i', $event->end_date) }}</td>
                                        </tr>
                                    @endif
                                    
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $events->links() }} --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        


@endsection
                <!-- Main row -->
               
                <!-- /.row (main row) -->
            
        <!-- /.content -->



