@extends('frontend.layouts.app')

@section('title', 'My Account Information')

@section('content')

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

    <div class="container user-settings">
        <div class="row justify-content-between">
            <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.includes.profile-settings-links')
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="row justify-content-between">
                    <div class="col-8 p-0">
                        <h4 class="fs-4 fw-bolder user-settings-head">Account Information</h4>
                        <h6 class="user-settings-sub" style="color: #5e6871">Here you can customize your basic account set-up information.</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <h4>About You</h4>
                                    
                            <form action="" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="firstName" class="form-label mb-0 required">First Name</label>
                                            <input type="text" class="form-control" value="" id="firstName" aria-describedby="firstName" name="first_name" required>
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="lastName" class="form-label mb-0 required">Last Name</label>
                                            <input type="text" value="" class="form-control" id="lastName" aria-describedby="lastName" name="last_name" required>
                                        </div>  
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="displayName" class="form-label mb-0 mt-4 required">Display Name</label>
                                            <input type="text" class="form-control" id="displayName" name="display_name" aria-describedby="displayName" value="" required>
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="email" class="form-label mb-0 mt-4 required">Email</label>
                                            <input value="" type="email" class="form-control" id="email" aria-describedby="email" name="email" required>
                                        </div>  
                                    </div>
                                </div>
                                    

                                <h4 class="mt-5 mb-1">More About You</h4>
                                <h6 style="color: #5e6871">Tell us more about you and your real estate needs.</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="userType" class="form-label mb-0 required">I am a</label>
                                        <select class="form-select" aria-label="userType" id="userType" name="user_type" value="" required>
                                            <option value="">No Preference</option>
                                            <option value="first-time-buyer">First time buyer</option>
                                            <option value="repeat-buyer">Repeat buyer</option>
                                            <option value="seller">Seller</option>
                                            <option value="residential-investor">Residential investor</option>
                                            <option value="commercial-investor">Commercial investor</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="dob" class="form-label mb-0 required">Year of birth</label>
                                        <input value="" type="date" class="form-control" id="dob" aria-describedby="dob" name="dob" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="gender" class="form-label mb-0 mt-4 required">Gender</label>
                                        <select class="form-select" aria-label="gender" id="gender" name="gender" value="" required>
                                            <option value="">Select</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="displayName" class="form-label mb-0 mt-4 required">Marital Status</label>
                                        <select class="form-select" aria-label="Default select example" id="marital" name="marital" value="" required>
                                            <option value="">Select</option>
                                            <option value="single">Single</option>
                                            <option value="common-law">Common Law</option>
                                            <option value="married">Married</option>
                                            <option value="separated">separated</option>
                                            <option value="divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>


                                <h4 class="mt-5 mb-1">Contact Information</h4>
                                <h6 style="color: #5e6871">Keep your contact details up to date</h6>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="city" class="form-label mb-0 required">City</label>
                                            <input type="text" class="form-control" id="city" aria-describedby="city" name="city" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="province" class="form-label mb-0 required">Province</label>
                                            <input type="province" class="form-control" id="province" aria-describedby="province" name="province" value="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="country" class="form-label mb-0 mt-4 required">Country</label>
                                        <select class="form-select" aria-label="country" id="country" name="country" required>
                                            <option value="">Select</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Virgin Islands">British Virgin Islands</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burma">Burma</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Democratic Republic of Congo">Democratic Republic of Congo</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Galapagos Islands">Galapagos Islands</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Ivory Coast">Ivory Coast</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Barthelemy">Saint Barthelemy</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Martin">Saint Martin</option>
                                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Turks and Cacaos Islands">Turks and Cacaos Islands</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="United States Virgin Islands">United States Virgin Islands</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Zambia">Zambia</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="postal-code" class="form-label mb-0 mt-4 required">Postal Code</label>
                                            <input type="postal-code" class="form-control" id="postal-code" name="postal_code" aria-describedby="postal-code" value="" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div>
                                            <label for="home-phone" class="form-label mb-0 mt-4 required">Home Phone</label>
                                            <input type="home-phone" class="form-control" id="home-phone" name="home_phone" aria-describedby="home-phone" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div>
                                            <label for="mobile-phone" class="form-label mb-0 mt-4 required">Mobile Phone</label>
                                            <input type="mobile-phone" class="form-control" id="mobile-phone" name="mobile_phone" aria-describedby="mobile-phone" value="" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-5 text-center">
                                    <button type="button" class="btn rounded-pill text-light px-4 py-2 me-2" style="background-color: #6e6e70;">Deactivate Account</button>
                                    <input type="hidden" class="form-control" value="" name="hid_id">
                                    <button type="submit" class="btn rounded-pill text-light px-4 py-2 ms-2" style="background-color: #94ca60;">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

