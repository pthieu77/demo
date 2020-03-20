<div class="col-12">
    <div class="card group-body-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group mb-3">
                    <input type="text" id="filter_search" class="form-control" placeholder="Search..." aria-describedby="filter_search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="filter_search_btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <select class="form-control" value="10" id="filter_paging" style="width: 100%;">
                    <option value="10">Show 10 entries</option>
                    <option value="20">Show 20 entries</option>
                    <option value="50">Show 50 entries</option>
                    <option value="100">Show 100 entries</option>
                </select>
            </div>

            <div class="col-sm-6 col-lg-3 mb-3">
                <button type="button" id="btn_create_product" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Create</button>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <table id="table_product" class="table table-striped table-hover" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Title</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</div>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>