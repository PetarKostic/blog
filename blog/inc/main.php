    <div class="container">
        <div class="row">
            <h1 class="page-header">Articles <small>some aricles</small></h1>
            <div class="col-md-8" >
                <div id="articles"></div> 
            </div>
            <div class="col-md-4">
               <div>
                    <div class="alert alert-info text-center" style="display: none;">
                        <strong id="prikaz"></strong>
                    </div>
                </div>
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control"id="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" id="nadji" onClick="searchPost()">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>

                <div class="well">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Article created by :</label>
                                <select class="form-control" id="sel1">
                                     <option selected>Chose one</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><hr>
    </div>