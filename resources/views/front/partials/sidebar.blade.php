<?php
$categories = \App\Models\Category::all();
?>
<!-- Header Area End -->

<div class="shop_sidebar_area">

    <!-- ##### Single Widget ##### -->
    <div class="widget catagory mb-50">
        <!-- Widget Title -->
        <h6 class="widget-title mb-30">KATEGORILER</h6>

        <!--  Catagories  -->
        <div class="catagories-menu">
            <ul>
                @foreach($categories as $category)
                    <li><a href="{{ route('front.products', $category->id) }}">{{ $category->category_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

<!-- ##### Main Content Wrapper End ##### -->