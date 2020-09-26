@extends('layouts.appw', ['class' => 'bg-lighter'])
@section('content')
    <div class="header bg-gradient-lighter py-3">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    {{-- <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" class="img img-fluid w-25" alt="..."> --}}
                </div>
                <div class="col-sm-12">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" class="img img-fluid w-25" alt="...">
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{url('/')}}" class="btn btn-md btn-dark">{{ __('Go Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <main>
                        <div class="card-body">
                            <form method="post" action="{{ route('queues.update', $queues) }}" autocomplete="off">
                                @csrf
                                @method('put')

                                <h6 class="heading-small text-muted mb-4">{{ __('Edit Queue') }}</h6>
                                <div class="pl-lg-4">

                                    <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }} text-center">
                                        <div class="col">
                                        <label  class="form-control-label text-lg" for="input-department">{{ __('Choose Department') }}</label>

                                    </div>

                                            <div class="col text-center" data-toggle="buttons">
                                                <div class="row text-center">
                                                    @foreach ($departments as $department)
                                                    <div class=" btn-group-toggle col-sm-12 col-md-4 text-center mt-2">
                                                        <label @click="setDropdown('{{$department->name}}')" class="btn btn-default btn-lg w-100 text-uppercase" onclick="getdept({{$department}})">
                                                            <input type="radio" name="department" value="{{ $department->name}}" sr-only required> {{ $department->name}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>

                                        @if ($errors->has('department'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="mb-2">
                                    <span class="text-left text-red">* Required</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}<span class="text-red"> *</span></label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$queues->name}}" required autofocus disabled>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12 col-md-4 form-group{{ $errors->has('snumber') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-snumber">{{ __('Student number') }}</label>
                                            <input type="number" name="snumber" id="input-snumber" class="form-control form-control-alternative{{ $errors->has('snumber') ? ' is-invalid' : '' }}" placeholder="{{ __('Student number') }}" value="{{$queues->snumber}}" autofocus disabled>

                                            @if ($errors->has('snumber'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>student number must be numeric and exactly 8 numbers.</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12 col-md-4 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{$queues->email}}" autofocus disabled>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12 col-md-4 form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-mobile">{{ __('Mobile number') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text">+63</div>
                                                </div>
                                                <input type="number" name="mobile" id="input-mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex. 9151234567') }}" value="{{$queues->mobile}}" autofocus disabled>
                                                @if ($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>mobile number must be numeric and exactly 10 numbers. Ex: 9151234567</strong>
                                                </span>
                                                @endif
                                              </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4 form-group{{ $errors->has('transaction') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-transaction">{{ __('Transaction') }}</label>
                                            <select class="form-control form-control-md" v-if="dropdown.length" v-model="selected" name="transaction" required>
                                                {{-- <option hidden value="">Choose Transaction...</option> --}}
                                                <option v-for="item in dropdown" :value="item">@{{ item }}</option>
                                                {{-- @foreach ($transactions as $transaction)
                                            <option>{{$transaction->name}}</option>
                                            @endforeach --}}

                                            <option>Other</option>
                                            </select>
                                            @if ($errors->has('transaction'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('transaction') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12 form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-remarks">{{ __('Notes / Remarks') }}</label>
                                            <textarea row="4" name="remarks" id="input-remarks" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="{{ __('Notes / Remarks for the transaction...') }}" value="{{ old('remarks') }}" autofocus>{{$queues->remarks}}</textarea>

                                            @if ($errors->has('remarks'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('remarks') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <input type="hidden" name="letter" id="letter" value="">
                                    {{-- <input type="hidden" name="number" id="number" value=""> --}}

                                    <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                                        <input class="custom-control-input" id="customCheck6" type="checkbox" required>
                                        <label class="custom-control-label font-weight-bold" for="customCheck6">I confirm that the information given in this form is true, complete and accurate.</label>
                                      </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </main>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container static-bottom py-3">
        @include('layouts.footers.nav')
    </div>

@endsection

@push('js')
<script>
    function getdept(dept) {
        document.getElementById('letter').value = dept.letter;
    }
</script>
<script>
    const app = new Vue({
        el:'main',
        data:{
            dropdown: [],
            selected: null,
            trans:{
//                     accounting: [
//                         {id: 1, name: 'Statement of Account'},
//                         {id: 2, name: 'Examination Permit	'},
//                         {id: 3, name: 'Payment Breakdown'}

//                     ],
//                     registrar: [
//                         {id: 1, name: 'Request document'},
//                         {id: 2, name: 'Claim a document'}

//                     ],
//                     cashier: [
//                         {id: 1, name: 'Tuition Fee'},
//                         {id: 2, name: 'Miscellaneous Fee'},
//                         {id: 3, name: 'Business Centre'}


//   ]
}

        },
        mounted(){
            this.getTrans();

        },
        methods:{
            getTrans(){
                axios.get('edit/transactions2')
                .then((response)=>{
                    this.trans=response.data
                })

                .catch(function (error){
                    console.log(error);
                });
            },
            setDropdown: function (type) {
                        this.selected = null;
                        this.dropdown = this.trans[type];
                        console.log(type)
                        }

        }
    })
</script>
@endpush

