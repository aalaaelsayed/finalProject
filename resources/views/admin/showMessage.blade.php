<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')


<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-car"></i> <span>Rent Car Admin</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					@include('admin.includes.profile')


					<br />

							<!-- sidebar menu -->
			
							@include('admin.includes.sidebar')

							<!-- /menu footer buttons -->
							@include('admin.includes.buttons')
				</div>
			</div>

			<!-- top navigation -->
			@include('admin.includes.topNavigation')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manage Messages</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <h2>Full Name: John Doe</h2>
                  <br>
                  <h2>Email: John@gmail.com</h2>
                   <br>
                  <h2>Message Content:</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In nisi facilis, excepturi ipsum recusandae quidem doloribus veniam quisquam at, dignissimos autem quos iste libero sint architecto voluptatem consectetur possimus nobis.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        @include('admin.includes.footer')
  </body>
</html>