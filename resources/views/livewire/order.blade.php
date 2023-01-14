<div>
    @if(!empty($SuccessMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{$SuccessMessage}}
        </div>
    @endif
    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif


<div class="container-fluid">


    <div class="row">

        <div class="col-8">

            <div class="stepwizard ">
                <div class="stepwizard-row setup-panel ">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button"
                           class="btn btn-circle {{ $currentStep != 1 ? 'btn-primary' : 'btn-success' }}">{{ $currentStep != 1 ? '√' : 1  }}</a>
                        <p>Shipping</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button"
                           class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                        <p>Review & Payments</p>
                    </div>

                </div>
            </div>



            @include('livewire.person_information')

            @if($currentStep != 2)
                <div style="display: none" class="row setup-content" id="step-2">
                    @endif
                    <div class="col-xs-8">
                        <div class="col-md-8">
                            <br>
                            <div class="form-row">
                                <div class="col-12">
                                    <label for="title">pamy</label>
                                    <input type="email" wire:model="pamy"  class="form-control">
                                    @error('pamy')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <input type="text"   wire:model="product_id"   >
                            <input type="text"   wire:model="qty"   >

                            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                    wire:click="back(1)">{{ trans('Parents_trans.Back') }}</button>
                            <button class="btn btn-success btn-sm btn-lg pull-right"  wire:click="submitForm"
                                    type="button">{{ trans('Parents_trans.Finish') }}</button>


                        </div>
                    </div>
                </div>

        </div>


            <div class="col-4 p-2">

                <p>


                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-target
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row)
                            <td>{{ $row->name  }}  </td></br>
                            <input type="text"   value="{{$row->id}}">
                            <td> Qty : {{$row->qty}}</td>
                            <td>price : ${{$row->price}}</td>

                        @endforeach
                    </div>
                </div>

    </div>



</div>
