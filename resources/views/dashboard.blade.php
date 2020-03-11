@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-sm-12 py-5 mb-xl-0">

                <div class="card shadow">

                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Queue list</h2>
                            </div>
                            <div class="col text-right">
                                <div class="row">


                                @foreach ($counters as $counter)
                                <div class="col">
                            {{-- <a href="{{ route('home.callqueue')}}" class="btn btn-md btn-success">Call Next: {{$counter->name}}</a> --}}

                            <form method="post" action="{{ route('home.callqueue') }}" autocomplete="off">
                                @csrf
                            @method('put')
                            <input type="hidden" name="called" value="yes">
                            <input type="hidden" name="counter" value="{{$counter->name}}">
                            <button type="submit" class="btn btn-md btn-success">Call Next: {{$counter->name}}</button>
                              </form>
                            </div>
                               @endforeach
                            </div>
                        </div>


                        </div>
                    </div>
                    <div id="queuelist" class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Queue number</th>
                                    <th scope="col">name</th>
                                    <th scope="col">Student number</th>
                                    <th scope="col">Transaction</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Called</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($queues as $queue)
                                <tr>
                                    <th scope="row">
                                        {{ $queue->letter }}-{{ $queue->number }}
                                    </th>
                                    <th scope="row">
                                        {{ $queue->name }}
                                    </th>
                                    <td>
                                        {{ $queue->snumber }}
                                    </td>
                                    <td>
                                        {{ $queue->transaction }}
                                    </td>
                                    <td>
                                        {{ $queue->remarks }}
                                    </td>
                                    <td>
                                        {{ $queue->called }}
                                    </td>
                                    <td class="text-center">
                                        @if( $queue->called =="yes")
                                        <a href="{{ route('home.recall',$queue) }}" class="btn btn-sm btn-primary"><i class="fas fa-redo-alt"></i> Recall</a>
                                        @else
                                        <a  class="btn btn-sm btn-light text-white disabled"  aria-disabled="true"><i class="fas fa-redo-alt"></i> Recall</a>
                                        @endif
                                        {{-- <a href="{{ route('home.transfer',$queue) }}" class="btn btn-sm btn-info"><i class="fas fa-exchange-alt"></i> Transfer</a> --}}
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-exchange-alt"></i>
                                            Transfer
                                          </button>
                                        <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-times"></i>  Remove</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel" class="text-primary font-weight-bold">Transfer Queue</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                @csrf
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="text-default font-weight-bold">Department</label>
                        <select onclick="getdept({{$depts}})" class="form-control text-capitalize" id="exampleFormControlSelect1">
                            <option value="" hidden>Choose Department...</option>
                            @foreach ($depts as $dept)
                        <option class="text-capitalize" value="{{$dept->name}}">{{$dept->name}}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="text-default font-weight-bold">Transaction</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="text-default font-weight-bold">Remarks</label>
                        <textarea class="form-control form-control-alternative" rows="3" placeholder="Transaction notes or remarks..."></textarea>
                    </div>
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="letter" id="letter" value="">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

  {{-- END MODAL--}}



                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $queues->links() }}
                        </nav>
                    </div>
                </div>
            </div>



            <div class="col-sm-12">
                <div class="card shadow">
                    <div class="card-body">
                                <h2 class="mb-2">Notification message</h2>
                                <form method="post" action="{{ route('home.updatenotif') }}" autocomplete="off">
                                    @csrf
                                @method('put')
                                    <textarea class="form-control" name="text" id="notif" rows="1" placeholder="Notification text">{{$notification}}</textarea>
                                    <div class="row mt-3 align-items-center">
                                        <div class="col-sm-12 col-md-6">
                                            <p class="text-muted"><small>This message will be displayed at the bottom of the <a href="{{route('display.index')}}" class="text-info" target="_blank">Queue Display</a>.</small></p>
                                        </div>
                                        <div class="col-sm-12 col-md-6 text-right">
                                            <button type="submit" class="btn btn-success">Apply</button>
                                        </div>
                                    </div>
                                  </form>





                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
@push('js')
<script>
    $(document).ready(
 function() {
 setInterval(function() {
    $('#queuelist').load('admin #queuelist');
    console.log('refresh');
 }, 5000);  //Delay here = 5 seconds
});
</script>
<script>
    function getdept(dept) {
        document.getElementById('letter').value = dept.option.letter;
        console.log(dept.value.letter);
    }
</script>
@endpush



