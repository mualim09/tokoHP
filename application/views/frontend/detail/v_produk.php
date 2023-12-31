<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <?php $kategori = $this->m_home->kategori_produk(); ?>
                        <div class="panel panel-default">
                            <?php foreach ($kategori as $key => $value) { ?>
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="<?= base_url('/home/kategori/' . $value->id_kategori) ?>"><?= $value->nama_kategori ?></a></h4>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!--/category-products-->

                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="<?= base_url() ?>eshopper/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?= base_url('assets/produk/' . $produk->images) ?>" alt="" />
                            <!-- <h3>ZOOM</h3> -->
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <?php echo form_open('belanja/add');
                        // echo form_hidden('id', $produk->id_produk);
                        // echo form_hidden('price', $produk->harga - $produk->harga_promo);
                        // echo form_hidden('name', $produk->nama_produk);
                        echo form_hidden('redirect_page', str_replace('index.php/', '', current_url())); ?>
                        <input type="hidden" name="id" value="<?= $produk->id_produk ?>">
                        <input type="hidden" class="price" name="price" value="<?= $produk->harga - $produk->harga_promo ?>">
                        <input type="hidden" name="name" value="<?= $produk->nama_produk ?>">
                        <input type="hidden" name="qty" value="1">
                        <div class="product-information">
                            <!--/product-information-->
                            <!-- <img src="<?= base_url('assets/produk/' . $produk->images) ?>" class="newarrival" alt="" /> -->
                            <h2><?= $produk->nama_produk ?></h2>
                            <p>Harga Diskon: Rp. <?= number_format($produk->harga_promo, 0) ?></p>
                            <!-- <img src="images/product-details/rating.png" alt="" /> -->
                            <span>
                                <span>Harga Asli : Rp. <?= number_format($produk->harga - $produk->harga_promo, 0) ?></span>
                                <label>Quantity:</label>
                                <input type="number" id="quantity" name="stock" value="1" min="1" max="<?= $produk->stock ?>" />
                                <!-- <button type="submit" class="btn btn-fefault cart" data-name="<?= $produk->nama_produk ?>" data-price="<?= ($produk->harga_promo > 0) ? ($produk->harga - $produk->harga_promo) : $produk->harga ?>" data-id="<?= $produk->id_produk ?>">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button> -->
                                <button href="#" class="btn btn-default add-to-cart" type="submit" data-name="<?= $produk->nama_produk ?>" data-price="<?= ($produk->harga_promo > 0) ? ($produk->harga - $produk->harga_promo) : $produk->harga ?>" data-id="<?= $produk->id_produk ?>">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Netto:</b> <?= $produk->berat ?> Gr</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> <?= $produk->nama_kategori ?></p>
                            <!-- <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a> -->
                        </div>
                        <!--/product-information-->
                        <?php echo form_close() ?>
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details">
                            <div class="col-sm-3">
                                <div class="col-sm-12">
                                    <p><?= $produk->deskripsi ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade active in" id="reviews">
                            <?php foreach ($reviews as $key => $value) { ?>
                                <div class="col-sm-12">
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i><?= $value->username ?></a></li>
                                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i><?= $value->tanggal ?></a></li>
                                    </ul>
                                    <p><?= $value->isi ?></p>
                                    <!-- <p><b>Write Your Review</b></p>

                                    <form action="#">
                                        <span>
                                            <input type="text" placeholder="Your Name" />
                                            <input type="email" placeholder="Email Address" />
                                        </span>
                                        <textarea name=""></textarea>
                                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                        <button type="button" class="btn btn-default pull-right">
                                            Submit
                                        </button>
                                    </form> -->
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                </div>
                <!--/category-tab-->

                <!--/category-tab-->

                <div class="recommended_items">
                    <!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <?php if (count($reletead_produk) > 0) : ?>
                                    <?php foreach ($reletead_produk as $product) : ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="<?= base_url('assets/produk/' . $product->images) ?>" alt="" />
                                                        <h2>Rp. <?= number_format($product->harga - $product->harga_promo, 0) ?></h2>
                                                        <p><?= $product->nama_produk ?></p>
                                                        <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>