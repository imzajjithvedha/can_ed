@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Master application')

@push('after-styles')
    <link href="{{ url('css/master.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h4 class="fw-bolder futura">Master application - {{ $school->name }}</h4>
        <hr>

        <div class="gray mt-4" style="text-align: justify;">
            {{ $information->master_application_description }}
        </div>

        <div class="card mt-5 p-4">

            <form action="{{ route('frontend.master_application_store') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-12">
                        <p class="mb-2 required fw-bold text-end">* Indicates required fields</p>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="first-name" class="form-label">First name *</label>
                        <input type="text" class="form-control" id="first-name" name="first_name" required>
                    </div>

                    <!-- <div class="form-group">
                        <input class="date form-control" type="text">
                    </div> -->

                    <div class="col-12 mb-3">
                        <label for="last-name" class="form-label">Last name *</label>
                        <input type="text" class="form-control" id="last-name" name="last_name" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="dob" class="form-label">Date of birth *</label>
                        <!-- <input type="text" class="form-control" id="dob" name="dob" placeholder="YYYY-MM-DD" readonly="readonly"  maxlength="10"  autocomplete="off" required> -->
                        <input type="date" class="dob" name="dob" required>
                        <!-- <input id="birthday" class="form-control" name="birthday" autocomplete="off" readonly="readonly" type="text" placeholder="YYYY-MM-DD" maxlength="10"> -->
                    </div>

                    <div class="col-12 mb-3">
                        <label for="gender" class="form-label">Gender *</label>
                        <select name="gender" id="gender" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Not to say">Prefer not to say</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="email" class="form-label">Email address *</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="confirm-email" class="form-label">Confirm email address *</label>
                        <input type="email" class="form-control" id="confirm-email" name="confirm_email" required>
                        <p class="d-none mt-2 text-center fw-bold email-warning" style="color: red;">Emails do not match</p>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="phone" class="form-label">Phone number *</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="school-text" class="form-label">Can schools text you *</label>
                        <select name="school_text" id="school-text" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Allow">Allow</option>
                            <option value="Do not Allow">Do not Allow</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="messaging-app" class="form-label">Messaging app</label>
                        <div class="dropdown">
                            <button class="form-select form-control text-left" type="button" id="messaging-app" data-bs-toggle="dropdown">Select</button>
                            
                            <div class="dropdown-menu" style="width: 100%;">
                                <div class="row px-2">
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Facebook Messenger" id="facebook-messenger">
                                        <label class="form-check-label" for="facebook-messenger">Facebook Messenger</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Google Chat" id="google-chat">
                                        <label class="form-check-label" for="google-chat">Google Chat</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="GroupMe" id="group-me">
                                        <label class="form-check-label" for="group-me">GroupMe</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Hike Messenger" id="hike-messenger">
                                        <label class="form-check-label" for="hike-messenger">Hike Messenger</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="iMessage" id="iMessage">
                                        <label class="form-check-label" for="iMessage">iMessage</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="LINE" id="line">
                                        <label class="form-check-label" for="line">LINE</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="QQ Messenger" id="qq-messenger">
                                        <label class="form-check-label" for="qq-messenger">QQ Messenger</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Signal" id="signal">
                                        <label class="form-check-label" for="signal">Signal</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Skype" id="skype">
                                        <label class="form-check-label" for="skype">Skype</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Snapchat" id="snapchat">
                                        <label class="form-check-label" for="snapchat">Snapchat</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="SOMA Messenger" id="soma-messenger">
                                        <label class="form-check-label" for="soma-messenger">SOMA Messenger</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Telegram" id="telegram">
                                        <label class="form-check-label" for="telegram">Telegram</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Twitter" id="twitter">
                                        <label class="form-check-label" for="twitter">Twitter</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Viber" id="viber">
                                        <label class="form-check-label" for="viber">Viber</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="WeChat" id="we-chat">
                                        <label class="form-check-label" for="we-chat">WeChat</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Whatsapp" id="whatsapp">
                                        <label class="form-check-label" for="whatsapp">Whatsapp</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Microsoft Teams" id="microsoft">
                                        <label class="form-check-label" for="microsoft">Microsoft Teams</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Google Meet" id="google-meet">
                                        <label class="form-check-label" for="google-meet">Google Meet</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" value="Zoom" id="zoom">
                                        <label class="form-check-label" for="zoom">Zoom</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="messaging_app[]" id="other" value="Other">
                                        <label class="form-check-label" for="other">Other</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="messaging_app[]" id="text-other" rows="3" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="username" class="form-label">Messaging app username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="study_location" class="form-label">Where do you want to study?</label>
                        <div class="dropdown">
                            <button class="form-select form-control text-left" type="button" id="study_location" data-bs-toggle="dropdown">Select</button>
                            
                            <div class="dropdown-menu" style="width: 100%;">
                                <div class="row px-2">
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Alberta" id="alberta">
                                        <label class="form-check-label" for="alberta">Alberta</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="British Columbia" id="british-columbia">
                                        <label class="form-check-label" for="british-columbia">British Columbia</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Manitoba" id="manitoba">
                                        <label class="form-check-label" for="manitoba">Manitoba</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="New Brunswick" id="new-brunswick">
                                        <label class="form-check-label" for="new-brunswick">New Brunswick</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Newfoundland and Labrador" id="newfoundland-and-labrador">
                                        <label class="form-check-label" for="newfoundland-and-labrador">Newfoundland and Labrador</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Nova Scotia" id="nova-scotia">
                                        <label class="form-check-label" for="nova-scotia">Nova Scotia</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Ontario" id="ontario">
                                        <label class="form-check-label" for="ontario">Ontario</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Prince Edward Island" id="prince-edward-island">
                                        <label class="form-check-label" for="prince-edward-island">Prince Edward Island</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Quebec" id="quebec">
                                        <label class="form-check-label" for="quebec">Quebec</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Saskatchewan" id="saskatchewan">
                                        <label class="form-check-label" for="saskatchewan">Saskatchewan</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Northwest Territories" id="northwest-territories">
                                        <label class="form-check-label" for="northwest-territories">Northwest Territories</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Nunavut" id="nunavut">
                                        <label class="form-check-label" for="nunavut">Nunavut</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="study_location[]" value="Yukon" id="yukon">
                                        <label class="form-check-label" for="yukon">Yukon</label>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="citizenship" class="form-label">Country of citizenship *</label>
                        <select name="citizenship" id="citizenship" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
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

                    <div class="col-12 mb-3">
                        <label for="citizenship-live" class="form-label">Do you live in your country of citizenship? *</label>
                        <select name="citizenship_live" id="citizenship-live" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="country" class="form-label">Where do you currently reside?</label>
                        <select class="form-control form-select " id="country" name="country">
                            <option value="" selected disabled hidden>Select</option>
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

                    <div class="col-12 mb-3">
                        <label for="status" class="form-label">Status in the country of residence</label>
                        <div class="dropdown">
                            <button class="form-select form-control text-left" type="button" id="status" data-bs-toggle="dropdown">Select</button>
                            
                            <div class="dropdown-menu" style="width: 100%;">
                                <div class="row px-2">
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="status[]" value="Parents/ relative sponsorship" id="parents-relative-sponsorship">
                                        <label class="form-check-label" for="parents-relative-sponsorship">Parents/ relative sponsor</label>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="status[]" value="Permanent resident" id="permanent-resident">
                                        <label class="form-check-label" for="permanent-resident">Permanent resident</label>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="status[]" value="Study/ Student visa" id="study-visa">
                                        <label class="form-check-label" for="study-visa">Study/ Student visa</label>
                                    </div>
                                    
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="status[]" value="Visit Visa" id="visit-visa">
                                        <label class="form-check-label" for="visit-visa">Visit Visa</label>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="status[]" value="Work Visa" id="work-visa">
                                        <label class="form-check-label" for="work-visa">Work Visa</label>
                                    </div>
                                    
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="status[]" id="status-other" value="Other">
                                        <label class="form-check-label" for="status-other">Other</label>
                                    </div>

                                    <div class="col-12">
                                        <textarea class="form-control" name="status[]" id="text-status" rows="3" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="mailing-address" class="form-label">Mailing address *</label>
                        <textarea class="form-control" name="mailing_address" id="mailing-address" rows="3" placeholder="Complete with country name, postal code or ZIP code as applicable" required></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="school-name" class="form-label">High school name *</label>
                        <input type="text" class="form-control" id="school-name" name="school_name" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="gpa" class="form-label">High school GPA *</label>
                        <input type="text" class="form-control" id="gpa" name="gpa" placeholder="e.g. (75%), or (3.4 of 4)" required>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="school-city" class="form-label">High school location - city *</label>
                        <input type="text" class="form-control" id="school-city" name="school_city" required>
                    </div>

                    
                    <div class="col-12 mb-3">
                        <label for="school-country" class="form-label">High school location - country *</label>
                        <select class="form-control form-select" id="school-country" name="school_country" required>
                            <option value="" selected disabled hidden>Select</option>
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

                    <div class="col-12 mb-3">
                        <label for="start-date" class="form-label">When are you planning to start *</label>
                        <select name="start_date" id="start-date" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="I am not sure">I am not sure</option>
                            <option value="Winter of this year">Winter of this year</option>
                            <option value="Summer of this year">Summer of this year</option>
                            <option value="Fall of this year">Fall of this year</option>
                            <option value="Winter of next year">Winter of next year</option>
                            <option value="Summer of next year">Summer of next year</option>
                            <option value="Fall of next year">Fall of next year</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="interested" class="form-label">I am interested in *</label>
                        <select name="interested" id="interested" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="I am not sure">I am not sure</option>
                            @foreach($data as $da)
                                <option value="{{ $da->id }}">{{ $da->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="like-study" class="form-label">I would like to study *</label>
                        <select name="like_study" id="like-study" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            @foreach($prog as $pro)
                                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="student-type" class="form-label">My student type is *</label>
                        <select name="student_type" id="student-type" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Exchange student">Exchange student</option>
                            <option value="New/ Freshman">New/ Freshman</option>
                            <option value="Returning student">Returning student</option>
                            <option value="Student with disabilities">Student with disabilities</option>
                            <option value="Transfer student">Transfer student</option>
                        </select>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="funding-source" class="form-label">Tuition funding source</label>
                        <div class="dropdown">
                            <button class="form-select form-control text-left" type="button" id="funding-source" data-bs-toggle="dropdown">Select</button>
                            
                            <div class="dropdown-menu" style="width: 100%;">
                                <div class="row px-2">
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="funding_source[]" value="My own funds" id="my-own-funds">
                                        <label class="form-check-label" for="my-own-funds">My own funds</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="funding_source[]" value="Parents, family, relative(s), friend(s)" id="family">
                                        <label class="form-check-label" for="family" style="display: inline">Parents, family, relative(s), friend(s)</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="funding_source[]" value="Sponsored by company or government" id="company-government">
                                        <label class="form-check-label" for="company-government" style="display: inline">Sponsored by company or government</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="funding_source[]" value="Sponsored by NGO" id="ngo">
                                        <label class="form-check-label" for="ngo">Sponsored by NGO</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" name="funding_source[]" value="Sponsored by not-for-profit organization" id="organization">
                                        <label class="form-check-label" for="organization" style="display: inline">Sponsored by not-for-profit organization</label>
                                    </div>
                                    <div class="col-12 mb-1">
                                        <input type="checkbox" class="me-1" id="funding-source-other" value="Other">
                                        <label class="form-check-label" for="funding-source-other">Other</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" name="funding_source[]" id="funding-source-status" rows="3" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="tests" class="form-label">Tests taken</label>
                        <div class="dropdown">
                            <button class="form-select form-control text-left" type="button" id="tests" data-bs-toggle="dropdown">Select</button>
                            
                            <div class="dropdown-menu tests-menu" style="width: 100%;">

                                <div class="row px-2 mb-2">
                                    <div class="col-7 text-center">
                                        <label class="form-label mb-0">Test name</label>
                                    </div>
                                    <div class="col-5 text-center">
                                        <label class="form-label mb-0">Score</label>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="ACT" id="act">
                                            <label class="form-check-label" for="act">ACT</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="DAT" id="dat">
                                            <label class="form-check-label" for="dat">DAT</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="ESL" id="esl">
                                            <label class="form-check-label" for="esl">ESL</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="GMAT" id="gmat">
                                            <label class="form-check-label" for="gmat">GMAT</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="GRE" id="gre">
                                            <label class="form-check-label" for="gre">GRE</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="IELTS" id="ielts">
                                            <label class="form-check-label" for="ielts">IELTS</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="LSAT" id="lsat">
                                            <label class="form-check-label" for="lsat">LSAT</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="MCAT" id="mcat">
                                            <label class="form-check-label" for="mcat">MCAT</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="OAT" id="oat">
                                            <label class="form-check-label" for="oat">OAT</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="PCAT" id="pcat">
                                            <label class="form-check-label" for="pcat">PCAT</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="SAT" id="sat">
                                            <label class="form-check-label" for="sat">SAT</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="border">
                                            <input type="checkbox" class="me-2 test-box" name="tests[]" value="TOEFL" id="toefl">
                                            <label class="form-check-label" for="toefl">TOEFL</label>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="input-group">
                                            <div class="input-group-text" style="width: 40px;">
                                                <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                            </div>
                                            <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-1: Please type" id="other1" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="input-group">
                                            <div class="input-group-text" style="width: 40px;">
                                                <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                            </div>
                                            <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-2: Please type" id="other2" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="input-group">
                                            <div class="input-group-text" style="width: 40px;">
                                                <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                            </div>
                                            <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-3: Please type" id="other3" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="input-group">
                                            <div class="input-group-text" style="width: 40px;">
                                                <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                            </div>
                                            <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-4: Please type" id="other4" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                    </div>
                                </div>

                                <div class="row px-2 align-items-center mb-2">
                                    <div class="col-7 test">
                                        <div class="input-group">
                                            <div class="input-group-text" style="width: 40px;">
                                                <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                            </div>
                                            <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-5: Please type" id="other5" disabled required>
                                        </div>
                                    </div>
                                    <div class="col-5 marks">
                                        <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="comments" class="form-label">Additional comments/ inquiries/ questions (Please write in English)</label>
                        <textarea name="comments" id="comments" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="questions" class="form-label">Do you want to add anything: questions, specific circumstances, comments, ...? (Please write in English)</label>
                        <textarea name="questions" id="questions" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label for="transfer-student" class="form-label">Are you a transfer student currently living in Canada? *</label>
                        <select name="transfer_student" id="transfer-student" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label for="visa" class="form-label">Do you already have a study permit (a student visa) from a Canadian embassy? *</label>
                        <select name="visa" id="visa" class="form-select form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-12 form-check" style="padding-left: 2.25rem;">
                        <input class="form-check-input" type="checkbox" name="email_copy">
                        <label class="form-check-label" for="flexCheckDefault">
                            Send me a copy
                        </label>
                    </div>


                    <div class="col-12 mt-4 mb-5 gray" style="font-size: 0.9rem">
                        <label class="form-label">By submitting this form, I agree to receiving emails about educational services from 4R Business Services, Proxima Study, and its partners according to the guidelines set out in our <a href="{{ route('frontend.privacy_policy') }}" class="text-decoration-none" target="_blank" style="color: #b1040e">Privacy policy</a>
                    </div>

                    <div class="col-12 text-center mb-3">
                        <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                    </div>

                    <div class="col-12 text-center">
                        <input type="hidden" class="form-control" name="school_id" value="{{ $school->id }}">
                        <input type="hidden" class="form-control" name="school_slug" value="{{ $school->slug }}">
                        <button type="submit" class="btn btn-primary px-5 py-3 text-white w-100" id="submit_btn" disabled>Submit</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you very much for your application. School will contact you as soon as possible.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif


@push('after-scripts')

<!-- Master application scripts -->

    <script>
        $('#other').click(function() {
            if(this.checked) {
                $("#text-other").removeAttr('disabled');
            } else {
                $("#text-other").attr('disabled' , 'disabled');
            }
        });
    </script>

    <script>
        $('#status-other').click(function() {
            if(this.checked) {
                $("#text-status").removeAttr('disabled');
            } else {
                $("#text-status").attr('disabled' , 'disabled');
            }
        });
    </script>

    <script>
        $('#funding-source-other').click(function() {
            if(this.checked) {
                $("#funding-source-status").removeAttr('disabled');
            } else {
                $("#funding-source-status").attr('disabled' , 'disabled');
            }
        });
    </script>


    <script>
        $('.test-box').click(function() {
            if(this.checked) {
                $(this).parents('.test').next().find('input').removeAttr('disabled');
            } else {
                $(this).parents('.test').next().find('input').attr('disabled' , 'disabled');
                $(this).parents('.test').next().find('input').val('');
            }
        });
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
        
    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script>
        $("#confirm-email").on("change keyup paste", function(){
            if($(this).val() == '' && $('#email').val() == ''){
                $('.email-warning').addClass('d-none');
                // $(this).css('border', '1px solid #ced4da');
            }
            else if( $(this).val() != $('#email').val() ) {
                $('.email-warning').removeClass('d-none');
                // $(this).css('border', '1px solid red');
            }
            else if($(this).val() == $('#email').val()){
                $('.email-warning').addClass('d-none');
                // $(this).css('border', '1px solid #ced4da');
            }
            
        })

        $("#email").on("change keyup paste", function(){
            if($(this).val() == '' && $('#confirm-email').val() == ''){
                $('.email-warning').addClass('d-none');
            }
            else if( $(this).val() != $('#confirm-email').val() ) {
                $('.email-warning').removeClass('d-none');
            }
            else if($(this).val() == $('#confirm-email').val()){
                $('.email-warning').addClass('d-none');
            }
            
        })
    </script>

    <script>
        $('.same').click(function() {
            if(this.checked) {
                $('#residence-country').val($('#citizenship-country').val());
                $('#residence-postal').val($('#citizenship-postal').val());
            } else {
                $('#residence-country').val('');
                $('#residence-postal').val('');
            }
        });
    </script>

    <script>
        $('#citizenship-live').on('change', function() {
            if($(this).val() == 'Yes') {
                $('#country').attr('disabled', 'disabled');
                $('#status').attr('disabled', 'disabled');
            }
            else {
                $('#country').removeAttr('disabled', 'disabled');
                $('#status').removeAttr('disabled', 'disabled');
            }
        })
    </script>

    <!-- stop dropdown close when click inside -->
    <script>
        $(".dropdown-menu").click(function(e){
            e.stopPropagation();
        })
    </script>


    <!-- calender -->
    <script>
       // Initialize all input of type date
        var dob = bulmaCalendar.attach('.dob',{
            type: 'date',
            dateFormat: 'yyyy/MM/dd'
        });

        var startDate = bulmaCalendar.attach('.start-date',{
            type: 'date',
            dateFormat: 'yyyy/MM/dd'
        });

    
        $('.datetimepicker-dummy .datetimepicker-dummy-wrapper .is-hidden').attr('type', 'hidden');
    </script>

    <script>
        $('.more-test-check').click(function() {
            if(this.checked) {
                $(this).parents('.input-group-text').next().removeAttr('disabled');
            } else {
                $(this).parents('.input-group-text').next().attr('disabled', 'disabled');
            }
        });

        $(".more-test").on("change keyup paste", function(){
            if($(this).val() != ''){
                $(this).parents('.test').next().find('input').removeAttr('disabled');
            }
            else {
                $(this).parents('.test').next().find('input').attr('disabled', 'disabled');
            }
        })
    </script>


    <script>
        $('.dropdown-menu input[type="checkbox"]').on('click', function() {
            let count = $(this).parents('.dropdown-menu').find('input:checkbox:checked').length;

            if(count == 1) {
                let value = $(this).parents('.dropdown-menu').find('input:checkbox:checked').val();
                $(this).parents('.dropdown-menu').prev().text(value);
            } 
            else if (count > 1) {
                $(this).parents('.dropdown-menu').prev().text('Selected');
            }
            else {
                $(this).parents('.dropdown-menu').prev().text('Select');
            }
        });
    </script>

@endpush