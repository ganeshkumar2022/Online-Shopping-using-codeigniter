<ul class="nav flex-column">
  <li class="nav-item navsd">
    <a class="nav-link text-white">
		<img src="<?=base_url('profile_pictures/'.$get_profile->myimage)?>" class="img-fluid mx-auto d-block" style="height:100px;width:50%;border-radius:50%;">
	</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="<?=base_url('user/pending_orders')?>"><i class="fa-solid fa-truck-fast"></i> Pending orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="<?=base_url('user/edit_account')?>"><i class="fa-solid fa-circle-user"></i> Edit account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="<?=base_url('user/my_orders')?>"><i class="fa-solid fa-cart-shopping"></i> My orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="<?=base_url('user/delete_account')?>"><i class="fa-solid fa-trash"></i> Delete Account</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="<?=base_url('user/logout')?>"><i class="fa-solid fa-right-to-bracket"></i> Logout</a>
  </li>
</ul>
