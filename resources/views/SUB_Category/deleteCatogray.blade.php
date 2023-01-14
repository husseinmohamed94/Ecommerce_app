<div class="modal fade" id="categorydelete{{$subCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POst" action="{{route('SubCategory.destroy',$subCategory->id)}}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$subCategory->id}}" class="form-control" name="id" id="exampleInputEmail1" = placeholder="Enter Name">

                    <div class="form-group">
                        <h3 for="exampleInputEmail1"> {{$subCategory->Name}} هل انت متاكد من الحذف ؟ </h3>

                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submitz" class="btn btn-primary">Save changes</button>
            </div>

            </form>

        </div>
    </div>
</div>
