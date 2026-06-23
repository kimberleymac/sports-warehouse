<div class="admin-navigation" aria-label="admin-navigation">
<ul class="admin-navigation__ul">
    
    @adminOnly
    <li><a href="{{ route('admin.items.index')}}">Edit Items</a></li>
    <li><a href="{{ route('admin.categories.index')}}">Edit Categories</a></li>
    @endAdminOnly
    <li><a href="#">View your orders</a></li>
     
</ul>
</div>