@extends('layouts.app_Front')

@section('content')
<link rel="stylesheet" href="{{ asset("css/profile_form.css") }}">
<section class="profile p-5     ">
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
                            <a href="{{ route('shopper-dashboard') }}">
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
                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    @if(Session::has("success"))
                    @if(Session::get("success") == true)
                       <div class="alert alert-success" role="alert">
                           <strong>{{Session::get("message")}}</strong>
                       </div>
                    @else
                     <div class="alert alert-success" role="alert">
                        <strong>{{Session::get("message")}}</strong>
                    </div>
                    @endif
                    @endif
                    <img src="{{ asset("images/address-icon.png") }}" class="address-icon w-50 mt-5" />
                    @if(count($addresses) == 0) <h3>You don't have any previously saved addresses, you can add a new address here.</h3> @endif
                    <button class="btn btn-lg btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Address</button>
                    @if(count($addresses) > 0)
                    <table class="table mt-5">
                           <thead>
                               <tr>
                                   <th colspan="3">Address Detail</th>
                               </tr>
                           </thead>
                       <tbody>
                           @foreach ($addresses as $item)
                               <tr >
                                   <th>
                                       <div class="d-flex justify-content-between w-100">
                                           <div>
                                               <p>
                                                   {{ $item->address_1 }}<br>
                                                   {{ $item->address_2 }}<br>
                                                   {{ $item->country }}<br>
                                                   {{ $item->city }}<br>
                                                   {{ $item->state }}<br>
                                                   {{ $item->postal }}<br>
                                               </p>
                                           </div>
                                           <div class="actions-buttons">
                                                   <a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id}}"  class="btn btn-primary btn-md text-white">Edit</a> <br>
                                                   <a href="{{ route('delete_address',["id" => $item->id]) }}" class="btn btn-danger btn-md text-white">Delete</a>
                                           </div>  
                                       </div>
                                   </th>
                               </tr>
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabe{{ $item->id }}" aria-hidden="true">
                                       <div class="modal-dialog modal-lg modal-dialog-centered">
                                         <div class="modal-content">
                                           <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalLabel{{ $item->id }}">Add New Address</h5>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                           </div>
                                           <div class="modal-body">
                                               <form class="g-3" action="{{ route("edit_address") }}" method="post" novalidate>
                                                 @csrf
                                               <div class="row">
                                                   <input type="hidden" name="id" value="{{ $item->id }}"/>
                                                 <div class="col-md-6">
                                                   <label for="validationCustom01" class="form-label">Address Line 1</label>
                                                   <input type="text" name="address_1" value="{{ $item->address_1 }}" class="form-control" id="validationCustom01"  required>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <label for="validationCustom02" class="form-label">Address Line 2</label>
                                                   <input type="text" name="address_2" value="{{ $item->address_2 }}" class="form-control" id="validationCustom02" required>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <label for="validationCustom04" class="form-label">Country</label>
                                                   <select class="form-select">
                                                       @foreach(config("constants.countries") as $k => $item)
                                                          <option value="{{$k}}">{{$item}}</option>
                                                    @endforeach
                                                   </select>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <label for="validationCustom03" class="form-label">City</label>
                                                   <input type="text" name="city" value="{{ $item->city ?? "" }}" class="form-control" id="validationCustom03" required>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <label for="validationCustom05" class="form-label">State</label>
                                                   <input type="text" name="state" value="{{ $item->state ?? ""}}" class="form-control" id="validationCustom05" required>
                                                 </div>
                                                 <div class="col-md-6">
                                                   <label for="validationCustom05" class="form-label">Post Code</label>
                                                   <input type="text" name="postal"  value="{{ $item->postal ?? 00 }}" class="form-control" id="validationCustom05" required>
                                                 </div>
                                                 <div class="col-12">
                                                   <div class="form-check">
                                                     <input class="form-check-input" @if($item->d_address ?? 0 == 1) checked @endif type="checkbox" value=1 name="d_address" id="invalidCheck" required>
                                                     <label class="form-check-label" for="invalidCheck">
                                                       Default address
                                                     </label>
                                                   </div>
                                                 </div>
                                                 <div class="col-12">
                                                   <button type="submit" class="btn btn-primary mt-5" type="submit">Add Address</button>
                                                 </div>
                                               </div>
                                               </form>
                                           </div>
                                         </div>
                                       </div>
                                     </div>
                                  
                         
                           @endforeach
                       </tbody>
                    </table>
                    @endif 
            </div>
        </div>
    </div>
</section>

<div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="row g-3" action="{{ route("add_address") }}" method="post" novalidate>
              @csrf
              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Address Line 1</label>
                <input type="text" name="address_1" class="form-control" id="validationCustom01"  required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Address Line 2</label>
                <input type="text" name="address_2" class="form-control" id="validationCustom02" required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Country</label>
                <select class="form-select" name="country">
                 @foreach(config("constants.countries") as $k => $item)
                    <option value="{{$k}}">{{$item}}</option>
                 @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="validationCustom03" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="validationCustom03" required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">State</label>
                <input type="text" name="state" class="form-control" id="validationCustom05" required>
              </div>
              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Post Code</label>
                <input type="text" name="postal" class="form-control" id="validationCustom05" required>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value=1 name="d_address" id="invalidCheck" required>
                  <label class="form-check-label" for="invalidCheck">
                    Default address
                  </label>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary" type="submit">Submit form</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
