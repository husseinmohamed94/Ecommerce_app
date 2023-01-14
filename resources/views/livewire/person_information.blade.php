<div>

    @if($currentStep != 1)
        <div style="display: none" class="row setup-content" id="step-1">
            @endif
            <div class="col-xs-8">
                <div class="col-md-8">
                    <br>
                    <div class="form-row">
                        <div class="col-12">
                            <label for="title">name</label>
                            <input type="text" disabled   value="{{auth()->user()->name}}" class="form-control">

                        </div>
                        <div class="col-12">
                            <label for="title">email</label>
                            <input type="text"   disabled="disabled"  value="{{auth()->user()->email}}" class="form-control">

                        </div>
                        <div class="col-12">
                            <label for="title">phone</label>
                            <input type="text" wire:model="phone"  class="form-control">
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="title">address</label>
                            <input type="text" wire:model="address" class="form-control" >
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                            type="button">{{trans('Parents_trans.Next')}}
                    </button>

                </div>
            </div>




  </div>


