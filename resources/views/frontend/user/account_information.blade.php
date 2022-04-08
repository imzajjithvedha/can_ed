@extends('frontend.layouts.app')

@section('title', 'Proxima Study | My account information')

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
                        <h4 class="user-settings-head">Account information</h4>
                        <h6 class="user-settings-sub">Here you can customize your basic account set-up information.</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="py-3" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <h4 class="fw-bold mb-2 futura">About you</h4>
                                    
                            <form action="{{ route('frontend.user.account_information_update') }}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="first_name" class="form-label">First name *</label>
                                        <input type="text" class="form-control" value="{{ $user->first_name }}" id="first_name" placeholder="First name *" aria-describedby="first_name" name="first_name" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="last_name" class="form-label">Last name *</label>
                                        <input type="text" value="{{ $user->last_name }}" class="form-control" id="last_name" placeholder="Last name *" aria-describedby="last_name" name="last_name" required>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-6">
                                        <label for="display_name" class="form-label">Display name *</label>
                                        <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Display name *" aria-describedby="display_name" value="{{ $user->display_name }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" value="{{ $user->email }}" class="form-control" id="email" aria-describedby="email" placeholder="Email *" name="email" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="row align-items-center">
                                            <div class="col-6">
                                                <label for="image" class="form-label">Profile image (Files must be less than 5MB, allowed file types: png, gif, jpg, jpeg)</label>
                                            </div>
                                            @if($user->image != null)
                                                <div class="col-6 text-end mb-3">
                                                    <button class="btn bg-danger delete-image" type="button"><i class="far fa-trash-alt text-white"></i></button>
                                                </div>
                                            @endif
                                        </div>
                                        
                                        @if($user->image != null)
                                            <img src="{{ url('images/users', $user->image) }}" alt="" class="img-fluid w-100 old-image" style="height: 20rem; object-fit: cover;">
                                            <input type="hidden" class="form-control old-image-input" name="old_image" value="{{ $user->image }}">

                                            <div class="form-group mt-3">
                                                <input type="file" class="form-control" id="image" name="new_image">
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="image" name="new_image">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                    

                                <h4 class="fw-bold mt-5 mb-1 futura">More about you</h4>
                                <p class="mb-2 gray">Tell us more about you.</p>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="user-type" class="form-label">User type *</label>
                                        <select class="form-select" aria-label="user-type" id="user-type" name="user_type" placeholder="I am a *" required>
                                            <option value="" selected disabled hidden></option>
                                            <option value="student">Student</option>
                                            <option value="business">Business</option>
                                            <option value="school">School</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="dob" class="form-label">Date of birth *</label>
                                        <!-- <input value="{{ $user->dob }}" type="date" class="form-control" id="dob" aria-describedby="dob" placeholder="Date of birth *" name="dob"> -->
                                        <input type="date" class="dob" name="dob" value="{{ $user->dob }}" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="gender" class="form-label">Gender *</label>
                                        <select class="form-select" aria-label="gender" id="gender" name="gender" placeholder="Gender *">
                                            <option value="" selected hidden disabled></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="prefer_not_to_say">Prefer not to say</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="marital" class="form-label">Marital status</label>
                                        <select class="form-select" aria-label="marital" id="marital" name="marital">
                                            <option value="" selected hidden disabled></option>
                                            <option value="single">Single</option>
                                            <option value="common-law">Common Law</option>
                                            <option value="married">Married</option>
                                            <option value="separated">separated</option>
                                            <option value="divorced">Divorced</option>
                                        </select>
                                    </div>
                                </div>


                                <h4 class="fw-bold mt-5 mb-1 futura">Contact information</h4>
                                <p class="mb-2 gray">Keep your contact details up to date.</p>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" aria-describedby="city" name="city" placeholder="City" value="{{ $user->city }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="province" class="form-label">Province</label>
                                        <input type="province" class="form-control" id="province" aria-describedby="province" placeholder="Province" name="province" value="{{ $user->province }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="country" class="form-label">Country *</label>
                                        <select class="form-select" id="country" name="country" placeholder="Country *" required>
                                            <option value="" selected disabled hidden></option>
                                            <option value="Afganistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bonaire">Bonaire</option>
                                            <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Canary Islands">Canary Islands</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Channel Islands">Channel Islands</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Island">Cocos Island</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote DIvoire">Cote DIvoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Curaco">Curacao</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Ter">French Southern Ter</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Great Britain">Great Britain</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Hawaii">Hawaii</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="India">India</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea North">Korea North</option>
                                            <option value="Korea Sout">Korea South</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Midway Islands">Midway Islands</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nambia">Nambia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherland Antilles">Netherland Antilles</option>
                                            <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                            <option value="Nevis">Nevis</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau Island">Palau Island</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Phillipines">Philippines</option>
                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Republic of Montenegro">Republic of Montenegro</option>
                                            <option value="Republic of Serbia">Republic of Serbia</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="St Barthelemy">St Barthelemy</option>
                                            <option value="St Eustatius">St Eustatius</option>
                                            <option value="St Helena">St Helena</option>
                                            <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                            <option value="St Lucia">St Lucia</option>
                                            <option value="St Maarten">St Maarten</option>
                                            <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                            <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                            <option value="Saipan">Saipan</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="Samoa American">Samoa American</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Tahiti">Tahiti</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Erimates">United Arab Emirates</option>
                                            <option value="United States of America">United States of America</option>
                                            <option value="Uraguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Vatican City State">Vatican City State</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                            <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                            <option value="Wake Island">Wake Island</option>
                                            <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zaire">Zaire</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="postal-code" class="form-label">Postal code</label>
                                        <input type="text" class="form-control" id="postal-code" name="postal_code" placeholder="Postal code" aria-describedby="postal-code" value="{{ $user->postal_code }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="home-phone" class="form-label">Home phone</label>
                                        <input type="home-phone" class="form-control" id="home-phone" name="home_phone" placeholder="Home phone" aria-describedby="home-phone" value="{{ $user->home_phone }}">

                                    </div>
                                    <div class="col-6">
                                        <label for="mobile-phone" class="form-label">Mobile phone</label>
                                        <input type="mobile-phone" class="form-control" id="mobile-phone" name="mobile_phone" placeholder="Mobile phone" aria-describedby="mobile-phone" value="{{ $user->mobile_phone }}">
                                    </div>
                                </div>
                                
                                <div class="mt-5 text-center">
                                    <input type="hidden" class="form-control" value="{{ $user->id }}" name="hidden_id">
                                    <button type="submit" class="btn text-white px-5 py-2" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Update information</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#successModal"></button>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Your information updated successfully</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endsection


@push('after-scripts')
    <script>
        $(document).ready(function() {
            let user_type = <?php echo json_encode ($user->user_type ) ?>

            $('#user-type option').each(function(i){
                if($(this).val() == user_type) {
                    $(this).attr('selected', 'selected');
                }
            });

            let gender = <?php echo json_encode ($user->gender ) ?>

            $('#gender option').each(function(i){
                if($(this).val() == gender) {
                    $(this).attr('selected', 'selected');
                }
            });

            let marital_status = <?php echo json_encode ($user->marital_status ) ?>

            $('#marital option').each(function(i){
                if($(this).val() == marital_status) {
                    $(this).attr('selected', 'selected');
                }
            });

            let country = <?php echo json_encode ($user->country ) ?>

            $('#country option').each(function(i){
                if($(this).val() == country) {
                    $(this).attr('selected', 'selected');
                }
            });
        });
    </script>


    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <!-- calender -->
    <script>
       // Initialize all input of type date
        var dob = bulmaCalendar.attach('.dob',{
            type: 'date',
            dateFormat: 'yyyy-MM-dd'
        });

        var startDate = bulmaCalendar.attach('.start-date',{
            type: 'date',
            dateFormat: 'yyyy-MM-dd'
        });

    
        $('.datetimepicker-dummy .datetimepicker-dummy-wrapper .is-hidden').attr('type', 'hidden');
    </script>


    <!-- <script>
        $(document).ready(function() {
            $('.datetimepicker-dummy-input').text("fsdfsdf");
        });
    </script> -->

    <script>
        $('.delete-image').on('click', function() {
            $('.old-image').addClass('d-none');
            $('.old-image-input').attr('disabled', true);
        });
    </script>
@endpush