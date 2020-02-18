@extends('layouts.app', ['title' => __('Reports')])

@section('content')
    {{-- @include('layouts.headers.cards') --}}


    <div class="header bg-gradient-dark pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <h1 class="text-white display-2">Reports</h1>
            </div>
        </div>
    </div>



    <div class="container mt-4">
        <div class="row">

          <div class="form-group col-md-5">
            <h5>From<span class="text-danger"></span></h5>
            <div class="controls">
                <input type="date" name="from_date" id="from_date" class="form-control datepicker-autoclose" placeholder="Please from date">
              </div>
          </div>

          <div class="form-group col-md-5">
            <h5>To<span class="text-danger"></span></h5>
            <div class="controls">
                <input type="date" name="to_date" id="to_date" class="form-control datepicker-autoclose" placeholder="Please to date">
            </div>
          </div>

          <div class="form-group col-md-2" style="margin-top: 32px;">
            <div class="controls">
            <button type="text" id="btn-search" class="btn btn-info form-control">Submit</button>
           </div>
         </div>

        </div>

        <div class="table-responsive">
            <table class="table align-items-center table-flush"  id="reporttable">
                <thead class="thead-light">
                <tr>
                <th scope="col">Name</th>
                 <th scope="col">Student number</th>
                 <th scope="col">Email</th>
                 <th scope="col">Mobile number</th>
                 <th scope="col">Department</th>
                 <th scope="col">Transaction</th>
                 <th scope="col">Remarks</th>
                 <th scope="col">Created at</th>


                </tr>
                </thead>
            </table>
        </div>


        @include('layouts.footers.auth')
    </div>
    <script>
        $(document).ready( function () {
         $('#reporttable').DataTable({
              processing: true,
              serverSide: true,
             ajax: {
               url: "{{ url('/reports') }}",
               type: 'GET',
               data: function (d) {
               d.from_date = $('#from_date').val();
               d.to_date = $('#to_date').val();
               }
              },
              columns: [
                       { data: 'name', name: 'name' },
                       { data: 'snumber', name: 'snumber' },
                       { data: 'email', name: 'email' },
                       { data: 'mobile', name: 'mobile' },
                       { data: 'department', name: 'department' },
                       { data: 'transaction', name: 'transaction' },
                       { data: 'remarks', name: 'remarks' },
                       { data: 'created_at', name: 'created_at' },
                    ]
          });
        });
       $('#btn-search').click(function(){
          $('#reporttable').DataTable().draw(true);
       });
      </script>
@endsection


