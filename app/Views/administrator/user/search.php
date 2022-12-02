<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="mb-sm-4 d-flex flex-wrap align-items-center text-head">
            <h2 class="mb-3 me-auto">Users</h2>

        </div>
        <div class="row contacts-list-area">
            <div class="col-xl-12">
                <div class="d-flex flex-wrap">
                    <a href="javascript:void(0);" class="btn btn-primary me-3 mb-3">+New Tranasactions</a>
                    <div class="table-search mb-3 pe-3">
                        <form action="/administrator/user/search" method="POST" class="input-group search-area">
                            <input type="text" name="search" class="form-control" placeholder="Search User by Id or Username">
                            <button type="submit" class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></button type="submit">
                        </form>
                    </div>
                    <div class="newest mb-3 me-3">
                        <select class="form-control default-select ms-0 border">
                            <option>Newest</option>
                            <option>Oldest</option>
                            <option>Newest</option>
                        </select>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-primary me-3 mb-3"><i class="fas fa-calendar me-3"></i>Filter</a>
                    <a href="javascript:void(0);" class="btn btn-warning mb-3"><i class="fas fa-redo-alt"></i></a>
                </div>
            </div>
            <?php foreach ($users as $u) : ?>
                <div class="col-xl-12">
                    <div class="card <?= $u->deleted_at != null ? 'bg-light' : '' ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3  col-lg-6 col-sm-12 align-items-center customers">
                                    <img class="me-sm-4 me-3 img-fluid " width="95" src="<?= base_url() ?>/public/administrator/images/customers/11.jpg" alt="DexignZone">
                                    <div class="media-body">
                                        <span class="text-primary d-block fs-16">#<?= $u->id ?></span>
                                        <h3 class="fs-20 text-black font-w600"><?= $u->username ?></h3>
                                        <span class="d-block mb-lg-0 mb-0">Join on <?= $u->created_at ?></span>
                                    </div>
                                </div>
                                <div class="col-xl-2  col-lg-3 col-sm-4  col-6 mb-3">
                                    <small class="mb-3 d-block fs-16 ">Location</small>
                                    <h4 class="text-black font-w600">South Market 1st London 24512</h4>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mb-3 text-lg-center">
                                    <small class="mb-3 d-block fs-16">Phone Number</small>
                                    <h4 class="text-black font-w600">+51 1234 5678</h4>
                                </div>
                                <div class="col-xl-2  col-lg-6 col-sm-4 mb-sm-3 mb-3">
                                    <small class="mb-3 d-block fs-16">Email Address</small>
                                    <h4 class="text-black font-w600"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f78598959285838796839e99849899b79a969e9bd994989a">[email&#160;protected]</a></h4>
                                </div>
                                <div class="col-xl-3  col-lg-6 col-sm-6 mb-sm-4 mb-0 d-flex ">
                                    <div class="dropdown media-dropdown mt-auto mb-auto me-auto">
                                        <div class="btn-link" data-bs-toggle="dropdown">
                                            <a href="javascript:void(0);" class="btn btn-outline-light text-primary">Order History
                                                <svg class="ms-2" width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0 -5.24537e-07L6 6L12 0" fill="#3B4CB8" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <div class="customers mb-4">
                                                <img class="me-sm-4 me-3 img-fluid" src="<?= base_url() ?>/public/administrator/images/customers/44.jpg" alt="DexignZone">
                                                <div class="media-body">
                                                    <h4 class="fs-16 text-black font-w600 mb-0">James Humbly</h4>
                                                    <span class="fs-14 d-block mb-3">2 June 2018 - 4 June 2019</span>
                                                    <div class="star-icons">
                                                        <i class="las la-star fs-18"></i>
                                                        <i class="las la-star fs-18"></i>
                                                        <i class="las la-star fs-18"></i>
                                                        <i class="las la-star fs-18"></i>
                                                        <i class="las la-star fs-18"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="customers">
                                                <img class="me-sm-4 me-3 img-fluid" src="<?= base_url() ?>/public/administrator/images/customers/3.jpg" alt="DexignZone">
                                                <div class="media-body">
                                                    <h4 class="fs-16 text-black font-w600 mb-0">James Humbly</h4>
                                                    <span class="fs-14 d-block mb-3">2 June 2018 - 4 June 2019</span>
                                                    <div class="star-icons">
                                                        <i class="las la-star"></i>
                                                        <i class="las la-star"></i>
                                                        <i class="las la-star"></i>
                                                        <i class="las la-star"></i>
                                                        <i class="las la-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($session->type == 'it') { ?>
                                        <div class="dropdown ms-4  mt-auto mb-auto">
                                            <div class="btn-link" data-bs-toggle="dropdown">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <?php if ($u->deleted_at == null) { ?>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="/administrator/user/<?= $u->id ?>/edit">Edit</a>
                                                    <?php if ($session->id != $u->id) { ?>
                                                        <form action="/administrator/user/<?= $u->id ?>" method="POST"><input type="hidden" name="_method" value="DELETE"><button class="dropdown-item" type="submit">Delete</button> </form>
                                                    <?php } ?>
                                                </div>
                                            <?php } elseif ($u->deleted_at != null) { ?>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="/administrator/user/<?= $u->id ?>/edit">Edit</a>
                                                    <form action="/administrator/user/<?= $u->id ?>/undelete" method="POST"><input type="hidden" name="undelete"><button class="dropdown-item" type="submit">Undelete</button> </form>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    <?php } else if ($session->type == 'superuser') { ?>
                                        <div class="dropdown ms-4  mt-auto mb-auto">
                                            <div class="btn-link" data-bs-toggle="dropdown">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="/administrator/user/<?= $u->id ?>/edit">Edit</a>

                                            </div>
                                        </div>
                                    <?php } else if ($session->type == 'user') { ?>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="d-flex align-items-center justify-content-between  flex-wrap">
            <!-- <div>
                <h5>Showing 5 from 160 data</h5>
            </div> -->
            <div>
                <?= $pager->links() ?>
                <!-- <ul class="pagination align-items-center">
                    <li class="page-item page-indicator">
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm me-2">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                    <li class="page-item page-indicator">
                        <a class="btn btn-primary btn-sm me-2" href="javascript:void(0)">Next</a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->