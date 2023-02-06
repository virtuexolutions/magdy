@extends('layouts.app_Front')

@section('content')

<section class="profile p-5">
    <div class="container">
        <div class="row pt-5">
            <!-- profilesidebar -->
            <div class="col-md-3">
                <h3 class="profile pb-5">Setting</h3>
                <div class="profileside_mu">
                    <div class="pr_img">
                        <img class="pr_img" src="images/pr.jpg" alt="">
                        <span>Ghulam Mustafa</span>
                    </div>
                    <div class="pr_details">
                        <ul class="pr_all p-0">
                            <a href="">
                                <li><i class="bi bi-person-fill"></i><span>Profile</span></li>
                            </a>
                            <a href="{{ route("shopper-profile-address") }}" class="pt-0">
                                <li><i class="bi bi-house-fill"></i><span>Address</span></li>
                            </a>
                            <a href="{{ route("shopper-cards") }}" class="pt-0">
                                <li><i class="bi bi-credit-card"></i><span>Credit Card</span></li>
                            </a>
                            <a href="" class="pt-0">
                                <li><i class="bi bi-paypal"></i><span>Shopper Requests</span></li>
                            </a>
                            {{-- <a href="" class="pt-0">
                                <li><i class="bi bi-gift-fill"></i><span>Refer a Friend</span></li>
                            </a> --}}
                            {{-- <a href="" class="pt-0">
                                <li><i class="bi bi-card-list"></i><span>Shippn Points</span></li>
                            </a> --}}
                            {{-- <a href="" class="pt-0">
                                <li><i class="bi bi-wallet2"></i><span>Coupon</span></li>
                            </a> --}}
                            <a href="" class="pt-0">
                                <li><i class="bi bi-lock-fill"></i><span>Change Password</span></li>
                            </a>
                            <a href="" class="pt-0">
                                <li><i class="bi bi-trash3-fill"></i><span>Delete Account</span></li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- profilesidebar end -->
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h2>ADD CARD</h2>
                    </div>
                    <div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
