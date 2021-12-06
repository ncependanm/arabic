          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($menu=="dashboard"){echo "active";}?>">
              <a href="<?=base_url()?>backend/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
			
			
            <li class="treeview <?php if($menu=="master"){echo "active";}?>">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($subMenu=="user"){echo "active";}?>">
				  <a href="<?=base_url()?>backend/user">
					<i class="fa fa-circle-o"></i> <span>User</span>
				  </a>
				</li>
				<li class="<?php if($subMenu=="pendaftar"){echo "active";}?>">
				  <a href="<?=base_url()?>backend/pendaftar">
					<i class="fa fa-circle-o"></i> <span>Pendaftar</span>
				  </a>
				</li>
				<li class="<?php if($subMenu=="kelasBiaya"){echo "active";}?>">
				  <a href="<?=base_url()?>backend/kelasBiaya">
					<i class="fa fa-circle-o"></i> <span>Kelas & Biaya</span>
				  </a>
				</li>
				<li class="<?php if($subMenu=="jadwal"){echo "active";}?>">
				  <a href="<?=base_url()?>backend/jadwal">
					<i class="fa fa-circle-o"></i> <span>Jadwal</span>
				  </a>
				</li>
				<li class="<?php if($subMenu=="medsos"){echo "active";}?>">
				  <a href="<?=base_url()?>backend/medsos">
					<i class="fa fa-circle-o"></i> <span>Medsos</span>
				  </a>
				</li>
              </ul>
            </li>
			
			<li class="treeview <?php if($menu=="laporan"){echo "active";}?>">
              <a href="#">
                <i class="fa fa-files-o"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li class="<?php if($subMenu=="konfirmasi"){echo "active";}?>">
				  <a href="<?=base_url()?>backend/konfirmasi">
					<i class="fa fa-circle-o"></i> <span>Konfirmasi Pembayaran</span>
				  </a>
				</li>
				<li class="<?php if($menu=="donasi"){echo "active";}?>">
				  <a href="<?=base_url()?>backend/donasi">
					<i class="fa fa-circle-o"></i> <span>Donasi</span>
				  </a>
				</li>
              </ul>
            </li>
			
			
            <li class="<?php if($menu=="email"){echo "active";}?>">
              <a href="<?=base_url()?>backend/email">
                <i class="fa fa-envelope"></i> <span>Email</span>
              </a>
            </li>
            <li class="<?php if($menu=="testimoni"){echo "active";}?>">
              <a href="<?=base_url()?>backend/testimoni">
                <i class="fa fa-user"></i> <span>Testimoni</span>
              </a>
            </li>
            <li class="<?php if($menu=="galery"){echo "active";}?>">
              <a href="<?=base_url()?>backend/galery">
                <i class="fa fa-th"></i> <span>Galery</span>
              </a>
            </li>
            <li class="<?php if($menu=="blog"){echo "active";}?>">
              <a href="<?=base_url()?>backend/blog">
                <i class="fa fa-edit"></i> <span>Blog</span>
              </a>
            </li>
          </ul>