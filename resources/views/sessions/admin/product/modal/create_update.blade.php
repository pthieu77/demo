<div id="modal_product" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frm_product" data-parsley-validate>
          <div class="form-group">
            <label for="product_name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="product_name" name="name" placeholder="Name..."
              required data-parsley-required-message="Name is required."/>
          </div>

          <div class="form-group">
            <label for="product_title" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="product_title" name="title" placeholder="Title..."
              required data-parsley-required-message="Title is required."
            />
          </div>

          <div class="form-group">
            <label for="product_amount" class="col-form-label">Amount:</label>
            <input type="text" class="form-control" id="product_amount" name="amount" placeholder="Amount..."
              required data-parsley-required-message="Amount is required."
            />
          </div>

          <div class="form-group">
            <label for="product_image" class="col-form-label">Image:</label>
            <input type="file" id="image" name="image">
            <div id="error_image" class="parsley-errors-list filled d-none">
              <li class="parsley-required">Image is required.</li>
            </div>
          </div>

          <div class="form-group">
            <label for="product_description" class="col-form-label">Description:</label>
            <textarea class="form-control" id="product_description" name="description" 
              placeholder="Description..."
              required data-parsley-required-message="Description is required."></textarea>
            <div id="error_description" class="parsley-errors-list filled d-none">
              <li class="parsley-required">Description is required.</li>
            </div>
          </div>

        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="btn_update_product" class="btn btn-primary"><i class="fas fa-share"></i> Save</button>
      </div>
    </div>
  </div>
</div>