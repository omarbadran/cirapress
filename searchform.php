<form class="input-group mb-3" action="/" method="get">
    <input  type="text" name="s" id="search" class="form-control border-0 bg-white" placeholder="Search plugins ..." aria-label="search" aria-describedby="basic-addon2">

    <? if ( is_front_page() ) { ?>
        <input type="hidden" name="post_type" value="product" />
    <? } ?>

    <div class="input-group-append">
        <button href="search-page.html" class="btn btn-primary" type="submit"><i class="las la-search"></i></button>
    </div>
</form>