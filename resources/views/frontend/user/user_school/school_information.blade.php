@extends('frontend.layouts.app')

@section('title', 'Edit school' )

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
                        <h4 class="user-settings-head">Information</h4>
                        
                    </div>
                    <!-- <div class="col-4 text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div> -->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="school" id="nav-information" role="tabpanel" aria-labelledby="nav-information-tab">
                            <div class="row">
                                <div class="col-12 border py-3">
                                    <form action="{{ route('frontend.user.school_information_update') }}" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
                                        {{csrf_field()}}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label mb-1">Name *</label>
                                                    <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{ $school->name }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="website" class="form-label mb-1">Website *</label>
                                                    <input type="text" class="form-control" id="website" aria-describedby="website" name="website" value="{{ $school->website }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label mb-1">Email *</label>
                                                    <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="{{ $school->school_email }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="country" class="form-label mb-1">Country *</label>
                                                    <select class="form-control" id="country" name="country" required>
                                                        <option value="" disabled hidden></option>
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

                                                <div class="form-group featured-image">
                                                    <label class="form-label">Featured image</label>
                                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                        </div>
                                                        <div class="form-control file-amount">Choose File</div>
                                                        <input type="hidden" name="featured_image" value="{{ $school->featured_image}}" class="selected-files" >
                                                    </div>
                                                    <div class="file-preview box sm">
                                                    </div>
                                                </div>

                                                <div class="form-group more-school-images">
                                                    <label class="form-label">More school images</label>
                                                    <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                        </div>
                                                        <div class="form-control file-amount">Choose File</div>
                                                        <input type="hidden" name="images" value="{{ $school->images}}" class="selected-files">
                                                    </div>
                                                    <div class="file-preview box sm">
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="facebook" class="form-label mb-1">Facebook</label>
                                                    <input type="url" class="form-control" id="facebook" aria-describedby="facebook" name="facebook" value="{{ $school->facebook }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="instagram" class="form-label mb-1">Instagram</label>
                                                    <input type="url" class="form-control" id="instagram" aria-describedby="instagram" name="instagram" value="{{ $school->instagram }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="twitter" class="form-label mb-1">Twitter</label>
                                                    <input type="url" class="form-control" id="twitter" aria-describedby="twitter" name="twitter" value="{{ $school->twitter }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="you-tube" class="form-label mb-1">YouTube</label>
                                                    <input type="url" class="form-control" id="you-tube" aria-describedby="you-tube" name="you_tube" value="{{ $school->you_tube }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="linked-in" class="form-label mb-1">LinkedIn</label>
                                                    <input type="url" class="form-control" id="linked-in" aria-describedby="linked-in" name="linked_in" value="{{ $school->linked_in }}">
                                                </div>

                                                <div class="mb-5">
                                                    <label for="vk" class="form-label mb-1">VK</label>
                                                    <input type="url" class="form-control" id="vk" aria-describedby="vk" name="vk" value="{{ $school->vk }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="main-button-title" class="form-label">Main button title</label>
                                                    <input type="text" class="form-control" id="main-button-title" aria-describedby="main_button_title" name="main_button_title" value="{{ $school->main_button_title }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="main-button-sub-title" class="form-label">Main button sub title</label>
                                                    <input type="text" class="form-control" id="main-button-sub-title" aria-describedby="main_button_sub_title" name="main_button_sub_title" value="{{ $school->main_button_sub_title }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="main-button-link" class="form-label">Main button link</label>
                                                    <input type="url" class="form-control" id="main-button-link" aria-describedby="main_button_link" name="main_button_link" value="{{ $school->main_button_link }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="other-button-title" class="form-label">Other button title</label>
                                                    <input type="text" class="form-control" id="other-button-title" aria-describedby="other_button_title" name="other_button_title" value="{{ $school->other_button_title }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="other-button-link" class="form-label">Other button link</label>
                                                    <input type="url" class="form-control" id="other-button-link" aria-describedby="other_button_link" name="other_button_link" value="{{ $school->other_button_link }}">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="quick_facts_status" class="form-label">Quick facts status</label>
                                                    <select class="form-control" name="quick_facts_status" id="quick_facts_status" required>
                                                        <option value="Yes" {{ $school->quick_facts_status == 'Yes' ? "selected" : "" }}>Yes</option>   
                                                        <option value="No" {{ $school->quick_facts_status == 'No' ? "selected" : "" }}>No</option>                               
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="overview_status" class="form-label">Overview status</label>
                                                    <select class="form-control" name="overview_status" id="overview_status" required>
                                                        <option value="Yes" {{ $school->overview_status == 'Yes' ? "selected" : "" }}>Yes</option>   
                                                        <option value="No" {{ $school->overview_status == 'No' ? "selected" : "" }}>No</option>                               
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="programs_status" class="form-label">Programs status</label>
                                                    <select class="form-control" name="programs_status" id="programs_status" required>
                                                        <option value="Yes" {{ $school->programs_status == 'Yes' ? "selected" : "" }}>Yes</option>   
                                                        <option value="No" {{ $school->programs_status == 'No' ? "selected" : "" }}>No</option>                               
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="admissions_status" class="form-label">Admission status</label>
                                                    <select class="form-control" name="admissions_status" id="admissions_status" required>
                                                        <option value="Yes" {{ $school->admissions_status == 'Yes' ? "selected" : "" }}>Yes</option>   
                                                        <option value="No" {{ $school->admissions_status == 'No' ? "selected" : "" }}>No</option>                               
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="financial_status" class="form-label">Financial status</label>
                                                    <select class="form-control" name="financial_status" id="financial_status" required>
                                                        <option value="Yes" {{ $school->financial_status == 'Yes' ? "selected" : "" }}>Yes</option>   
                                                        <option value="No" {{ $school->financial_status == 'No' ? "selected" : "" }}>No</option>                               
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="scholarships_status" class="form-label">Scholarships status</label>
                                                    <select class="form-control" name="scholarships_status" id="scholarships_status" required>
                                                        <option value="Yes" {{ $school->scholarships_status == 'Yes' ? "selected" : "" }}>Yes</option>   
                                                        <option value="No" {{ $school->scholarships_status == 'No' ? "selected" : "" }}>No</option>                               
                                                    </select>
                                                </div>

                                                <div class="mb-5">
                                                    <label for="contacts_status" class="form-label">Contacts status</label>
                                                    <select class="form-control" name="contacts_status" id="contacts_status" required>
                                                        <option value="Yes" {{ $school->contacts_status == 'Yes' ? "selected" : "" }}>Yes</option>   
                                                        <option value="No" {{ $school->contacts_status == 'No' ? "selected" : "" }}>No</option>                               
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <div>
                                                        <label class="form-label mb-1">External links</label>
                                                        <div class="mb-4">
                                                            <input type="text" class="form-control mb-2" id="link_1_name" aria-describedby="link_1" name="link_1_name" placeholder="Link name" value="{{ $school->link_1_name }}">
                                                            <input type="url" class="form-control" id="link_1_url" aria-describedby="link_1_url" name="link_1_url" placeholder="Link" value="{{ $school->link_1_url }}">
                                                        </div>
                                                        <div class="mb-4">
                                                            <input type="text" class="form-control mb-2" id="link_2_name" aria-describedby="link_2" name="link_2_name" placeholder="Link name" value="{{ $school->link_2_name }}">
                                                            <input type="url" class="form-control" id="link_2_url" aria-describedby="link_2_url" name="link_2_url" placeholder="Link" value="{{ $school->link_2_url }}">
                                                        </div>
                                                        <div class="mb-4">
                                                            <input type="text" class="form-control mb-2" id="link_3_name" aria-describedby="link_3" name="link_3_name" placeholder="Link name" value="{{ $school->link_3_name }}">
                                                            <input type="url" class="form-control" id="link_3_url" aria-describedby="link_3_url" name="link_3_url" placeholder="Link" value="{{ $school->link_3_url }}">
                                                        </div>
                                                        <div class="mb-4">
                                                            <input type="text" class="form-control mb-2" id="link_4_name" aria-describedby="link_4" name="link_4_name" placeholder="Link name" value="{{ $school->link_4_name }}">
                                                            <input type="url" class="form-control" id="link_4_url" aria-describedby="link_4_url" name="link_4_url" placeholder="Link" value="{{ $school->link_4_url }}">
                                                        </div>
                                                        <div class="mb-4">
                                                            <input type="text" class="form-control mb-2" id="link_5_name" aria-describedby="link_5" name="link_5_name" placeholder="Link name" value="{{ $school->link_5_name }}">
                                                            <input type="url" class="form-control" id="link_5_url" aria-describedby="link_5_url" name="link_5_url" placeholder="Link" value="{{ $school->link_5_url }}">
                                                        </div>
                                                        <div class="mb-4">
                                                            <input type="text" class="form-control mb-2" id="link_6_name" aria-describedby="link_6" name="link_6_name" placeholder="Link name" value="{{ $school->link_6_name }}">
                                                            <input type="url" class="form-control" id="link_6_url" aria-describedby="link_6_url" name="link_6_url" placeholder="Link" value="{{ $school->link_6_url }}">
                                                        </div>
                                                        <div class="mb-4">
                                                            <input type="text" class="form-control mb-2" id="link_7_name" aria-describedby="link_7" name="link_7_name" placeholder="Link name" value="{{ $school->link_7_name }}">
                                                            <input type="url" class="form-control" id="link_7_url" aria-describedby="link_7_url" name="link_7_url" placeholder="Link" value="{{ $school->link_7_url }}">
                                                        </div>
                                                        <div class="mb-4">
                                                            <input type="text" class="form-control mb-2" id="link_8_name" aria-describedby="link_8" name="link_8_name" placeholder="Link name" value="{{ $school->link_8_name }}">
                                                            <input type="url" class="form-control" id="link_8_url" aria-describedby="link_8_url" name="link_8_url" placeholder="Link" value="{{ $school->link_8_url }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div>
                                                    <label for="package" class="form-label mb-1">Package *</label>
                                                    <input type="text" class="form-control" id="package" aria-describedby="package" name="package" value="{{ $school->package }}" disabled>
                                                </div> -->


                                                <div class="mt-5 text-center">
                                                    <input type="hidden" class="form-control" value="{{$school->id}}" name="hidden_id">
                                                    <input type="hidden" class="form-control" value="{{$school->status}}" name="status">
                                                    <input type="submit" value="Update school information" class="btn text-white px-5 py-2" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">
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
    <button type="button" class="btn btn-primary invisible" id="info-btn" data-bs-toggle="modal" data-bs-target="#infoModal"></button>

    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Warning</h4>
                </div>

                <div class="modal-body" style="padding: 2rem 1rem;">
                    <h6 class="mb-0 text-center text-info">Updates will have to be approved before they go live</h6>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                </div>
            </div>
        </div>
    </div> 


    @if(\Session::has('success'))
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#successModal"></button>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">School information updated successfully.</h4>
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
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#info-btn').click();
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
        function validateForm() {
            var count = $(".more-school-images .file-preview .file-preview-item").length;
            var count_x = $(".featured-image .file-preview .file-preview-item").length;

            if( count > 10 ) { 

                alert('You are only allowed to add 10 images for a school.');

                call();
                return false;

            }
            else if(count_x < 1) {
                alert('You must have a featured image for a school');
                call();
                return false;
            }
            else { 
                return true;
            }    
        }
    </script>

    <script>
        function call (){

            $('.remove-attachment').on('click',function() {
                $('.submit').removeAttr('disabled','disabled');
            });

            $('.more-school-images .input-group').on('click',function() {
                $('.submit').removeAttr('disabled','disabled');
            });

            $('.featured-image .input-group').on('click',function() {
                $('.submit').removeAttr('disabled','disabled');
            });

        };
        
    </script>
@endpush

