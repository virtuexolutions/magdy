@extends('layouts.app_Front')

@section('content')

<section class="profile">
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
                            <a href="" class="pt-0">
                                <li><i class="bi bi-house-fill"></i><span>Address</span></li>
                            </a>
                            <a href="" class="pt-0">
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
                <div class="pr_information">
                    <h3 class="basic">Basic info
                        <span class="edit"><a href="{{ route("setup_profile.index") }}">Edit Profile<i class="bi bi-pencil-fill"></i></a></span>
                    </h3>
                    <hr>
                    <!-- innerrow -->
                    <div class="row">
                        <div class="col-md-6 pr-input pt-3">
                            <h4>First Name</h4>
                            <h5 class="pt-1 pb-4">Ghulam</h5>
                            <h4>Email</h4>
                            <h5 class="pt-1 pb-4">abc@gmail.com</h5>
                            <h4>Occupation</h4>
                            <h5 class="pt-1 pb-4"></h5>
                            <h4>Gender</h4>
                            <h5 class="pt-1 pb-4"></h5>
                            <h4>Languages</h4>
                            <h5 class="pt-1 pb-4"></h5>
                            <h4>Social Accounts</h4>
                            <h5 class="pt-1 pb-4">
                                <i class="bi bi-facebook"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-instagram"></i>
                            </h5>

                        </div>
                        <div class="col-md-6 pr-input pt-3">
                            <h4>Last Name</h4>
                            <h5 class="pt-1 pb-4">Mustafa</h5>
                            <h4>Phone Number</h4>
                            <h5 class="pt-1 pb-4">+1234567890</h5>
                            <h4>Birthday</h4>
                            <h5 class="pt-1 pb-4">0.0.0</h5>
                            <h4>Newsletter Membership</h4>
                            <h5 class="pt-1 pb-4">No</h5>
                            <h4>Your Interests</h4>
                            <h5 class="pt-1 pb-4"></h5>

                        </div>
                    </div>
                    <!-- innerrow end -->
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
