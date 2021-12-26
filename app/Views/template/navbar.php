<nav class="navbar" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
		<!-- Home button -->
		<a class="navbar-item" href="<?php baseUrl('/') ?>">
			<?php component('ApplicationMark') ?>
			<span>Scada</span>
			<span>Unity</span>
		</a>
		<!-- Hamburger button menu -->
		<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</a>
	 </div>

	 <div class="navbar-menu">
		 <div class="navbar-start">

			</div>

		  <div class="navbar-end">
		    <div class="navbar-item">
		      <div class="buttons">
		        <a class="button is-primary">
		          <strong>Criar contra</strong>
		        </a>
		        <a class="button is-light">
		          Log in
		        </a>
		      </div>
		    </div>
				<div class="navbar-item has-dropdown is-hoverable">
 				 <a class="navbar-link">
					 	<span class="icon">
   			 			<i class="fa fa-user"></i>
 						</span>
 				 </a>
 				 		<div class="navbar-dropdown is-right">
 								<a class="navbar-item">About</a>
 								<a class="navbar-item">Jobs</a>
 		          	<a class="navbar-item">Contact</a>
 		          	<hr class="navbar-divider">
 		          	<a class="navbar-item">Sair</a>
 						</div>
 				</div>
		  </div>
		</div>
	</nav>

<script type="text/javascript">

</script>

<style media="screen">
	.navbar {
		left: 0;
		top: 0;
		z-index: 2;
		background-color: white;
		justify-content: space-around;
		width: 100%;
		border-bottom: 1px solid lightgray;
	}
</style>
