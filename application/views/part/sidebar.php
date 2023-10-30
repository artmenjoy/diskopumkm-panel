<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="<?php echo base_url() ?>home"><img src="<?= base_url() ?>assets/img/logo/logo-2.png" width="80%" alt="" class="mt-2"></a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url() ?>home"><img src="<?= base_url() ?>assets/img/logo/favicon.png" width="60%" alt="" class="mt-2"></a>
      </div>
      <ul class="sidebar-menu mt-5">
        <li class="menu-header">Utama</li>
        <li class="<?=($title['parent'] == "Beranda")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>home"><i class="far fa-circle"></i> <span>Beranda</span></a></li>
        <!-- <li class="<?=($title['parent'] == "Dashboard")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>dashboard"><i class="far fa-chart-bar"></i> <span>Dashboard</span></a></li> -->

        
				<?php 
          if(isset($this->session->userdata['logged_in']['permissions']) && (
              in_array("content-post", $this->session->userdata['logged_in']['permissions']) ||
              in_array("content-pages", $this->session->userdata['logged_in']['permissions']) ||
              in_array("content-announcement", $this->session->userdata['logged_in']['permissions'])
          )):
        ?>   
				<li class="menu-header">Konten</li>
        <?php endif;?>

				<?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("content-post", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Artikel")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>content/post"><i class="far fa-newspaper"></i> <span>Artikel</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("content-pages", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Halaman")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>content/page"><i class="fas fa-passport"></i> <span>Halaman</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("content-announcement", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Pengumuman")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>content/announcement"><i class="fas fa-bullhorn"></i> <span>Pengumuman</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("content-service", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Layanan")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>content/service"><i class="fas fa-person-booth"></i> <span>Layanan</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("content-sliders", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Slider")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>content/sliders"><i class="fas fa-images"></i> <span>Slider</span></a></li>
        <?php endif;?>

				

				<?php 
          if(isset($this->session->userdata['logged_in']['permissions']) && (
              in_array("ref-post-category", $this->session->userdata['logged_in']['permissions']) ||
              in_array("ref-settings", $this->session->userdata['logged_in']['permissions'])
          )):
        ?>   
        <li class="menu-header">Referensi</li>
        <?php endif;?>
				<?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("ref-post-category", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Kategori Artikel")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>ref/post_category"><i class="fas fa-bookmark"></i> <span>Kategori Artikel</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("ref-settings", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Pengaturan")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>ref/settings"><i class="fas fa-cog"></i> <span>Pengaturan</span></a></li>
        <?php endif;?>
 

        <?php 
          if(isset($this->session->userdata['logged_in']['permissions']) && (
              in_array("auth-users", $this->session->userdata['logged_in']['permissions']) ||
              in_array("auth-roles", $this->session->userdata['logged_in']['permissions']) ||
              in_array("auth-permissions", $this->session->userdata['logged_in']['permissions'])
          )):
        ?>        
        <li class="menu-header">Autentikasi</li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("auth-users", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Pengguna")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>auth/users"><i class="far fa-user"></i> <span>Pengguna</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("auth-roles", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Peran")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>auth/roles"><i class="far fa-user-circle"></i> <span>Peran</span></a></li>
        <?php endif;?>
        <?php if(isset($this->session->userdata['logged_in']['permissions']) && in_array("auth-permissions", $this->session->userdata['logged_in']['permissions'])):?>        
        <li class="<?=($title['parent'] == "Hak Akses")?"active":"";?>"><a class="nav-link" href="<?= base_url();?>auth/permissions"><i class="far fa-address-card"></i> <span>Hak Akses</span></a></li>
        <?php endif;?>

      </ul> 
    </aside>
</div>
