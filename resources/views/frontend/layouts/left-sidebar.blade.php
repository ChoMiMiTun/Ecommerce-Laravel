<div class="left-sidebar">
    <div class="brands_products">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            
            <div class="panel panel-default">
                <?php
                $publiced_category = DB::table('categories')
                                    ->where('status', 1)
                                    ->get();

                foreach($publiced_category as $cat) { ?>
                
                <div class="panel-heading">
                <p class="panel-title"><a href="#">{{ $cat->title }}</a></p>  
                </div>
 
            <?php } ?>
            </div>
        </div>
    </div>
    <!--/category-products-->

    <div class="brands_products">
        <!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">

                <?php
                    $publiced_manufacture = DB::table('manufactures')
                                        ->where('public_status', 1)
                                        ->get();

                    foreach($publiced_manufacture as $manuf) { ?>
                    
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">{{ $manuf->manufacture_name }}</a></li> 

                <?php } ?>

            </div>
        </div>
    <!--/brands_products-->

    <div class="price-range">
        <!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div>
    <!--/price-range-->

    <div class="shipping text-center">
        <!--shipping-->
        <img src="{{ asset('frontend/images/home/shipping.jpg') }}" alt="" />
    </div>
    <!--/shipping-->

</div>