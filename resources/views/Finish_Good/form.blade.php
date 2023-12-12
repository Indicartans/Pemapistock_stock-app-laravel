<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-item" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label for="harga_beli">Price</label>
                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="text" class="form-control" id="qty" name="qty" required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label for="nomer_spb">Nomer SPB</label>
                            <input type="text" class="form-control" id="nomer_spb" name="nomer_spb" autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" autofocus>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            {!! Form::select('category_id', $category, null, ['class' => 'form-control select', 'placeholder' => '-- Choose Category --', 'id' => 'category_id', 'required']) !!}
                            <span class="help-block with-errors"></span>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->