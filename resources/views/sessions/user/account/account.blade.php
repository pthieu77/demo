<div class="profile-page">
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg "  color-on-scroll="100"  id="sectionsNav">
        <div class="container">
        
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    
      				<li class="nav-item">
      					<a class="nav-link" href="#">
      						<i class="fa fa-twitter"></i>
      					</a>
                    </li>
                      
      				<li class="nav-item">
      					<a class="nav-link" href="#">
      						<i class="fa fa-facebook-square"></i>
      					</a>
                    </li>
                      
      				<li class="nav-item">
      					<a class="nav-link"  href="#">
      						<i class="fa fa-instagram"></i>
      					</a>
      				</li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="page-header header-filter" data-parallax="true" style="background-image:url('{{asset('images/profile/back_filter.png')}}');"></div>
    <div class="main main-raised">
		<div class="profile-content">
            <div class="container">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
	                        <div class="avatar">
	                            <img src="{{asset('images/profile/user.png')}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
	                        </div>
	                        <div class="name">
	                            <h3 class="title">{{Auth::user()->name}}</h3>
								<h6>Designer</h6>
								<a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#pablo" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
	                        </div>
	                    </div>
    	            </div>
                </div>
                <div class="description text-center">
                    <p>Profile</p>
                </div>
				<div class="row">
					<div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                          <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                  <i class="material-icons">camera</i>
                                  Studio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                  <i class="material-icons">palette</i>
                                    Work
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                                  <i class="material-icons">favorite</i>
                                    Favorite
                                </a>
                            </li>
                          </ul>
                        </div>
    	    	</div>
            </div>
        
          <div class="tab-content tab-space">
            <div class="tab-pane active text-center gallery" id="studio">
  				<div class="row">
  					<div class="col-md-3 ml-auto">
  					    <img src="{{asset('images/profile/img1.jfif')}}" class="rounded">
  						<img src="{{asset('images/profile/img2.jfif')}}" class="rounded">
  					</div>
  					<div class="col-md-3 mr-auto">
  						<img src="{{asset('images/profile/img3.jfif')}}" class="rounded">
  						<img src="{{asset('images/profile/img4.jfif')}}" class="rounded">
  					</div>
  				</div>
  			</div>
            <div class="tab-pane text-center gallery" id="works">
      			<div class="row">
      				<div class="col-md-3 ml-auto">
                      <img src="{{asset('images/profile/img5.jfif')}}" class="rounded">
  					  <img src="{{asset('images/profile/img3.jfif')}}" class="rounded">
  					  <img src="{{asset('images/profile/img1.jfif')}}ded">  					</div>
      				<div class="col-md-3 mr-auto">
                      <img src="{{asset('images/profile/img2.jfif')}}" class="rounded">
                      <img src="{{asset('images/profile/img4.jfif')}}" class="rounded">
      				</div>
      			</div>
  			</div>
            <div class="tab-pane text-center gallery" id="favorite">
      			<div class="row">
      				<div class="col-md-3 ml-auto">
      				  <img src="{{asset('images/profile/img4.jfif')}}" class="rounded">
                      <img src="{{asset('images/profile/img2.jfif')}}" class="rounded">
      				</div>
      				<div class="col-md-3 mr-auto">
      				  <img src="{{asset('images/profile/img3.jfif')}}" class="rounded">  					
      				  <img src="{{asset('images/profile/img1.jfif')}}" class="rounded">
  					  <img src="{{asset('images/profile/img5.jfif')}}" class="rounded">
      			    </div>
      			</div>
      		</div>
          </div>

        
            </div>
        </div>
	</div>
	
	<footer class="footer text-center ">
        <p>&</p>
    </footer>
</div>