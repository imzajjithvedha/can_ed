@extends('frontend.layouts.app')

@section('title', 'Edit School' )

@push('after-styles')
    <link rel="stylesheet" href="{{ url('css/profile-settings.css') }}">
@endpush

@section('content')

    <div class="container user-settings" style="margin-top:8rem;">
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
                        <h4 class="fs-4 fw-bolder user-settings-head">Edit School</h4>
                        
                    </div>
                    <div class="col-4 text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 border">
                        <div class="px-2 py-3 school" id="nav-communication" role="tabpanel" aria-labelledby="nav-communication-tab">
                            <ul class="nav nav-pills mb-3 justify-content-center school-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-information-tab" data-bs-toggle="pill" data-bs-target="#pills-information" type="button" role="tab" aria-controls="pills-information" aria-selected="true">Information</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-facts-tab" data-bs-toggle="pill" data-bs-target="#pills-facts" type="button" role="tab" aria-controls="pills-facts" aria-selected="false">Quick Facts</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-overview-tab" data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview" aria-selected="false">Overview</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-programs-tab" data-bs-toggle="pill" data-bs-target="#pills-programs" type="button" role="tab" aria-controls="pills-programs" aria-selected="false">Programs</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-admissions-tab" data-bs-toggle="pill" data-bs-target="#pills-admissions" type="button" role="tab" aria-controls="pills-admissions" aria-selected="false">Admissions</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-financial-tab" data-bs-toggle="pill" data-bs-target="#pills-financial" type="button" role="tab" aria-controls="pills-financial" aria-selected="false">Financial</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-scholarships-tab" data-bs-toggle="pill" data-bs-target="#pills-scholarships" type="button" role="tab" aria-controls="pills-scholarships" aria-selected="false">Scholarships</button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-information" role="tabpanel" aria-labelledby="pills-information-tab">
                                    <form action="{{ route('frontend.user.user_school_information_update') }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12 border py-3">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="name" aria-describedby="name" name="name" placeholder="School Name *" value="{{ $school->name }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="website" aria-describedby="website" name="website" placeholder="School Website *" value="{{ $school->website }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="email" class="form-control" id="website" aria-describedby="email" name="email" placeholder="School Email Address *" value="{{ $school->school_email }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="website" aria-describedby="phone" name="phone" placeholder="School Phone Number *" value="{{ $school->school_phone }}" required>
                                                </div>

                                                <div class="mb-4">
                                                    <select class="form-control" id="country" name="country" required>
                                                        <option value="">Select Country *</option>
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

                                                <div class="mb-4">
                                                    <label for="school_featured_image" class="form-label">School Featured Image *</label>

                                                    @if($school->featured_image != null)
                                                        <div class="row justify-content-center mb-3">
                                                            <div class="col-12">
                                                                <img src="{{ url('images/schools', $school->featured_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                                            </div>
                                                        </div>

                                                        <input type="hidden" class="form-control" name="old_image" value="{{$school->featured_image}}">

                                                        <input type="file" class="form-control" name="featured_image">

                                                    @else
                                                        <input type="file" class="form-control" name="featured_image" required>
                                                    @endif

                                                </div>

                                                <div class="mb-4">
                                                    <label for="school_featured_image" class="form-label">More School Images</label>

                                                    @if(count($images) != 0)
                                                        <div class="row mb-3">
                                                            @foreach($images as $image)
                                                                <div class="col-4 mb-3">
                                                                    <img src="{{ url('images/schools', $image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                                    <input type="hidden" class="form-control" name="old_images[]" value="{{$image}}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif


                                                    <input type="file" class="form-control" multiple name="new_images[]">
                                                </div>

                                                <div class="mb-3">
                                                    <input type="url" class="form-control" id="facebook" aria-describedby="facebook" name="facebook" placeholder="Facebook" value="{{ $school->facebook }}">
                                                </div>

                                                <div class="mb-3">
                                                    <input type="url" class="form-control" id="instagram" aria-describedby="instagram" name="instagram" placeholder="Instagram" value="{{ $school->instagram }}">
                                                </div>

                                                <div class="mb-3">
                                                    <input type="url" class="form-control" id="twitter" aria-describedby="twitter" name="twitter" placeholder="Twitter" value="{{ $school->twitter }}">
                                                </div>

                                                <div class="mb-3">
                                                    <input type="url" class="form-control" id="you-tube" aria-describedby="you-tube" name="you_tube" placeholder="YouTube" value="{{ $school->you_tube }}">
                                                </div>

                                                <div class="mb-3">
                                                    <input type="url" class="form-control" id="linked-in" aria-describedby="linked-in" name="linked_in" placeholder="LinkedIn" value="{{ $school->linked_in }}">
                                                </div>

                                                <div class="mt-5 mb-3">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-10">
                                                            <label class="form-label mb-0">More External Links</label>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <i class="fas fa-plus rounded-pill text-muted plus-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                        </div>
                                                    </div>

                                                    <div class="links">
                                                        @foreach($links as $link)
                                                            <div class="mb-3 single-link">
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-11">
                                                                        <input type="text" class="form-control" name="link_name[]" placeholder="Link Name" value="{{ $link->link_name }}">
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <i class="fas fa-trash rounded-pill text-muted delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                                    </div>
                                                                </div>
                                                                
                                                                <input type="url" class="form-control" name="links[]" placeholder="Link" value="{{ $link->link }}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    
                                                </div>

                                                <div class="mt-5 text-center">
                                                    <input type="hidden" class="form-control" value="{{$school->id}}" name="hidden_id">
                                                    <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="pills-facts" role="tabpanel" aria-labelledby="pills-facts-tab">
                                    <form action="{{ route('frontend.user.user_school_facts_update') }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12 border py-3">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="location" aria-describedby="location" name="location" placeholder="School Location *" value="{{ $school->location }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <select class="form-control" id="school-type" name="school_type" placeholder="School Type" required>
                                                        <option value="" selected disabled hidden>School Type *</option>
                                                        @foreach($school_types as $school_type)
                                                            @if($school->school_type != null)
                                                                <option value="{{ $school_type->id }}" {{ $school_type->id == $school->school_type ? "selected" : "" }}>{{ $school_type->name }}</option>
                                                            @else
                                                                <option value="{{ $school_type->id }}">{{ $school_type->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="language" aria-describedby="language" name="language" placeholder="Language *" value="{{ $school->language }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="number" class="form-control" id="undergraduates" aria-describedby="undergraduates" name="undergraduates" placeholder="Total Undergraduates *" value="{{ $school->undergraduates }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="entrance" aria-describedby="entrance" name="entrance_dates" placeholder="Entrance Dates *" value="{{ $school->entrance_dates }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="number" class="form-control" id="canadian_fee" aria-describedby="canadian_fee" name="canadian_tuition_fee" placeholder="Canadian Tuition Fee (in CAD) *" value="{{ $school->canadian_tuition_fee }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="number" class="form-control" id="international_fee" aria-describedby="international_fee" name="international_tuition_fee" placeholder="International Tuition Fee (in CAD) *" value="{{ $school->international_tuition_fee }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="telephone" aria-describedby="telephone" name="telephone" placeholder="Telephone *" value="{{ $school->telephone }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="fax" aria-describedby="fax" name="fax" placeholder="Fax" value="{{ $school->fax }}">
                                                </div>

                                                <div class="mb-3">
                                                    <input type="text" class="form-control" id="address" aria-describedby="address" name="address" placeholder="Address *" value="{{ $school->address }}" required>
                                                </div>

                                                <div class="mt-5 text-center">
                                                    <input type="hidden" class="form-control" value="{{$school->id}}" name="hidden_id">
                                                    <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="pills-overview" role="tabpanel" aria-labelledby="pills-overview-tab">
                                    <form action="{{ route('frontend.user.user_school_overview_update') }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12 border py-3">
                                                <div class="mb-5">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="first_title" aria-describedby="first_title" name="first_title" placeholder="Title *" value="{{ $school->first_title }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <textarea name="first_description" required></textarea>
                                                    </div>
                                                </div>
                                                

                                                <div class="bullets mb-5">
                                                    <div class="mb-3">
                                                        <div class="row align-items-center mb-2">
                                                            <div class="col-10">
                                                                <input type="text" class="form-control" id="bullets_first_title" aria-describedby="bullets_first_title" name="bullets_points_title" placeholder="Bullet Points Title *" value="{{ $school->first_title }}">
                                                            </div>
                                                            
                                                            <div class="col-2 text-center">
                                                                <i class="fas fa-plus rounded-pill text-muted bullet-plus-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                    <div class="mb-2 single-bullet">
                                                        <div class="row align-items-center">
                                                            <div class="col-11">
                                                                <input type="text" class="form-control" placeholder="Point" name="bullet_first[]">
                                                            </div>
                                                            <div class="col-1">
                                                                <i class="fas fa-trash rounded-pill text-muted bullet-delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="optional-section mb-5">
                                                    <label class="form-label mb-0">Optional Section</label>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="optional_title" aria-describedby="optional_title" name="optional_title" placeholder="Title *" value="{{ $school->first_title }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <textarea name="optional_description" rows="7" class="form-control"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="optional_button_title" aria-describedby="optional_button_title" name="optional_button_title" placeholder="Button Title *" value="{{ $school->first_title }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="url" class="form-control" id="optional_button_url" aria-describedby="optional_button_url" name="optional_button_url" placeholder="Button URL *" value="{{ $school->first_title }}">
                                                    </div>

                                                    <div class="mb-4">
                                                        <label class="form-label">Optional Section Image</label>

                                                        @if($school->optional_section_image != null)
                                                            <div class="row justify-content-center mb-3">
                                                                <div class="col-12">
                                                                    <img src="{{ url('images/schools', $school->featured_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <input type="hidden" class="form-control" name="old_optional_section_image" value="{{$school->old_optional_section_image}}">

                                                        <input type="file" class="form-control" name="optional_section_image">
                                                    </div>
                                                </div>


                                                <div class="mt-5 mb-3">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-10">
                                                            <label class="form-label mb-0">Programs</label>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <i class="fas fa-plus rounded-pill text-muted program-plus-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                        </div>
                                                    </div>

                                                    <div class="programs-overview">
                                                        
                                                            <div class="mb-3 single-program-overview">
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-11">
                                                                        <input type="text" class="form-control" name="program_name[]" placeholder="Program Name" value="">
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <i class="fas fa-trash rounded-pill text-muted program-delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                                    </div>
                                                                </div>
                                                                
                                                                <input type="text" class="form-control mb-2" name="length[]" placeholder="Length" value="">
                                                                <input type="number" class="form-control mb-2" name="program_canadian_fee[]" placeholder="Canadian Student Fee" value="">
                                                                <input type="number" class="form-control mb-2" name="program_international_fee[]" placeholder="International Student Fees" value="">
                                                            </div>
                                                        
                                                    </div>
                                                    
                                                </div>

                                                

                                                <div class="mt-5 text-center">
                                                    <input type="hidden" class="form-control" value="{{$school->id}}" name="hidden_id">
                                                    <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="pills-programs" role="tabpanel" aria-labelledby="pills-programs-tab">
                                    <form action="{{ route('frontend.user.user_school_programs_update') }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12 border py-3">
                                                
                                                <div class="mb-3">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-10">
                                                            <label class="form-label mb-0">Programs</label>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <i class="fas fa-plus rounded-pill text-muted program-plus-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                        </div>
                                                    </div>

                                                    <div class="programs">
                                                        @foreach($programs as $program )
                                                            <div class="mb-3 single-program">
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-11">
                                                                        <input type="text" class="form-control" name="programs[]" placeholder="Program Name" value="{{ $program->program_name }}">
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <i class="fas fa-trash rounded-pill text-muted program-delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                                    </div>
                                                                </div>
                                                                
                                                                <input type="text" class="form-control" name="sub_titles[]" placeholder="Sub Title" value="{{ $program->sub_title }}">
                                                            </div>
                                                        @endforeach
                                                        
                                                    </div>
                                                    
                                                </div>

                                                <div class="mt-5 text-center">
                                                    <input type="hidden" class="form-control" value="{{$school->id}}" name="hidden_id">
                                                    <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="pills-scholarships" role="tabpanel" aria-labelledby="pills-scholarships-tab">
                                    <form action="{{ route('frontend.user.user_school_scholarships_update') }}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12 border py-3">
                                                <div class="mb-5">
                                                    <label class="form-label mb-0">Top page paragraph</label>
                                                    <textarea name="scholarship_paragraph_top" value="{{ $school->scholarships_top }}" required>{{ $school->scholarships_top }}</textarea>
                                                </div>

                                                <div class="mb-5">
                                                    <label class="form-label mb-0">Bottom page paragraph</label>
                                                    <textarea name="scholarship_paragraph_bottom" value="{{ $school->scholarships_bottom }}" required>{{ $school->scholarships_bottom }}</textarea>
                                                </div>
                                                
                                                <div class="mt-5 mb-3">
                                                    <div class="row align-items-center mb-3">
                                                        <div class="col-10">
                                                            <label class="form-label mb-0">Scholarships</label>
                                                        </div>
                                                        <div class="col-2 text-center">
                                                            <i class="fas fa-plus rounded-pill text-muted scholarship-plus-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                        </div>
                                                    </div>

                                                    <div class="scholarships">
                                                        @foreach($scholarships as $scholarship)
                                                            <div class="mb-5 single-scholarship">
                                                                <div class="row align-items-center mb-2">
                                                                    <div class="col-11">
                                                                        <input type="text" class="form-control" name="scholarship_name[]" placeholder="Scholarship Name" value="{{ $scholarship->scholarship_name }}">
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <i class="fas fa-trash rounded-pill text-muted scholarship-delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="mb-4">
                                                                    <textarea class="form-control" name="summary[]" id="summary" rows="5" value="{{ $scholarship->summary }}" placeholder="Summary">{{ $scholarship->summary }}</textarea>
                                                                </div>
                                                                

                                                                <div class="mb-4">
                                                                    <label for="eligibility" class="form-label">Basic Eligibility</label>
                                                                    @foreach($scholarship->eligibility as $eligibility)
                                                                        <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Eligibility Criteria" value="{{ $eligibility }}">
                                                                    @endforeach
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" name="award[]" placeholder="Award" value="{{ $scholarship->award }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" name="action[]" placeholder="Action" value="{{ $scholarship->action }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="date" class="form-control" name="deadline[]" placeholder="Deadline" value="{{ $scholarship->deadline }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" name="availability[]" placeholder="Availability" value="{{ $scholarship->availability }}">
                                                                </div>

                                                                <div class="mb-5">
                                                                    <input type="text" class="form-control" name="level_of_study[]" placeholder="Level of Study" value="{{ $scholarship->level_of_study }}">
                                                                </div>
                                                                <hr>
                                                            </div>
                                                            
                                                        @endforeach
                                                    </div>
                                                </div>

                                                

                                                <div class="mt-5 text-center">
                                                    <input type="hidden" class="form-control" value="{{$school->id}}" name="hidden_id">
                                                    <input type="submit" value="Update" class="btn rounded-pill text-light px-4 py-2" style="background-color: #94ca60;">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary invisible" id="info-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Warning</h4>
                </div>

                <div class="modal-body" style="padding: 2rem 1rem;">
                    <h6 class="mb-0 text-center text-info">If you want to update the already approved school, then we have to approve again. Please consider this before update your school.</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> 

@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            $('#info-btn').click();
        });
    </script>

    <script>
        $('.bullet-plus-icon').on('click', function() {
            let template = `<div class="mb-2 single-bullet">
                                <div class="row align-items-center">
                                    <div class="col-11">
                                        <input type="text" class="form-control" placeholder="Point" name="bullet_first[]" required>
                                    </div>
                                    <div class="col-1">
                                        <i class="fas fa-trash rounded-pill text-muted bullet-delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                    </div>
                                </div>
                            </div>`;

            $('.bullets').append(template);

            $('.bullet-delete-icon').on('click', function() {
                $(this).parents('.single-bullet').remove();
            });
        });

        $('.bullet-delete-icon').on('click', function() {
            $(this).parents('.single-bullet').remove();
        });
    </script>

    <script>
        $(document).ready(function() {
            let value = <?php echo json_encode ($school->country) ?>

            $('#country option').each(function(i){
                if($(this).val() == value) {
                    $(this).attr('selected', 'selected');
                }
            });
        });
    </script>

    <script>
        CKEDITOR.replace( 'first_description' );
        CKEDITOR.replace( 'scholarship_paragraph_top' );
        CKEDITOR.replace( 'scholarship_paragraph_bottom' );
    </script>

    <script>
        $('.plus-icon').on('click', function() {
            let template = `<div class="mb-3 single-link">
                                <div class="row align-items-center mb-2">
                                    <div class="col-11">
                                        <input type="text" class="form-control" name="link_name[]" placeholder="Link Name" value="">
                                    </div>
                                    <div class="col-1">
                                        <i class="fas fa-trash rounded-pill text-muted delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                    </div>
                                </div>
                                
                                <input type="url" class="form-control" name="links[]" placeholder="Link" value="">
                            </div>`;

            $('.links').append(template);

            $('.delete-icon').on('click', function() {
                $(this).parents('.single-link').remove();
            });
        });

        $('.delete-icon').on('click', function() {
            $(this).parents('.single-link').remove();
        });
    </script>

    <script>
        $('.programs-plus-icon').on('click', function() {
            let template = `<div class="mb-3 single-program">
                                <div class="row align-items-center mb-2">
                                    <div class="col-11">
                                        <input type="text" class="form-control" name="program_name[]" placeholder="Program Name" value="">
                                    </div>
                                    <div class="col-1">
                                        <i class="fas fa-trash rounded-pill text-muted program-delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                    </div>
                                </div>
                                
                                <input type="text" class="form-control mb-2" name="length[]" placeholder="Length" value="">
                                <input type="number" class="form-control mb-2" name="program_canadian_fee[]" placeholder="Canadian Student Fee" value="">
                                <input type="number" class="form-control mb-2" name="program_international_fee[]" placeholder="International Student Fees" value="">
                            </div>`;

            $('.programs').append(template);

            $('.programs-delete-icon').on('click', function() {
                $(this).parents('.single-program').remove();
            });
        });

        $('.program-delete-icon').on('click', function() {
            $(this).parents('.single-program').remove();
        });
    </script>

    <script>
        $('.program-plus-icon').on('click', function() {
            let template = `<div class="mb-3 single-program">
                                <div class="row align-items-center mb-2">
                                    <div class="col-11">
                                        <input type="text" class="form-control" name="programs[]" placeholder="Program Name" value="">
                                    </div>
                                    <div class="col-1">
                                        <i class="fas fa-trash rounded-pill text-muted program-delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                    </div>
                                </div>
                                
                                <input type="text" class="form-control" name="sub_titles[]" placeholder="Sub Title" value="">
                            </div>`;

            $('.programs').append(template);

            $('.program-delete-icon').on('click', function() {
                $(this).parents('.single-program').remove();
            });
        });

        $('.program-delete-icon').on('click', function() {
            $(this).parents('.single-program').remove();
        });
    </script>

    <script>
        $('.scholarship-plus-icon').on('click', function() {
            let template = `<div class="mb-5 single-scholarship">
                                <div class="row align-items-center mb-2">
                                    <div class="col-11">
                                        <input type="text" class="form-control" name="scholarship_name[]" placeholder="Scholarship Name" value="">
                                    </div>
                                    <div class="col-1">
                                        <i class="fas fa-trash rounded-pill text-muted scholarship-delete-icon" style="background-color:#e3dfde; padding:13px;"></i>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <textarea class="form-control" name="summary[]" id="summary" rows="5" value="" placeholder="Summary"></textarea>
                                </div>
                                

                                <div class="mb-4">
                                    <label for="eligibility" class="form-label">Basic Eligibility</label>
                                    <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Eligibility Criteria" value="">
                                    <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Eligibility Criteria" value="">
                                    <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Eligibility Criteria" value="">
                                    <input type="text" class="form-control mb-2" name="eligibility[]" placeholder="Eligibility Criteria" value="">
                                    <input type="text" class="form-control" name="eligibility[]" placeholder="Eligibility Criteria" value="">
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="award[]" placeholder="Award" value="">
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="action[]" placeholder="Action" value="">
                                </div>

                                <div class="mb-3">
                                    <input type="date" class="form-control" name="deadline[]" placeholder="Deadline" value="">
                                </div>

                                <div class="mb-3">
                                    <input type="text" class="form-control" name="availability[]" placeholder="Availability" value="">
                                </div>

                                <div class="mb-5">
                                    <input type="text" class="form-control" name="level_of_study[]" placeholder="Level of Study" value="">
                                </div>
                                <hr>
                            </div>`;

            $('.scholarships').prepend(template);

            $('.scholarship-delete-icon').on('click', function() {
                $(this).parents('.single-scholarship').remove();
            });
        });

        $('.scholarship-delete-icon').on('click', function() {
            $(this).parents('.single-scholarship').remove();
        });
    </script>
@endpush

