<div id="sidebar-left" class="span2">
	<div class="nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="<?php echo menuaktif('dashboard',$menuaktif);?>">
				<a href="<?php echo site_url(enkripsi('dashboard','index'));?>">
					<i class="halflings-icon home white"></i>
					<span class="hidden-tablet"> Dashboard</span>
				</a>
			</li>
			<?php if($cekas=='SuperAdmin'){ ?>
				<li><a href="<?php echo site_url(enkripsi('admin','index'));?>"><i class="halflings-icon user white"></i><span class="hidden-tablet"> Admin</span></a></li>
				<li><a href="<?php echo site_url(enkripsi('database','index'));?>"><i class="icon-cogs white"></i><span class="hidden-tablet"> DataBase</span></a></li>
			<?php }?>
			<li>
				<a class="dropmenu <?php echo menuaktif('master',$menuaktif);?>" href="#">
					<i class="halflings-icon hdd white"></i><span class="hidden-tablet"> Master </span>&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="halflings-icon chevron-down white"></span>
				</a>
				<ul>
					<li><a class="submenu" href="<?php echo site_url(enkripsi('dosen','index'));?>"><i class="icon-certificate"></i><span class="hidden-tablet"> Dosen</span></a></li>
				<?php if($cekas=='SuperAdmin'){ ?>
					<li><a class="submenu" href="<?php echo site_url(enkripsi('campaign','index'));?>"><i class="icon-calendar"></i><span class="hidden-tablet"> Campaign</span></a></li>
					<li><a class="submenu" href="<?php echo site_url(enkripsi('jurusan','index'));?>"><i class="icon-random"></i><span class="hidden-tablet"> Jurusan</span></a></li>
				<?php }?>
					<li><a class="submenu" href="<?php echo site_url(enkripsi('mahasiswa','index'));?>"><i class="icon-group"></i><span class="hidden-tablet"> Mahasiswa</span></a></li>					
					<li><a class="submenu" href="<?php echo site_url(enkripsi('tatausaha','index'));?>"><i class="icon-pencil"></i><span class="hidden-tablet"> Tata Usaha</span></a></li>
				</ul>	
			</li>
			<li>
				<a class="dropmenu <?php echo menuaktif('poling',$menuaktif);?>" href="#">
					<i class="halflings-icon list white"></i><span class="hidden-tablet"> Poling </span>&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="halflings-icon chevron-down white"></span>
				</a>
				<ul>
					<li><a class="submenu" href="<?php echo site_url(enkripsi('calon','index'));?>"><i class="icon-star"></i><span class="hidden-tablet"> Calon</span></a></li>
					<li><a class="submenu" href="<?php echo site_url(enkripsi('pemilih','index'));?>"><i class="icon-user-md"></i><span class="hidden-tablet"> Pemilih</span></a></li>
					<li><a class="submenu" href="<?php echo site_url(enkripsi('hasil','index'));?>"><i class="icon-file-alt"></i><span class="hidden-tablet"> Hasil</span></a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>